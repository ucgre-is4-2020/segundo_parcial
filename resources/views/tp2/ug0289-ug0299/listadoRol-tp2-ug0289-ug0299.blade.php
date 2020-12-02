<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Roles</title>
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

	<h1>Listado de Roles</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Codigo</th>
			<th>Activo</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($rol->sortBy('id') as $rl)
		<tr>
			<td><a href="{{ route('verRol-tp2-ug0289-ug0299', ['id' => $rl->id]) }}"
			 title="Mostrar datos de la Rol">{{ $rl->id }}</a></td>
			<td>{{ $rl->nombre }}</td>
			<td>{{ $rl->codigo }}</td>
			@if ($rl->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $rl->created_at }}</td>
			<td>{{ $rl->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editarRol-tp2-ug0289-ug0299', ['id' => $rl->id]) }}"
				title="Editar Registro"><img src="../resources/imagenes/editarregistro.png" height= "30px" width= "30px"></a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrarRol-tp2-ug0289-ug0299', ['id' => $rl->id]) }}"
				title="Borrar Registro" title="Borrar Registro"><img src="../resources/imagenes/borrarregistro.png" height= "30px" width= "30px"></a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio"><img src="../resources/imagenes/inicio.png" height= "50px" width= "50px"></a>
	        <a href="{{ route('crearRol-tp2-ug0289-ug0299') }}" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></a>
			<a href= "{{ route('listadoRolUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios">Listado de Roles de Usuarios</a>
	    
	<br><br>
		<form action="listadoRol" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por nombre." value="{{ empty($busqueda)?'':$busqueda }}">
				
				
		<button  type="submit" title="Buscar Registro"><img src="../resources/imagenes/buscarregistro.png" height= "50px" width= "50px"></button>

			</form>
	
</form>
		
			
			
			


		</div>	
	</div>
</body>
</html>