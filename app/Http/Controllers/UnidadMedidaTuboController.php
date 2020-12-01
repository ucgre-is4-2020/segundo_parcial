<?php

namespace App\Http\Controllers;

use App\UnidadMedidaTubo;


use Illuminate\Http\Request;

class UnidadMedidaTuboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TP 2
        $request = request();

        $nombre = $request->get('buscarpor');

        $unidadMedidaTubo = UnidadMedidaTubo::with(['unidad_medida', 'tubo'])->where( 'descripcion', 'ilike', "%$nombre%")->paginate(50);
        

        

        //se ordena el array por id
        $unidadMedidaTubo = $unidadMedidaTubo->sortBy('id');

        //a que vista queremos ir desde aqui
        return view('tp2/ug0282-ug0314/listado_unidad_medida_tubo_ug0282_ug0314', 
            ['misUnidadesTubo' => $unidadMedidaTubo] // aqui pasamos a la vista $unidadMedida, en una variable $misUnidades
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
    public function show($id)
    {
        //
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
