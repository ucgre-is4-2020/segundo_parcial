<!DOCTYPE html>
<html>
<head>
	<title>Creacion de Nuevos Registros</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
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
		tr {
			height: 45px;
			width: 350px;
		}
		td:nth-child(odd) {
			text-align: right;
		}
		input, select {
			margin-left: 40px;
			border-radius: 3px;
		}
		input {
			height: 18px;
		}
	
		select {
			width: 176px;
			height: 23px;
		}
		input[type="number"] {
			width: 166px;

		}
		input[type="submit"] {
			font-size: 16px;
		    height: 39px !important;
		    padding-bottom: 10px;
		    margin-right: 20px !important;
		    box-shadow: none !important;
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
		.modal-contenido{
		
		    color: white;
			width:300px;
			min-height: 200px;
			height: auto;
			padding: 10px 20px;
			margin: 16% auto;
			position: relative;
		}
		.modal-contenido button {
			border: 1px solid white;
		    border-radius: 2px;
		    color: white;
    		margin-top: 10px;
		}
		
		.modal-contenido h1, p {
			text-align: center;
		}
		.modal-contenido p {
		    max-height: 260px;
			overflow-y: auto;
		}
		.modal{
		
			position:fixed;
			top:0;
			right:0;
			bottom:0;
			left:0;
			transition: all 1s;
		}
		#miModal:target{
			opacity:1;
			pointer-events:auto;
		}
	</style>
</head>
<body>
	<h1>Registrar Nueva Empresa</h1>
	<form action="/crear-empresa" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="nombre">Nombre</label>
				</td>
				<td>
					<input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado">
						<option <?= old('estado')=="true"?"selected":"" ?> value="true">Activo</option>
						<option <?= old('estado')=="false"?"selected":"" ?> value="false">Inactivo</option>
					</select>
				</td>
			</tr>
			
		</table>

		<div class="center">
		   	<button  type="submit" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></button>
			   <a href="{{ route('listado-ug0299') }}" title="Listado de Empresas"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
		</div>
	</form>

	@if($errors->any()) 
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    @foreach($errors->all() as $error)
		    	<h1>Error :(</h1>
		    	<p>{{ $error }}</p>
	    	@endforeach
		  </div>  
		</div>
	@elseif(session('error'))
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    	<h1>Error :(</h1>
		    	<p>{{ session('error') }}</p>
		  </div>  
		</div>
	@endif
</body>
</html>