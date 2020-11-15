<style type="text/css">
	#centro{
		border:3px solid green;
		width: 40%;
		
	}
</style>
<div id="centro">
<h1 style="color: green;">Crear UG0282</h1>

@if ($errors-> any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
		</ul>
	</div>
@endif

<form action="{{route('creacion_tubo_estado')}}" method="post">
	@csrf
	<label>Nombre</label> <input name="nombre"><br>
	<p>Activo:
		<input type="radio" name="activo" value="true">Activo
		<input type="radio" name="activo" value="false">Inactivo
	</p><br>

	<input type="submit"><br>

	
</form>
@if(session('error'))
<div>
	<h1>Error :(</h1>
	<p>{{session('error')}}</p>
</div>
@endif
<a href="{{route('listado_tubo_estado')}}">Ver Listado Completo</a>
</div>