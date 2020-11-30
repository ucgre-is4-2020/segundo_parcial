<!DOCTYPE html>
<html>
<head>
	<title>Borrar RolUser</title>
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
	    
	    <h3>Borrar esta RolUser?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $RolUser->id }}</li>
	    	<li><strong>Usuario:</strong> {{ $RolUser->user_id }}</li>
			<li><strong>Rol:</strong> {{ $RolUser->rol_id }}</li>
	    	<li><strong>Estado:</strong> {{ $RolUser->activo==1?'Activo':'Inactivo' }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($RolUser->created_at)?'Sin datos':$RolUser->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($RolUser->updated_at)?'Sin datos':$RolUser->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrarRolUser-tp2-ug0289-ug0299', ['id' => $RolUser->id]) }}" title="Borrar RolUser">Borrar</a>
		    <a href="{{  route('listadoRolUser-tp2-ug0289-ug0299') }}" title="Cancelar Borrado">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>