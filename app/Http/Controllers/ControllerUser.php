<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use Exception;

class ControllerUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(empty($request->query())){
        	$user = \App\Users::get();
        }else {
            //Filtrado por campo Codigo de la tabla
            $nom = $request->get('buscar');
            if(!empty($nom)){
                $user = \DB::table('Users')
                                ->whereRaw('upper(name) like \'%'.strtoupper($nom).'%\'')
                                ->get();
            }else {
                $user = \App\Users::get();
            }
            return view('tp2/ug0289-ug0299/listadoUser-tp2-ug0289-ug0299', 
                ['user' => $user, 'busqueda' => $nom]
            );
        }

        return view('tp2/ug0289-ug0299/listadoUser-tp2-ug0289-ug0299', 
        	['user' => $user]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	   return view('tp2/ug0289-ug0299/crearUser-tp2-ug0289-ug0299');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
		$email = $request->input('email');
       
		$password = $request->input('password');
		
        

        $nuevaUs = new \App\Users();
        $nuevaUs->name = $name;
		$nuevaUs->email = $email;
         
		$nuevaUs->password = $password;
       
		
		
	
		//Alertas
		try {
        	$nuevaUs->save();
			session()->flash('Guardando', 'El registro fue guardado sin errores');
        	
        	return redirect()->route('listadoUser-tp2-ug0289-ug0299');
		}catch (QueryException $e){
			return redirect()->route('crearUser-tp2-ug0289-ug0299')->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Users $id)
    {
        return view('tp2/ug0289-ug0299/verUser-tp2-ug0289-ug0299', ['Users' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Users $id)
    {
       return view('tp2/ug0289-ug0299/editarUser-tp2-ug0289-ug0299', ['Users' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Users $id)
    {
    	$name = $request->input('name');
		$email = $request->input('email');

		$password = $request->input('password');
       
    	if($name != $id->name || $email != $id->email  || $password != $id->password){
    		
			$request->validate([
				'name' => 'unique:App\Users,name'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			$request->validate([
				'email' => 'unique:App\Users,email'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
			
			
			
			$request->validate([
				'password' => 'unique:App\Users,password'
			],
			[
				'unique' => 'Dato ingresado existente.'
			]);
		}

		
		try {
			$id->name = $name;
			$id->email = $email;
			
			$id->password = $password;
        	$id->save();
			session()->flash('Guardando', 'Las actualizaciones fueron guardados');
        	
        	return redirect()->route('editarUser-tp2-ug0289-ug0299', ['id' => $id->id]);
		}catch (QueryException $e){
			return redirect()->route('editarUser-tp2-ug0289-ug0299', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
		}
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\Users $id)
    {
        return view('tp2/ug0289-ug0299/borrarUser-tp2-ug0289-ug0299', ['Users' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Users $id)
    {
        try{
            $id->delete();
            session()->flash('Borrando', 'Registro Borrado Satisfactoriamente');

            return redirect()->route('listadoUser-tp2-ug0289-ug0299');
        }catch (QueryException $e){
            return redirect()->route('seguro-que-desea-borrarUser-tp2-ug0289-ug0299', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
