<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
       $buscarpor =  strtoupper($request->get('buscarpor'));
       $misListados = \DB::table('seguimiento_tipo')->whereRaw('upper(nombre) like \'%'.$buscarpor. '%\'')->get();
      
       return view('listado-ug0317', compact('misListados', 'buscarpor'));



    //-----------------------------------------------------------------------------

      $listado = \App\Listado::get();
        return view('listado-ug0317',
            ['misListados' => $listado]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crear-ug0317');
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

        $this->validate($request, 
            [
                'nombre' => 'required|min:3|max:10|unique:seguimiento_tipo,nombre|regex:/[a-zA-Z]+$/',
            ],
            [
                'nombre.min' => 'El campo nombre debe tener al menos 3 letras',
                'nombre.max' => 'El campo nombre debe tener maximo 10 letras',
                'nombre.regex' => 'El campo nombre debe ser palabras NO numeros',
                'nombre.unique' => 'El nombre que ingresaste ya existe'
            ]
        );

        $nuevoRegistro = new \App\Listado();
        $nuevoRegistro->nombre = $nombre;
        $nuevoRegistro->save();

        return back()->with('mensaje', 'Haz agregado un Registro a la Lista');
        //return view('crear-ug0317');

      /*$nombre = $request->input('nombre');

        $nuevoRegistro = new \App\Listado();
        $nuevoRegistro->nombre = $nombre;
        $nuevoRegistro->save();

        return view('crear-ug0317');*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Listado $id)
    {
        //
        return view('ver-ug0317', ['resgitroVer' => $id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Listado $id)
    {
        //


        return view("editar-ug0317", ['editListado' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Listado $id)
    {
        $nombre = $request->get('nombre');
        
         $this->validate($request, 
            [
                'nombre' => 'required|min:3|max:10|unique:seguimiento_tipo,nombre|regex:/[a-zA-Z]+$/',
            ],
            [
                'nombre.min' => 'El campo nombre debe tener al menos 3 letras',
                'nombre.max' => 'El campo nombre debe tener maximo 10 letras',
                'nombre.regex' => 'El campo nombre debe ser palabras NO numeros',
                'nombre.unique' => 'El nombre que ingresaste ya existe'
            ]
        );


        $id->nombre = $nombre;

        $id->save();
        $request->session()->flash('mensaje', "Edicion exitosa del Registro $id->nombre"); 
        return redirect('/ver/'. $id->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Listado $id)
    {
        $request = request();

        $id->delete();
        $request->session()->flash('mensaje', "Borrado Exitoso $id->nombre");

        return redirect('/listado-ug0317');
    }
}
