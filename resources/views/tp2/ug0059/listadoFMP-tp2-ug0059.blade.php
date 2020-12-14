<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado FMP</title>
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

	<h1>Lista de Facturas Metodos de Pago</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Activo</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($Fmp->sortBy('id') as $fmp)
		<tr>
			<td><a href="{{ route('verFMP-tp2-ug0059', ['id' => $fmp->id]) }}"
			 title="Mostrar datos de la FacturaMedioPago">{{ $fmp->id }}</a></td>
			<td>{{ $fmp->nombre }}</td>
			@if ($fmp->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $fmp->created_at }}</td>
			<td>{{ $fmp->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editarFMP-tp2-ug0059', ['id' => $fmp->id]) }}"
				title="Editar FMP">Editar</a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrarFMP-tp2-ug0059', ['id' => $fmp->id]) }}"
				title="Borrar FMP" title="Borrar FMP">Borrar</a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio">Inicio</a>
	        <a href="{{ route('crearFMP-tp2-ug0059') }}" title="Crear FMP">Crear</a>
	
	<br><br>
		<form action="listadoFMP" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por nombre." value="{{ empty($busqueda)?'':$busqueda }}">
				
				
		<button  type="submit" title="Buscar FMP">Buscar</button>

			</form>
	
</form>
		
			
			
			


		</div>	
	</div>
</body>
</html>