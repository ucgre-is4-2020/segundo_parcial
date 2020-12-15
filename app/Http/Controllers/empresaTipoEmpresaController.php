<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class empresaTipoEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
  



            $empresaTipoEmpresa = \App\EmpresaTipoEmpresa::with(['EmpresaTipo','Empresa'])->get();


//-----------------------------------------------------------------------------------------------------------

             $buscar = $request->get('buscarpor');

        $tipo = 'nombre';

        $empresaTipoEmpresa2 = \App\EmpresaTipoEmpresa::buscarpor($tipo, $buscar)->paginate(100);

        

        $ordenado = $empresaTipoEmpresa2->sortBy('id');


     

//-----------------------------------------------------------------------------------------------------------


          $ordenado = $empresaTipoEmpresa->sortBy('id');



        return view('\tp2\ug0093-ug0278-ug0307\listado-empresa-tipo-empresa',['misempresaTipoEmpresa'=>$ordenado->values()->all()]);

        
       

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    $empresa_tipo = \App\EmpresaTipo::get();
    $empresa = \App\Empresa::get();

        return view ('\tp2\ug0093-ug0278-ug0307\crear-empresa-tipo-empresa',['tEmpresa' => $empresa_tipo,'Empresa' => $empresa]);
        //return view ('crear-empresa-tipo-empresa',['Empresa' => $empresa]);
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

                'empresa_tipo_id' => 'required',
                "empresa_id" => 'required',
                "activo" => 'required'

            ],
            [

                'empresa_tipo_id.required'=> 'El campo empresa tipo es obligatorio',



                'empresa_id.required'=> 'El campo empresa es obligatorio',



                'activo.required'=> 'El campo activo es obligatorio',
  

            ]

        );


        $empresa_tipo_id = $request->input('empresa_tipo_id');
        $empresa_id = $request->input('empresa_id');
        $activo  = $request->input('activo');


       // $departamentos = \App\Departamentos();

        $nuevoEmpresaTipoEmpresa = new \App\EmpresaTipoEmpresa();
        $nuevoEmpresaTipoEmpresa->empresa_tipo_id = $empresa_tipo_id;
        $nuevoEmpresaTipoEmpresa->empresa_id = $empresa_id;
        $nuevoEmpresaTipoEmpresa->activo = $activo;

        try{
             $nuevoEmpresaTipoEmpresa->save();
             session()->flash('Correcto','Nuevo Empresa-Tipo-Empresa guardado');
             return redirect()->route('tp2-ug0093-ug0278-ug0307-listar-empresatipoempresa');
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-crear-empresatipoempresa')->with('incorrecto',$e->errorInfo[2]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\EmpresaTipoEmpresa $id)
    {
      //  $empresaTipoEmpresa = \App\EmpresaTipoEmpresa::with(['EmpresaTipo','Empresa'])->get();

       return view('\tp2\ug0093-ug0278-ug0307\ver-empresa-tipo-empresa',['empresa_tipo_empresa'=>$id]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\EmpresaTipoEmpresa $id)
    {
        //


            $empresa_tipo = \App\EmpresaTipo::get();
    $empresa = \App\Empresa::get();



        return view ('\tp2\ug0093-ug0278-ug0307\editar-empresa-tipo-empresa',['tEmpresa' => $empresa_tipo,'Empresa' => $empresa, 'seleccionada'=>$id]);


           
      //  return view ('\tp2\ug0093-ug0278-ug0307\editar-empresa-tipo-empresa',['empresa_tipo_empresa' =>$id]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\EmpresaTipoEmpresa $id)
    {

        $validateData = $request->validate(

            [

                'empresa_tipo_id' => 'required',
                "empresa_id" => 'required',
                "activo" => 'required'

            ],
            [

                'empresa_tipo_id.required'=> 'El campo empresa tipo es obligatorio',



                'empresa_id.required'=> 'El campo empresa es obligatorio',



                'activo.required'=> 'El campo activo es obligatorio',
  

            ]

        );

        $empresa_tipo_id = $request->input('empresa_tipo_id');
        $empresa_id = $request->input('empresa_id');
        $activo  = $request->input('activo');



        $id->empresa_tipo_id =$empresa_tipo_id;
        $id->empresa_id =$empresa_id;
        $id->activo =$activo;

        

        try{
             $id->save();
             session()->flash('Correcto','Edicion de registro exitosa');
              return redirect('/tp2/ug0093-ug0278-ug0307/ver-empresa-tipo-empresa/'.$id->id);
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-editar-empresatipoempresa',['id' => $id->id])->with('incorrecto',$e->errorInfo[2]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\EmpresaTipoEmpresa $id)
    {
        

        //dd($id);

         try{
             $id->delete();
             session()->flash('correcto','Registiro eliminado de forma exitosa');
             return redirect('/tp2/ug0093-ug0278-ug0307/listado-empresa-tipo-empresa');
        }catch (QueryException $e){
            return redirect('/tp2/ug0093-ug0278-ug0307/listado-empresa-tipo-empresa')->with('incorrecto',$e->errorInfo[2]);
        }
        


    }
}
