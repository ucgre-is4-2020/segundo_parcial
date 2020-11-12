<h1> Crear Registro</h1>

<form action="{{route('creacion-documento')}}" method="POST">
    @csrf
    <label> Nombre</label> <input name="nombre"> <br><br>
    <label> Abreviacion</label> <input name="abreviacion"> <br><br>
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
<a href = "{{route ('listado_documento_tipo')}}"> Listado de Documentos </a>