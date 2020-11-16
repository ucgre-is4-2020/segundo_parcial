<HTML>
<HEAD>
<style type="text/css" media="screen">
    div {
    border: 1px solid;
    width: 500px;
    height: 450px;
    background-position: center;
    text-underline-position: center;
    }
</style>
</HEAD>
<BODY>
<CENTER>
<h1>Agregar Colores</h1>
</CENTER>
<HR>
<div>
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
    <label>Nombre:</label> <input style= "text-align: center" name="nombre" placeholder="Ingrese el color" required="required"><br>
    <br>
       <input type="checkbox" value="true" name="activo" placeholder="Ingrese codigo del color" >Inactivo
    <input type="checkbox" value="false" name="activo" placeholder="Ingrese codigo del color" >Activo<br>
    <br>
    <label>Codigo:</label> <input style= "text-align: center"  name="codigo" placeholder="Ingrese codigo del color" required="required"><br>
    <br>


    <input type="submit"> <br>
</form>
<a href="{{ route('raiz') }}" style="">Volver al inicio</a>
</div>
</BODY>
</HTML>




