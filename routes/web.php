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

Route::get('/listado-contacto_tipo', 'ContactoController@index')->name('listado_contacto_tipo');
Route::get('/contacto_tipo/crear', 'ContactoController@create')->name('crear_contacto_tipo');
Route::post('/contacto_tipo/creacion', 'ContactoController@store')->name('creacion-contacto');
Route::get('/ver{id}', 'ContactoController@show')->name('ver_contacto_tipo');
Route::get('/editar{id}', 'ContactoController@edit')->name('editar_contacto_tipo');
Route::put('/edicion{id}', 'ContactoController@update')->name('edicion');
Route::get('/borrar{id}', 'ContactoController@destroy')->name('borrar_contacto_tipo');


Route::get('/listado-empresa', 'ControllerEmpresaTipo@index')->name('listado-ug0299');

Route::get('/crear-empresa', 'ControllerEmpresaTipo@create')->name('crear-ug0299');

Route::post('/creacion-empresa', 'ControllerEmpresaTipo@store')->name('creacion-ug0299');

Route::get('/editar-empresa/{id}', 'ControllerEmpresaTipo@edit')->name('editar-ug0299');

Route::put('/edicion-empresa/{id}', 'ControllerEmpresaTipo@update')->name('edicion-ug0299');

Route::get('/borrar-empresa/{id}', 'ControllerEmpresaTipo@destroy')->name('borrar-ug0299');

Route::get('/seguro-que-desea-borrar-ug0299/{id}', 'ControllerEmpresa@confirm')->name('confirmar-borrar-ug0299');

Route::get('/ver-empresa/{id}', 'ControllerEmpresa@show')->name('ver-ug0299');

Route::get('/listado-adm_factura_tipo', 'factura_tipoController@index')->name('listado-ug0287');

Route::get('/listado-adm_factura_tipo/crear-adm_factura_tipo', 'factura_tipoController@create')->name('crear-ug0287');

Route::post('/listado-adm_factura_tipo/creacion-adm_factura_tipo', 'factura_tipoController@store')->name('creacion-ug0287');

Route::get('/listado-adm_factura_tipo/borrar-adm_factura_tipo/{id}', 'factura_tipoController@destroy')->name('borrar-ug0287');

Route::get('/listado-adm_factura_tipo/ver-adm_factura_tipo/{id}', 'factura_tipoController@show')->name('ver-ug0287');


Route::get('/listado-adm_factura_tipo/editar-adm_factura_tipo/{id}', 'factura_tipoController@edit')->name('editar-ug0287');

Route::put('/listado-adm_factura_tipo/edicion-adm_factura_tipo/{id}', 'factura_tipoController@update')->name('edicion-ug0287');

Route::get('/listado-ug0317', 'SeguimientoTipoController@index')->name('listado-ug0317');

Route::get('/listado/crear', 'SeguimientoTipoController@create')->name('crear-ug0317');

Route::post('/listado/creacion', 'SeguimientoTipoController@store')->name('creacion-ug0317');

//----------------------------------------------------------------------------

Route::get('/ver-l/{id}', 'SeguimientoTipoController@show')->name('ver-formulario');

Route::get('/borrar-l/{id}', 'SeguimientoTipoController@destroy')->name('borrar-formulario');

Route::get('/editar-l/{id}', 'SeguimientoTipoController@edit')->name('editar-formulario');

Route::put('/edicion-l/{id}', 'SeguimientoTipoController@update')->name('edicion');

Route::get('/Listado-Color', 'ColorController@index')->name('Listado-Ug0093');

Route::get('Colores/crear', 'ColorController@create')->name('Crear-Ug0093');

Route::post('/Colores/creacion', 'ColorController@store')->name('Creacion-color');

Route::get('BorrarUg0093/{id}', 'ColorController@destroy')->name('Borrar-Color');

Route::get('Ver-Ug0093/{id}', 'ColorController@show')->name('Ver-Color');

Route::get('editar-Ug0093/{id}', 'ColorController@edit')->name('Editar-Color');

Route::put('edicion/{id}', 'ColorController@update')->name('edicion');

