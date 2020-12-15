<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado ChoferCoche</title>
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

	<h1>Listado ChoferCoche</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Chofer</th>
			<th>Coche</th>
			<th>Activo</th>
			<th>Dia</th>
			<th>Desde</th>
			<th>Hasta</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($roluser->sortBy('id') as $cc)
		<tr>
			<td><a href="{{ route('verChoferCoche-tp3-ug0059', ['id' => $cc->id]) }}"
			 title="Mostrar datos de la ChoferCoche">{{ $cc->id }}</a></td>
			<td>{{ $cc->chofer_id }}</td>
			<td>{{ $cc->coche_id }}</td>
			@if ($cc->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $cc->dia }}</td>
			<td>{{ $cc->fecha_desde }}</td>
			<td>{{ $cc->fecha_hasta }}</td>
			<td>{{ $cc->created_at }}</td>
			<td>{{ $cc->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editarChoferCoche-tp3-ug0059', ['id' => $cc->id]) }}"
				title="Editar Registro">Editar</a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrarChoferCoche-tp3-ug0059', ['id' => $cc->id]) }}"
				title="Borrar Registro" title="Borrar Registro">Borrar</a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio">inicio</a>
	        <a href="{{ route('crearChoferCoche-tp3-ug0059') }}" title="Crear Registro">crear</a>
	
	<br><br>
		<form action="listadoCC" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por nombre." value="{{ empty($busqueda)?'':$busqueda }}">
				
				
		<button  type="submit" title="Buscar Registro">Buscar</button>

			</form>
	
</form>
		
			 <a href="{{  route('listadoChoferyCoche-tp3-ug0059') }}" >Listado Chofer y Coche</a>
			
			


		</div>	
	</div>
</body>
</html>