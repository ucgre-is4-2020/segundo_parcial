<style type="text/css">
	#centro{
		border:3px solid green;
		width: 40%;
		
	}
</style>
<div id="centro">
<h1>Editar Estado {{$editar_tubo_estado->id}}</h1>

@if ($errors-> any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
		</ul>
	</div>
@endif

<form action="{{route('edicion_tubo_estado',['id'=>$editar_tubo_estado->id])}}" method="post">
	@method('PUT')
	@csrf
	<input type="hidden" name="id" value="{{$editar_tubo_estado->id}}"><br>
	<label>Nombre</label><input type="text" name="nombre" id="nombre" value="{{$editar_tubo_estado->nombre}}"><br>
	<p>Estado:
		<?php If ($editar_tubo_estado->activo == "1")
{
echo "Activo"; 
}else{
	echo "Inactivo";
}
?><br>
		<input type="radio" name="activo" id="activo" value="true">Activo
		<input type="radio" name="activo" id="activo" value="false">Inactivo
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
