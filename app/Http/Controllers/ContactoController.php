<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $listado_ug0059 = \App\Contacto_tipo::get();

        $request=request();
        $nombre=$request->get('buscarpor');
        return view ('listado_ug0059',
        ['misContactos'=> $contacto_tipo=\DB::table('contacto_tipo')->whereRaw('upper(nombre)like\'%'.strtoupper($nombre)
        .'%\'')->get()]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('crear_ug0059');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nombre' => 'required|alpha|max:30|min:2|unique:contacto_tipo,nombre',
            'activo' => 'required',
        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'activo.required' => 'El campo estado es obligatorio',
            'nombre.unique' => 'El nombre de contacto ingresado ya existe',
            'nombre.min' => 'El nombre de contacto debe tener al menos dos caracteres',
            'nombre.max' => 'El nombre puede tener un máximo de 30 caracteres',
            'nombre.alpha' => 'El nombre Ingresado debe incluir solo letras'
        ]
        );

        //
       try{
            $nombre=$request->input('nombre');
            $activo=$request->input('activo');


            $nuevoContacto = new \App\Contacto_tipo();
            $nuevoContacto -> nombre = $nombre;
            $nuevoContacto -> activo = $activo;
            $nuevoContacto -> save();

            return redirect()->route('listado_contacto_tipo', ['nuevoContacto'=>$nuevoContacto->nuevoContacto]);
        }
            catch (QueryException $error){
                return redirect()->route('crear_contacto_tipo', ['nuevoContacto'=>$nuevoContacto->nuevoContacto])
                ->with ('error',$error->errorInfo[2]);
            };
        
       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Contacto_tipo $id)
    {
        //
        return view('ver_ug0059', ['contacto'=> $id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\contacto_tipo $id)
    {
        //
        
        return view('editar_ug0059', ['editar_contacto_tipo'=> $id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Contacto_tipo $id)
    {
        //
        $validatedData = $request->validate([
            'nombre' => 'required|alpha|max:30|min:2|unique:contacto_tipo,nombre',
            'activo' => 'required',
        ],
        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'activo.required' => 'El campo estado es obligatorio',
            'nombre.unique' => 'El nombre de contacto ingresado ya existe',
            'nombre.min' => 'El nombre de contacto debe tener al menos dos caracteres',
            'nombre.max' => 'El nombre puede tener un máximo de 30 caracteres',
            'nombre.alpha' => 'El nombre Ingresado debe incluir solo letras'
        ]
    );
        try{
            $nombre=$request->get ('nombre');
            $activo=$request->get ('activo');
            
            $id->nombre = $nombre;
            $id->activo = $activo;

            $id->save();

            return redirect ()-> route('listado_contacto_tipo',['id'=> $id -> id]);
        }
        catch(QueryException $error){
            return redirect()->route('editar_contacto_tipo', ['id'=> $id -> id])->with ('error',$error->errorInfo[2]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( \App\Contacto_tipo $id)
    {

        $id-> delete();
        return redirect ()-> route('listado_contacto_tipo');
  
        //
    }
}