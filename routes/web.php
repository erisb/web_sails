<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ///////////////////////////////////////////////// Landingpage

//Sails Web Portal
Auth::routes();
// Home
Route::get('/','HomeController@index');

//Register
Route::get('register', 'RegisterController@index');
Route::get('/registrationsuccess', function () {
  return view('landingpage/register/registrationsuccess');
});
Route::post('add_bup', 'RegisterController@add_BUP');
Route::post('upload_bup', 'RegisterController@upload_BUP');

//Login
Route::get('login', 'Auth\LoginPortalController@showLoginForm')->name('loginView');
Route::post('login', 'Auth\LoginPortalController@doLogin')->name('login');
Route::get('logout', 'Auth\LoginPortalController@logout');
Route::get('show_forget','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('send_email','Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('send_email_info','Auth\ForgotPasswordController@email_info');
Route::get('show_reset/{id}','Auth\ForgotPasswordController@show_reset');
Route::post('reset_pass/{id}','Auth\ForgotPasswordController@reset_password');

Route::group(['middleware' => 'cek-login'], function() {

      Route::post('edit_bup/{id}', 'RegisterController@edit_BUP');

    //Account Setting
      Route::get('accountSetting', 'AccountSettingController@index');
      Route::get('get_customer', 'AccountSettingController@get_customer');
      Route::get('get_customer_byRole/{id}', 'AccountSettingController@get_customer_byRole');
      Route::get('get_customer_byId/{id}', 'AccountSettingController@get_customer_byId');
      Route::get('get_file/{file}', 'AccountSettingController@get_download');
      Route::get('app_acc/{id}', 'AccountSettingController@approve_account');
      Route::get('rej_acc/{id}', 'AccountSettingController@reject_account');
      Route::get('set_site/{id}', 'AccountSettingController@setting_site');

      Route::get('get_site', 'AccountSettingController@get_site');
      Route::get('get_site_byId/{id}', 'AccountSettingController@get_site_byId');
      Route::post('add_site', 'AccountSettingController@add_site');
      Route::post('edit_site/{id}', 'AccountSettingController@edit_site');
      Route::get('delete_site/{id}', 'AccountSettingController@delete_site');

      Route::get('get_billing/{id}', 'AccountSettingController@billing');

      Route::get('get_payment', 'PaymentVerificationController@index');
      Route::get('get_paymentH_byId/{id}', 'AccountSettingController@get_paymentH_byId');
      Route::get('get_paymentD_byId/{id}', 'AccountSettingController@get_paymentD_byId');
      Route::get('get_log_paymentH_byId/{id}', 'AccountSettingController@get_log_paymentH_byId');
      Route::get('get_site_byStatus/{id}', 'AccountSettingController@get_site_byStatus');
      Route::get('count_site/{id}', 'AccountSettingController@count_site');
      Route::get('get_site_unpaid/{id}', 'AccountSettingController@get_site_unpaid');
      Route::get('pay_billing/{id}', 'AccountSettingController@pay_billing');

      Route::get('get_view_pay/{id}', 'PaymentVerificationController@get_view_payment');
      Route::get('get_pay_veri', 'PaymentVerificationController@get_pay_veri');
      Route::get('get_pay_veri_byRole/{id}', 'PaymentVerificationController@get_pay_veri_byRole');
      Route::get('app_pay/{id_pay}/{id_bup}', 'PaymentVerificationController@app_pay');
      Route::get('rej_pay/{id}', 'PaymentVerificationController@rej_pay');
      Route::get('get_view_billing/{id}', 'PaymentVerificationController@view_billing');

      Route::get('user', 'UserListController@index');
      Route::get('get_user', 'UserListController@get_user');
      Route::get('get_userByRole', 'UserListController@get_userByRole');
      Route::post('add_user', 'UserListController@add_user');
      Route::get('edit_user/{id}', 'UserListController@edit_user');
      Route::get('delete_user/{id}', 'UserListController@delete_user');

      Route::get('patch', 'AccountSettingController@patch');
      Route::get('get_patch', 'AccountSettingController@get_patch');
      Route::post('add_patch', 'AccountSettingController@add_patch');
      Route::post('edit_patch/{id}', 'AccountSettingController@edit_patch');
      Route::get('delete_patch/{id}', 'AccountSettingController@delete_patch');
      Route::post('upload_patch', 'AccountSettingController@upload_patch');
      Route::get('get_file_patch/{file}', 'AccountSettingController@get_download_patch');

});

// Sails Web SL
Route::get('web_sl', 'Auth\LoginSLController@show_login')->name('loginView_sl');
Route::post('web_sl/login', 'Auth\LoginSLController@doLogin')->name('login_sl');
Route::get('logout_sl', 'Auth\LoginSLController@logout');

Route::group(['middleware' => 'cek-login_sl'], function() {
      Route::get('web_sl/vesSchedule', 'web_sl\VesselScheduleController@index');
      Route::get('vesselSchedule_list/{id}', 'web_sl\VesselScheduleController@vesSchList');
      Route::get('vessel_auto', 'web_sl\VesselScheduleController@vessel_auto');
      Route::get('edit_vessel_auto', 'web_sl\VesselScheduleController@edit_vessel_auto');
      Route::post('add_ves_sch', 'web_sl\VesselScheduleController@add_ves_sch');
      Route::post('edit_ves_sch/{id}', 'web_sl\VesselScheduleController@edit_ves_sch');
      Route::get('delete_ves_sch/{id}', 'web_sl\VesselScheduleController@delete_ves_sch');
      Route::get('send_ves_sch/{id}', 'web_sl\VesselScheduleController@send_ves_sch');

      Route::get('web_sl/vesServices/{id}/{id_ves}', 'web_sl\VesselServicesController@index');
      Route::post('add_service', 'web_sl\VesselServicesController@add_ves_service');
      Route::get('send_ves_serv/{id}', 'web_sl\VesselServicesController@send_ves_serv');
      Route::get('web_sl/back_ves_sch/{id}', 'web_sl\VesselServicesController@back_ves_sch');

      Route::get('web_sl/userSL','web_sl\UserSLController@index');
      Route::get('edit_user/{id}','web_sl\UserSLController@edit_user');

      Route::get('web_sl/invoiceSL','web_sl\InvoiceSLController@index');
      Route::get('get_invoice/{id}','web_sl\InvoiceSLController@get_invoice');
      Route::get('web_sl/pranotaPDF/{name}/{id}','web_sl\InvoiceSLController@downloadPranotaPDF');
});
// Route::get('forgot', function(){
//   return view('landingpage/forgotpassword/forgotpassword');
// });
// Route::get('forgotinfo', function(){
//   return view('landingpage/forgotpassword/forgotinfo');
// });
// Route::get('/reset', function(){
//   return view('landingpage/forgotpassword/resetpassword');
// });
// Route::get('/registrationsuccess', function () {
//   return view('landingpage/register/registrationsuccess');
// });
// // /////////////////////////////////////////////////////// Apps Sails
// // ////////////////////////////////////////////////////// Vessel Schedule
// Route::get('/app', function() {
//   return view('apps/vesschedule/vesschedule');
// });
// Route::get('/addVesSchedule', function() {
//   return  view('apps/vesschedule/addVesSchedule');
// });
// // ////////////////////////////////////////////////////// Vessel Realization
// Route::get('/vesRealization', function() {
//   return view('apps/vesRealization/vesRealization');
// });
// Route::get('/addVesRealization', function() {
//   return  view('apps/vesRealization/addVesRealization');
// });
// // PDF
// Route::get('/downloadPDF','PdfController@downloadPDF');
// // ////////////////////////////////////////////////////// Invoicing
// Route::get('/invoicing', function() {
//   return view('apps/invoicing/invoicing');
// });
// // PDF
// Route::get('/downloadPDF','PdfController@downloadPDF');
// // /////////////////////////////////////////////////////// Account SETTINGS
// Route::get('accountSetting/editAccount', function(){
//     return view('apps/accountSetting/editAccount');
// });
// Route::get('accountSetting/customer', function(){
//   return view('apps/accountSetting/customer');
// });
// Route::get('accountSetting/billing', function(){
//   return view('apps/accountSetting/billing');
// });
// Route::get('accountSetting/paymentVerification', function(){
//   return view('apps/accountSetting/paymentVerification');
// });
// Route::get('accountSetting/createSite', function(){
//   return view('apps/accountSetting/createSite');
// });
// Route::get('accountSetting/addNewSite', function(){
//   return view('apps/accountSetting/addNewSite');
// });
