<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CochesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$coches = \App\Coche::get();
        return view('listado-ug0278', 
        	['coches' => $coches]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('crear-ug0278');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codigo = $request->input('codigo');
        $km_actual = intval($request->input('km_actual'));
        $estado = $request->input('estado') === 'true'? true: false;
        $chapa = strtoupper($request->input('chapa'));

        $nuevoCoche = new \App\Coche();
        $nuevoCoche->codigo = $codigo;
        $nuevoCoche->km_actual = $km_actual;
        $nuevoCoche->activo = $estado;
        $nuevoCoche->chapa = $chapa;
		
		//Validacion
		$request->validate([
			'codigo' => 'unique:App\Coche,codigo'
		],
		[
			'unique' => 'Código ingresado ya existe en la Base de Datos. Intente con otro Código'
		]);

		//Alertas
		try {
        	$nuevoCoche->save();
			session()->flash('exito', 'El registro fue guardado con exito');
        	
        	return redirect()->route('listado-ug0278');
		}catch (QueryException $e){
			return redirect()->route('crear-ug0278')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
