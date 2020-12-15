<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Tubo;
use App\Contenido;
use App\Color;
use App\TuboEstado;
use App\UnidadMedida;
use App\UnidadMedidaTubo;



use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tubosP = Tubo::get();
        $contenidoP = Contenido::get();
        $colorP = Color::get();
        $tubo_estadoP = TuboEstado::get();

        //TP 2

        $request = request();

        $nombre = $request->get('buscarpor');

        $unidadMedida = Producto::with('tuboid', 'colorid', 'contenidoid', 'tuboestadoid','unidadmedidatuboid','unidadmedidaid')->where( 'color_id', 'ilike', "%$nombre%")->paginate(10);


        //se ordena el array por id
        $unidadMedida = $unidadMedida->sortBy('id');

        //a que vista queremos ir desde aqui
        return view('tp3/listado_producto_ug0282', 

            ['misProductos' => $unidadMedida, 'tubos' => $tubosP, 'contenidos' =>$contenidoP, 'colores' =>$colorP, 'tubos_estados' =>$tubo_estadoP] // aqui pasamos a la vista $unidadMedida, en una variable $misUnidades
        ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tubosP = Tubo::get();
        $contenidoP = Contenido::get();
        $colorP = Color::get();
        $tubo_estadoP = TuboEstado::get();

        return view('tp2/ug0282-ug0314/crear_producto_ug0282_ug0314', ['tubos' =>$tubosP, 'contenidos' =>$contenidoP, 'colores' =>$colorP, 'tubos_estados' =>$tubo_estadoP ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //en el $request estan todos los campos del formulario
        $tubo = $request->input('tubo_id');
        $contenido = $request->input('contenido_id');
        $color = $request->input('color_id');
        $tubo_estado = $request->input('tubo_estado_id');
        $activo = $request->input('activo');
        //aqui siempre conviene utilizar dd o alguna sentencia de impresion
        //para imprimir los datos y verificar


        //aqui efectivamente creamos el nuevo registro
        $nuevaProducto = new Producto(); //creamos un objeto de tipo producto

        $nuevaProducto->tubo_id = $tubo;
        $nuevaProducto->contenido_id = $contenido;
        $nuevaProducto->color_id = $color;
        $nuevaProducto->tubo_estado_id = $tubo_estado;
         //setemos cada valor del nuevo objeto con lo que vino del form
        
        $nuevaProducto->activo = $activo;
        $nuevaProducto->save(); // aca de guarda en la base de datos


        $request->session()->flash('mensaje', "La creacion del producto fue exitoso");
       echo "<script>alert('Creación del producto exitosa'); </script>";
        

        return redirect('/listado-producto-tp2-ug0282-ug0314/crear-producto'); //retornamos a la lista de productos
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tubo $tubo, Producto $producto)

    {
        $request = request();
 
        //$contenidoP = Contenido::where('id', '=', "$conten")->get();
        $contenidoP = Contenido::get();
        
        $colorP = Color::get();
        $tubo_estadoP = TuboEstado::get();
        return view('tp2/ug0282-ug0314/ver_producto_tp2_ug0282_ug0314', ['producto' => $producto, 'tubo' => $tubo, 'contenidos' =>$contenidoP, 'colores' =>$colorP, 'tubos_estados' =>$tubo_estadoP ]);

        /*$id->load('tubo', 'color', 'contenido', 'tubo_estado');
        return view('tp2/ug0282-ug0314/ver_producto_tp2_ug0282_ug0314', ['producto'=>$id]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto$id)
    {

        $tubosP = Tubo::get();
        $contenidoP = Contenido::get();
        $colorP = Color::get();
        $tubo_estadoP = TuboEstado::get();

        return view('tp2/ug0282-ug0314/editar_producto_tp2_ug0282_ug0314',['productos' =>$id, 'tubos' =>$tubosP, 'contenidos' =>$contenidoP, 'colores' =>$colorP, 'tubos_estados' =>$tubo_estadoP ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $id)
    {
        $tubo = $request->get('tubo_id');
        $contenido = $request->get('contenido_id');
        $color = $request->get('color_id');
        $tubo_estado = $request->get('tubo_estado_id');
        $activo = $request->get('activo');


        

        $id->tubo_id = $tubo;
        $id->contenido_id = $contenido; 
        $id->color_id = $color;
        $id->tubo_estado_id = $tubo_estado; 
        $id->activo = $activo;

        $id->save();

        $request->session()->flash('mensaje', "La edición del compuesto $id->nombre fue exitoso");

        return redirect('/listado-producto-tp2-ug0282-ug0314/editar-producto/'. $id->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $id)
    {
        $request = request();
        //borrar un registro de la tabla a la que corresponda la entidad
        $id->delete();

        $request->session()->flash('mensaje', "El borrado del producto $id->id fue exitoso");

        return redirect('/listado-producto-tp2-ug0282-ug0314/');
    }
}
