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

Route::get('/seguro-que-desea-borrar-ug0299/{id}', 'ControllerEmpresaTipo@confirm')->name('confirmar-borrar-ug0299');

Route::get('/ver-empresa/{id}', 'ControllerEmpresaTipo@show')->name('ver-ug0299');

Route::get('/listado-adm_factura_tipo', 'factura_tipoController@index')->name('listado-ug0287');

Route::get('/listado-adm_factura_tipo/crear-adm_factura_tipo', 'factura_tipoController@create')->name('crear-ug0287');

Route::post('/listado-adm_factura_tipo/creacion-adm_factura_tipo', 'factura_tipoController@store')->name('creacion-ug0287');

Route::get('/listado-adm_factura_tipo/borrar-adm_factura_tipo/{id}', 'factura_tipoController@destroy')->name('borrar-ug0287');

Route::get('/listado-adm_factura_tipo/ver-adm_factura_tipo/{id}', 'factura_tipoController@show')->name('ver-ug0287');


Route::get('/listado-adm_factura_tipo/editar-adm_factura_tipo/{id}', 'factura_tipoController@edit')->name('editar-ug0287');

Route::put('/listado-adm_factura_tipo/edicion-adm_factura_tipo/{id}', 'factura_tipoController@update')->name('edicion-ug0287');
//------------------------------------------------------------------------------------------



Route::get('/listado-ug0317', 'SeguimientoTipoController@index')->name('listado-ug0317');

Route::get('/listado/crear', 'SeguimientoTipoController@create')->name('crear-ug0317');

Route::post('/listado/creacion', 'SeguimientoTipoController@store')->name('creacion-ug0317');
//---------------------------------------------------------------------------------------



Route::get('tp2/ug0317/listado-ciudad', 'CiudadController@index')->name('tp2-ug0317-listado-ciudad');

Route::get('tp2/ug0317/crear-ciudad', 'CiudadController@create')->name('tp2-ug0317-crear-ciudad');

Route::post('tp2/ug0317/creacion-ciudad', 'CiudadController@store')->name('tp2-ug0317-creacion-ciudad');
//
Route::get('tp2/ug0317/ver-ciudad/{id}', 'CiudadController@show')->name('tp2-ug0317-ver-ciudad');
Route::get('tp2/ug0317/borrar-ciudad/{id}', 'CiudadController@destroy')->name('tp2-ug0317-borrar-ciudad');
Route::get('tp2/ug0317/editar-ciudad/{id}', 'CiudadController@edit')->name('tp2-ug0317-editar-ciudad');
Route::put('tp2/ug0317/edicion-ciudad/{id}', 'CiudadController@update')->name('tp2-ug0317-edicion-ciudad');



//----------------------------------------------------------------------------




Route::get('tp2/ug0317/listado-barrio', 'BarrioController@index')->name('tp2-ug0317-listado-barrio');

Route::get('tp2/ug0317/crear-barrio', 'BarrioController@create')->name('tp2-ug0317-crear-barrio');

Route::post('tp2/ug0317/creacion-barrio', 'BarrioController@store')->name('tp2-ug0317-creacion-barrio');
//
Route::get('tp2/ug0317/ver-barrio/{id}', 'BarrioController@show')->name('tp2-ug0317-ver-barrio');
Route::get('tp2/ug0317/borrar-barrio/{id}', 'BarrioController@destroy')->name('tp2-ug0317-borrar-barrio');
Route::get('tp2/ug0317/editar-barrio/{id}', 'BarrioController@edit')->name('tp2-ug0317-editar-barrio');
Route::put('tp2/ug0317/edicion-barrio/{id}', 'BarrioController@update')->name('tp2-ug0317-edicion-barrio');






//_-------------------------------------------------------------------------------

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







//-------------------------------------------------------------------------------------------------------

Route::get('/listado-departamento','controldepartamentos@index')->name('listar-ug0307');

Route::get('/listado-departamento/crear-departamento','controldepartamentos@create')->name('crear-ug0307');

Route::post('/listado-departamento/creacion','controldepartamentos@store')->name('creacion-departamento');

Route::get('/editar-departamento/{id}','controldepartamentos@edit')->name('editar-ug0307');

Route::get('/borrar-departamento/{id}','controldepartamentos@destroy')->name('borrar-ug0307');


Route::get('ver-departamento/{id}','controldepartamentos@show' )->name('ver-ug0307');

