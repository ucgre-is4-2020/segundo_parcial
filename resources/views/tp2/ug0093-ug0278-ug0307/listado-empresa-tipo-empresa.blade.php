<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <style>
	   .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
	  </style>
    </head>
    <body>
 <h1> Lista de Empresas-tipo-empresa </h1>

<div class="links" style="display: inline-block; position: ">
<a href="{{route('welcome')}}">Pagina principal</a>

 <a href="{{route('tp2-ug0093-ug0278-ug0307-crear-empresatipoempresa')}}">Crear-empresa tipo empresa</a> 
  </div>
<!-- 
   
                    <a href="{{route('welcome')}}">Pagina principal</a>
                    
                    
  -->



<form style="display: inline-block;">
  
  
  <input type="search" placeholder="buscar" name="buscarpor">
  <button type="submit">buscar</button>

</form>

   @if(session('correcto'))
        <h3 style="color: gray">{{session('correcto')}}</h3>
   @endif

  
   @if(session('incorrecto'))
        <h1 style="color: red">Se produjeron los siguientes errores *</h1>
        <h3 style="color: red">{{session('incorrecto')}}</h3>
   @endif

<table border="1" style="margin-top: 20px;">
  <tr>
    

  </tr>
  @foreach ($misempresaTipoEmpresa as $empresaTipoEmpresa)
 
<!-- <tr>
   <td><a href="{{route('ver-ug0307',['id' => $empresaTipoEmpresa->id])}}">{{$empresaTipoEmpresa ->id}} </a>
<a href="{{route('editar-ug0307',['id' => $empresaTipoEmpresa->id])}}">Editar</a>
  <a href="{{route('borrar-ug0307',['id' => $empresaTipoEmpresa->id])}}" onclick="return confirm('Esta seguro?')">Borrar</a></td><td>{{$empresaTipoEmpresa ->nombre}}</td> <td>{{$empresaTipoEmpresa ->abreviacion}}</td> <td>{{$empresaTipoEmpresa ->created_at}}</td> <td>{{$empresaTipoEmpresa ->updated_at}}</td>
 </tr>-->

 <tr>
    <td>

<a href="{{route('tp2-ug0093-ug0278-ug0307-ver-empresatipoempresa',['id' => $empresaTipoEmpresa->id])}}">{{$empresaTipoEmpresa ->id}} </a>

<a href="{{route('tp2-ug0093-ug0278-ug0307-editar-empresatipoempresa',['id' => $empresaTipoEmpresa->id])}}">Editar</a>

<a href="{{route('tp2-ug0093-ug0278-ug0307-borrar-empresatipoempresa',['id' => $empresaTipoEmpresa->id])}}" onclick="return confirm('Esta seguro?')">Borrar</a>

    </td>

     <td>{{$empresaTipoEmpresa->EmpresaTipo->nombre}}</td> 

     <td>{{$empresaTipoEmpresa->Empresa->razon_social}} </td> 

      <td>

         {{

        $empresaTipoEmpresa ->activo?"activo":"No activo"
    
       }}
    </td>

    <td>{{$empresaTipoEmpresa->created_at}}</td> <td>{{$empresaTipoEmpresa ->updated_at}}</td>

 </tr>


@endforeach

</table>
  
   

    </body>
</html>
