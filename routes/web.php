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
})->name('raiz');

Route::get('/listado-documento_tipo', 'DocumentoController@index')->name('listado_documento_tipo');
Route::get('/documento_tipo/crear', 'DocumentoController@create')->name('crear_documento_tipo');
Route::post('/documento_tipo/creacion', 'DocumentoController@store')->name('creacion-documento');
Route::get('/ver/{id}', 'DocumentoController@show')->name('ver_documento_tipo');
Route::get('/editar/{id}', 'DocumentoController@edit')->name('editar_documento_tipo');
Route::put('/edicion/{id}', 'DocumentoController@update')->name('edicion');
Route::get('/borrar/{id}', 'DocumentoController@destroy')->name('borrar_documento_tipo');


