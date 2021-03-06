@extends('world.layout.master')
@section('css')
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Zebra_datepicker/1.9.12/css/bootstrap/zebra_datepicker.css" />
<style type="text/css">
  .label {
  color: white;
  padding: 4px;
  margin-left: 4px;
  margin-top:4px;
  border-radius:30px;
}

.available_dates {background-color: #4CAF50 !important;} 
.jumbotron{
    background-color:#ffffff;
    border:1px solid #AAA;
    border-bottom:3px solid #BBB;
    padding:0px;
    overflow:hidden;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);    
          font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
}
    .header{
        background: #33357e;
        
        }
      .blue h1, h2, h3 {
       
      }
      .headline {
        color: #FFFFFF;
        margin: 1em;
      }
.card {
    background:#FFF;
    display: block;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    border:1px solid #AAA;
    border-bottom:3px solid #BBB;
    padding:0px;
    overflow:hidden;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"
}

.card p{
  font-size:14px !important;
}
.card-body{
 margin:1em;   
}

.pull-left {
  float: left;
}

.pull-none {
  float: none !important;
}

.pull-right {
  float: right;
}

.card-header{
    width:100%;
  color:#2196F3;
    border-bottom:3px solid #BBB;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"
    padding:0px;
    margin-top:0px;
    overflow:hidden;
    -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    
}
.card-header-blue{
    background-color:#33357e;
    border-bottom:3px solid #BBB;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"
    padding:0px;
    margin-top:0px;
    overflow:hidden;
    -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
          transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-heading {
    display: block;
    font-size: 24px;
    line-height: 28px;
    margin-bottom: 24px;
    margin-left:1em;
    border-bottom: 1px #2196F3;
    color:#fff;
   
}
.card-footer{
 border-top:1px solid #000;   
    
}

      .padding-lr-30px {
    padding-left: 30px;
    padding-right: 30px;
}
.padding-top-20px {
    padding-top: 20px;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    font-weight: 500;
}
.h3, h3 {
    font-size: 20px;
    line-height: 27px;
    letter-spacing: -1px;
}
.error{
  color: #ff0000;
  font-size: 12px;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
    <!-- slider -->

@section('content')

<section class="doctors-block-chamber">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 text-center appointment-block">
<div class="doctor-desc-box text-left">
<h3> {{$tempBooking->doctor->name}} </h3>
<span class="adress">{{$tempBooking->doctor->current_city}}</span>
<span class="department">{{$tempBooking->doctor->department->name}} </span>
</div>

<div class="results">
 <h3>Pay Now</h3>
</div>
</div>


<div class="col-md-7">
<div class="doctor-desk text-left">
<h3> From Doctor's Desk </h3>
<div class="doctor-desk-para">
<p>&nbsp;</p>
</div>
</div>
</div>


      </div>
    </div>
  </section>

<section class="clinic">
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">
            <div class="card">
                    <div class="card-content">
                      <div class="card-header-blue">
                           <h3 class="padding-lr-30px padding-top-20px" style="color: #FFF"><i class="fa fa-calendar margin-right-10px"></i> 
                            <strong>Booking Summary</strong></h3>
                        </div>
                        <div class="card-body">
                        <form name="f1" action="{{route('ticket')}}" method="POST">  
                          @csrf
                        <p class="card-p">
                          <input type="hidden" name="temp_booking_id" id="temp_booking_id" value="{{$tempBooking->id}}">
                             <div class="row form-group">
                               <div class="col-md-5"><strong>Transaction No</strong></div>
                               <div class="col-md-7"> 
                                  {{$tempBooking->transaction_id}}
                                </div>
                             </div>
                             <div class="row  form-group">
                               <div class="col-md-5"><strong>Appointment Date</strong></div>
                               <div class="col-md-7"> 
                                  <p><i class="fa fa-calendar" aria-hidden="true"></i> {{$tempBooking->date}}</p>
                                </div>
                             </div>

                              <div class="row  form-group">
                               <div class="col-md-5"><strong>Appointment Time</strong></div>
                               <div class="col-md-7"> 
                                  <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('h:i A',strtotime($tempBooking->schedule->starttime))}} - {{date('h:i A',strtotime($tempBooking->schedule->endtime))}}</p>
                                </div>
                             </div>

                              <div class="row  form-group">
                               <div class="col-md-5"><strong>Appointment Fee</strong></div>
                               <div class="col-md-7"> 
                                  <p><i class="fa fa-inr" aria-hidden="true"></i> {{$tempBooking->doctor->doctor_fees}}</p>
                                </div>
                             </div>

                              <div class="row  form-group">
                               <div class="col-md-5"><strong>Booking Charge</strong></div>
                               <div class="col-md-7"> 
                                  <p><i class="fa fa-inr" aria-hidden="true"></i> {{$tempBooking->doctor->booking_charge}}</p>
                                </div>
                             </div>

                             <div class="row  form-group" style="color: #ff0000">
                               <div class="col-md-5"><strong>Online Payable</strong></div>
                               <div class="col-md-7"> 
                                  <p><i class="fa fa-inr" aria-hidden="true"></i> 
                                    @if($tempBooking->doctor->fees_online == 1)
                                    {{ intval($tempBooking->doctor->doctor_fees)+intval($tempBooking->doctor->booking_charge) }}
                                    @else
                                     {{ intval($tempBooking->doctor->booking_charge)}}
                                    @endif
                                  </p>
                                </div>
                             </div>

                             @if($tempBooking->doctor->fees_online == 0)
                             <div class="row  form-group">
                               <div class="col-md-12"><strong>Pay Doctors Fee Rs. <span style="color:#ff0000">{{$tempBooking->doctor->doctor_fees}}</span> at clinic</strong></div>
                             </div>
                             @endif

                             <div class="row">
                               <div class="col-md-4"></div>
                               <div class="col-md-7"> 
                                 <button type="submit" name="submit" class="btn btn-success"> Pay Now</button>
                                </div>
                             </div>
                                
                        </p>
                      </form>
                      </div>                     
                        
                    </div>
                </div>
      
  </div>

</div>
</div>
</section>



@endsection

@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
@endsection

