<h1> Editar Registro</h1>

<form action="{{route('edicion', ['id'=>$editar_documento_tipo->id])}}" method ="POST">
    @method ('PUT')

    @csrf
   <input type=hidden name="id" value ="{{$editar_documento_tipo->id}}"> <br><br>
    <label> Nombre</label> <input name="nombre" value ="{{$editar_documento_tipo->nombre}}"> <br><br>
    <label> Abreviacion</label> <input name="abreviacion" value ="{{$editar_documento_tipo->abreviacion}}"> <br><br>
    <p> Estado
        <?php
            if ($editar_documento_tipo->activo=="1"){
                echo "Verdadero";
            }else{
                echo "Falso";
            }
        ?><br>
    <input type= "radio" name="activo" id="activo" value ="true" > Verdadero 
    <input type= "radio" name="activo" id="activo" value ="false"> Falso 
    </p> <br>
    {{$editar_documento_tipo->created_at}}<br>
    {{$editar_documento_tipo->update_at}}


    <input type = "submit"><br>

</form>
@if(session('error'))
    <div>
        <h1>Error</h1>
        <p>{{session('error')}}</p>
    </div>
@endif
<a href = "{{route ('listado_documento_tipo')}}"> Listado de Documentos </a>