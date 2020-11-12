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


Route::get('/listado-adm_factura_tipo', 'factura_tipoController@index')->name('listado-ug0287');

Route::get('/listado-adm_factura_tipo/crear-adm_factura_tipo', 'factura_tipoController@create')->name('crear-ug0287');

Route::get('/listado-adm_factura_tipo/creacion-adm_factura_tipo', 'factura_tipoController@store')->name('creacion-ug0287');

Route::get('/listado-adm_factura_tipo/borrar-adm_factura_tipo/{id}', 'factura_tipoController@destroy')->name('borrar-ug0287');

Route::get('/listado-adm_factura_tipo/ver-adm_factura_tipo/{id}', 'factura_tipoController@show')->name('ver-ug0287');


Route::get('/listado-adm_factura_tipo/editar-adm_factura_tipo/{id}', 'factura_tipoController@edit')->name('editar-ug0287');

Route::get('/listado-adm_factura_tipo/edicion-adm_factura_tipo/{id}', 'factura_tipoController@update')->name('edicion-ug0287');


