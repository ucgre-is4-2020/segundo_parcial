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

Route::get('/listado_adm_contenido', 'ContenidoController@index')->name('listado-ug0314');

Route::get('/listado_adm_contenido/crear_adm_contenido', 'ContenidoController@create')->name('crear-ug0314');

//notar es un POST que debenos utilizar con creacion
Route::post('/listado_adm_contenido/creacion_adm_contenido', 'ContenidoController@store')->name('creacion-ug0314');



Route::get('/listado_adm_contenido/borrar_adm_contenido/{id}', 'ContenidoController@destroy')->name('borrar-ug0314');

Route::get('/listado_adm_contenido/ver_adm_contenido/{id}', 'ContenidoController@show')->name('ver-ug0314');


Route::get('/listado_adm_contenido/editar_adm_contenido/{id}', 'ContenidoController@edit')->name('editar-ug0314');

Route::put('/listado_adm_contenido/edicion_adm_contenido/{id}', 'ContenidoController@update')->name('edicion-ug0314');



Route::get('post/create', [ContenidoController::class, 'create']);
Route::post('post', [ContenidoController::class, 'store']);

Route::get('/listado_tubo_estado', 'UG0282Controller@index')->name('listado_tubo_estado'); 

Route::get('/listado_tubo_estado/crear_tubo_estado', 'UG0282Controller@create')->name('crear_tubo_estado');
Route::post('/listado_tubo_estado/creacion', 'UG0282Controller@store')-> name('creacion_tubo_estado');

Route::get('/borrar/{id}','UG0282Controller@destroy')->name('borrar_tubo_estado');

Route::get('/ver/{id}','UG0282Controller@show')->name('ver_tubo_estado');

Route::get('/editar/{id}','UG0282Controller@edit')->name('editar_tubo_estado');

Route::put('/edicion/{id}','UG0282Controller@update')->name('edicion_tubo_estado');

Route::get('/listado-coche', 'CochesController@index')->name('listado-ug0278');

Route::get('/crear-coche', 'CochesController@create')->name('crear-ug0278');

Route::post('/creacion-coche', 'CochesController@store')->name('creacion-ug0278');

Route::get('/editar-coche/{id}', 'CochesController@edit')->name('editar-ug0278');

Route::put('/edicion-coche/{id}', 'CochesController@update')->name('edicion-ug0278');

Route::get('/borrar-coche/{id}', 'CochesController@destroy')->name('borrar-ug0278');

Route::get('/confirmar-borrar-coche/{id}', 'CochesController@confirm')->name('confirmar-borrar-ug0278');

Route::get('/ver-coche/{id}', 'CochesController@show')->name('ver-ug0278');