Route::get('/listado-documento_tipo', 'DocumentoTipoController@index')->name('listado_documento_tipo');
Route::get('/documento_tipo/crear', 'DocumentoTipoController@create')->name('crear_documento_tipo');
Route::post('/documento_tipo/creacion', 'DocumentoTipoController@store')->name('creacion-documento');
Route::get('/ver-dt/{id}', 'DocumentoTipoController@show')->name('ver_documento_tipo');
Route::get('/editar-dt/{id}', 'DocumentoTipoController@edit')->name('editar_documento_tipo');
Route::put('/edicion-dt/{id}', 'DocumentoTipoController@update')->name('edicion');
Route::get('/borrar-dt/{id}', 'DocumentoTipoController@destroy')->name('borrar_documento_tipo');

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

Route::get('/listado_tubo_estado', 'TuboEstadoController@index')->name('listado_tubo_estado');

Route::get('/listado_tubo_estado/crear_tubo_estado', 'TuboEstadoController@create')->name('crear_tubo_estado');
Route::post('/listado_tubo_estado/creacion', 'TuboEstadoController@store')-> name('creacion_tubo_estado');

Route::get('/borrar/{id}','TuboEstadoController@destroy')->name('borrar_tubo_estado');

Route::get('/ver/{id}','TuboEstadoController@show')->name('ver_tubo_estado');

Route::get('/editar/{id}','TuboEstadoController@edit')->name('editar_tubo_estado');

Route::put('/edicion/{id}','TuboEstadoController@update')->name('edicion_tubo_estado');

Route::get('/listado-coche', 'CochesController@index')->name('listado-ug0278');

Route::get('/crear-coche', 'CochesController@create')->name('crear-ug0278');

Route::post('/creacion-coche', 'CochesController@store')->name('creacion-ug0278');

Route::get('/editar-coche/{id}', 'CochesController@edit')->name('editar-ug0278');

Route::put('/edicion-coche/{id}', 'CochesController@update')->name('edicion-ug0278');

Route::get('/borrar-coche/{id}', 'CochesController@destroy')->name('borrar-ug0278');

Route::get('/confirmar-borrar-coche/{id}', 'CochesController@confirm')->name('confirmar-borrar-ug0278');

Route::get('/ver-coche/{id}', 'CochesController@show')->name('ver-ug0278');

Route::get('/listado-departamento','controldepartamentos@index')->name('listar-ug0307');

Route::get('/listado-departamento/crear-departamento','controldepartamentos@create')->name('crear-ug0307');

Route::post('/listado-departamento/creacion','controldepartamentos@store')->name('creacion-departamento');

Route::get('/editar-departamento/{id}','controldepartamentos@edit')->name('editar-ug0307');

Route::get('/borrar-departamento/{id}','controldepartamentos@destroy')->name('borrar-ug0307');


Route::get('ver-departamento/{id}','controldepartamentos@show' )->name('ver-ug0307');

Route::put('/edicion/{id}','controldepartamentos@update' )->name('edicion');








/* tp2-ug0282-ug0314 - UNIDAD MEDIDA*/
Route::get('/listado-unidad-medida-tp2-ug0282-ug0314/', 'UnidadMedidaController@index')->name('listado_unidad_medida_ug0282_ug0314');

Route::get('/listado-unidad-medida-tp2-ug0282-ug0314/crear-unidad-medida', 'UnidadMedidaController@create')->name('crear_unidad_medida_ug0282_ug0314');
Route::post('/listado-unidad-medida-tp2-ug0282-ug0314/creacion-unidad-medida', 'UnidadMedidaController@store')->name('creacion_unidad_medida_ug0282_ug0314');


Route::get('/listado-unidad-medida-tp2-ug0282-ug0314/ver-unidad-medida/{id}', 'UnidadMedidaController@show')->name('ver_unidad_medida_tp2_ug0282_ug0314');


Route::get('/listado-unidad-medida-tp2-ug0282-ug0314/editar-unidad-medida/{id}', 'UnidadMedidaController@edit')->name('editar_unidad_medida_tp2_ug0282_ug0314');
Route::put('/listado-unidad-medida-tp2-ug0282-ug0314/edicion-unidad-medida{id}', 'UnidadMedidaController@update')->name('edicion_unidad_medida_tp2_ug0282_ug0314');


Route::get('/listado-unidad-medida-tp2-ug0282-ug0314/borrar-unidad-medida/{id}', 'UnidadMedidaController@destroy')->name('borrar_unidad_medida_tp2_ug0282_ug0314');





