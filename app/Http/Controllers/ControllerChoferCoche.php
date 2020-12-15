<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class ControllerChoferCoche extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(empty($request->query())){
        	$roluser = \App\ChoferCoche::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $roluser = \DB::table('ChoferCoche')
                                ->whereRaw('upper(nombre) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $roluser = \App\ChoferCoche::get();
            }
            return view('tp3/ug0059/listadoChoferCoche-tp3-ug0059', 
                ['roluser' => $roluser, 'busqueda' => $nom]
            );
        }

        return view('tp3/ug0059/listadoChoferCoche-tp3-ug0059', 
        	['roluser' => $roluser]
        );
    }


 public function index1(Request $request)
    {
        if(empty($request->query())){
        	$coches = \App\Coche::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $cod = $request->get('buscar');
            if(!empty($cod)){
                $coches = \DB::table('coche')
                                ->whereRaw('upper(codigo) like \'%'.strtoupper($cod).'%\'')
                                ->get();
            }else {
                $coches = \App\Coche::get();
            }
            return view('tp3/ug0059/listado-ug0278', 
                ['coches' => $coches, 'busqueda' => $cod]
            );
        }




        if(empty($request->query())){
        	$chof = \App\Chofer::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $chof = \DB::table('Chofer')
                                ->whereRaw('upper(nombre) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $chof = \App\Chofer::get();
            }
            return view('tp3/ug0059/listadoChofer-tp3-ug0059', 
                ['chof' => $chof, 'busqueda' => $nom]
            );
        }



        return view('tp3/ug0059/listadoChoferyCoche-tp3-ug0059', 
        	['coches' => $coches, 'chof' => $chof]
        );
    }
	






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('tp3/ug0059/crearChoferCoche-tp3-ug0059');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chofer_id = $request->input('chofer_id');
		$coche_id = $request->input('coche_id');
		$dia = $request->input('dia');
		$fecha_desde = $request->input('fecha_desde');
		$fecha_hasta = $request->input('fecha_hasta');
        $estado = $request->input('estado') === 'true'? true: false;
        

        $nuevaEmpresa = new \App\ChoferCoche();
        $nuevaEmpresa->chofer_id = $chofer_id;
		$nuevaEmpresa->coche_id = $coche_id;
        $nuevaEmpresa->activo = $estado;
       $nuevaEmpresa->dia = $dia;
	   $nuevaEmpresa->fecha_desde= $fecha_desde;
	   $nuevaEmpresa->fecha_hasta = $fecha_hasta;
		
		
	
		//Alertas
		try {
        	$nuevaEmpresa->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');
        	
        	return redirect()->route('listadoChoferCoche-tp3-ug0059');
		}catch (QueryException $e){
			return redirect()->route('crearChoferCoche-tp3-ug0059')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\ChoferCoche $id)
    {
        return view('tp3/ug0059/verChoferCoche-tp3-ug0059', ['ChoferCoche' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\ChoferCoche $id)
    {
       return view('tp3/ug0059/editarChoferCoche-tp3-ug0059', ['ChoferCoche' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\ChoferCoche $id)
    {
    	$coche_id = $request->input('coche_id');
		$coche_id = $request->input('coche_id');
       
    	if($coche_id != $id->coche_id || $coche_id != $id->coche_id){
    		
			$request->validate([
				'coche_id' => 'unique:App\ChoferCoche,coche_id'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			$request->validate([
				'coche_id' => 'unique:App\ChoferCoche,coche_id'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		}

		
		try {
			$id->coche_id = $coche_id;
			$id->coche_id = $coche_id;
			$id->activo = $request->get('estado');
        	$id->save();
			session()->flash('Guardando', 'Las actualizaciones fueron guardados');
        	
        	return redirect()->route('editarChoferCoche-tp3-ug0059', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editarChoferCoche-tp3-ug0059', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\ChoferCoche $id)
    {
        return view('tp3/ug0059/borrarChoferCoche-tp3-ug0059', ['ChoferCoche' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\ChoferCoche $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listadoChoferCoche-tp3-ug0059');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrarChoferCoche-tp3-ug0059', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
