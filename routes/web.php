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
	Route::resource('/f/pdf', 'PdfFacturaController');

Route::get('/', function () {
    return view('app.index');
});

Route::get('/api/clientes', 'ClienteController@index');

Route::post('/rayo', 'FacturaController@store');

Route::get('/clientes/{{nit}}', 'ClienteController@show');
Route::delete('/clientes/{{nit}}', 'ClienteController@destroy');
Route::resource('/clientes', 'ClienteController');

Route::resource('/factura', 'FacturaController');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