Route::put('/edicion/{id}','controldepartamentos@update' )->name('edicion');

//-----------------------------------------------------------------------------------------------

Route::get('/tp2/ug0093-ug0278-ug0307/listado-empresa-tipo-empresa','empresaTipoEmpresaController@index')->name('tp2-ug0093-ug0278-ug0307-listar-empresatipoempresa');

Route::get('/tp2/ug0093-ug0278-ug0307/crear-empresa-tipo-empresa','empresaTipoEmpresaController@create')->name('tp2-ug0093-ug0278-ug0307-crear-empresatipoempresa');

Route::post('/tp2/ug0093-ug0278-ug0307/creacion-empresa-tipo-empresa','empresaTipoEmpresaController@store')->name('tp2-ug0093-ug0278-ug0307-creacion-empresatipoempresa');

Route::get('/tp2/ug0093-ug0278-ug0307/ver-empresa-tipo-empresa/{id}','empresaTipoEmpresaController@show' )->name('tp2-ug0093-ug0278-ug0307-ver-empresatipoempresa');

Route::get('/tp2/ug0093-ug0278-ug0307/editar-empresa-tipo-empresa/{id}','empresaTipoEmpresaController@edit')->name('tp2-ug0093-ug0278-ug0307-editar-empresatipoempresa');


Route::put('/tp2/ug0093-ug0278-ug0307/edicion-empresa-tipo-empresa/{id}','empresaTipoEmpresaController@update')->name('tp2-ug0093-ug0278-ug0307-edicion-empresatipoempresa');

Route::get('/tp2/ug0093-ug0278-ug0307/borrar-empresa-tipo-empresa/{id}','empresaTipoEmpresaController@destroy')->name('tp2-ug0093-ug0278-ug0307-borrar-empresatipoempresa');




Route::get('/tp2/ug0093-ug0278-ug0307/listar-empresa','empresaController@index')->name('tp2-ug0093-ug0278-ug0307-listar-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/crear-empresa','empresaController@create')->name('tp2-ug0093-ug0278-ug0307-crear-empresa');

Route::post('/tp2/ug0093-ug0278-ug0307/creacion-empresa','empresaController@store')->name('tp2-ug0093-ug0278-ug0307-creacion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/ver-empresa/{id}','empresaController@show' )->name('tp2-ug0093-ug0278-ug0307-ver-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/editar-empresa/{id}','empresaController@edit')->name('tp2-ug0093-ug0278-ug0307-editar-empresa');

Route::put('/tp2/ug0093-ug0278-ug0307/edicion-empresa/{id}','empresaController@update' )->name('tp2-ug0093-ug0278-ug0307-edicion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/borrar-empresa/{id}','empresaController@destroy')->name('tp2-ug0093-ug0278-ug0307-borrar-empresa');




/*
-------------------------
	DIRECCION EMPRESA
-------------------------
*/
Route::get('/tp2/ug0093-ug0278-ug0307/listado-direccion-empresa', 
			'DireccionesEmpresasController@index')
			->name('tp2-ug0093-ug0278-ug0307-listado-direccion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/crear-direccion-empresa',
			 'DireccionesEmpresasController@create')
			->name('tp2-ug0093-ug0278-ug0307-crear-direccion-empresa');

Route::post('/tp2/ug0093-ug0278-ug0307/creacion-direccion-empresa',
			 'DireccionesEmpresasController@store')
			->name('tp2-ug0093-ug0278-ug0307-creacion-direccion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/ver-direccion-empresa/{id}',
			 'DireccionesEmpresasController@show')
			->name('tp2-ug0093-ug0278-ug0307-ver-direccion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/editar-direccion-empresa/{id}',
 			'DireccionesEmpresasController@edit')
			->name('tp2-ug0093-ug0278-ug0307-editar-direccion-empresa');

Route::put('/tp2/ug0093-ug0278-ug0307/edicion-direccion-empresa/{id}',
			'DireccionesEmpresasController@update')
			->name('tp2-ug0093-ug0278-ug0307-edicion-direccion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/borrar-direccion-empresa/{id}',
			'DireccionesEmpresasController@destroy')
			->name('tp2-ug0093-ug0278-ug0307-borrar-direccion-empresa');

