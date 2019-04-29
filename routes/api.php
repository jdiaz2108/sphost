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


Route::middleware('auth:api')->group(function() {
Route::resource('/clientes', 'Cliente\ClienteController', ['only' => ['index', 'store', 'show', 'update']]);
Route::resource('/products', 'Products\ProductsController', ['only' => ['index', 'store', 'show', 'update']]);
Route::post('factura/c/{id}', 'Factura\FacturaController@store');
Route::resource('/factura', 'Factura\FacturaController', ['only' => ['index', 'store', 'show']]);
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});
