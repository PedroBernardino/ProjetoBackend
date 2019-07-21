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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('encontraCliente/{id}','ClientController@findClient');
Route::get('listaCliente', 'ClientController@listClient');
Route::post('criaCliente', 'ClientController@createClient');
Route::put('editaCliente/{id}', 'ClientController@updateClient');
Route::delete('deletaCliente/{id}', 'ClientController@deleteClient');


Route::get('encontraCompra/{id}','PucharseController@findPucharse');
Route::get('listaCompra', 'PucharseController@listPucharse');
Route::post('criaCompra', 'PucharseController@createPucharse');
Route::put('editaCompra/{id}', 'PucharseController@updatePucharse');
Route::delete('deletaCompra/{id}', 'PucharseController@deletePucharse');


Route::get('encontraProduto/{id}','ProductController@findProduct');
Route::get('listaProduto', 'ProductController@listProduct');
Route::post('criaProduto', 'ProductController@createProduct');
Route::put('editaProduto/{id}', 'ProductController@updateProduct');
Route::delete('deletaProduto/{id}', 'ProductController@deleteProduct');



