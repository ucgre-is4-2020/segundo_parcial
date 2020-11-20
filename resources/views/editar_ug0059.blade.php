<h1> Editar Registro</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('edicion', ['id'=>$editar_contacto_tipo->id])}}" method ="POST">
    @method ('PUT')
    @csrf
   <input type=hidden name="id" value ="{{$editar_contacto_tipo->id}}"> <br><br>
    <label> Nombre</label> <input name="nombre" value ="{{$editar_contacto_tipo->nombre}}" requerid > <br><br>
    <p> Estado
        <?php
            if ($editar_contacto_tipo->activo=="1"){
                echo "Verdadero";
            }else{
                echo "Falso";
            }
        ?><br>
    <input type= "radio" name="activo" id="activo" value ="true" > Verdadero 
    <input type= "radio" name="activo" id="activo" value ="false"> Falso 
    </p> <br>
    {{$editar_contacto_tipo->created_at}}<br>
    {{$editar_contacto_tipo->update_at}}


    <input type = "submit"><br>

</form>
@if(session('error'))
    <div>
        <h1>Error</h1>
        <p>{{session('error')}}</p>
    </div>
@endif
<a href = "{{route ('listado_contacto_tipo')}}"> Listado de Contactos </a>