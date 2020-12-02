<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class MediosDeContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request->query())){
            $mediosdecontactos= \App\MedioDeContacto::with(
                ['direccion_empresa', 'medio_de_contacto_tipo', 'contacto_persona_direccion_empresa'])->get();
        }else {
            //Filtrado por campo Valor de la tabla
            $cod = $request->get('buscar');
            if(!empty($cod)){
                $mediosdecontactos = \App\MedioDeContacto::with(
                                    ['direccion_empresa', 'medio_de_contacto_tipo',
                                     'contacto_persona_direccion_empresa'])
                                    ->whereRaw('upper(valor) like \'%'.strtoupper($cod).'%\'')
                                    ->get();
            }else {
                $mediosdecontactos = \App\MedioDeContacto::with(
                    ['direccion_empresa', 'medio_de_contacto_tipo',
                     'contacto_persona_direccion_empresa'])->get();
            }
            return
             view('tp2/ug0093-ug0278-ug0307/listado-medio-contacto',
                ['mediosdecontactos' => $mediosdecontactos, 'busqueda' => $cod]
            );
        }

        return view('tp2/ug0093-ug0278-ug0307/listado-medio-contacto', 
            ['mediosdecontactos' => $mediosdecontactos]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direccionesempresas = \App\DireccionEmpresa::get();
        $mediosdecontactostipos = \App\MedioContactoTipo::get();
        $contactospersonasdireccionesempresas = \App\ContactoPersonaDireccionEmpresa::
                                                with('persona_externa')
                                                ->get();
        return view('tp2/ug0093-ug0278-ug0307/crear-medio-contacto',
            ['direccionesempresas' => $direccionesempresas,
            'mediosdecontactostipos' => $mediosdecontactostipos,
            'contactospersonasdireccionesempresas' => $contactospersonasdireccionesempresas
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_medio_contacto = intval($request->input('tipo_medio_contacto'));
        $tipo_contacto = intval($request->input('tipo_contacto'));
        $valor = $request->input('valor');
        $observacion = $request->input('observacion');


        $nuevoMedioContacto = new \App\MedioDeContacto();
        $nuevoMedioContacto->medio_de_contacto_tipo_id = $tipo_medio_contacto;
        if($tipo_contacto == 1){//Guardo empresa
            $nuevoMedioContacto->direccion_empresa_id = intval($request->input('empresa_contacto'));
            $nuevoMedioContacto->contacto_persona_direccion_empresa_id = null;
        }else if($tipo_contacto == 2){//Guardo persona
            $nuevoMedioContacto->direccion_empresa_id = null;
            
            $nuevoMedioContacto
            ->contacto_persona_direccion_empresa_id = intval($request->input('persona_contacto'));
        }
        $nuevoMedioContacto->valor = $valor;
        $nuevoMedioContacto->observacion = $observacion;
        
        //Validacion
        $request->validate([
            //required, min=1, max=200 
            'valor' => 'required|min:1|max:200'
        ],
        [
            //valor
            'valor.required' => 'El Valor es requerido. Debe ingresar algún valor',
            'valor.min' => 'El Valor es muy corto. Debe ser como minimo 1 caracter',
            'valor.max' => 'El Valor es muy largo. No debe exceder 200 caracteres',
        ]);
        
        //Alertas
        try {
            $nuevoMedioContacto->save();
            session()->flash('exito', 'El registro fue guardado con éxito');
            
            return redirect()->route('tp2-ug0093-ug0278-ug0307-listado-medio-contacto');
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-crear-medio-contacto')->withInput()->with('error', $e->errorInfo[2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\MedioDeContacto $id)
    {
         return view('tp2/ug0093-ug0278-ug0307/ver-medio-contacto',
         ['mediodecontacto' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\MedioDeContacto $id)
    {
        $direccionesempresas = \App\DireccionEmpresa::get();
        $mediosdecontactostipos = \App\MedioContactoTipo::get();
        $contactospersonasdireccionesempresas = \App\ContactoPersonaDireccionEmpresa::
                                                with('persona_externa')
                                                ->get();
        return view('tp2/ug0093-ug0278-ug0307/editar-medio-contacto',
         [ 
            'mediodecontacto' => $id,
            'direccionesempresas' => $direccionesempresas,
            'mediosdecontactostipos' => $mediosdecontactostipos,
            'contactospersonasdireccionesempresas' => $contactospersonasdireccionesempresas
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\MedioDeContacto $id)
    {
        //Validacion
        $request->validate([
            //required, min=1, max=200 
            'valor' => 'required|min:1|max:200'
        ],
        [
            //valor
            'valor.required' => 'El Valor es requerido. Debe ingresar algún valor',
            'valor.min' => 'El Valor es muy corto. Debe ser como minimo 1 caracter',
            'valor.max' => 'El Valor es muy largo. No debe exceder 200 caracteres',
        ]);
        
        try {

            $tipo_contacto = intval($request->input('tipo_contacto'));
            $id->medio_de_contacto_tipo_id = intval($request->input('tipo_medio_contacto'));
            if($tipo_contacto == 1){//Guardo empresa
                $id->direccion_empresa_id = intval($request->input('empresa_contacto'));
                $id->contacto_persona_direccion_empresa_id = null;
            }else if($tipo_contacto == 2){//Guardo persona
                $id->direccion_empresa_id = null;
                
                $id
                ->contacto_persona_direccion_empresa_id = intval($request->input('persona_contacto'));
            }
            $id->valor = $request->input('valor');
            $id->observacion = $request->input('observacion');

            $id->save();
            session()->flash('exito', 'Los cambios fueron guardados con éxito');
            
            return redirect()->route('tp2-ug0093-ug0278-ug0307-editar-medio-contacto', ['id' => $id->id]);
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-editar-medio-contacto', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
        }
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function confirm(\App\MedioDeContacto $id)
    {
        return view('tp2/ug0093-ug0278-ug0307/borrar-medio-contacto', ['mediodecontacto' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\MedioDeContacto $id)
    {
        try{
            $id->delete();
            session()->flash('exito', 'Registro Borrado con éxito');

            return redirect()->route('tp2-ug0093-ug0278-ug0307-listado-medio-contacto');
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-confirmar-borrar-medio-contacto', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