Route::get('/tp2/ug0093-ug0278-ug0307/confirmar-borrar-direccion-empresa/{id}',
 			'DireccionesEmpresasController@confirm')
			->name('tp2-ug0093-ug0278-ug0307-confirmar-borrar-direccion-empresa');
/*
-------------------------
	MEDIO DE CONTACTO
-------------------------
*/
Route::get('/tp2/ug0093-ug0278-ug0307/listado-medio-contacto', 
			'MediosDeContactosController@index')
			->name('tp2-ug0093-ug0278-ug0307-listado-medio-contacto');

Route::get('/tp2/ug0093-ug0278-ug0307/crear-medio-contacto',
			 'MediosDeContactosController@create')
			->name('tp2-ug0093-ug0278-ug0307-crear-medio-contacto');

Route::post('/tp2/ug0093-ug0278-ug0307/creacion-medio-contacto',
			 'MediosDeContactosController@store')
			->name('tp2-ug0093-ug0278-ug0307-creacion-medio-contacto');

Route::get('/tp2/ug0093-ug0278-ug0307/ver-medio-contacto/{id}',
		 	'MediosDeContactosController@show')
			->name('tp2-ug0093-ug0278-ug0307-ver-medio-contacto');

Route::get('/tp2/ug0093-ug0278-ug0307/editar-medio-contacto/{id}',
 			'MediosDeContactosController@edit')
			->name('tp2-ug0093-ug0278-ug0307-editar-medio-contacto');

Route::put('/tp2/ug0093-ug0278-ug0307/edicion-medio-contacto/{id}',
		 	'MediosDeContactosController@update')
			->name('tp2-ug0093-ug0278-ug0307-edicion-medio-contacto');

Route::get('/tp2/ug0093-ug0278-ug0307/borrar-medio-contacto/{id}',
		 	'MediosDeContactosController@destroy')
			->name('tp2-ug0093-ug0278-ug0307-borrar-medio-contacto');

Route::get('/tp2/ug0093-ug0278-ug0307/confirmar-borrar-medio-contacto/{id}',
 			'MediosDeContactosController@confirm')
			->name('tp2-ug0093-ug0278-ug0307-confirmar-borrar-medio-contacto');
//...................................................................................................
Route::get('/listadoUserRol', 'ControllerUserRol@index')->name('listadoRolUser-tp2-ug0289-ug0299');

Route::get('/crearUserRol', 'ControllerUserRol@create')->name('crearRolUser-tp2-ug0289-ug0299');

Route::post('/creacionUserRol', 'ControllerUserRol@store')->name('RolUser-tp2-ug0289-ug0299');

Route::get('/editarUserRol/{id}', 'ControllerUserRol@edit')->name('editarRolUser-tp2-ug0289-ug0299');

Route::put('/edicionUserRol/{id}', 'ControllerUserRol@update')->name('edicionRolUser-tp2-ug0289-ug0299');

Route::get('/borrarUserRol/{id}', 'ControllerUserRol@destroy')->name('borrarRolUser-tp2-ug0289-ug0299');

Route::get('/seguro-que-desea-borrarRolUser-tp2-ug0289-ug0299/{id}', 'ControllerUserRol@confirm')->name('confirmar-borrarRolUser-tp2-ug0289-ug0299');

Route::get('/verUserRol/{id}', 'ControllerUserRol@show')->name('verRolUser-tp2-ug0289-ug0299');
//........................................................................................................
Route::get('/listadoRol', 'ControllerRol@index')->name('listadoRol-tp2-ug0289-ug0299');

Route::get('/crearRol', 'ControllerRol@create')->name('crearRol-tp2-ug0289-ug0299');

Route::post('/creacionRol', 'ControllerRol@store')->name('Rol-tp2-ug0289-ug0299');

Route::get('/editarRol/{id}', 'ControllerRol@edit')->name('editarRol-tp2-ug0289-ug0299');

Route::put('/edicionRol/{id}', 'ControllerRol@update')->name('ediciontp2-ug0289-ug0299');

Route::get('/borrarRol/{id}', 'ControllerRol@destroy')->name('borrarRol-tp2-ug0289-ug0299');

Route::get('/seguro-que-desea-borrarRol-tp2-ug0289-ug0299/{id}', 'ControllerRol@confirm')->name('confirmar-borrarRol-tp2-ug0289-ug0299');

Route::get('/verRol/{id}', 'ControllerRol@show')->name('verRol-tp2-ug0289-ug0299');
//............................................................................................................
Route::get('/listadoUser', 'ControllerUser@index')->name('listadoUser-tp2-ug0289-ug0299');

