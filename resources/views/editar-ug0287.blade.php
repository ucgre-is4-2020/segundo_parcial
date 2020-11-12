

<h1> Editar Factura </h1>

<form action="/ug0287/creacion" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$factura ->id}}"><br>
    <label>Nombre</label> <input name="nombre"value="{{$factura ->nombre}}"><br>
    <label>Codigo</label> <input name="codigo"value="{{$factura ->codigo}}"><br>
    <input type="submit"><br>
</form>

<a href="{{ route('listado-ug0287') }}">Volver al listado </a>

s
