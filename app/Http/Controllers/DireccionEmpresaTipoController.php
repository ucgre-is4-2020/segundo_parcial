<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DireccionEmpresaTipo;
use App\DireccionEmpresa;
use App\Empresa;
use App\Barrio;

class DireccionEmpresaTipoController extends Controller
{
    /**
     * Display a listing of the resource.direcciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dir = DireccionEmpresaTipo::get();

        $dirempre = DireccionEmpresa::get();
        $empresa = Empresa::get();
        $barrio = Barrio::get();

       /*$dir = DireccionEmpresaTipo::join('direccion_empresa', 'direccion_empresa_tipo.id', '=', 'direccion_empresa.direccion_empresa_tipo_id')
                                      
                                      ->select('direccion_empresa_tipo.*')
                                      ->get();*/

        $dir = DireccionEmpresaTipo::get();


    

        return view('tp3/ug0287/listar_direccion_empresa_tipo',['direcciones' => $dir, 'dirempresas' => $dirempre, 'empresas'=> $empresa, 'barrios' => $barrio]);



       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DireccionEmpresaTipo $id)


    {
        $empresa = Empresa::get();



        $id->load('direcciones_empresas');
                return view('tp3/ug0287/sub_pagina', ['registros' => $id, 'empresas' => $empresa]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
