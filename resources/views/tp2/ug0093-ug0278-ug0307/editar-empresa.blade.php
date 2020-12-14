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

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{route('tp2-ug0093-ug0278-ug0307-edicion-empresa',['id' =>$empresa->id])}}" method="post">
    @method('PUT')
    
  @csrf 

    <label for="id" name ="id" id="id">Id</label>
    <input type="text" name = "id" value = "{{$empresa ->id}}" disabled = "disabled"><br> <br>

     <label for="razon social" name = "razon social" id="razon social">razon social</label>
     <input type="text" name="razon social" id="razon social"  value ="{{$empresa->razon_social}}"><br> <br>


     <label for="create" name = "create" >Creacion</label>
     <input type="text" name="create" id="create" value ="{{$empresa->created_at}}" disabled = "disabled"><br><br>

     <label for="update" name = "update" >Modificacion</label>
     <input type="text" name="update" id="update" value ="{{$empresa->updated_at}}" disabled = "disabled"><br><br>

     <input type="submit"><br>

  </form>

  

<br>

   <div class="links">
   
                    <a href="{{route('tp2-ug0093-ug0278-ug0307-listar-empresa')}}">Listar Empresas</a>
  
   </div>
   
   <br>

   @if(session('incorrecto'))
        <h1 style="color: red">Se produjeron los siguientes errores *</h1>
        <h3 style="color: red">{{session('incorrecto')}}</h3>
   @endif

    </body>
</html>
