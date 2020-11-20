<?php

namespace App\Http\Controllers;

use App\TuboEstado;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
class TuboEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listado_ug0282 = TuboEstado::get();
        //dd($listado_ug0282);
        $request=request();
        $nombre = $request->get('buscarpor');
        $id = $request->get('orden');
        return view('listado_ug0282',
        ['listado' => $tubo_estado=\DB::table('tubo_estado')->whereRaw('upper(nombre)like\'%'.strtoupper($nombre).'%\'')->get()->sort()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear_ug0282');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nombre'=> 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)|min:3|max:15|unique:tubo_estado,nombre',
                'activo'=> 'required',
            ],
            [
                'nombre.required'=>'El campo nombre es obligatorio',
                'activo.required'=> 'El campo Activo es obligatorio',
                'nombre.min'=> 'El campo Nombre debe tener más de 2 caracteres',
                'nombre.max'=> 'El campo Nombre no debe pasar los 15 caracteres',
                'nombre.unique'=> 'El Nombre ya se esta usando',
                'nombre.regex'=> 'Debe ingresar letras no numeros',
            ]);
        try{
        $nombre= $request-> input('nombre');
        $activo= $request-> input ('activo');

        $nuevotubo_estado = new TuboEstado();
        $nuevotubo_estado-> nombre = $nombre;
        $nuevotubo_estado-> activo =$activo;
        $nuevotubo_estado->save();
        return redirect()->route('listado_tubo_estado',['nuevotubo_estado'=>$nuevotubo_estado->nuevotubo_estado]);}
      catch(QueryException $error){
        return redirect()->route('crear_tubo_estado',['nuevotubo_estado'=>$nuevotubo_estado->nuevotubo_estado])->with('error',$error->errorInfo[2]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TuboEstado $id)
    {
       return view('ver_ug0282',['ver_tubo_estado'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TuboEstado $id)
    {
        return view('editar_ug0282',['editar_tubo_estado'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,TuboEstado $id)
    {
        $validateData = $request->validate(
            [
                'nombre'=> 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)|min:3|max:15|unique:tubo_estado,nombre',
                'activo'=> 'required',
            ],
            [
                'nombre.required'=>'El campo nombre es obligatorio',
                'activo.required'=> 'El campo Activo es obligatorio',
                'nombre.min'=> 'El campo Nombre debe tener más de 2 caracteres',
                'nombre.max'=> 'El campo Nombre no debe pasar los 15 caracteres',
                'nombre.unique'=> 'El Nombre ya se esta usando',
                'nombre.regex'=> 'Debe ingresar letras no numeros',
            ]);
     try{
      $nombre= $request->get('nombre');
      $activo= $request->get('activo');
      $id->nombre =$nombre;
      $id->activo =$activo;
      $id->save();
      return redirect()->route('listado_tubo_estado',['id'=>$id->id]);}
      catch(QueryException $error){
        return redirect()->route('editar_tubo_estado',['id'=>$id->id])->with('error',$error->errorInfo[2]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TuboEstado $id)
    {
        $request=request();
        $id->delete();
        $request->session()->flash('mensaje', "Borrado Exitoso del registro
         $id->nombre");
        return redirect()->route('listado_tubo_estado');
    }
}
