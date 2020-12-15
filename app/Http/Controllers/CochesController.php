<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use \Illuminate\Validation\Rule;
use Exception;

class CochesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
            return view('listado-ug0278', 
                ['coches' => $coches, 'busqueda' => $cod]
            );
        }

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
        $estado = $request->input('estado') == '1'? true: false;
        $chapa = strtoupper($request->input('chapa'));

        $nuevoCoche = new \App\Coche();
        $nuevoCoche->codigo = $codigo;
        $nuevoCoche->km_actual = $km_actual;
        $nuevoCoche->activo = $estado;
        $nuevoCoche->chapa = $chapa;
		
		//Validacion
		$request->validate([
            //required, unique, alfa numerico, min=1, max=10 
            'codigo' => 'required|unique:\App\Coche,codigo|alpha_num|min:1|max:10',
            //required, number, min=0
            'km_actual' => 'required|numeric|min:0',
            //required, boolean
            'estado' => 'required|boolean',
            //required, alfa numerico, min=1, max=12
            'chapa' => 'required|alpha_num|min:1|max:12'
        ],
        [
            //codigo
            'codigo.required' => 'El Código es requerido. Debe ingresar algún valor',
            'codigo.unique' => 'El Código ingresado ya existe en la Base de Datos. Intente con otro Código',
            'codigo.alpha_num' => 'El Código ingresado es inválido. Debe ingresar solo números y/o letras',
            'codigo.min' => 'El Código es muy corto. Debe ser como minimo 1 caracter',
            'codigo.max' => 'El Código es muy largo. No debe exceder 10 caracteres',
            //kilometraje
            'km_actual.required' => 'El Kilometraje es requerido. Debe ingresar algún valor',
            'km_actual.numeric' => 'El Kilometraje ingresado es inválido. Debe ingresar un valor numérico',
            'km_actual.min' => 'El valor de Kilometraje es inválido. Debe ingresar un valor mayor o igual a 0 (cero)',
            //Estado
            'estado.required' => 'El Estado es requerido. Debe ingresar algún valor',
            'estado.boolean' => 'El Estado es inválido. Debe ingresar 1 (Activo) o 0 (Inactivo)',
            //Chapa
            'chapa.required' => 'El número de Chapa es requerido. Debe ingresar algún valor ',
            'chapa.alpha_num' => 'El número de Chapa es inválido. Debe ingresar solo números y/o letras ',
            'chapa.min' => 'El número de Chapa es muy corto. Debe ser como mínimo 1 caracter',
            'chapa.max' => 'El número de Chapa es muy largo. No debe exceder 12 caracteres',
        ]);

		//Alertas
		try {
        	$nuevoCoche->save();
			session()->flash('exito', 'El registro fue guardado con éxito');
        	
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
    public function show(\App\Coche $id)
    {
        return view('ver-ug0278', ['coche' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Coche $id)
    {
       return view('editar-ug0278', ['coche' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Coche $id)
    {
        //Validacion
    	$request->validate([
            //required, unique, alfa numerico, min=1, max=10 
            'codigo' => [
                            'required',
                             Rule::unique('coche')->ignore($id->id),
                            'alpha_num',
                            'min:1', 
                            'max:10'
                        ],
            //required, number, min=0
            'km_actual' => 'required|numeric|min:0',
            //required, boolean
            'estado' => 'required|boolean',
            //required, alfa numerico, min=1, max=12
            'chapa' => 'required|alpha_num|min:1|max:12'
        ],
        [
            //codigo
            'codigo.required' => 'El Código es requerido. Debe ingresar algún valor',
            'codigo.alpha_num' => 'El Código ingresado es inválido. Debe ingresar solo números y/o letras',
            'codigo.min' => 'El Código es muy corto. Debe ser como minimo 1 caracter',
            'codigo.max' => 'El Código es muy largo. No debe exceder 10 caracteres',
            'codigo.unique' => 'Código ingresado ya existe en la Base de Datos. Intente con otro Código',
            //kilometraje
            'km_actual.required' => 'El Kilometraje es requerido. Debe ingresar algún valor',
            'km_actual.numeric' => 'El Kilometraje ingresado es inválido. Debe ingresar un valor numérico',
            'km_actual.min' => 'El valor de Kilometraje es inválido. Debe ingresar un valor mayor o igual a 0 (cero)',
            //Estado
            'estado.required' => 'El Estado es requerido. Debe ingresar algún valor',
            'estado.boolean' => 'El Estado es inválido. Debe ingresar 1 (Activo) o 0 (Inactivo)',
            //Chapa
            'chapa.required' => 'El número de Chapa es requerido. Debe ingresar algún valor ',
            'chapa.alpha_num' => 'El número de Chapa es inválido. Debe ingresar solo números y/o letras ',
            'chapa.min' => 'El número de Chapa es muy corto. Debe ser como mínimo 1 caracter',
            'chapa.max' => 'El número de Chapa es muy largo. No debe exceder 12 caracteres',
        ]);

		//Alertas
		try {
			$id->codigo = $request->get('codigo');
			$id->km_actual = $request->get('km_actual');
			$id->activo = $request->input('estado') == '1'? true: false;
			$id->chapa = $request->get('chapa');
        	$id->save();
			session()->flash('exito', 'Los cambios fueron guardados con éxito');
        	
        	return redirect()->route('editar-ug0278', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editar-ug0278', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\Coche $id)
    {
        return view('borrar-ug0278', ['coche' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Coche $id)
    {
        try{
            $id->delete();
            session()->flash('exito', 'Registro Borrado con éxito');

            return redirect()->route('listado-ug0278');
        }catch (QueryException $e){
            return redirect()->route('confirmar-borrar-ug0278', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
