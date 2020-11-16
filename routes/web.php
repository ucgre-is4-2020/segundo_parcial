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

Route::get('/listado-contacto_tipo', 'ContactoController@index')->name('listado_contacto_tipo');
Route::get('/contacto_tipo/crear', 'ContactoController@create')->name('crear_contacto_tipo');
Route::post('/contacto_tipo/creacion', 'ContactoController@store')->name('creacion-contacto');
Route::get('/ver{id}', 'ContactoController@show')->name('ver_contacto_tipo');
Route::get('/editar{id}', 'ContactoController@edit')->name('editar_contacto_tipo');
Route::put('/edicion{id}', 'ContactoController@update')->name('edicion');
Route::get('/borrar{id}', 'ContactoController@destroy')->name('borrar_contacto_tipo');