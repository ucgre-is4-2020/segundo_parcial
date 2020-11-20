
<h1 style="position: center">Editar Colores</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<form action="{{ route('edicion', ['id' => $Colores->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{$Colores->id}}"><br>
    <label>Codigo</label><input style= "text-align: center" name="codigo" value="{{$Colores->id}}" readonly onmousedown="return false"><br>
    <label>Nombre</label> <input style= "text-align: center" name="nombre" value="{{$Colores->nombre}}" placeholder="Ingrese el color" required="required"><br>
    <label>Activo</label> <input name="activo" value="{{$Colores->activo}}"><br>
    <label>Codigo</label> <input style= "text-align: center"  value="{{$Colores->codigo}}" name="codigo" placeholder="Ingrese codigo del color" required="required"><br>
    <input type="submit"> <br>
</form>
<a href="{{ route('Listado-Ug0093') }}" style="">Volver al Listado</a>