Route::get('/crearUser', 'ControllerUser@create')->name('crearUser-tp2-ug0289-ug0299');

Route::post('/creacionUser', 'ControllerUser@store')->name('Users-tp2-ug0289-ug0299');

Route::get('/editarUser/{id}', 'ControllerUser@edit')->name('editarUser-tp2-ug0289-ug0299');

Route::put('/edicionUser/{id}', 'ControllerUser@update')->name('edicion_tp2-ug0289-ug0299');

Route::get('/borrarUser/{id}', 'ControllerUser@destroy')->name('borrarUser-tp2-ug0289-ug0299');

Route::get('/seguro-que-desea-borrarUser-tp2-ug0289-ug0299/{id}', 'ControllerUser@confirm')->name('confirmar-borrarUser-tp2-ug0289-ug0299');

Route::get('/verUser/{id}', 'ControllerUser@show')->name('verUser-tp2-ug0289-ug0299');
//......................................................................................................

Route::get('/listadoFMP', 'ControllerFacturaMedioPago@index')->name('listadoFMP-tp2-ug0059');

Route::get('/crearFMP', 'ControllerFacturaMedioPago@create')->name('crearFMP-tp2-ug0059');

Route::post('/creacionFMP', 'ControllerFacturaMedioPago@store')->name('creacionFMP-ug0059');

Route::get('/editarFMP/{id}', 'ControllerFacturaMedioPago@edit')->name('editarFMP-tp2-ug0059');

Route::put('/edicionFMP/{id}', 'ControllerFacturaMedioPago@update')->name('edicionFMP-ug0059');

Route::get('/borrarFMP/{id}', 'ControllerFacturaMedioPago@destroy')->name('borrarFMP-tp2-ug0059');

Route::get('/seguro-que-desea-borrarFMP-tp2-ug0059/{id}', 'ControllerFacturaMedioPago@confirm')->name('confirmar-borrarFMP-tp2-ug0059');

Route::get('/verFMP/{id}', 'ControllerFacturaMedioPago@show')->name('verFMP-tp2-ug0059');


Route::get('/listadoChofer', 'ControllerChofer@index')->name('listadoChofer-tp2-ug0059');

Route::get('/crearChofer', 'ControllerChofer@create')->name('crearChofer-tp2-ug0059');

Route::post('/creacionChofer', 'ControllerChofer@store')->name('creacionChofer-ug0059');

Route::get('/editarChofer/{id}', 'ControllerChofer@edit')->name('editarChofer-tp2-ug0059');

Route::put('/edicionChofer/{id}', 'ControllerChofer@update')->name('edicionChofer-ug0059');

Route::get('/borrarChofer/{id}', 'ControllerChofer@destroy')->name('borrarChofer-tp2-ug0059');

Route::get('/seguro-que-desea-borrarChofer-tp2-ug0059/{id}', 'ControllerChofer@confirm')->name('confirmar-borrarChofer-tp2-ug0059');

Route::get('/verChofer/{id}', 'ControllerChofer@show')->name('verChofer-tp2-ug0059');


Route::get('/listado', 'ControllerChoferCoche@index1')->name('listadoChoferyCoche-tp3-ug0059');


Route::get('/listadoCC', 'ControllerChoferCoche@index')->name('listadoChoferCoche-tp3-ug0059');

Route::get('/crearCC', 'ControllerChoferCoche@create')->name('crearChoferCoche-tp3-ug0059');

Route::post('/creacionCC', 'ControllerChoferCoche@store')->name('ChoferCoche-tp3-ug0059');

Route::get('/editarCC/{id}', 'ControllerChoferCoche@edit')->name('editarChoferCoche-tp3-ug0059');

Route::put('/edicionCC/{id}', 'ControllerChoferCoche@update')->name('edicion-ug0299');

Route::get('/edicionCC/{id}', 'ControllerChoferCoche@destroy')->name('borrarChoferCoche-tp3-ug0059');

Route::get('/seguro-que-desea-borrarChoferCoche-tp3-ug0059/{id}', 'ControllerChoferCoche@confirm')->name('confirmar-borrarChoferCoche-tp3-ug0059');

Route::get('/verCC/{id}', 'ControllerChoferCoche@show')->name('verChoferCoche-tp3-ug0059');
