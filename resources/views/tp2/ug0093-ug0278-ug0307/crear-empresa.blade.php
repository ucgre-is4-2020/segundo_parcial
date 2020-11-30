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
  

  <h1>Crear Empresa</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  

  <form action="{{route('creacionEmpresa-ug0093-ug0278-ug0307')}}" method="post">
    
  @csrf 

     <label for="razon social" name = "razon social" id="razon social">razon social empresa</label>
     <input type="text" name="razon social"><br> <br>

     <input type="submit"><br>

  </form>

  

<br>

   <div class="links">
   
                    <a href="{{route('listarEmpresa-ug0093-ug0278-ug0307')}}">Listar Empresas</a>
  
   </div>
   
   <br>

   @if(session('incorrecto'))
        <h1 style="color: red">Se produjeron los siguientes errores *</h1>
        <h3 style="color: red">{{session('incorrecto')}}</h3>
   @endif

    </body>
</html>
