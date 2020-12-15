<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;

class DireccionesEmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request->query())){
            $direccionesempresas= \App\DireccionEmpresa::with(
                ['direccion_empresa_tipo', 'barrio', 'empresa'])->get();
        }else {
            //Filtrado por campo Calle de la tabla
            $cod = $request->get('buscar');
            if(!empty($cod)){
                $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa'])
                                    ->whereRaw('upper(calle) like \'%'.strtoupper($cod).'%\'')
                                    ->get();
            }else {
                $direccionesempresas = \App\DireccionEmpresa::with(
                    ['direccion_empresa_tipo', 'barrio', 'empresa'])->get();
            }
            return
             view('tp2/ug0093-ug0278-ug0307/listado-direccion-empresa',
                ['direccionesempresas' => $direccionesempresas, 'busqueda' => $cod]
            );
        }

        return view('tp2/ug0093-ug0278-ug0307/listado-direccion-empresa', 
            ['direccionesempresas' => $direccionesempresas]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $empresas = \App\Empresa::get();
        $departamentos = \App\Departamentos::get();
        $cod = '';
        $empresa= '';
        $departamento = '';
        if(empty($request->query())){
            $direccionesempresas= \App\DireccionEmpresa::with(
                ['direccion_empresa_tipo', 'barrio', 'empresa', 'medios_de_contactos'])->orderBy('id')->paginate(10);
        }else {
            $cod = $request->get('buscar');
            $empresa = $request->get('empresa');
            $departamento = $request->get('departamento');
            if(!empty($cod)){

                if($empresa != 0) {
                    if($departamento != 0) {
                        //calle, empresa y departamento 
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa',
                                    'medios_de_contactos'])
                                    ->select('direccion_empresa.*')
                                    ->join('empresa','direccion_empresa.empresa_id','=','empresa.id')
                                    ->join('barrio','direccion_empresa.barrio_id','=','barrio.id')
                                    ->join('ciudad','barrio.ciudad_id','=','ciudad.id')
                                    ->join('departamento','ciudad.departamento_id','=','departamento.id')
                                    ->where('departamento.id',$departamento)
                                    ->where('empresa.id',$empresa)
                                    ->whereRaw('upper(calle) like \'%'.strtoupper($cod).'%\'')
                                    ->orderBy('direccion_empresa.id')->paginate(10);
                    }else {
                        //calle y empresa
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa',
                                    'medios_de_contactos'])
                                    ->select('direccion_empresa.*')
                                    ->join('empresa','direccion_empresa.empresa_id','=','empresa.id')
                                    ->where('empresa.id',$empresa)
                                    ->whereRaw('upper(calle) like \'%'.strtoupper($cod).'%\'')
                                    ->orderBy('direccion_empresa.id')->paginate(10);
                    }
                }else {
                    if($departamento != 0) {
                        //calle y departamento
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa',
                                    'medios_de_contactos'])
                                    ->select('direccion_empresa.*')
                                    ->join('barrio','direccion_empresa.barrio_id','=','barrio.id')
                                    ->join('ciudad','barrio.ciudad_id','=','ciudad.id')
                                    ->join('departamento','ciudad.departamento_id','=','departamento.id')
                                    ->where('departamento.id',$departamento)
                                    ->whereRaw('upper(calle) like \'%'.strtoupper($cod).'%\'')
                                    ->orderBy('direccion_empresa.id')->paginate(10);
                    }else {
                        //solo calle
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                            ['direccion_empresa_tipo', 'barrio', 'empresa',
                                            'medios_de_contactos'])
                                            ->select('direccion_empresa.*')
                                            ->whereRaw('upper(calle) like \'%'.strtoupper($cod).'%\'')
                                            ->orderBy('direccion_empresa.id')->paginate(10);
                    }
                }  
            }else {
                if($empresa != 0) {
                    if($departamento != 0){ 
                        //empresa y departamento
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa',
                                    'medios_de_contactos'])
                                    ->select('direccion_empresa.*')
                                    ->join('empresa','direccion_empresa.empresa_id','=','empresa.id')
                                    ->join('barrio','direccion_empresa.barrio_id','=','barrio.id')
                                    ->join('ciudad','barrio.ciudad_id','=','ciudad.id')
                                    ->join('departamento','ciudad.departamento_id','=','departamento.id')
                                    ->where('departamento.id',$departamento)
                                    ->where('empresa.id',$empresa)
                                    ->orderBy('direccion_empresa.id')->paginate(10);
                    }else {
                        //solo empresa
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa',
                                    'medios_de_contactos'])
                                    ->select('direccion_empresa.*')
                                    ->where('empresa_id',$empresa)
                                    ->orderBy('direccion_empresa.id')->paginate(10);
                    }
                }else {
                   if($departamento != 0){
                        //solo departamento
                        $direccionesempresas = \App\DireccionEmpresa::with(
                                    ['direccion_empresa_tipo', 'barrio', 'empresa',
                                    'medios_de_contactos'])
                                    ->select('direccion_empresa.*')
                                    ->join('barrio','direccion_empresa.barrio_id','=','barrio.id')
                                    ->join('ciudad','barrio.ciudad_id','=','ciudad.id')
                                    ->join('departamento','ciudad.departamento_id','=','departamento.id')
                                    ->where('departamento.id',$departamento)
                                    ->orderBy('direccion_empresa.id')->paginate(10);
                   }else {
                        //sin filtro
                        $direccionesempresas= \App\DireccionEmpresa::with(
                        ['direccion_empresa_tipo', 'barrio', 'empresa', 'medios_de_contactos'])->orderBy('id')->paginate(10);
                   }
                }
            }

            return
             view('tp3/ug0278/listado-direccion-empresa',
                ['direccionesempresas' => $direccionesempresas, 'empresas' => $empresas,
                'departamentos' => $departamentos, 'busqueda' => $cod, 'inp_empresa' => $empresa,
                'inp_departamento' => $departamento]
            );
        }

        return view('tp3/ug0278/listado-direccion-empresa', 
            ['direccionesempresas' => $direccionesempresas, 'empresas' => $empresas, 
            'departamentos' => $departamentos, 'busqueda' => $cod, 'inp_empresa' => $empresa,
                'inp_departamento' => $departamento]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = \App\Empresa::get();
        $barrios = \App\Barrio::get();
        $direccionestipos = \App\DireccionEmpresaTipo::get();
        return view('tp2/ug0093-ug0278-ug0307/crear-direccion-empresa',
            ['empresas' => $empresas,
            'barrios' => $barrios,
            'direccionestipos' => $direccionestipos
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
        $empresa = intval($request->input('empresa'));
        $barrio = intval($request->input('barrio'));
        $tipo_direccion = intval($request->input('tipo_direccion'));
        $calle = $request->input('calle');
        $numero = $request->input('numero');
        $latitud = $request->input('latitud');
        $longitud = $request->input('longitud');
        $es_casa_central = $request->input('es_casa_central')=='1'?true:false;
        $nombre_ubicacion = $request->input('nombre_ubicacion');
        $es_deposito = $request->input('es_deposito')=='1'?true:false;


        $nuevaDireccion = new \App\DireccionEmpresa();
        $nuevaDireccion->empresa_id = $empresa;
        $nuevaDireccion->barrio_id = $barrio;
        $nuevaDireccion->direccion_empresa_tipo_id = $tipo_direccion;
        $nuevaDireccion->calle = $calle;
        $nuevaDireccion->numero = $numero;
        $nuevaDireccion->latitud = $latitud;
        $nuevaDireccion->longitud = $longitud;
        $nuevaDireccion->es_casa_central = $es_casa_central;
        $nuevaDireccion->nombre_ubicacion = $nombre_ubicacion;
        $nuevaDireccion->es_deposito = $es_deposito;
        
        //Validacion
        $request->validate([
            //required, unique, min=1, max=500 
            'calle' => 'required|min:1|max:500',
            //required, min=1, max=20
            'numero' => 'required|min:1|max:20',
            //required, boolean
            'es_casa_central' => 'required|boolean',
            //required, min=1, max=200
            'nombre_ubicacion' => 'required|min:1|max:200',
            //required, boolean
            'es_deposito' => 'required|boolean'
        ],
        [
            //calle
            'calle.required' => 'La Calle es requerida. Debe ingresar algún valor',
            'calle.min' => 'La Calle es muy corta. Debe ser como minimo 1 caracter',
            'calle.max' => 'La Calle es muy larga. No debe exceder 500 caracteres',
            //numero
            'numero.required' => 'El Número es requerido. Debe ingresar algún valor',
            'numero.min' => 'El Número es muy corto. Debe ser como minimo 1 caracter',
            'numero.max' => 'El Número es muy largo. No debe exceder 20 caracteres',
            //Es casa central
            'es_casa_central.required' => 'Es Casa Central es requerido. Debe ingresar algún valor',
            'es_casa_central.boolean' => 'Es Casa Central es inválido. Debe ingresar 1 (Activo) o 0 (Inactivo)',
            //nombre ubicacion
            'nombre_ubicacion.required' => 'El Nombre de ubicación es requerido. Debe ingresar algún valor',
            'nombre_ubicacion.min' => 'El Nombre de ubicación es muy corto. Debe ser como minimo 1 caracter',
            'nombre_ubicacion.max' => 'El Nombre de ubicación es muy largo. No debe exceder 200 caracteres',
            //Es deposito
            'es_deposito.required' => 'Es Depósito es requerido. Debe ingresar algún valor',
            'es_deposito.boolean' => 'Es Depósito es inválido. Debe ingresar 1 (Activo) o 0 (Inactivo)',
        ]);
        
        //Alertas
        try {
            $nuevaDireccion->save();
            session()->flash('exito', 'El registro fue guardado con éxito');
            
            return redirect()->route('tp2-ug0093-ug0278-ug0307-listado-direccion-empresa');
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-crear-direccion-empresa')->withInput()->with('error', $e->errorInfo[2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\DireccionEmpresa $id)
    {
        return view('tp2/ug0093-ug0278-ug0307/ver-direccion-empresa',
         ['direccionempresa' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\DireccionEmpresa $id)
    {
        $empresas = \App\Empresa::get();
        $barrios = \App\Barrio::get();
        $direccionestipos = \App\DireccionEmpresaTipo::get();
        return view('tp2/ug0093-ug0278-ug0307/editar-direccion-empresa',
         [  'direccionempresa' => $id,
            'empresas' => $empresas,
            'barrios' => $barrios,
            'direccionestipos' => $direccionestipos
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\DireccionEmpresa $id)
    {
       //Validación
        $request->validate([
            //required, unique, min=1, max=500 
            'calle' => 'required|min:1|max:500',
            //required, min=1, max=20
            'numero' => 'required|min:1|max:20',
            //required, boolean
            'es_casa_central' => 'required|boolean',
            //required, min=1, max=200
            'nombre_ubicacion' => 'required|min:1|max:200',
            //required, boolean
            'es_deposito' => 'required|boolean'
        ],
        [
            //calle
            'calle.required' => 'La Calle es requerida. Debe ingresar algún valor',
            'calle.min' => 'La Calle es muy corta. Debe ser como minimo 1 caracter',
            'calle.max' => 'La Calle es muy larga. No debe exceder 500 caracteres',
            //numero
            'numero.required' => 'El Número es requerido. Debe ingresar algún valor',
            'numero.min' => 'El Número es muy corto. Debe ser como minimo 1 caracter',
            'numero.max' => 'El Número es muy largo. No debe exceder 20 caracteres',
            //Es casa central
            'es_casa_central.required' => 'Es Casa Central es requerido. Debe ingresar algún valor',
            'es_casa_central.boolean' => 'Es Casa Central es inválido. Debe ingresar 1 (Activo) o 0 (Inactivo)',
            //nombre ubicacion
            'nombre_ubicacion.required' => 'El Nombre de ubicación es requerido. Debe ingresar algún valor',
            'nombre_ubicacion.min' => 'El Nombre de ubicación es muy corto. Debe ser como minimo 1 caracter',
            'nombre_ubicacion.max' => 'El Nombre de ubicación es muy largo. No debe exceder 200 caracteres',
            //Es deposito
            'es_deposito.required' => 'Es Depósito es requerido. Debe ingresar algún valor',
            'es_deposito.boolean' => 'Es Depósito es inválido. Debe ingresar 1 (Activo) o 0 (Inactivo)',
        ]);

        //Alertas
        try {

            $id->empresa_id =  intval($request->input('empresa'));
            $id->barrio_id = intval($request->input('barrio'));
            $id->direccion_empresa_tipo_id = intval($request->input('tipo_direccion'));
            $id->calle = $request->input('calle');
            $id->numero = $request->input('numero');
            $id->latitud = $request->input('latitud');
            $id->longitud = $request->input('longitud');
            $id->es_casa_central = $request->input('es_casa_central')=='1'?true:false;
            $id->nombre_ubicacion = $request->input('nombre_ubicacion');
            $id->es_deposito = $request->input('es_deposito')=='1'?true:false;

            $id->save();
            session()->flash('exito', 'Los cambios fueron guardados con éxito');
            
            return redirect()->route('tp2-ug0093-ug0278-ug0307-editar-direccion-empresa', ['id' => $id->id]);
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-editar-direccion-empresa', ['id' => $id->id])->withInput()->with('error', $e->errorInfo[2]);
        }
    }

    /**
     * Confirmacion de Borrado de Registro.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(\App\DireccionEmpresa $id)
    {
        return view('tp2/ug0093-ug0278-ug0307/borrar-direccion-empresa', ['direccionempresa' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\DireccionEmpresa $id)
    {
        try{
            $id->delete();
            session()->flash('exito', 'Registro Borrado con éxito');

            return redirect()->route('tp2-ug0093-ug0278-ug0307-listado-direccion-empresa');
        }catch (QueryException $e){
            return redirect()->route('tp2-ug0093-ug0278-ug0307-confirmar-borrar-direccion-empresa', ['id' => $id->id])->with('error', $e->errorInfo[2]);
        }
    }
}
