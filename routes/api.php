<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/customer/register', 'Api\Customer\Auth\RegisterController@register');
Route::post('/customer/verify-otp', 'Api\Customer\Auth\RegisterController@otp_verify');
Route::post('/customer/resend-otp', 'Api\Customer\Auth\RegisterController@resend_otp');
Route::post('/customer/login', 'Api\Customer\Auth\LoginController@index');
Route::get('/customer/master/location', 'Api\Customer\Master\RegionController@index');
Route::middleware('auth:api')->group(function(){
    Route::get('/customer/master/departments', 'Api\Customer\Master\DepartmentController@index');
    Route::post('/customer/master/department-doctor', 'Api\Customer\Master\DepartmentController@departments');
    Route::post('/customer/master/clinics', 'Api\Customer\Master\ScheduleController@index');
    Route::post('/customer/master/schedule', 'Api\Customer\Master\ScheduleController@schedule');
    Route::post('/customer/master/slot', 'Api\Customer\Master\ScheduleController@slot');
    Route::post('/customer/temp-book', 'Api\Customer\BookingController@tempBook');
    Route::post('/customer/final-book', 'Api\Customer\BookingController@book');
});
