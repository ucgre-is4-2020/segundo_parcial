<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Usuarios</title>
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

	<h1>Listado de Usuarios</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Verificacion Email</th>
			<th>Password</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($user->sortBy('id') as $us)
		<tr>
			<td><a href="{{ route('verUser-tp2-ug0289-ug0299', ['id' => $us->id]) }}"
			 title="Mostrar datos de la Users">{{ $us->id }}</a></td>
			<td>{{ $us->name }}</td>
			<td>{{ $us->email }}</td>
			<td>{{ $us->email_verified_at }}</td>
			<td>{{ $us->password }}</td>
			<td>{{ $us->created_at }}</td>
			<td>{{ $us->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editarUser-tp2-ug0289-ug0299', ['id' => $us->id]) }}"
				title="Editar Registro"><img src="../resources/imagenes/editarregistro.png" height= "30px" width= "30px"></a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrarUser-tp2-ug0289-ug0299', ['id' => $us->id]) }}"
				title="Borrar Registro" title="Borrar Registro"><img src="../resources/imagenes/borrarregistro.png" height= "30px" width= "30px"></a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio"><img src="../resources/imagenes/inicio.png" height= "50px" width= "50px"></a>
	        <a href="{{ route('crearUser-tp2-ug0289-ug0299') }}" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></a>
			<a href= "{{ route('listadoRolUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios">Listado de Roles de Usuarios</a>
	    
	<br><br>
		<form action="listadoUser" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por name." value="{{ empty($busqueda)?'':$busqueda }}">
				
				
		<button  type="submit" title="Buscar Registro"><img src="../resources/imagenes/buscarregistro.png" height= "50px" width= "50px"></button>

			</form>
	
</form>
		
			
			
			


		</div>	
	</div>
</body>
</html>