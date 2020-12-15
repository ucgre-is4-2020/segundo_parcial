<!DOCTYPE html>
<html>
<head>
	<title>Creacion de Nuevos Registros</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
	</script>
	<style type="text/css">
		
	</style>
</head>
<body>
	<h1>Registrar Nueva ChoferCoche</h1>
	<form action="creacionCC" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="coche_id">Chofer</label>
				</td>
				<td>
					<input type="chofer" name="chofer_id" id="chofer_id" value="{{ old('chofer_id') }}" pattern="[0-9]" required="required"
					value="{{ old('chofer_id') }}">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="coche">Coche</label>
				</td>
				<td>
					<input type="number" name="coche_id" id="coche_id" value="{{ old('coche_id') }}" pattern="[0-9]" required="required"
					value="{{ old('coche_id') }}">
				</td>
			</tr>
			
			
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado">
						<option <?= old('estado')=="true"?"selected":"" ?> value="true">Activo</option>
						<option <?= old('estado')=="false"?"selected":"" ?> value="false">Inactivo</option>
					</select>
				</td>
			</tr>
			
			
			
			<tr>
				<td>
					<label for="dia">Dia</label>
				</td>
				<td>
					<input type="text" name="dia" id="dia" pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ old('dia') }}">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="desde">Desde</label>
				</td>
				<td>
					<input type="date" name="fecha_desde" id="fecha_desde" title="aaaa/mm/dd"  required="required"
					value="{{ old('fecha_desde') }}">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="hasta">Hasta</label>
				</td>
				<td>
					<input type="date" name="fecha_hasta" id="fecha_hasta" title="aaaa/mm/dd"  required="required"
					value="{{ old('fecha_hasta') }}">
				</td>
			</tr>
			
			
		</table>

		<div class="center">
		   		<button  type="submit" title="Crear Registro">Crear</button>
			   <a href="{{ route('listadoChoferCoche-tp3-ug0059') }}" title="Listado ChoferCoche">lista</a>
           
		</div>
	</form>

	@if($errors->any()) 
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    @foreach($errors->all() as $error)
		    	<h1>Error :(</h1>
		    	<p>{{ $error }}</p>
	    	@endforeach
		  </div>  
		</div>
	@elseif(session('error'))
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    	<h1>Error :(</h1>
		    	<p>{{ session('error') }}</p>
		  </div>  
		</div>
	@endif
</body>
</html>