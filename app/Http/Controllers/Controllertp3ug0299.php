<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class Controllertp3ug0299 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(empty($request->query())){
        	$roluser = \App\RolUser::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $roluser = \DB::table('RolUser')
                                ->whereRaw('upper(nombre) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $roluser = \App\RolUser::get();
            }
            return view('tp2/ug0289-ug0299/listadoRolUser-tp2-ug0289-ug0299', 
                ['roluser' => $roluser, 'busqueda' => $nom]
            );
        }

        return view('tp2/ug0289-ug0299/listadoRolUser-tp2-ug0289-ug0299', 
        	['roluser' => $roluser]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('tp2/ug0289-ug0299/crearRolUser-tp2-ug0289-ug0299');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->input('user_id');
		$rol_id = $request->input('rol_id');
        $estado = $request->input('estado') === 'true'? true: false;
        

        $nuevaEmpresa = new \App\RolUser();
        $nuevaEmpresa->user_id = $user_id;
		$nuevaEmpresa->rol_id = $rol_id;
        $nuevaEmpresa->activo = $estado;
       
		
		
	
		//Alertas
		try {
        	$nuevaEmpresa->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');
        	
        	return redirect()->route('listadoRolUser-tp2-ug0289-ug0299');
		}catch (QueryException $e){
			return redirect()->route('crearRolUser-tp2-ug0289-ug0299')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\RolUser $id)

    {
        return view('tp3/ug0299/verRolesUsuariosTp3-ug0299');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\RolUser $id)
    {
       return view('tp2/ug0289-ug0299/editarRolUser-tp2-ug0289-ug0299', ['RolUser' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\RolUser $id)
    {
    	$user_id = $request->input('user_id');
		$rol_id = $request->input('rol_id');
       
    	if($user_id != $id->user_id || $rol_id != $id->rol_id){
    		
			$request->validate([
				'user_id' => 'unique:App\RolUser,user_id'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			$request->validate([
				'rol_id' => 'unique:App\RolUser,rol_id'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		}

		
		try {
			$id->user_id = $user_id;
			$id->rol_id = $rol_id;
			$id->activo = $request->get('estado');
        	$id->save();
			session()->flash('Guardando', 'Las actualizaciones fueron guardados');
        	
        	return redirect()->route('editarRolUser-tp2-ug0289-ug0299', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editarRolUser-tp2-ug0289-ug0299', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\RolUser $id)
    {
        return view('tp2/ug0289-ug0299/borrarRolUser-tp2-ug0289-ug0299', ['RolUser' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\RolUser $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listadoRolUser-tp2-ug0289-ug0299');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrarRolUser-tp2-ug0289-ug0299', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
