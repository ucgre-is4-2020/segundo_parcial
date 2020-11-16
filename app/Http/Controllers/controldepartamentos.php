<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class controldepartamentos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $departamentos = \App\Departamentos::get();


        $buscar = $request->get('buscarpor');

        $tipo = $request->get('tipo');

        $departamentos2 = \App\Departamentos::buscarpor($tipo, $buscar)->paginate(100);

        

        $ordenado = $departamentos2->sortBy('id');

        return view('Listado-ug0307',['misDepartamentos'=>$ordenado->values()->all()]);

        


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('crear-ug0307');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validateData = $request->validate(

            [

                'nombre' => 'required|max:40|unique:departamento,nombre|min:3',
                "abreviacion" => 'required|max:10|unique:departamento,abreviacion|min:2'

            ],
            [

                'nombre.required'=> 'El campo nombre es obligatorio',
                
                'nombre.max'=> 'El nombre no puede superar los 40 caracteres',
                'nombre.unique'=> 'Ya existe un departamento con ese nombre',
                'nombre.min'=> 'El nombre del departamento debe tener al menos 3 caracteres',

               
                'abreviacion.min'=> 'La abreviacion debe tener al menos 2 caracteres',
                'abreviacion.required'=> 'El campo abreviacion es obligatorio',
                'abreviacion.max'=> 'La abreviacion no puede superar los 10 caracteres',
                'abreviacion.unique'=> 'Ya existe un departamento con esa abreviacion',

            ]

        );


        $nombre = $request->input('nombre');
        $abreviacion = $request->input('abreviacion');


       // $departamentos = \App\Departamentos();

        $nuevoDepartamento = new \App\Departamentos();
        $nuevoDepartamento->nombre = $nombre;
        $nuevoDepartamento->abreviacion = $abreviacion;

        try{
             $nuevoDepartamento->save();
             session()->flash('Correcto','Nuevo departamento guardado');
             return redirect()->route('listar-ug0307');
        }catch (QueryException $e){
            return redirect()->route('crear-ug0307')->with('incorrecto',$e->errorInfo[2]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Departamentos $id)
    {
        
        return view('ver-ug0307',['departamento'=>$id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Departamentos $id)
    {
        //

        return view ('editar-ug0307',['departamento' =>$id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Departamentos $id)
    {

         $validateData = $request->validate(

            [

                'nombre' => 'required|min:3|max:40|unique:departamento,nombre,'.$id->id,
                "abreviacion" => 'required|max:10|min:2|unique:departamento,abreviacion,'.$id->id

            ],
            [

                'nombre.required'=> 'El campo nombre es obligatorio',
                'nombre.alpha_num'=> 'El Nombre del departamento debe contener solo Letras',
                'nombre.max'=> 'El nombre no puede superar los 40 caracteres',
                'nombre.unique'=> 'Ya existe un departamento con ese nombre',
                'nombre.min'=> 'El nombre del departamento debe tener al menos 3 caracteres',

                'abreviacion.alpha_num'=> 'La abreviacion debe contener solo letras ',
                'abreviacion.min'=> 'La abreviacion debe tener al menos 2 caracteres',
                'abreviacion.required'=> 'El campo abreviacion es obligatorio',
                'abreviacion.max'=> 'La abreviacion no puede superar los 10 caracteres',
                'abreviacion.unique'=> 'Ya existe un departamento con esa abreviacion',

            ]

        );


        $nombre = $request->get('nombre');
        $abreviacion = $request->get('abreviacion');

        $id->nombre =$nombre;
        $id->abreviacion =$abreviacion;

        

        try{
             $id->save();
             session()->flash('Correcto','Edicion de registro exitosa');
              return redirect('/ver-departamento/'.$id->id);
        }catch (QueryException $e){
            return redirect()->route('editar-ug0307',['id' => $id->id])->with('incorrecto',$e->errorInfo[2]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Departamentos $id)
    {
        

        //dd($id);

         try{
             $id->delete();
             session()->flash('correcto','Registiro eliminado de forma exitosa');
             return redirect('/listado-departamento');
        }catch (QueryException $e){
            return redirect('/listado-departamento')->with('incorrecto',$e->errorInfo[2]);
        }
        


    }
}
