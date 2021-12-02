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

//auth
Route::post('login', 'Api\Auth\LoginController@login')->name('login');
Route::post('get-staff', 'Api\Auth\RegisterController@getStaff')->name('get-staff');
Route::post('register-staff', 'Api\Auth\RegisterController@registerStaff')->name('register-staff');
Route::post('forgot-password', 'Api\Auth\ForgotPasswordController@forgotPassword')->name('forgot-password');
Route::post('refresh-token', 'Api\Auth\LoginController@refreshToken')->name('refresh-token');
Route::post('get-otp', 'Api\Auth\OtpController@getOtp')->name('get-otp');
Route::post('get-otp-sms', 'Api\Auth\OtpController@getOtpSms')->name('get-otp-sms');
Route::post('submit-otp', 'Api\Auth\OtpController@submitOtp')->name('submit-otp');
Route::post('resend-email-verification', 'Api\Auth\EmailVerificationController@resendEmailVerification');

//common data
Route::get('company-list', 'Api\Master\CompanyController@companyList')->name('company-list');
Route::get('religion-list', 'Api\Master\ReligionController@religionList')->name('religion-list');
Route::get('country-list', 'Api\Master\CountryController@countryList')->name('country-list');
Route::get('state-list', 'Api\Master\StateController@stateList')->name('state-list');
Route::get('city-list', 'Api\Master\CityController@cityList')->name('city-list');

Route::group(['middleware' => ['auth:api',]], function () {
  Route::get('logout', 'Api\Auth\LoginController@logout')->name('logout');
  Route::post('device-id-update', 'Api\Home\HomeController@deviceIdUpdate')->name('device-id-update');
  Route::get('company-feature-setting', 'Api\Master\FeatureController@getFeatureSetting')->name('company-feature-setting');

  Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'Api\Home\ProfileController@profileGet')->name('profile');
    Route::post('update', 'Api\Home\ProfileController@profileUpdate')->name('profile-update');
  });

  Route::group(['prefix' => 'master'], function () {
    Route::get('project-list', 'Api\Master\ProjectController@projectList')->name('project-list');
  });

  Route::group(['prefix' => 'attendance'], function () {
    Route::post('checkin', 'Api\Attendance\CheckInController@doCheckIn')->name('attendance-checkin');
    Route::post('checkout', 'Api\Attendance\CheckOutController@doCheckOut')->name('attendance-checkout');
    Route::get('current', 'Api\Attendance\AttendanceController@attendanceCurrent')->name('attendance-current');
    Route::post('summary', 'Api\Attendance\AttendanceController@attendanceSummary')->name('attendance-summary');
    Route::get('category', 'Api\Attendance\AttendanceController@attendanceCategory')->name('attendance-category');
  });
});
