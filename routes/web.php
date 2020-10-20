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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/crm/get-district', 'CrmController@getDistrict');
Route::get('/crm/create', 'CrmController@create');
Route::post('/crm/store', 'CrmController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ticket', 'TicketController@index')->name('ticket');
Route::get('/ticket/show/{id}','TicketController@show');
Route::resource('/department', 'DepartmentController');
Route::resource('/division', 'DivisionController');
Route::resource('/district', 'DistrictController');
Route::resource('/query-type', 'QueryTypeController');
Route::resource('/complain-type', 'ComplainTypeController');
Route::resource('/call-remarks', 'CallRemarkController');
Route::resource('/escalation', 'EscalationController');
