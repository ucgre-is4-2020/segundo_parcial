<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

       public function mostrar(\App\Empresa $id)
    {
        
        $id->load('direcciones_empresas');
        
        return view('/tp3/ug0307/ver-empresa',['empresa'=>$id]);

    }



 public function index_2(Request $request)
    {
        


        $documento_tipo = \App\Documento_tipo::get();

        $empresa = \App\Empresa::with(['empresa_tipo_empresa','direcciones_empresas','empresa_documento'])->orderBy('id')->paginate(10);



        $busqueda = $request ->get('filtro1');


        if($busqueda !=0){

            $empresa = \App\Empresa::with(['empresa_tipo_empresa','direcciones_empresas','empresa_documento'])
            ->select ('empresa.*')
            ->join ('empresa_documento','empresa.id','=','empresa_documento.empresa_id')
            ->join ('documento_tipo','empresa_documento.documento_tipo_id','=','documento_tipo.id')
            ->where('documento_tipo.id',$busqueda)
            ->orderBy('empresa.id')->distinct()->paginate(10);

        }


       /* $buscar = $request->get('buscarpor');

        $tipo = 'razon_social';
   $empresas2 = \App\Empresa::buscarpor($tipo, $buscar)->paginate(100);

      */  

       // $ordenado = $empresa->sortBy('id');


     

        return view('/tp3/ug0307/Listado_empresa_ug0307',['misEmpresas'=>$empresa,'doc_tipo' =>$documento_tipo,'buscar'=>$busqueda]);

      


    }



    
    public function index(Request $request)
    {
        
        $empresas = \App\Empresa::get();


        $buscar = $request->get('buscarpor');

        $tipo = 'razon_social';

        $empresas2 = \App\Empresa::buscarpor($tipo, $buscar)->paginate(100);

        

        $ordenado = $empresas2->sortBy('id');


        return view('\tp2\ug0093-ug0278-ug0307\Listado-empresa',['misEmpresas'=>$ordenado->values()->all()]);

        


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('\tp2\ug0093-ug0278-ug0307\crear-empresa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validateData = $request->validate(

            [

                'razon_social' => 'required|max:200|unique:empresa|min:1',

            ],
            [

                'razon_social.required'=> 'El campo razon_social es obligatorio',
                
                'razon_social.max'=> 'El razon_social no puede superar los 200 caracteres',
                'razon_social.unique'=> 'Este valor para razon social ya existe',
                'razon_social.min'=> 'razon_social  debe tener al menos 1 caracteres',

            ]

        );


        $razon_social = $request->input('razon_social');


       // $departamentos = \App\Departamentos();

        $nuevaEmpresa = new \App\Empresa();
        $nuevaEmpresa->razon_social = $razon_social;

        try{
             $nuevaEmpresa->save();
             session()->flash('Correcto','Nueva empresa guardado');
             return redirect()->route('tp2-ug0093-ug0278-ug0307-listar-empresa');
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-crear-empresa')->with('incorrecto',$e->errorInfo[2]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Empresa $id)
    {
        
        return view('\tp2\ug0093-ug0278-ug0307\ver-empresa',['empresa'=>$id]);

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Empresa $id)
    {
        //

        return view ('\tp2\ug0093-ug0278-ug0307\editar-empresa',['empresa' =>$id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Empresa $id)
    {

         $validateData = $request->validate(

           [

                'razon_social' => 'required|max:200|unique:empresa|min:1',

            ],
            [

                'razon_social.required'=> 'El campo razon_social es obligatorio',
                
                'razon_social.max'=> 'El razon_social no puede superar los 200 caracteres',
                'razon_social.unique'=> 'Este valor para razon social ya existe',
                'razon_social.min'=> 'razon_social  debe tener al menos 1 caracteres',

            ]

        );


    

         $razon_social = $request->input('razon_social');

        $id->razon_social =$razon_social;




        

        try{
             $id->save();
             session()->flash('Correcto','Edicion de registro exitosa');
              return redirect('/tp2/ug0093-ug0278-ug0307/ver-empresa/'.$id->id);
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-editar-empresa/',['id' => $id->id])->with('incorrecto',$e->errorInfo[2]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Empresa $id)
    {
        

        //dd($id);

         try{
             $id->delete();
             session()->flash('correcto','Registiro eliminado de forma exitosa');
             return redirect('/tp2/ug0093-ug0278-ug0307/listar-empresa');
        }catch (QueryException $e){
            return redirect('/tp2/ug0093-ug0278-ug0307/listar-empresa')->with('incorrecto',$e->errorInfo[2]);
        }
        


    }
}
