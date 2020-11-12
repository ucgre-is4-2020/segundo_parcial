<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $listado_ug0289 = \App\Documento_tipo::get();

        $request=request();
        $nombre=$request->get('buscarpor');
        return view ('listado_ug0289',
        ['misDocumentos'=> $documento_tipo=\DB::table('documento_tipo')->whereRaw('upper(nombre)like\'%'.strtoupper($nombre)
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
        return view ('crear_ug0289');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function store(Request $request)
    {
        //
       try{
            $nombre=$request->input('nombre');
            $abreviacion=$request->input('abreviacion');
            $activo=$request->input('activo');


            $nuevoDocumento = new \App\Documento_tipo();
            $nuevoDocumento -> nombre = $nombre;
            $nuevoDocumento -> abreviacion = $abreviacion;
            $nuevoDocumento -> activo = $activo;
            $nuevoDocumento -> save();

            return redirect()->route('listado_documento_tipo', ['nuevoDocumento'=>$nuevoDocumento->nuevoDocumento]);
        }
            catch (QueryException $error){
                return redirect()->route('crear_documento_tipo', ['nuevoDocumento'=>$nuevoDocumento->nuevoDocumento])
                ->with ('error',$error->errorInfo[2]);
            };
        
       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Documento_tipo $id)
    {
        //
        return view('ver_ug0289', ['documento'=> $id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Documento_tipo $id)
    {
        //

        return view('editar_ug0289', ['editar_documento_tipo'=> $id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Documento_tipo $id)
    {
        //
        try{
            $nombre=$request->get ('nombre');
            $abreviacion=$request->get ('abreviacion');
            $activo=$request->get ('activo');
            
            $id->nombre = $nombre;
            $id->abreviacion = $abreviacion;
            $id->activo = $activo;

            $id->save();

            return redirect ()-> route('listado_documento_tipo',['id'=> $id -> id]);
        }
        catch(QueryException $error){
            return redirect()->route('editar_documento_tipo', ['id'=> $id -> id])->with ('error',$error->errorInfo[2]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( \App\Documento_tipo $id)
    {

        $id-> delete();
        return redirect ()-> route('listado_documento_tipo');
  
        //
    }
}
