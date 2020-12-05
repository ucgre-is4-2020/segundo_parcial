<!DOCTYPE html>
<html>
<head>
	<title>Borrar Rol</title>
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
	    
	    <h3>Borrar esta Rol?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $Rol->id }}</li>
	    	<li><strong>Nombre:</strong> {{ $Rol->nombre }}</li>
			<li><strong>Codigo:</strong> {{ $Rol->codigo }}</li>
	    	<li><strong>Estado:</strong> {{ $Rol->activo==1?'Activo':'Inactivo' }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($Rol->created_at)?'Sin datos':$Rol->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($Rol->updated_at)?'Sin datos':$Rol->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrarRol-tp2-ug0289-ug0299', ['id' => $Rol->id]) }}" title="Borrar Rol">Borrar</a>
		    <a href="{{  route('listadoRol-tp2-ug0289-ug0299') }}" title="Cancelar Borrado">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>