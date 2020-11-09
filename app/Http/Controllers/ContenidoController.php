<?php

namespace App\Http\Controllers;

use App\Contenido;
use Illuminate\Http\Request;


class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();

       

        $nombre = $request->get('buscarpor');


        $compuestos = Contenido::where('nombre', 'ilike', "%$nombre%")->paginate(50);

        //a que vista queremos ir desde aqui
        return view('listado-ug0314', 
            ['misCompuestos' => $compuestos] // aqui pasamos a la vista $compuestos, en una variable $miscompuestos
        ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //reenviar al formulario de creacion
        return view('crear-ug0314');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validador
        $validatedData = $request->validate(
            [
                'codigo' => 'required|max:8|unique:contenido,codigo',
                'nombre' => 'required|max:40',
                'estado' =>''
            ],
            [
                'codigo.required' => 'El campo codigo es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'codigo.max' => 'El codigo no puede tener más de 8 caracteres',
                'nombre.max' => 'El nombre no puede tener más de 40 caracteres',
                'codigo.unique' => 'El codigo ya existe'

            ]

        );

        //en el $request estan todos los campos del formulario
        $codigo = $request->input('codigo');
        $nombre = $request->input('nombre');
        $estado = $request->input('estado');
        //aqui siempre conviene utilizar dd o alguna sentencia de impresion
        //para imprimir los datos y verificar


        //aqui efectivamente creamos el nuevo registro
        $nuevoCompuesto = new Contenido(); //creamos un objeto de tipo producto
        $nuevoCompuesto->codigo = $codigo; //setemos cada valor del nuevo objeto con lo que vino del form
        $nuevoCompuesto->nombre = $nombre;
        $nuevoCompuesto->estado = $estado;
        $nuevoCompuesto->save(); // aca de guarda en la base de datos


        
       echo "<script>alert('Creación exitosa'); </script>";
        

        return view('crear-ug0314'); //retornamos a la lista de productos

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contenido $id)
    {
        //
        return view('ver-ug0314', ['compuesto'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contenido $id)
    {
        //

       
        return view('editar-ug0314', ['compuesto' =>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contenido $id)
    {


        //validador
        $validatedData = $request->validate(
            [
                
                'nombre' => 'required|max:40',
                'estado' =>''
            ],
            [
                
                'nombre.required' => 'El campo nombre es obligatorio',
                
                'nombre.max' => 'El nombre no puede tener más de 40 caracteres',
               

            ]

        );
        //
        
        $nombre = $request->get('nombre');
        
        $estado = $request->get('estado');

        $id->nombre = $nombre;
       
        $id->estado = $estado;
        
        $id->save();

        $request->session()->flash('mensaje', "La edición del compuesto $id->nombre fue exitoso");

        return redirect('/listado_adm_contenido/ver_adm_contenido/'. $id->id );

        
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contenido $id)
    {
        $request = request();
        //borrar un registro de la tabla a la que corresponda la entidad
        $id->delete();

        $request->session()->flash('mensaje', "El borrado del compuesto $id->nombre fue exitoso");

        return redirect('/listado_adm_contenido');
    }
}
