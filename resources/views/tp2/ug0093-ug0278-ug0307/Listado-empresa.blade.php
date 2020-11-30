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
 <h1> Lista de Empresa </h1>

 <div class="links" style="display: inline-block; position: ">
   
                    <a href="{{route('welcome')}}">Pagina principal</a>
                    <a href="{{route('tp2-ug0093-ug0278-ug0307-crear-empresa')}}">Crear empresa</a>
                    
   </div>

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
  @foreach ($misEmpresas as $empresas)
 
 <tr>
 <td>
<a href="{{route('tp2-ug0093-ug0278-ug0307-ver-empresa',['id' => $empresas->id])}}">{{$empresas ->id}} </a>

<a href="{{route('tp2-ug0093-ug0278-ug0307-editar-empresa',['id' => $empresas->id])}}">Editar</a>

 <a href="{{route('tp2-ug0093-ug0278-ug0307-borrar-empresa',['id' => $empresas->id])}}" onclick="return confirm('Esta seguro?')">Borrar</a>
</td>
<td>{{$empresas->razon_social}}</td> <td>{{$empresas ->created_at}}</td> <td>{{$empresas ->updated_at}}</td>
 </tr>


@endforeach

</table>
  
   

    </body>
</html>
