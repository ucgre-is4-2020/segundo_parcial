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
 <h1> Lista de Empresas </h1>

<div class="links" style="display: inline-block; position: ">
<a href="{{route('welcome')}}">Pagina principal</a>
  </div>
<!-- 
   
                    <a href="{{route('welcome')}}">Pagina principal</a>
                    
                    
  -->



<form style="display: inline-block;">
  
  
 


  <select name="filtro1" id="filtro1">
    
    <option value="0" >Seleccionar filtro</option>


  @foreach ($doc_tipo as $documentotipo)

<option value="{{$documentotipo -> id}}" <?= ($buscar==0)?(''):($buscar == $documentotipo->id?'selected':'')?> >{{$documentotipo->nombre}}</option>

 @endforeach


  </select> 

 

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
   <td>id</td>
   <td>Razon social</td>
   <td>Tipo empresa - Nombre</td>
   <td>Documento Numero</td>
   <td>Documento tipo</td>
   <td>Dir. E. Cantidad</td>
 </tr>

  @foreach ($misEmpresas as $empresas)
 



 <tr>

<td>
  
  <a href="{{route('tp3-ug0307-ver-empresa',['id' => $empresas->id])}}">{{$empresas ->id}}</a>

</td>


<td>
  
  <span>{{$empresas->razon_social}}</span>

</td>

<td>
  
  @foreach ( $empresas -> empresa_tipo_empresa as $tipo)

    <li> {{$tipo->EmpresaTipo->nombre}}</li>

  @endforeach

</td>


<td>
  

   @foreach ( $empresas -> empresa_documento as $documento)

    <li> {{$documento -> numero}}</li>

  @endforeach


</td>

<td>
  
  @foreach ( $empresas -> empresa_documento as $documento_tipo)

    <li> {{$documento_tipo->Documento_tipo->nombre}}</li>

  @endforeach

</td>

<td>
  
    <span>{{$empresas->direcciones_empresas->count()}}</span>

</td>


 </tr>



@endforeach

</table>
  
   {{$misEmpresas->appends(['filtro1'=>$buscar])->links()}}

    </body>
</html>
