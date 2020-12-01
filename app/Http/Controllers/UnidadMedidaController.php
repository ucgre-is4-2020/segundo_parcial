<?php

namespace App\Http\Controllers;

use App\UnidadMedida;



use Illuminate\Http\Request;




class UnidadMedidaController extends Controller
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

        $unidadMedida = UnidadMedida::with('unidad_medida_tubo')->where( 'nombre', 'ilike', "%$nombre%")->paginate(50);

        //se ordena el array por id
        $unidadMedida = $unidadMedida->sortBy('id');

        //a que vista queremos ir desde aqui
        return view('tp2/ug0282-ug0314/listado_unidad_medida_ug0282_ug0314', 
            ['misUnidades' => $unidadMedida] // aqui pasamos a la vista $unidadMedida, en una variable $misUnidades
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
        return view('tp2/ug0282-ug0314/crear_unidad_medida_ug0282_ug0314');
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
        //validador
        $validatedData = $request->validate(
            [
                'abreviacion' => 'required|max:10|unique:unidad_medida,abreviacion',
                'nombre' => 'required|max:120',
                'activo' =>''
            ],
            [
                'abreviacion.required' => 'El campo abreviacion es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'abreviacion.max' => 'La abreviacion no puede tener más de 8 caracteres',
                'nombre.max' => 'El nombre no puede tener más de 120 caracteres',
                'abreviacion.unique' => 'La abreviacion ya existe'

            ]

        );

        //en el $request estan todos los campos del formulario
        $nombre = $request->input('nombre');
        $abreviacion = $request->input('abreviacion');
        
        $activo = $request->input('activo');
        //aqui siempre conviene utilizar dd o alguna sentencia de impresion
        //para imprimir los datos y verificar


        //aqui efectivamente creamos el nuevo registro
        $nuevaUnidad = new UnidadMedida(); //creamos un objeto de tipo producto

        $nuevaUnidad->nombre = $nombre;
        $nuevaUnidad->abreviacion = $abreviacion; //setemos cada valor del nuevo objeto con lo que vino del form
        
        $nuevaUnidad->activo = $activo;
        $nuevaUnidad->save(); // aca de guarda en la base de datos


        
       echo "<script>alert('Creación exitosa'); </script>";
        

        return view('tp2/ug0282-ug0314/crear_unidad_medida_ug0282_ug0314'); //retornamos a la lista de productos
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( UnidadMedida $id)
    {
        //

        $id->load('unidad_medida_tubo');
        return view('tp2/ug0282-ug0314/ver_unidad_medida_tp2_ug0282_ug0314', ['unidadMedida'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadMedida $id)
    {
        //
        return view('tp2/ug0282-ug0314/editar_unidad_medida_tp2_ug0282_ug0314', ['unidadMedida' =>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadMedida $id)
    {
        //
        $abreviacion = $request->get('abreviacion');

//
        if ($id->abreviacion == $abreviacion) {
             $validatedData = $request->validate(
            [
                'abreviacion' => 'required|max:10',
                'nombre' => 'required|max:120',
                'activo' =>''
            ],
            [
                'abreviacion.required' => 'El campo abreviacion es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'abreviacion.max' => 'La abreviacion no puede tener más de 8 caracteres',
                'nombre.max' => 'El nombre no puede tener más de 120 caracteres'

            ]

        );
        }else{
            //validador
            $validatedData = $request->validate(
            [
                'abreviacion' => 'required|max:10|unique:unidad_medida,abreviacion',
                'nombre' => 'required|max:120',
                'activo' =>''
            ],
            [
                'abreviacion.required' => 'El campo abreviacion es obligatorio',
                'nombre.required' => 'El campo nombre es obligatorio',
                'abreviacion.max' => 'La abreviacion no puede tener más de 8 caracteres',
                'nombre.max' => 'El nombre no puede tener más de 120 caracteres',
                'abreviacion.unique' => 'La abreviacion ya existe'

            ]

        );
        }


        
        $nombre = $request->get('nombre');
        $abreviacion = $request->get('abreviacion');
        
        $activo = $request->get('activo');

        $id->nombre = $nombre;
        $id->abreviacion = $abreviacion; 
        $id->activo = $activo;


        
        
        $id->save();



        $request->session()->flash('mensaje', "La edición la unidad de medida $id->nombre fue exitoso");

        return redirect('/listado-unidad-medida-tp2-ug0282-ug0314/ver-unidad-medida/'. $id->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $id)
    {
        //

        $request = request();
        //borrar un registro de la tabla a la que corresponda la entidad
        $id->delete();

        $request->session()->flash('mensaje', "El borrado de la unidad de medida $id->nombre fue exitoso");

        return redirect('/listado-unidad-medida-tp2-ug0282-ug0314/');
    }
}
