<style type="text/css">
	#centro{
		border:3px solid green;
		width: 40%;
		
	}
</style>
<div id="centro">
<h1 style="color: green;">Crear UG0282</h1>

<form action="{{route('creacion_tubo_estado')}}" method="post">
	@csrf
	<label>Nombre</label> <input name="nombre"><br>
	<p>Estado:
		<input type="radio" name="activo" value="true">Verdadero
		<input type="radio" name="activo" value="false">Falso
	</p><br>

	<input type="submit"><br>

	
</form>
@if(session('error'))
<div>
	<h1>Error :(</h1>
	<p>{{session('error')}}</p>
</div>
@endif
<a href=/ug0282/public/listado_tubo_estado>Ver Listado</a>
</div>