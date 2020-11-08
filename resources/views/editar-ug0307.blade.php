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


  <h1>Editar Departamento</h1>

  <form action="{{route('edicion',['id' =>$departamento->id])}}" method="post">
    @method('PUT')
    
  @csrf 

    <label for="id" name ="id" id="id">Id</label>
    <input type="text" name = "id" value = "{{$departamento ->id}}" disabled = "disabled"><br> <br>

     <label for="nombre" name = "nombre" id="nombre">Nombre Departamento</label>
     <input type="text" name="nombre" id="nombre"  value ="{{$departamento->nombre}}"><br> <br>

     <label for="abreviacion" name = "abreviacion" >Abreviacion</label>
     <input type="text" name="abreviacion" id="abreviacion" value ="{{$departamento->abreviacion}}"><br><br>

     <label for="create" name = "create" >Creacion</label>
     <input type="text" name="create" id="create" value ="{{$departamento->created_at}}" disabled = "disabled"><br><br>

     <label for="update" name = "update" >Modificacion</label>
     <input type="text" name="update" id="update" value ="{{$departamento->updated_at}}" disabled = "disabled"><br><br>

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
