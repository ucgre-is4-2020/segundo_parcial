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
})->name('home');

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





 