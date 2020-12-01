<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class ControllerFacturaMedioPago extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(empty($request->query())){
        	$Fmp = \App\FacturaMedioPago::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $Fmp = \DB::table('FacturaMedioPago')
                                ->whereRaw('upper(nombre) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $Fmp = \App\FacturaMedioPago::get();
            }
            return view('tp2/ug0059/listadoFMP-tp2-ug0059', 
                ['Fmp' => $Fmp, 'busqueda' => $nom]
            );
        }

        return view('tp2/ug0059/listadoFMP-tp2-ug0059', 
        	['Fmp' => $Fmp]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('tp2/ug0059/crearFMP-tp2-ug0059');
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
        $estado = $request->input('estado') === 'true'? true: false;
        

        $nuevaFMP = new \App\FacturaMedioPago();
        $nuevaFMP->nombre = $nombre;
        $nuevaFMP->activo = $estado;
       
		
		
	
		//Alertas
		try {
        	$nuevaFMP->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');
        	
        	return redirect()->route('listadoFMP-tp2-ug0059');
		}catch (QueryException $e){
			return redirect()->route('crearFMP-tp2-ug0059')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\FacturaMedioPago $id)
    {
        return view('tp2/ug0059/verFMP-tp2-ug0059', ['FacturaMedioPago' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\FacturaMedioPago $id)
    {
       return view('tp2/ug0059/editarFMP-tp2-ug0059', ['FacturaMedioPago' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\FacturaMedioPago $id)
    {
    	$nombre = $request->input('nombre');
	
       
    	if($nombre != $id->nombre){
    		
			$request->validate([
				'nombre' => 'unique:App\FacturaMedioPago,nombre'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			
		}

		
		try {
			$id->nombre = $nombre;
			$id->activo = $request->get('estado');
        	$id->save();
			session()->flash('Guardando', 'Las actualizaciones fueron guardados');
        	
        	return redirect()->route('editarFMP-tp2-ug0059', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editarFMP-tp2-ug0059', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\FacturaMedioPago $id)
    {
        return view('tp2/ug0059/borrarFMP-tp2-ug0059', ['FacturaMedioPago' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\FacturaMedioPago $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listadoFMP-tp2-ug0059');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrarFMP-tp2-ug0059', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
