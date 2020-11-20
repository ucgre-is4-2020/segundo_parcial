<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Empresas</title>
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
	</script>
	<style type="text/css">
		
	</style>

</head>
<body>
	@if($flash = Session::get('exito'))
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    <h2>{{ $flash }}</h2>
		  </div>  
		</div>
	@endif

	<h1>Listado de Empresas</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Activo</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($empresatipo->sortBy('id') as $empre)
		<tr>
			<td><a href="{{ route('ver-ug0299', ['id' => $empre->id]) }}"
			 title="Mostrar datos de la Empresa">{{ $empre->id }}</a></td>
			<td>{{ $empre->nombre }}</td>
			@if ($empre->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $empre->created_at }}</td>
			<td>{{ $empre->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editar-ug0299', ['id' => $empre->id]) }}"
				title="Editar Registro"><img src="../resources/imagenes/editarregistro.png" height= "30px" width= "30px"></a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrar-ug0299', ['id' => $empre->id]) }}"
				title="Borrar Registro" title="Borrar Registro"><img src="../resources/imagenes/borrarregistro.png" height= "30px" width= "30px"></a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio"><img src="../resources/imagenes/inicio.png" height= "50px" width= "50px"></a>
	        <a href="{{ route('crear-ug0299') }}" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></a>
	
	<br><br>
		<form action="listado-empresa" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por nombre." value="{{ empty($busqueda)?'':$busqueda }}">
				
				
		<button  type="submit" title="Buscar Registro"><img src="../resources/imagenes/buscarregistro.png" height= "50px" width= "50px"></button>

			</form>
	
</form>
		
			
			
			


		</div>	
	</div>
</body>
</html>