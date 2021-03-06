<?php

namespace App\Http\Controllers;

use App\EmpresaTipo;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class ControllerEmpresaTipo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        if(empty($request->query())){
        	$empresatipo = EmpresaTipo::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $empresatipo = \DB::table('EmpresaTipo')
                                ->whereRaw('upper(nombre) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $empresatipo = EmpresaTipo::get();
            }
            return view('listado-ug0299',
                ['empresatipo' => $empresatipo, 'busqueda' => $nom]
            );
        }

        return view('listado-ug0299',
        	['empresatipo' => $empresatipo]
        );
    }




    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
	   return view('crear-ug0299');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre');
        $estado = $request->input('estado') === 'true'? true: false;


        $nuevaEmpresa = new EmpresaTipo();
        $nuevaEmpresa->nombre = $nombre;
        $nuevaEmpresa->activo = $estado;




		//Alertas
		try {
        	$nuevaEmpresa->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');

        	return redirect()->route('listado-ug0299');
		}catch (QueryException $e){
			return redirect()->route('crear-ug0299')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(EmpresaTipo $id)
    {
        return view('ver-ug0299', ['Empresa' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EmpresaTipo $id)
    {
       return view('editar-ug0299', ['Empresa' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, EmpresaTipo $id)
    {
    	$nombre = $request->get('nombre');

    	if($nombre != $id->nombre){

			$request->validate([
				'nombre' => 'unique:App\EmpresaTipo,nombre'
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

        	return redirect()->route('editar-ug0299', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editar-ug0299', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(EmpresaTipo $id)
    {
        return view('borrar-ug0299', ['Empresa' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(EmpresaTipo $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listado-ug0299');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrar-ug0299', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
