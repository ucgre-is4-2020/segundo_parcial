<style type="text/css">
	#centro{
		border:3px solid green;
		width: 40%;
		
	}
</style>
<div id="centro">
<h1>Editar Estado {{$editar_tubo_estado->id}}</h1>

<form action="{{route('edicion_tubo_estado',['id'=>$editar_tubo_estado->id])}}" method="post">
	@method('PUT')
	@csrf
	<input type="hidden" name="id" value="{{$editar_tubo_estado->id}}"><br>
	<label>Nombre</label><input type="text" name="nombre" id="nombre" value="{{$editar_tubo_estado->nombre}}"><br>
	<p>Estado:
		<?php If ($editar_tubo_estado->activo == "1")
{
echo "Verdadero"; 
}else{
	echo "Falso";
}
?><br>
		<input type="radio" name="activo" id="activo" value="true">Verdadero
		<input type="radio" name="activo" id="activo" value="false">Falso
	</p><br>
	{{$editar_tubo_estado->created_at}}<br>
	{{$editar_tubo_estado->update_at}}
	

	<input type="submit"><br>
	
</form>
@if(session('error'))
<div>
	<h1>Error :(</h1>
	<p>{{session('error')}}</p>
</div>
@endif
<a href="{{route('listado_tubo_estado')}}">Volver al listado</a>
</div>
