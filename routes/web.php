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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});
 

Route::get('consultor/report', 'ConsultorReportController@index')->name('cs_report');
Route::post('/report/list', 'ConsultorReportController@list_report')->name('list_report');
Route::post('report/chart', 'ConsultorReportController@chart_report')->name('cl_chart');
 


Route::get('client/report', 'ClientReportController@index')->name('cl_report');
Route::post('client/report/list', 'ClientReportController@list_report')->name('cl_list_report');