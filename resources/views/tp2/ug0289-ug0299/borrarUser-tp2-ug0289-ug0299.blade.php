<!DOCTYPE html>
<html>
<head>
	<title>Borrar Users</title>
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
	    
	    <h3>Borrar esta Users?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $Users->id }}</li>
	    	<li><strong>Nombre:</strong> {{ $Users->name }}</li>
	    	<li><strong>Email:</strong> {{ $Users->email }}</li>
			<li><strong>Verificacion Email:</strong> {{ empty($Users->email_verified_at)?'Sin datos':$Users->email_verified_at }}</li>
			<li><strong>Contraseña:</strong> {{ $Users->password }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($Users->created_at)?'Sin datos':$Users->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($Users->updated_at)?'Sin datos':$Users->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrarUser-tp2-ug0289-ug0299', ['id' => $Users->id]) }}" title="Borrar Users">Borrar</a>
		    <a href="{{  route('listadoUser-tp2-ug0289-ug0299') }}" title="Cancelar Borrado">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>