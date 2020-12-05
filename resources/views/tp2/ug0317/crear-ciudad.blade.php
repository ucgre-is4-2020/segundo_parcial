<h1> Creacion de Ciudad </h1>

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


<form action="{{route ('tp2-ug0317-creacion-ciudad') }}" method="POST">
	@csrf
		<td>
			<select id = "departamentos" name="departamentos">
				@foreach($departamentos->sortBy('id') as $undepartamento)
					<option value="<?php echo $undepartamento->id ?>"
					>{{ $undepartamento->nombre }}</option>
				@endforeach
			</select>
		</td>


	  <label for="nombre" name = "nombre" id="nombre">Nombre </label>
     <input type="text" name="nombre"><br> <br>

     <label for="abreviacion" name = "abreviacion" id="abreviacion">Abreviacion</label>
     <input type="text" name="abreviacion"><br><br>

	<input type="submit"><br>
</form>

<a href="{{ route ('tp2-ug0317-listado-ciudad') }}">Pagina de Listado de Ciudades </a>
