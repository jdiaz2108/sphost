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
Route::group(['middleware' => ['auth']], function () {
	Route::resource('/f', 'PdfFacturaController');

Route::get('/', function () {
    return view('app.index');
});




Route::get('/seePdf', 'PdfFacturaController@index');

Route::resource('/clientes', 'Cliente\ClienteController');

Route::resource('/factura', 'Factura\FacturaController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
