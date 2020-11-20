<h1> Edición de Registros </h1>

@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session('mensaje'))
<div class="alert alert-success">
	<p> {{ session('mensaje') }} </p>
</div>
@endif

<form action="{{route ('edicion', ['id' => $editListado->id ]) }}" method="POST">
	@method('PUT')
	@csrf
	<input type="hidden" name ="id" value="{{$editListado->id }}"><br>
	<label>Nombre</label><input name="nombre" value="{{$editListado->nombre }}" ><br>
	<input type="submit"><br>
</form>

<a href="{{ route ('listado-ug0317') }}">Volver al Listado de Registros </a>
