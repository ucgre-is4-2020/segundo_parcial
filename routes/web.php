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
})->name('welcome');

Route::get('/listado-departamento','controldepartamentos@index')->name('listar-ug0307');

Route::get('/listado-departamento/crear-departamento','controldepartamentos@create')->name('crear-ug0307');

Route::post('/listado-departamento/creacion','controldepartamentos@store')->name('creacion-departamento');

Route::get('/editar-departamento/{id}','controldepartamentos@edit')->name('editar-ug0307');

Route::get('/borrar-departamento/{id}','controldepartamentos@destroy')->name('borrar-ug0307');


Route::get('ver-departamento/{id}','controldepartamentos@show' )->name('ver-ug0307');

Route::put('/edicion/{id}','controldepartamentos@update' )->name('edicion');