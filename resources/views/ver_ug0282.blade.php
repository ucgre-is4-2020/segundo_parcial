<style type="text/css">
	#centro{
		border:3px solid green;
		width: 40%;
		
	}
</style>
<div id="centro">
<h1 style="color: green;">{{session('mensaje2')}}</h1>
<h1 style="color: green;">Registro {{$ver_tubo_estado->id}}</h1>
<div>
	{{$ver_tubo_estado->id}}<br>
	{{$ver_tubo_estado->nombre}}<br>
	{{$ver_tubo_estado->activo}}<br>
	{{$ver_tubo_estado->created_at}}<br>
	{{$ver_tubo_estado->updated_at}}<br>
</div>

<a href=/ug0282/public/listado_tubo_estado>Ver Listado</a>
</div>