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

Route::get('/listado_tubo_estado', 'UG0282Controller@index')->name('listado_tubo_estado'); 

Route::get('/listado_tubo_estado/crear_tubo_estado', 'UG0282Controller@create')->name('crear_tubo_estado');
Route::post('/listado_tubo_estado/creacion', 'UG0282Controller@store')-> name('creacion_tubo_estado');

Route::get('/borrar/{id}','UG0282Controller@destroy')->name('borrar_tubo_estado');

Route::get('/ver/{id}','UG0282Controller@show')->name('ver_tubo_estado');

Route::get('/editar/{id}','UG0282Controller@edit')->name('editar_tubo_estado');

Route::put('/edicion/{id}','UG0282Controller@update')->name('edicion_tubo_estado');