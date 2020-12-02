<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if (empty($request->input('buscarpor'))) {  
            $listado = \App\Ciudad::with('departamento')->get();
          return view('/tp2/ug0317/listado-ciudad',
            ['misListados' => $listado]
        ); 

        }else{
           $buscarpor =  strtoupper($request->get('buscarpor'));
           $misListados = \App\Ciudad::with('departamento')->whereRaw('upper(nombre) like \'%'.$buscarpor. '%\'')->get();

           return view('tp2/ug0317/listado-ciudad', compact('misListados', 'buscarpor'));
     }

    //-----------------------------------------------------------------------------

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = \App\Departamentos::get();
        return view('tp2/ug0317/crear-ciudad', 
            [ 'departamentos' => $departamentos]
        );
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $nombre = $request->input('nombre');
          $departamentos = $request->input('departamentos');
          $abreviacion = $request->input('abreviacion');

        $this->validate($request,
            [
                'nombre' => 'required|min:1|max:150',
                "abreviacion" => 'required|max:20|unique:ciudad,abreviacion|min:2'
            ],
            [
                'nombre.min' => 'El campo nombre debe tener al menos 3 letras',
                'nombre.max' => 'El campo nombre debe tener maximo 150 letras',
                

                'abreviacion.min'=> 'La abreviacion debe tener al menos 2 caracteres',
                'abreviacion.required'=> 'El campo abreviacion es obligatorio',
                'abreviacion.max'=> 'La abreviacion no puede superar los 20 caracteres',
                'abreviacion.unique'=> 'Ya existe un departamento con esa abreviacion',
            ]


        );

        $nuevoRegistro = new \App\Ciudad();
        $nuevoRegistro->nombre = $nombre;
        $nuevoRegistro->departamento_id = $departamentos;
        $nuevoRegistro->abreviacion = $abreviacion;
        $nuevoRegistro->save();

        return back()->with('mensaje', 'Haz agregado un Registro a la Lista');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Ciudad $id)
    {
        return view('tp2/ug0317/ver-ciudad', ['resgitroVer' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Ciudad $id)
    {
        //
        $departamentos = \App\departamentos::get();
        return view("tp2/ug0317/editar-ciudad", ['editListado' => $id, 'departamento'=>$departamentos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Ciudad $id)
    {
         $nombre = $request->get('nombre');
          $departamentos = $request->input('departamentos');
          $abreviacion = $request->input('abreviacion');
         
          if ($id->abreviacion != $abreviacion ) {
             $this->validate($request,
                [
                     'nombre' => 'required|min:1|max:150',
                    'abreviacion' => 'required|max:20|unique:ciudad,abreviacion|min:2'
                ],
                [
                    'nombre.min' => 'El campo nombre debe tener al menos 3 letras',
                    'nombre.max' => 'El campo nombre debe tener maximo 150 letras',
                    

                    'abreviacion.min'=> 'La abreviacion debe tener al menos 2 caracteres',
                    'abreviacion.required'=> 'El campo abreviacion es obligatorio',
                    'abreviacion.max'=> 'La abreviacion no puede superar los 20 caracteres',
                    'abreviacion.unique'=> 'Ya existe un departamento con esa abreviacion',
                ]
            );
            }else{
                $this->validate($request,
                [
                     'nombre' => 'required|min:1|max:150',
                    'abreviacion' => 'required|max:20|min:2'
                ],
                [
                    'nombre.min' => 'El campo nombre debe tener al menos 3 letras',
                    'nombre.max' => 'El campo nombre debe tener maximo 150 letras',
                    

                    'abreviacion.min'=> 'La abreviacion debe tener al menos 2 caracteres',
                    'abreviacion.required'=> 'El campo abreviacion es obligatorio',
                    'abreviacion.max'=> 'La abreviacion no puede superar los 20 caracteres',
                ]
            );

            }
        

        $id->nombre = $nombre;
        $id->departamento_id = $departamentos;
        $id->abreviacion = $abreviacion;
        $id->save();
        $request->session()->flash('mensaje', "Edicion exitosa de la Ciuadad $id->nombre");
        return redirect('tp2/ug0317/ver-ciudad/'. $id->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Ciudad $id)
    {
        $request = request();

        $id->delete();
        $request->session()->flash('mensaje', "Borrado Exitoso $id->nombre");

        return redirect('tp2/ug0317/listado-ciudad');
    }
}
