<h1> Edición de Barrios </h1>

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

<form action="{{route ('tp2-ug0317-edicion-barrio', ['id' => $editListado->id ]) }}" method="POST">
	@method('PUT')
	@csrf
	<input type="hidden" name ="id" value="{{$editListado->id }}"><br>
	<select id = "ciudad" name="ciudad">
				@foreach($ciudad->sortBy('id') as $unaciudad)
					<option <?= $editListado->ciudad_id == $unaciudad->id ?'selected':'' ?> value="<?php echo $unaciudad->id ?>"
					>{{ $unaciudad->nombre }}</option>
				@endforeach
	</select><br>
	
	<label>Nombre</label><input name="nombre" value="{{$editListado->nombre }}" ><br>
	<label>Codigo</label><input name="codigo" value="{{$editListado->codigo }}" ><br>
	<input type="submit"><br>
</form>

<a href="{{ route ('tp2-ug0317-listado-barrio') }}">Volver al Listado de Barrios </a>
