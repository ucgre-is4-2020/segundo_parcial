<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
class UG0282Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listado_ug0282 = \App\listado_tubo_estado::get();
        //dd($listado_ug0282);
        $request=request();
        $nombre = $request->get('buscarpor');
        return view('listado_ug0282',
        ['listado' => $tubo_estado=\DB::table('tubo_estado')->whereRaw('upper(nombre)like\'%'.strtoupper($nombre).'%\'')->get()]);    
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $nombre= $request-> input('nombre');
        $activo= $request-> input ('activo');

        $nuevotubo_estado = new \App\listado_tubo_estado();
        $nuevotubo_estado-> nombre = $nombre;
        $nuevotubo_estado-> activo =$activo;
        $nuevotubo_estado->save();
        return redirect()->route('listado_tubo_estado',['nuevotubo_estado'=>$nuevotubo_estado->nuevotubo_estado]);}
      catch(QueryException $error){
        return redirect()->route('crear_tubo_estado',['inuevotubo_estadod'=>$nuevotubo_estado->nuevotubo_estado])->with('error',$error->errorInfo[2]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\listado_tubo_estado $id)
    {
       return view('ver_ug0282',['ver_tubo_estado'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\listado_tubo_estado $id)
    {
        return view('editar_ug0282',['editar_tubo_estado'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,\App\listado_tubo_estado $id)
    {
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\listado_tubo_estado $id)
    {
        $request=request();
        $id->delete();
        $request->session()->flash('mensaje', "Borrado Exitoso del registro
         $id->nombre");
        return redirect()->route('listado_tubo_estado');
    }
}
