<?php

namespace App\Http\Controllers;
use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\Factory\Illuminate\View\View|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $listar= \App\Color::get();
        $request = request();
        $nombre = $request->get('buscarpor');
        $id = $request->get('orden');
        return view('Listado-Ug0093',
        ['misColores' => $color=\DB::table('color')->whereRaw('upper(nombre)like\'%'.strtoupper($nombre).'%\'')->get()->sort()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function create()
    {
        //reenviar a la vista que contiene el formulario de creacion.
        return view('Crear-Ug0093');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nombre' => 'required| regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
                'activo' => 'required',
                'codigo' => 'required |unique:color,codigo|min:2|max:3'
            ],
            [
                'nombre.required' => 'el campo nombre es obligatorio',
                'activo.required' => 'el campo activo es obligatorio',
                'codigo.required' => 'el campo codigo es obligatorio',
                'codigo.unique' => 'este codigo ya existe',
                'codigo.min' => 'El codigo debe ser más extenso',
                'codigo.max' => 'El codigo es muy extenso',
                'nombre.regex' => "Debe ingresar letras no numeros",
                ]
        );

       $nombre = $request->input('nombre');
       $activo = $request->input('activo');
        $codigo = $request->input('codigo');

        $nuevocolor = new Color();
        $nuevocolor->nombre= $nombre;
        $nuevocolor->activo= $activo;
        $nuevocolor->codigo= $codigo;
        $nuevocolor->save();
        //return view("Listado-Ug0093");
        return redirect('/Listado-Color');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function show(Color $id)
    {
return view('Ver-Ug0093',['color'=> $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function edit(Color $id)

    {
        //
        return view("editar-Ug0093", ['Colores' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $id)
    {
        $validatedData = $request->validate(
            [
                'nombre' => 'required | regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
                'activo' => 'required',
                'codigo' => 'required |unique:color,codigo|min:2|max:3'

            ],
            [
                'nombre.required' => 'el campo nombre es obligatorio',
                'activo.required' => 'el campo activo es obligatorio',
                'codigo.required' => 'el campo codigo es obligatorio',
                'codigo.min' => 'El codigo debe ser más extenso',
                'codigo.max' => 'El codigo es muy extenso',
                'nombre.regex' => "Debe ingresar letras no numeros",
                'codigo.unique' => 'este codigo ya existe'
            ]
        );
        //
        $nombre = $request->get('nombre');
        $activo = $request->get('activo');
        $codigo = $request->get('codigo');
        $id->nombre = $nombre;
        $id->activo = $activo;
        $id->codigo = $codigo;

        $id->save();
        $request ->session()->flash('mensaje',"Edicion exitosa del registro $id->nombre");
        return redirect('Ver-Ug0093/'. $id->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $id)
    {
        $request = request();
        //borrar registro
        $id->delete();
        $request ->session()->flash('mensaje',"Borrado exitoso del registro $id->nombre");
        return redirect('/Listado-Color');
    }
}
