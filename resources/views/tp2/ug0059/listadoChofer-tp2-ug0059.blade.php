<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Chofer</title>
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

	<h1>Lista de Cofer</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Documento de Conducir</th>
			<th>Tipo de Sangre</th>
			<th>Documento</th>
			<th>Estado</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($chof->sortBy('id') as $cho)
		<tr>
			<td><a href="{{ route('verChofer-tp2-ug0059', ['id' => $cho->id]) }}"
			 title="Mostrar datos de la Chofer">{{ $cho->id }}</a></td>
			<td>{{ $cho->nombre }}</td>
			<td>{{ $cho->apellido }}</td>
			<td>{{ $cho->documento_conducir }}</td>
			<td>{{ $cho->tipo_conducir }}</td>
			<td>{{ $cho->documento }}</td>
			@if ($cho->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $cho->created_at }}</td>
			<td>{{ $cho->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editarChofer-tp2-ug0059', ['id' => $cho->id]) }}"
				title="Editar FMP">Editar</a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrarChofer-tp2-ug0059', ['id' => $cho->id]) }}"
				title="Borrar" title="Borrar FMP">Borrar</a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio">Inicio</a>
	        <a href="{{ route('crearChofer-tp2-ug0059') }}" title="Crear">Crear</a>
	
	<br><br>
		<form action="listadoChofer" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por nombre." value="{{ empty($busqueda)?'':$busqueda }}">
				
				
		<button  type="submit" title="Buscar ">Buscar</button>

			</form>
	
</form>
		
			
			
			


		</div>	
	</div>
</body>
</html>