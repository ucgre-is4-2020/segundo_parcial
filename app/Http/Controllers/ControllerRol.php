<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class ControllerRol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(empty($request->query())){
        	$rol = \App\Rol::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $rol = \DB::table('Rol')
                                ->whereRaw('upper(nombre) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $rol = \App\Rol::get();
            }
            return view('tp2/ug0289-ug0299/listadoRol-tp2-ug0289-ug0299', 
                ['rol' => $rol, 'busqueda' => $nom]
            );
        }

        return view('tp2/ug0289-ug0299/listadoRol-tp2-ug0289-ug0299', 
        	['rol' => $rol]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('tp2/ug0289-ug0299/crearRol-tp2-ug0289-ug0299');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre');
		$codigo = $request->input('codigo');
        $estado = $request->input('estado') === 'true'? true: false;
        

        $nuevaEmpresa = new \App\Rol();
        $nuevaEmpresa->nombre = $nombre;
		$nuevaEmpresa->codigo = $codigo;
        $nuevaEmpresa->activo = $estado;
       
		
		
	
		//Alertas
		try {
        	$nuevaEmpresa->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');
        	
        	return redirect()->route('listadoRol-tp2-ug0289-ug0299');
		}catch (QueryException $e){
			return redirect()->route('crearRol-tp2-ug0289-ug0299')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Rol $id)
    {
        return view('tp2/ug0289-ug0299/verRol-tp2-ug0289-ug0299', ['Rol' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Rol $id)
    {
       return view('tp2/ug0289-ug0299/editarRol-tp2-ug0289-ug0299', ['Rol' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Rol $id)
    {
    	$nombre = $request->input('nombre');
		$codigo = $request->input('codigo');
       
    	if($nombre != $id->nombre || $codigo != $id->codigo){
    		
			$request->validate([
				'nombre' => 'unique:App\Rol,nombre'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			$request->validate([
				'codigo' => 'unique:App\Rol,codigo'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		}

		
		try {
			$id->nombre = $nombre;
			$id->codigo = $codigo;
			$id->activo = $request->get('estado');
        	$id->save();
			session()->flash('Guardando', 'Las actualizaciones fueron guardados');
        	
        	return redirect()->route('editarRol-tp2-ug0289-ug0299', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editarRol-tp2-ug0289-ug0299', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\Rol $id)
    {
        return view('tp2/ug0289-ug0299/borrarRol-tp2-ug0289-ug0299', ['Rol' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Rol $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listadoRol-tp2-ug0289-ug0299');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrarRol-tp2-ug0289-ug0299', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
