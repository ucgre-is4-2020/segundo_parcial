<!DOCTYPE html>
<html>
<head>
	<title>Borrar Chofer</title>
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
	    
	    <h3>Borrar este Chofer?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $Chofer->id }}</li>
	    	<li><strong>Nombre:</strong> {{ $Chofer->nombre }}</li>
			<li><strong>Apellido:</strong> {{ $Chofer->apellido }}</li>
			<li><strong>Documento de Conducir:</strong> {{ $Chofer->documento_conducir }}</li>
			<li><strong>Tipo de Sangre:</strong> {{ $Chofer->tipo_sangre }}</li>
			<li><strong>Documento:</strong> {{ $Chofer->documento }}</li>
	    	<li><strong>Estado:</strong> {{ $Chofer->activo==1?'Activo':'Inactivo' }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($Chofer->created_at)?'Sin datos':$Chofer->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($Chofer->updated_at)?'Sin datos':$Chofer->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrarChofer-tp2-ug0059', ['id' => $Chofer->id]) }}" title="Borrar">Borrar</a>
		    <a href="{{  route('listadoChofer-tp2-ug0059') }}" title="Cancelar">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>