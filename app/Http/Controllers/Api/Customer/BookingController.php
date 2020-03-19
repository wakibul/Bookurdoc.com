<?php

namespace App\Http\Controllers\Api\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TempBooking;
use App\Models\ScheduleMaster;
use App\Models\DailyAvailable;
use App\Models\TempSlotBook;
use Validator,DB;
use Payabbhi\Client as PayabbhiClient;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tempBook(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'slot_id' => 'required',
            'consultation_fees' => 'required|numeric',
            'service_charge' => 'required|numeric',
            'patient_name' => 'required',
            'patient_city' => 'required',
            'phone_no' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'fees_mode' => 'required',
            'doctor_id' => 'required',
            'clinic_id' => 'required'
        ]);
        if ($validator->fails())
        return response()->json(['success'=>false,'error'=>$validator->errors()]);

        $transaction_id =  genUniqueID();
        $explodeDate = explode("-",$request->date);
        $date = $explodeDate[2]."-".$explodeDate[1]."-".$explodeDate[0];
        $date = date('Y-m-d',strtotime($date));
        $dailyAvailable = DailyAvailable::where([['doctor_id',$request->doctor_id],['schedule_id',$request->slot_id],['date',$date],['status',1]])->first();
        $seatAvailable = $dailyAvailable->available_seat;
        $tempBook = TempSlotBook::where([['doctor_id',$request->doctor_id],['clinic_id',$request->clinic_id],['schedule_id',$request->slot_id],['date',$date]])->count();

        if($tempBook >= $seatAvailable){
            return response()->json(['success'=>false,'error'=>['message'=>'Currently the slot is in process']]);
        }

        $schedule = ScheduleMaster::findOrFail($request->slot_id);
        $future_date = $date.'- '.intval($schedule->book_before_days).' days';
        $chckAppDate = date('Y-m-d',strtotime($future_date));
        //dd($chckAppDate);

        if(date('Y-m-d H:i')>date('Y-m-d H:i',strtotime($chckAppDate." ".$schedule->book_before_time))){
            return response()->json(['success'=>false,'error'=>['message'=>'Oops! Booking time is over']]);
        }

        $accessId = env("PAYMENT_ACCESS_ID");
        $secretKey = env("PAYMENT_SECRET_KEY");
        $client = new PayabbhiClient($accessId, $secretKey);


        $data['user_id'] =  0;
        $data['user_type'] =  'guest';
        $data['agent_charge'] =  '0.00';
        $merchantOrderID = uniqid();
        $data['merchant_order_id'] =  $merchantOrderID;

        if($request->fees_mode == 1){
         $data['amount_payable'] = intval($request->consultation_fees)+intval($request->service_charge);
        }
         else{
            $data['amount_payable'] = intval($request->service_charge);
        }

        $data['transaction_id'] =  $transaction_id;
        $data['coupon_id'] =  $request->coupon_id;
        $data['date'] =  $date;
        $data['doctor_id'] =  $request->doctor_id;
        $data['clinic_id'] =  $request->clinic_id;
        $data['slot_id'] =  $request->slot_id;
        $data['consultation_fees'] =  $request->consultation_fees;
        $data['service_charge'] =  $request->service_charge;
        $data['patient_name'] =  $request->patient_name;
        $data['fees_mode'] =  $request->fees_mode;
        $data['patient_city'] =  $request->patient_city;
        $data['patient_email'] =  $request->email;
        $data['patient_phone'] =  $request->phone_no;
        $data['patient_gender'] =  $request->gender;
        $data['patient_age'] =  $request->age;

        DB::beginTransaction();
        try{
            if($insData = TempBooking::updateOrCreate($data))
            {
                $temp['doctor_id'] =  $request->doctor_id;
                $temp['clinic_id'] =  $request->clinic_id;
                $temp['schedule_id'] =  $request->slot_id;
                $temp['date'] =  $date;
                TempSlotBook::updateOrCreate($temp);
                DB::commit();
                $tempBooking = TempBooking::with('doctor','clinic')->findOrFail($insData->id);
                $order = $client->order->create([
                    'amount'    =>$tempBooking->amount_payable*100,
                    'currency'  =>'INR',
                    'merchant_order_id' => $merchantOrderID,
                    "notes"     => [
                        "merchant_order_id" => (string)$merchantOrderID,
                        "payment_processing"    => true
                    ]
                ]);

                $payment_data = [
                    'access_id'     => $accessId,
                    'order_id'      => $order->id,
                    'amount'        => $tempBooking->amount_payable*100, //into paisa
                    'description'   => env("APP_NAME").': Order #' . $merchantOrderID,
                    'prefill'     => [
                        'name'      => $tempBooking->patient_name,
                        'email'     => $tempBooking->patient_email,
                        'contact'   => $tempBooking->patient_phone
                    ],
                    'notes'       => [
                    'merchant_order_id' => (string)$merchantOrderID
                    ],
                    'theme' => [
                        'color' => '#2E86C1'
                    ]
                ];
            TempBooking::findOrFail($insData->id)->update(['order_id'=>$order->id]);
        }
    }
    catch (\Exception $e)
    {

        DB::rollback();
        return response()->json(['success'=>false,'payment_data'=>$payment_data]);
    }

        return response()->json(['success'=>true,'payment_data'=>$payment_data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function book(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
