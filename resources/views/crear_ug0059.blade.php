<h1> Crear Registro</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('creacion-contacto')}}" method="POST">
    @csrf
    <label> Nombre</label> <input name="nombre" required> <br><br>
    <p> Estado
    <input type= "radio" name="activo" value="true"> Verdadero 
    <input type= "radio" name="activo" value="false"> Falso 
    </p> 

    <input type = "submit"><br>

</form>

@if(session('error'))
    <div>
        <h1>Error</h1>
        <p>{{session('error')}}</p>
    </div>
@endif
<a href = "{{route ('listado_contacto_tipo')}}"> Listado de Contactos </a>