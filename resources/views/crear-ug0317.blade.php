<h1> Creacion de Registros </h1>

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


<form action="{{route ('creacion-ug0317') }}" method="POST">
	@csrf
	<label>Nombre</label><input name="nombre"><br>
	<input type="submit"><br>
</form>

<a href="{{ route ('listado-ug0317') }}">Pagina de Listado de Registros </a>
