
<h1 style="position: center">Agregar Colores</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif

<form action="/Colores/creacion" method="POST">
    @csrf
    <label>Nombre</label> <input style= "text-align: center" name="nombre" placeholder="Ingrese el color" required="required"><br>
    <label>Activo</label> <input name="activo"><br>
    <label>Codigo</label> <input style= "text-align: center"  name="codigo" placeholder="Ingrese codigo del color" required="required"><br>
    <input type="submit"> <br>
</form>
<a href="{{ route('raiz') }}" style="">Volver al inicio</a>
