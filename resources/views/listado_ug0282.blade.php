<style type="text/css">
#mensaje{
	color: green;
}	
#centro{
		border:3px solid green;
		width: 65%;
</style>

<div id="centro">
<h1 style="color: green;">Listado UG0282 tubo_estado</h1>
<form action="{{route('listado_tubo_estado')}}" method="get">
	@csrf
<a href="{{route('crear_tubo_estado')}}">Agregar Nuevo</a>
<div id="mensaje">
<h1>
{{session('mensaje')}}
</h1>
<h1>{{session('mensaje1')}}</h1>
</div>
<ul>
	@foreach($listado as $unestado)
	<li>
		<a href="{{route('borrar_tubo_estado',['id'=>$unestado->id])}}" onclick="return confirm('Desea borrar el registro?')">Borrar - </a>
		<a href="{{route('ver_tubo_estado',['id'=>$unestado->id])}}">Ver - </a>
		<a href="{{route('editar_tubo_estado',['id'=>$unestado->id])}}">Editar - </a>
		
		
		{{$unestado->nombre}} - 
		<?php If ($unestado->activo == "1"){
				echo "activo - "; 
				}else{
				echo "inactivo - ";
				}
		?>
		{{$unestado->created_at}} - 
		{{$unestado->updated_at}}
		
		</li>
		
	@endforeach
	<input name="buscarpor" type="search" placeholder="Buscar por nombre" aria-label="Search">
    <button type="submit">Buscar</button>
</ul>
</form>
<a href="{{route('raiz')}}">Volver a la página Principal</a><br>
<a href="{{route('listado_tubo_estado')}}">Ver Listado Completo</a>
</div>