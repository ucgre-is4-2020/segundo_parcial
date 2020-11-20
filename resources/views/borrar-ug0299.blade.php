<!DOCTYPE html>
<html>
<head>
	<title>Borrar Empresa</title>
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
	    
	    <h3>Borrar esta Empresa?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $Empresa->id }}</li>
	    	<li><strong>Nombre:</strong> {{ $Empresa->nombre }}</li>
	    	<li><strong>Estado:</strong> {{ $Empresa->activo==1?'Activo':'Inactivo' }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($Empresa->created_at)?'Sin datos':$Empresa->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($Empresa->updated_at)?'Sin datos':$Empresa->updated_at }}</li>
	    </ul>
	   
		    <a href="{{  route('borrar-ug0299', ['id' => $Empresa->id]) }}" title="Borrar Empresa">Borrar</a>
		    <a href="{{  route('listado-ug0299') }}" title="Cancelar Borrado">Cancelar</a>
	    
	  </div>  
	</div>
</body>
</html>