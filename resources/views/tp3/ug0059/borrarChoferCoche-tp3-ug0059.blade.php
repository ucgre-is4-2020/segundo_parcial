<!DOCTYPE html>
<html>
<head>
	<title>Borrar ChoferCoche</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("modalError").style.display = "none";
		}
	</script>
	<style type="text/css">
	
	</style>
</head>
<body>
	@if(session('error'))
		<div id="modalError" onclick="cerrar()" class="modal">
		  <div class="modal-contenido error">
		    <button onclick="cerrar()">X</button>
	    	<h1>Error :(</h1>
		    <h2>{{ session('error') }}</h2>
		  </div>  
		</div>
	@endif
	<div id="miModal" class="modal">
	  <div class="modal-contenido">
	    
	    <h3>Borrar esta ChoferCoche?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $ChoferCoche->id }}</li>
	    	<li><strong>Chofer:</strong> {{ $ChoferCoche->chofer_id }}</li>
			<li><strong>Coche:</strong> {{ $ChoferCoche->coche_id }}</li>
	    	<li><strong>Estado:</strong> {{ $ChoferCoche->activo==1?'Activo':'Inactivo' }}</li>
			<li><strong>Dia:</strong> {{ $ChoferCoche->dia }}</li>
			<li><strong>Desde:</strong> {{ $ChoferCoche->fecha_desde }}</li>
			<li><strong>Hasta:</strong> {{ $ChoferCoche->fecha_hasta }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($ChoferCoche->created_at)?'Sin datos':$ChoferCoche->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($ChoferCoche->updated_at)?'Sin datos':$ChoferCoche->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrarChoferCoche-tp3-ug0059', ['id' => $ChoferCoche->id]) }}" title="Borrar ChoferCoche">Borrar</a>
		    <a href="{{  route('listadoChoferCoche-tp3-ug0059') }}" title="Cancelar Borrado">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>