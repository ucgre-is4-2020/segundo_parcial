<h1> Edición de Registros </h1>

<form action="{{route ('edicion', ['id' => $editListado->id ]) }}" method="POST">
	@method('PUT')
	@csrf
	<input type="hidden" name ="id" value="{{$editListado->id }}"><br>
	<label>Nombre</label><input name="nombre" value="{{$editListado->nombre }}"><br>
	<input type="submit"><br>
</form>

<a href="{{ route ('listado-ug0317') }}">Volver al Listado de Registros </a>
