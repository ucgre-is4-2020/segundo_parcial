<h1> Edición de Ciudad </h1>

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

<form action="{{route ('tp2-ug0317-edicion-ciudad', ['id' => $editListado->id ]) }}" method="POST">
	@method('PUT')
	@csrf
	<input type="hidden" name ="id" value="{{$editListado->id }}"><br>
	<select id = "departamentos" name="departamentos">
				@foreach($departamento->sortBy('id') as $undepartamento)
					<option <?= $editListado->departamento_id == $undepartamento->id ?'selected':'' ?> value="<?php echo $undepartamento->id ?>"
					>{{ $undepartamento->nombre }}</option>
				@endforeach
	</select><br>
	

	<label>Nombre</label><input name="nombre" value="{{$editListado->nombre }}" ><br>
	<label>Abreviacion</label><input name="abreviacion" value="{{$editListado->abreviacion }}" ><br>
	<input type="submit"><br>

</form>

<a href="{{ route ('tp2-ug0317-listado-ciudad') }}">Volver al Listado de Ciudad </a>
