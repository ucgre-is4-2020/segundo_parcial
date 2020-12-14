<h1> Creacion de Barrios </h1>

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


<form action="{{route ('tp2-ug0317-creacion-barrio') }}" method="POST">
	@csrf
	<td>
			<select id = "ciudad" name="ciudad">
				@foreach($ciudad->sortBy('id') as $unaciudad)
					<option value="<?php echo $unaciudad->id ?>"
					>{{ $unaciudad->nombre }}</option>
				@endforeach
			</select>
		</td>

	<label>Nombre</label><input name="nombre"><br>
	<label>Codigo</label><input name="codigo"><br>
	<input type="submit"><br>
</form>

<a href="{{ route ('tp2-ug0317-listado-barrio') }}">Pagina de Listado de Barrios </a>
