<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarrioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (empty($request->input('buscarpor'))) {
            
            $listado = \App\barrio::with('ciudad')->get();
            return view('tp2/ug0317/listado-barrio',
                ['misListados' => $listado]
            );

        }else{
        $buscarpor =  strtoupper($request->get('buscarpor'));
       $misListados = \App\barrio::with('ciudad')->whereRaw('upper(nombre) like \'%'.$buscarpor. '%\'')->get();

       return view('tp2/ug0317/listado-barrio', compact('misListados', 'buscarpor'));

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
        $ciudad = \App\ciudad::get();
        return view('tp2/ug0317/crear-barrio',
            [ 'ciudad' => $ciudad]
        );
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
           $ciudad = $request->input('ciudad');
            $codigo = $request->input('codigo');

        $this->validate($request,
            [
                'nombre' => 'required|min:3|max:20|unique:barrio,nombre|regex:/[a-zA-Z]+$/',
                'codigo' => 'required|min:3|max:10|unique:barrio,codigo',
            ],
            [
                'codigo.required' => 'El campo es requerido',
                'codigo.unique' =>'El codigo que ingresaste ya ha sido utilizado',
                'codigo.max' => 'El codigo como maximo puede ser 10 digitos',
                'codigo.min' => 'El codigo como minimo tiene que tener 3 digitos',

                'nombre.min' => 'El campo nombre debe tener al menos 3 letras',
                'nombre.max' => 'El campo nombre debe tener maximo 10 letras',
                'nombre.regex' => 'El campo nombre debe ser palabras NO numeros',
                'nombre.unique' => 'El nombre que ingresaste ya existe'
            ]
        );

        $nuevoRegistro = new \App\Barrio();
        $nuevoRegistro->nombre = $nombre;
        $nuevoRegistro->ciudad_id = $ciudad;
        $nuevoRegistro->codigo = $codigo;
        $nuevoRegistro->save();

        return back()->with('mensaje', 'Haz agregado un Barrio a la Lista');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Barrio $id)
    {
        return view('tp2/ug0317/ver-barrio', ['resgitroVer' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Barrio $id)
    {
        //
        $ciudad = \App\ciudad::get();
        return view("tp2/ug0317/editar-barrio", ['editListado' => $id, 'ciudad'=>$ciudad ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Barrio $id)
    {
         $nombre = $request->get('nombre');
          $ciudad = $request->input('ciudad');
            $codigo = $request->input('codigo');
           

            if ($id->codigo != $codigo ) {
                
                 $this->validate($request,
                 [
                    'nombre' => 'required|min:1|max:150',
                    'codigo' => 'required|min:1|max:20|unique:barrio,codigo',
                ],
                [
                    'codigo.required' => 'El campo es requerido',
                    'codigo.unique' =>'El codigo que ingresaste ya ha sido utilizado',
                    'codigo.max' => 'El codigo como maximo puede ser 20 digitos',
                    'codigo.min' => 'El codigo como minimo tiene que tener 1 digitos',

                    'nombre.min' => 'El campo nombre debe tener al menos 1 letras',
                    'nombre.max' => 'El campo nombre debe tener maximo 150 letras',
                    'nombre.required' => 'El campo es requerido'
                ]
            );

            }else{

                  $this->validate($request,
                 [
                    'nombre' => 'required|min:1|max:150',
                    'codigo' => 'required|min:1|max:20',
                ],
                [
                    'codigo.required' => 'El campo es requerido',
                    'codigo.max' => 'El codigo como maximo puede ser 20 digitos',
                    'codigo.min' => 'El codigo como minimo tiene que tener 1 digitos',

                    'nombre.min' => 'El campo nombre debe tener al menos 1 letras',
                    'nombre.max' => 'El campo nombre debe tener maximo 150 letras',
                    'nombre.required' => 'El campo es requerido'
                ]
            );
            }
        


        $id->nombre = $nombre;
        $id->ciudad_id = $ciudad;
        $id->codigo = $codigo;
        $id->save();
        $request->session()->flash('mensaje', "Edicion exitosa del Barrio $id->nombre");
        return redirect('tp2/ug0317/ver-barrio/'. $id->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Barrio $id)
    {
        $request = request();

        $id->delete();
        $request->session()->flash('mensaje', "Borrado Exitoso $id->nombre");

        return redirect('tp2/ug0317/listado-barrio');
    }
}