/* tp2-ug0282-ug0314 - UNIDAD MEDIDA TUBO*/
Route::get('/listado-unidad-medida-tubo-tp2-ug0282-ug0314/', 'UnidadMedidaTuboController@index')->name('listado_unidad_medida_tubo_ug0282_ug0314');

Route::get('/listado-unidad-medida-tubo-tp2-ug0282-ug0314/ver-unidad-medida/{id}', 'UnidadMedidaController@show')->name('ver_unidad_medida_tubo_tp2_ug0282_ug0314');





/*tp2-ug0282-ug0314 - TUBO*/
Route::get('/listado-tubo-ug0282-ug0314/', 'TuboController@index')->name('listado_tubo_ug0282_ug0314');

Route::get('/ver-tubos/{id}', 'TuboController@show')->name('ver_tubos_tp2_ug0282_ug0314');

Route::get('/ver-tubos/{tubo}/ver-producto/{producto}', 'TuboController@show')->name('ver_tubos_producto_tp2_ug0282_ug0314');

Route::get('/listado-tubo-ug0282-ug0314/crear-tubo', 'TuboController@create')->name('crear_tubo_ug0282_ug0314');
Route::post('/listado-tubo-tp2-ug0282-ug0314/creacion-tubo', 'TuboController@store')->name('creacion_tubo_ug0282_ug0314');

Route::get('/listado-tubo-ug0282-ug0314/borrar-tubo/{id}', 'TuboController@destroy')->name('borrar_tubo_tp2_ug0282_ug0314');

Route::get('/listado-tubo-tp2-ug0282-ug0314/editar-tubo/{id}', 'TuboController@edit')->name('editar_tubo_tp2_ug0282_ug0314');
Route::put('/listado-tubo-tp2-ug0282-ug0314/edicion-tubo{id}', 'TuboController@update')->name('edicion_tubo_tp2_ug0282_ug0314');




/* tp2-ug0282-ug0314 - PRODUCTO*/

Route::get('/listado-producto-tp2-ug0282-ug0314/', 'ProductoController@index')->name('listado_producto_ug0282_ug0314');


Route::get('/listado-producto-tp2-ug0282-ug0314/ver-tubos/{tubo}/ver-producto/{producto}', 'ProductoController@show')->name('ver_producto_producto_tp2_ug0282_ug0314');

Route::get('/listado-producto-tp2-ug0282-ug0314/crear-producto', 'ProductoController@create')->name('crear_producto_ug0282_ug0314');
Route::post('/listado-producto-tp2-ug0282-ug0314/creacion-producto', 'ProductoController@store')->name('creacion_producto_ug0282_ug0314');

Route::get('/listado-producto-tp2-ug0282-ug0314/borrar-producto/{id}', 'ProductoController@destroy')->name('borrar_producto_tp2_ug0282_ug0314');

Route::get('/listado-producto-tp2-ug0282-ug0314/editar-producto/{id}', 'ProductoController@edit')->name('editar_producto_tp2_ug0282_ug0314');
Route::put('/listado-producto-tp2-ug0282-ug0314/edicion-producto{id}', 'ProductoController@update')->name('edicion_producto_tp2_ug0282_ug0314');


/*Route::get('/listado-producto-tp2-ug0282-ug0314/crear-unidad-medida', 'ProductoController@create')->name('crear_unidad_medida_ug0282_ug0314');
Route::post('/listado-producto-tp2-ug0282-ug0314/creacion-unidad-medida', 'ProductoController@store')->name('creacion_unidad_medida_ug0282_ug0314');


Route::get('/listado-producto-tp2-ug0282-ug0314/ver-unidad-medida/{id}', 'ProductoController@show')->name('ver_unidad_medida_tp2_ug0282_ug0314');


Route::get('/listado-producto-tp2-ug0282-ug0314/editar-unidad-medida/{id}', 'ProductoController@edit')->name('editar_unidad_medida_tp2_ug0282_ug0314');
Route::put('/listado-producto-tp2-ug0282-ug0314/edicion-unidad-medida{id}', 'ProductoController@update')->name('edicion_unidad_medida_tp2_ug0282_ug0314');


Route::get('/listado-producto-tp2-ug0282-ug0314/borrar-unidad-medida/{id}', 'ProductoController@destroy')->name('borrar_unidad_medida_tp2_ug0282_ug0314');
*/
