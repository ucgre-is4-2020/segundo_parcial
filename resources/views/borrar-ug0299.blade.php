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
		html {
			font-family: calibri;
		}
		h1 {
			text-align: center;
		}
		table {
			margin: 0 auto;
			width: 500px;
		}
		
		a, input[type="submit"] {
			border: none;
			display: inline-block;
			font-family: calibri;
			text-align: center;
			color: white;
			width: 170px;
			height: 30px;
			border-radius: 5px;
			padding-top: 10px;
			text-decoration: none;
			margin-top: 30px;
			margin: 0 auto;
		}
		
		.center {
			margin: 0 auto;
			width: 390px;
		}
		
		.modal-contenido h1, p {
			text-align: center;
		}
		.modal-contenido p {
		    max-height: 260px;
			overflow-y: auto;
		}
	
		.modal-contenido button {
			border: 1px solid white;
		    border-radius: 2px;
		    color: white;
    		margin-top: 10px;
		}
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
	    <div class="centrado">
		    <a href="{{  route('borrar-ug0299', ['id' => $Empresa->id]) }}" title="Borrar Empresa"><img src="../resources/imagenes/borrarregistro.png" height= "50px" width= "50px"></a>
		    <a href="{{  route('listado-ug0299') }}" title="Cancelar Borrado"><img src="../resources/imagenes/cancelar.png" height= "50px" width= "50px"></a>
	    </div>
	  </div>  
	</div>
</body>
</html>