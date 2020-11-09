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
})->name( 'welcome' );


Route::get('/listado-ug0317', 'ListadosController@index')->name('listado-ug0317');

Route::get('/listado/crear', 'ListadosController@create')->name('crear-ug0317');

Route::post('/listado/creacion', 'ListadosController@store')->name('creacion-ug0317');

//----------------------------------------------------------------------------

Route::get('/ver/{id}', 'ListadosController@show')->name('ver-formulario');

Route::get('/borrar/{id}', 'ListadosController@destroy')->name('borrar-formulario');

Route::get('/editar/{id}', 'ListadosController@edit')->name('editar-formulario');

Route::put('/edicion/{id}', 'ListadosController@update')->name('edicion');

