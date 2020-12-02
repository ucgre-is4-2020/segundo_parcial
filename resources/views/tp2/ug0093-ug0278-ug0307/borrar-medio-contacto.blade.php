<!DOCTYPE html>
<html>
<head>
	<title>Borrar Medio de Contacto</title>
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
		th {
			font-size: 18px;
			margin-right: 5px;
		}
		.modal-contenido{
			background-color: #ffc22ae8;
		    border-radius: 15px;
		    color: white;
			width: 500px;
			min-height: 550px;
			padding: 10px 20px;
			margin: 0 auto;

		}
		.modal-contenido h1 {
			text-align: center;
		}
		.modal-contenido h3 {
			text-align: center;
		}
		.modal{
			display: block;
			padding-top: 20px;
			padding-bottom: 20px;
			background-color: rgba(0,0,0,.6);
			min-height: 100%;
			width: 100%;
		}
		.centrado {
			width: auto;
		    display: inline-block;
		    margin: 30px auto;
	        padding-left: 65px;
		}
		.modal-contenido.exito, .exito button {
			background-color: #f64040;
		}
		.modal-contenido.error, .error button{
			background-color: #f64040;	
		}
		textarea {
			width: 190px;
			height: 70px;
			border: 1px solid white;
			border-radius: 4px;
		}
		textarea, input {
			width: 200px;
		}
		textarea[disabled="disabled"]{
			background-color: white;

		}
		th {
			text-align: right;
			padding-right: 10px;
		}
		td {
			word-break: break-word;
			max-width: 190px;
		}
		table {
			margin: 0 auto;
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
    	<table>
    		<tr>
    			<th>Id:</th>
    			<td>{{ $mediodecontacto->id }}</td>
    		</tr>
    		<tr>
    			<th>Tipo de Medio de Contacto:</th>
    			<td>{{ $mediodecontacto->medio_de_contacto_tipo->nombre }}</td>
    		</tr>
    		<tr>
    			<th>Persona/Empresa del Contacto:</th>
    			@if($mediodecontacto->direccion_empresa)
    			<td><textarea disabled="disabled">{{ $mediodecontacto->direccion_empresa->nombre_ubicacion }}</textarea></td>
    			@endif
				@if($mediodecontacto->contacto_persona_direccion_empresa)
    			<td><textarea disabled="disabled">{{ $mediodecontacto->contacto_persona_direccion_empresa->persona_externa->nombres }}, {{ $mediodecontacto->contacto_persona_direccion_empresa->persona_externa->apellidos }}</textarea></td>
    			@endif
    		</tr>
    		<tr>
    			<th>Valor del Contacto:</th>
    			<td><textarea disabled="disabled">{{ $mediodecontacto->valor }}</textarea></td>
    		</tr>
    		<tr>
    			<th>Observación:</th>
    			<td><textarea disabled="disabled">{{ $mediodecontacto->observacion }}</textarea></td>
    		</tr>
    		<tr>
    			<th>Fecha de Creación:</th>
    			<td>{{ empty($mediodecontacto->created_at)?'Sin datos':$mediodecontacto->created_at }}</td>
    		</tr>
    		<tr>
    			<th>Fecha de Actualización:</th>
    			<td>{{ empty($mediodecontacto->updated_at)?'Sin datos':$mediodecontacto->updated_at }}</td>
    		</tr>
	    	<tr>
	    		<td colspan="2">
				    <div class="centrado">
					    <a href="{{  route('tp2-ug0093-ug0278-ug0307-borrar-medio-contacto', ['id' => $mediodecontacto->id]) }}"> Borrar</a>
					    <a href="{{  route('tp2-ug0093-ug0278-ug0307-listado-medio-contacto') }}">Cancelar</a>
				    </div>
	    		</td>
	    	</tr>
    	</table>
	  </div>  
	</div>
</body>
</html>