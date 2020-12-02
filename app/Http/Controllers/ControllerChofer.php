<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class ControllerChofer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
            return view('tp2/ug0059/listadoChofer-tp2-ug0059', 
                ['chof' => $chof, 'busqueda' => $nom]
            );
        }

        return view('tp2/ug0059/listadoChofer-tp2-ug0059', 
        	['chof' => $chof]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('tp2/ug0059/crearChofer-tp2-ug0059');
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
		$apellido = $request->input('apellido');
		$documento_conducir = $request->input('documento_conducir');
		$tipo_sangre = $request->input('tipo_sangre');
		$documento = $request->input('documento');
        $estado = $request->input('estado') === 'true'? true: false;
        

        $nuevaChofer = new \App\Chofer();
        $nuevaChofer->nombre = $nombre;
		$nuevaChofer->apellido = $apellido;
		$nuevaChofer->documento_conducir = $documento_conducir;
		$nuevaChofer->tipo_sangre = $tipo_sangre;
		$nuevaChofer->documento = $documento;
        $nuevaChofer->activo = $estado;
       
		
		
	
		//Alertas
		try {
        	$nuevaChofer->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');
        	
        	return redirect()->route('listadoChofer-tp2-ug0059');
		}catch (QueryException $e){
			return redirect()->route('crearChofer-tp2-ug0059')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Chofer $id)
    {
        return view('tp2/ug0059/verChofer-tp2-ug0059', ['Chofer' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Chofer $id)
    {
       return view('tp2/ug0059/editarChofer-tp2-ug0059', ['Chofer' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Chofer $id)
    {
    	$nombre = $request->input('nombre');
		$apellido = $request->input('apellido');
		$documento_conducir = $request->input('documento_conducir');
		$tipo_sangre = $request->input('tipo_sangre');
		$documento = $request->input('documento');
	
       
    	if($nombre != $id->nombre){
    		
			$request->validate([
				'nombre' => 'unique:App\Chofer,nombre'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		
		
		$request->validate([
				'apellido' => 'unique:App\Chofer,apellido'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		
		
		$request->validate([
				'documento_conducir' => 'unique:App\Chofer,documento_conducir'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			
			$request->validate([
				'tipo_sangre' => 'unique:App\Chofer,tipo_sangre'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			
			$request->validate([
				'documento' => 'unique:App\Chofer,documento'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		}

		
		try {
			$id->nombre = $nombre;
			$id->apellido = $apellido;
			$id->documento_conducir = $documento_conducir;
			$id->tipo_sangre = $tipo_sangre;
			$id->documento = $documento;
			$id->activo = $request->get('estado');
        	$id->save();
			session()->flash('Guardando', 'Las actualizaciones fueron guardados');
        	
        	return redirect()->route('editarChofer-tp2-ug0059', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editarChofer-tp2-ug0059', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\Chofer $id)
    {
        return view('tp2/ug0059/borrarChofer-tp2-ug0059', ['Chofer' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Chofer $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listadoChofer-tp2-ug0059');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrarChofer-tp2-ug0059', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
