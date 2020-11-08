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
 <h1> Lista de productos </h1>

 <div class="links" style="display: inline-block;">
   
                    <a href="{{route('welcome')}}">Pagina principal</a>
                     <a href="{{route('crear-ug0307')}}">Crear-ucg0307</a> 
                    
   </div>

   @if(session('correcto'))
        <h3 style="color: gray">{{session('correcto')}}</h3>
   @endif

  
   @if(session('incorrecto'))
        <h1 style="color: red">Se produjeron los siguientes errores *</h1>
        <h3 style="color: red">{{session('incorrecto')}}</h3>
   @endif



<form style="display: inline-block;">
    <select name="tipo" id="tipo" style="display: inline-block;">
    <option disabled="disabled">Buscar por</option>
    <option>nombre</option>
    <option>abreviacion</option>
  </select>
  
  <input type="search" placeholder="buscar" name="buscarpor">
  <button type="submit">buscar</button>

</form>
  
  <br><br>

  @foreach ($misDepartamentos as $departamentos)

<a href="{{route('ver-ug0307',['id' => $departamentos->id])}}">{{$departamentos ->id}} </a>
<a href="{{route('editar-ug0307',['id' => $departamentos->id])}}">Editar</a>
  <a href="{{route('borrar-ug0307',['id' => $departamentos->id])}}" onclick="return confirm('Esta seguro?')">Borrar</a>



  - {{$departamentos ->nombre}} - {{$departamentos ->abreviacion}}
  
<br>


@endforeach


  
   

    </body>
</html>
