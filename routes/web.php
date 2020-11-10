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

Route::get('/listado-empresa', 'ControllerEmpresa@index')->name('listado-ug0299');

Route::get('/crear-empresa', 'ControllerEmpresa@create')->name('crear-ug0299');

Route::post('/creacion-empresa', 'ControllerEmpresa@store')->name('creacion-ug0299');

Route::get('/editar-empresa/{id}', 'ControllerEmpresa@edit')->name('editar-ug0299');

Route::put('/edicion-empresa/{id}', 'ControllerEmpresa@update')->name('edicion-ug0299');

Route::get('/borrar-empresa/{id}', 'ControllerEmpresa@destroy')->name('borrar-ug0299');

Route::get('/seguro-que-desea-borrar-ug0299/{id}', 'ControllerEmpresa@confirm')->name('confirmar-borrar-ug0299');

Route::get('/ver-empresa/{id}', 'ControllerEmpresa@show')->name('ver-ug0299');
