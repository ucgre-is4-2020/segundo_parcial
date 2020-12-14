<!DOCTYPE html>
<html>
<head>
	<title>Borrar FMP</title>
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
	    
	    <h3>Borrar esta FMP?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $FacturaMedioPago->id }}</li>
	    	<li><strong>Nombre:</strong> {{ $FacturaMedioPago->nombre }}</li>
	    	<li><strong>Estado:</strong> {{ $FacturaMedioPago->activo==1?'Activo':'Inactivo' }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($FacturaMedioPago->created_at)?'Sin datos':$FacturaMedioPago->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($FacturaMedioPago->updated_at)?'Sin datos':$FacturaMedioPago->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrarFMP-tp2-ug0059', ['id' => $FacturaMedioPago->id]) }}" title="Borrar FMP">Borrar</a>
		    <a href="{{  route('listadoFMP-tp2-ug0059') }}" title="Cancelar">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>