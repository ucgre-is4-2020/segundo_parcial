<?php

namespace App\Http\Controllers;

use App\chofer_coche;
use Illuminate\Http\Request;
use Ilumenate\Support\Facades\DB;
class ChoferCocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respuesta = chofer_coche::where('id','>=',0)->with('chofer')->with('coche')->get();
        return $respuesta;
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
     * @param  \App\chofer_coche  $chofer_coche
     * @return \Illuminate\Http\Response
     */
    public function show(chofer_coche $chofer_coche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\chofer_coche  $chofer_coche
     * @return \Illuminate\Http\Response
     */
    public function edit(chofer_coche $chofer_coche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\chofer_coche  $chofer_coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chofer_coche $chofer_coche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\chofer_coche  $chofer_coche
     * @return \Illuminate\Http\Response
     */
    public function destroy(chofer_coche $chofer_coche)
    {
        //
    }
}
