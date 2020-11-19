<!DOCTYPE html>
<html>
<head>
	<title>Borrar Coche</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("modalError").style.display = "none";
		}
	</script>
	<style type="text/css">
		html, body {
			font-family: calibri;
			margin: 0;
			width: 100%;
			height: 100%;
		}
		a:nth-child(1) {
			margin-right: 5px;
		}
		a {
			background-color: #f93f3ff7;
			display: inline-block;
			font-family: calibri;
			text-align: center;
			color: white;
			width: 140px;
			height: 30px;
			border-radius: 5px;
			padding-top: 10px;
			text-decoration: none;
			margin-top: 10px;
		}
		a:hover {
			transition: 0.3s;
			letter-spacing: 1px;
			box-shadow: 0px 0px 1px white, 0px 0px 12px ;	
		}
		.modal-contenido button {
			border: 1px solid white;
		    border-radius: 2px;
		    color: white;
		    background-color: #f64040;
    		margin-top: 10px;
		}
		.modal-contenido button:hover {
			transition: 0.5s;
			cursor: pointer;
			box-shadow: 0px 0px 1px white, 0px 0px 12px white;	
		}
		li {
			margin-bottom: 3px;
		}
		strong {
			font-size: 18px;
			margin-right: 5px;
		}
		.modal-contenido{
			background-color: #ffc22ae8;
		    border-radius: 15px;
		    color: white;
			width:370px;
			min-height: 400px;
			padding: 10px 20px;
			margin: 5% auto;
			position: relative;
		}
		.modal-contenido h1 {
			text-align: center;
		}
		.modal-contenido h3 {
			text-align: center;
		}
		.modal{
			display: inline-block;
			background-color: rgba(0,0,0,.6);
			height: 100%;
			width: 100%;
		}
		.centrado {
			width: auto;
		    display: inline-block;
		    margin: 0 auto;
	        padding-left: 40px;
		}
		.modal-contenido.exito, .exito button {
			background-color: #f64040;
		}
		.modal-contenido.error, .error button{
			background-color: #f64040;	
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
	    <h1>Confirmación</h1>
	    <h3>¿Está seguro de querer Borrar este Registro?</h3>
	    <ul>
	    	<li><strong>Id:</strong> {{ $coche->id }}</li>
	    	<li><strong>Código:</strong> {{ $coche->codigo }}</li>
	    	<li><strong>Km. Actual:</strong> {{ number_format($coche->km_actual,0,',','.') }}</li>
	    	<li><strong>Estado:</strong> {{ $coche->activo==1?'Activo':'Inactivo' }}</li>
	    	<li><strong>Chapa:</strong> {{ $coche->chapa }}</li>
	    	<li><strong>Fecha de Creación:</strong> {{ empty($coche->created_at)?'Sin datos':$coche->created_at }}</li>
	    	<li><strong>Fecha de Actualización:</strong> {{ empty($coche->updated_at)?'Sin datos':$coche->updated_at }}</li>
	    </ul>
	    <div class="centrado">
		    <a href="{{  route('borrar-ug0278', ['id' => $coche->id]) }}"> Borrar</a>
		    <a href="{{  route('listado-ug0278') }}">Cancelar</a>
	    </div>
	  </div>  
	</div>
</body>
</html>