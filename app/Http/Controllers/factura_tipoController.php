<?php

namespace App\Http\Controllers;
use App\Factura;
use Illuminate\Http\Request;

class factura_tipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Views\Factory\Illuminate\Views\Views
     */
    public function index()
    {
        //
            $facturas = Factura::get();
            return view('listado-ug0287',
            ['misFacturas' => $facturas]

            );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Views\Factory\Illuminate\Views\Views
     */
    public function create()
    {
        return view('crear-ug0287');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $codigo = $request->input('codigo');
          $nombre = $request->input('nombre');

          $nuevaFactura= new Factura();
          $nuevaFactura->codigo = $codigo;
          $nuevaFactura->nombre = $nombre;
          $nuevaFactura->save();
          return view('crear-ug0287');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $id)
    {
        return view('ver-ug0287', ['factura'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $id)
    {
        return view("editar-ug0287", ['factura' =>$id ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $id)
    {
        //
         $nombre = $request->get('nombre');
        
        $codigo = $request->get('codigo');

        $id->nombre = $nombre;
       
        $id->codigo = $codigo;
        
        $id->save();

        $request->session()->flash('mensaje', "La edición del registro $id->id fue exitoso");

        return redirect('/listado-adm_factura_tipo/ver-adm_factura_tipo/'. $id->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $id)
    {
        $request = request();
        $id->delete();
        $request->session()->flash('mensaje', "Registro Borrado $id->nombre ");

         return redirect('/listado-adm_factura_tipo');
        
    }
}
