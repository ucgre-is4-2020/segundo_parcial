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

Route::get('/Listado-Color', 'ColorController@index')->name('Listado-Ug0093');

Route::get('Colores/crear', 'ColorController@create')->name('Crear-Ug0093');

Route::post('/Colores/creacion', 'ColorController@store')->name('Creacion-color');

Route::get('BorrarUg0093/{id}', 'ColorController@destroy')->name('Borrar-Color');

Route::get('Ver-Ug0093/{id}', 'ColorController@show')->name('Ver-Color');

Route::get('editar-Ug0093/{id}', 'ColorController@edit')->name('Editar-Color');

Route::put('edicion/{id}', 'ColorController@update')->name('edicion');
