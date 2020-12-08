<?php

namespace App\Http\Controllers;


use App\Producto;
use App\Tubo;
use App\Contenido;
use App\Color;
use App\TuboEstado;
use Illuminate\Http\Request;

class TuboController extends Controller
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

        $codigo = $request->get('buscarpor');

        $tubo = Tubo::with('producto')->where( 'serial', 'ilike', "%$codigo%")->paginate(50);

        //se ordena el array por id
        $tubo = $tubo->sortBy('id');

        //a que vista queremos ir desde aqui
        return view('tp2/ug0282-ug0314/listado_tubo_ug0282_ug0314', 
            ['misTubos' => $tubo] // aqui pasamos a la vista $unidadMedida, en una variable $misUnidades
        ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tp2/ug0282-ug0314/crear_tubo_ug0282_ug0314');
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
                'serial' => 'required|max:40|unique:tubo,serial',
                'codigo' => 'required|max:40|unique:tubo,codigo'
            ],
            [
                'codigo.required' => 'El campo codigo es obligatorio',
                'serial.required' => 'El campo serial es obligatorio',
                'codigo.max' => 'El codigo no puede tener más de 40 caracteres',
                'serial.max' => 'El serial no puede tener más de 40 caracteres',
                'codigo.unique' => 'El codigo ya existe',
                'serial.unique' => 'El serial ya existe'

            ]

        );

        //en el $request estan todos los campos del formulario
        $serial = $request->input('serial');
        $codigo = $request->input('codigo');
        $compra = $request->input('compra');
        $vencimiento = $request->input('vencimiento');
        //aqui siempre conviene utilizar dd o alguna sentencia de impresion
        //para imprimir los datos y verificar


        //aqui efectivamente creamos el nuevo registro
        $nuevoCompuesto = new Tubo(); //creamos un objeto de tipo producto
        $nuevoCompuesto->serial = $serial; //setemos cada valor del nuevo objeto con lo que vino del form
        $nuevoCompuesto->codigo = $codigo;
        $nuevoCompuesto->fecha_compra = $compra;
        $nuevoCompuesto->fecha_vencimiento = $vencimiento;
        $nuevoCompuesto->save(); // aca de guarda en la base de datos

        $request->session()->flash('mensaje', "La creacion del tubo fue exitoso");
       echo "<script>alert('Creación del producto exitosa'); </script>";
        
       echo "<script>alert('Creación exitosa'); </script>";
        

       return redirect('/listado-tubo-ug0282-ug0314/crear-tubo'); 
         //retornamos a la lista de productos
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tubo $id)
    {
        $request = request();

        $contenidoP = Contenido::get();
        $colorP = Color::get();
        $tubo_estadoP = TuboEstado::get();


        /*return view('tp2/ug0282-ug0314/ver_producto_tp2_ug0282_ug0314', ['producto' => $producto, 'tubo' => $tubo]);*/
        $id->load('unidad_medida_tubo', 'producto');
        return view('tp2/ug0282-ug0314/ver_tubos_tp2_ug0282_ug0314', ['unidadMedida'=>$id, 'contenidos' =>$contenidoP, 'colores' =>$colorP, 'tubos_estados' =>$tubo_estadoP]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Tubo $id)
    {
        return view('tp2/ug0282-ug0314/editar_tubo_tp2_ug0282_ug0314', ['tubos' =>$id]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tubo $id)
    {
        //
        $codigo = $request->get('codigo');
        $serial = $request->get('serial');


//
        if ($id->codigo == $codigo && $id->serial == $serial  ) {
             $validatedData = $request->validate(
                [
                    
                    'serial' => 'required|max:40',
                    'codigo' => 'required|max:40'
                ],
                [
                    
                    'serial.required' => 'El campo serial es obligatorio',
                    'codigo.required' => 'El campo codigo es obligatorio',
                    'codigo.max' => 'El código no puede tener más de 40 caracteres',
                    'serial.max' => 'El serial no puede tener más de 40 caracteres',
                   
                ]

            );
        }else{
            //validador
            $validatedData = $request->validate(
                [
                    
                    'serial' => 'required|max:40|unique:tubo',
                    'codigo' => 'required|max:40|unique:tubo',
                    
                ],
                [
                    
                    'serial.required' => 'El campo serial es obligatorio',
                    'codigo.required' => 'El campo codigo es obligatorio',
                    'codigo.max' => 'El código no puede tener más de 40 caracteres',
                    'codigo.unique' => 'El código  ya está en uso',
                    'serial.unique' => 'El serial ya está en uso',
                    'serial.max' => 'El serial no puede tener más de 40 caracteres',
                   

                ]

            );
        }

        $serial = $request->get('serial');
        $codigo = $request->get('codigo');
        $compra = $request->get('compra');
        $vencimiento = $request->get('vencimiento');

       

        $id->serial = $serial;
        $id->codigo = $codigo;
        $id->fecha_compra = $compra;
        $id->fecha_vencimiento = $vencimiento;  
        


        
        
        $id->save();



        $request->session()->flash('mensaje', "La edición del tubo $id->serial fue exitoso");

        return redirect('/listado-tubo-tp2-ug0282-ug0314/editar-tubo/'. $id->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tubo $id)
    {
        $request = request();
        //borrar un registro de la tabla a la que corresponda la entidad
        $id->delete();

        $request->session()->flash('mensaje', "El borrado del producto $id->id fue exitoso");

        return redirect('/listado-tubo-ug0282-ug0314/');
    }
}
