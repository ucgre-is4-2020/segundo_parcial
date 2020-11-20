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
            label{
              width: 200px;
              display: inline-block;
            }
	  </style>
    </head>
    <body>
  

  <h1>Crear Departamento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  

  <form action="{{route('creacion-departamento')}}" method="post">
    
  @csrf 

     <label for="nombre" name = "nombre" id="nombre">Nombre Departamento</label>
     <input type="text" name="nombre"><br> <br>

     <label for="abreviacion" name = "abreviacion" id="abreviacion">Abreviacion</label>
     <input type="text" name="abreviacion"><br><br>

     <input type="submit"><br>

  </form>

  

<br>

   <div class="links">
   
                    <a href="{{route('listar-ug0307')}}">Listar Departamentos</a>
  
   </div>
   
   <br>

   @if(session('incorrecto'))
        <h1 style="color: red">Se produjeron los siguientes errores *</h1>
        <h3 style="color: red">{{session('incorrecto')}}</h3>
   @endif

    </body>
</html>
