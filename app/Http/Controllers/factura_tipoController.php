<?php

namespace App\Http\Controllers;
use App\Factura;
use App\FacturaTipo;
use Illuminate\Http\Request;

class factura_tipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //

            $request = request();
            $nombre = $request->get('buscarpor');
            $facturas = FacturaTipo::where('nombre', 'ilike', "%$nombre%")->paginate(10);

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
        $validatedData = $request->validate(
            [
        'nombre' => 'required|min:3|max:255',
        'codigo' => 'required|max:6|min:1|unique:factura_tipo,codigo',
        ],

        [
            'nombre.required' => 'El campo nombre es obligatorio',
            'codigo.required' => 'El campo codigo es obligatorio',
            'nombre.min' => 'El campo nombre debe tener como minimo 3 caracteres',
            'codigo.max' => 'El campo codigo debe tener como maximo 6 caracteres',
            'codigo.min' => 'El campo codigo debe tener como minimo 1 caracter',
            'codigo.unique' => 'El campo codigo ya existe',
        ]
        );



          $codigo = $request->input('codigo');
          $nombre = $request->input('nombre');

          $nuevaFactura= new FacturaTipo();
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
    public function show(FacturaTipo $id)
    {
        return view('ver-ug0287', ['factura'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FacturaTipo $id)
    {
        return view("editar-ug0287", ['factura' =>$id ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, FacturaTipo $id)
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(FacturaTipo $id)
    {
        $request = request();
        $id->delete();
        $request->session()->flash('mensaje', "Registro Borrado $id->nombre ");

         return redirect('/listado-adm_factura_tipo');

    }
}
