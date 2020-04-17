<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//users
Route::get('docter/create', 'DoctorController@create')->name('doctor.create');
Route::post('doctor/create', 'DoctorController@store')->name('doctor.store');
Route::get('doctor','DoctorController@index')->name('doctor.index');
Route::get('doctor/{id}','DoctorController@show')->name('doctor.show');
Route::get('doctor/enable/{id}', 'DoctorController@disableEnable')->name('doctor.enable');

Route::get('doctor/profile/edit-email', 'DoctorController@editEmail')->name('doctor.editEmail');
Route::get('doctor/profile/edit-password', 'DoctorController@editPassword')->name('doctor.editPassword');

Route::patch('doctor/profile/email', 'DoctorController@updateEmail')->name('doctor.updateEmail');
Route::patch('doctor/profile/password', 'DoctorController@updatePassword')->name('doctor.updatePassword');

Route::get('doctor/profile/edit-general', 'DoctorController@editGeneral')->name('doctor.editGeneral');

Route::get('/examination/pdf/{id}','TestController@downloadPdf')->name('examination.pdf');
Route::get('/patient/pdf', 'PatientController@pdf')->name('patient.pdf');
Route::get('/doctors/pdf', 'DoctorController@pdf')->name('doctor.pdf');
Route::get('/examinations/pdf','TestController@printPDF')->name('examination.list.pdf');
Route::patch('doctor/profile/general', 'DoctorController@updateGeneral')->name('doctor.updateGeneral');
Route::get('patient/search','PatientController@search')->name('patient.search');
Route::get('patient/create','PatientController@create')->name('patient.create');
Route::post('patient/create', 'PatientController@store')->name('patient.store');
Route::get('patient/{id}', 'PatientController@show')->name('patient.show');
Route::get('patient','PatientController@index')->name('patient.index'); 
Route::post('patient/searchByid','PatientController@searchID')->name('patient.searchByid');
Route::post('patient/searchByNames','PatientController@searchByNames')->name('patient.searchByNames');

Route::get('patient/{id}/test','TestController@createPrediction')->name('patient.test');

Route::get('/patient/{id}/test','TestController@createPrediction')->name('create.prediction');
Route::post('/patient/{id}/test', 'TestController@predict')->name('predict');
Route::get('test/','TestController@index')->name('test.index');
Route::get('test/myTest', 'TestController@myTest')->name('test.mytest');
Route::get('/test/{id}','TestController@show')->name('test.show');


Route::get('/examination/pdf/{id}','TestController@downloadPdf')->name('examination.pdf');
Route::get('/patient/pdf', 'PatientController@pdf')->name('patient.pdf');
Route::get('/doctors/pdf', 'DoctorController@pdf')->name('doctor.pdf');
Route::get('/examinations/pdf','TestController@printPDF')->name('examination.list.pdf');