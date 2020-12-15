<!DOCTYPE html>
<html>
<head>
	<title>Creación de Registro</title>
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
			border: 1px solid #35B5FF;
			border-radius: 3px;
		}
		input {
			height: 18px;
		}
		input:focus {
			outline: none;
			border: border: 1px solid #35B5FF;;
			box-shadow: 0px 0px 2px #00A2FF;
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
			background-color: #35B5FF;
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
		a:hover, input[type="submit"]:hover {
			width: 190px;
			transition: 0.5s;
			letter-spacing: 1px;
			box-shadow: 0px 0px 1px #00A2FF, 0px 0px 12px #00A2FF !important;	
		}
		.center {
			margin: 0 auto;
			width: 390px;
		}
		.modal-contenido{
			background-color: #f64040;
		    border-radius: 15px;
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
		    background-color: #f64040;
    		margin-top: 10px;
		}
		.modal-contenido button:hover {
			transition: 0.5s;
			cursor: pointer;
			box-shadow: 0px 0px 1px white, 0px 0px 12px white;	
		}
		.modal-contenido h1, p {
			text-align: center;
		}
		.modal-contenido p {
		    max-height: 260px;
			overflow-y: auto;
		}
		.modal{
			background-color: rgba(0,0,0,.6);
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
		td.msg {
			text-align: center;
		    color: #b81111;
		    background-color: #ffabab;
		    border-radius: 7px;
		}
	</style>
</head>
<body>
	<h1>Creación de Registro de Coche</h1>
	<form action="/creacion-coche" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="codigo">Código</label>
				</td>
				<td>
					<input type="text" name="codigo" id="codigo" title="Ingrese minimo 1 caracter y máximo 10" value="{{ old('codigo') }}">
				</td>
			</tr>
			{!! $errors->first('codigo','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="km_actual">Kilometraje Actual</label>
				</td>
				<td>
					<input type="number" name="km_actual" id="km_actual" value="{{ old('km_actual') }}" title="Ingrese un valor. Minimo 0 km.">
				</td>
			</tr>
			{!! $errors->first('km_actual','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado">
						<option <?= old('estado')=="1"?"selected":"" ?> value="1">Activo</option>
						<option <?= old('estado')=="0"?"selected":"" ?> value="0">Inactivo</option>
					</select>
				</td>
			</tr>
			{!! $errors->first('estado','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="chapa">Número de Chapa</label>
				</td>
				<td>
					<input type="text" name="chapa" id="chapa" value="{{ old('chapa') }}" title="Ingrese un valor. Minimo 1 y máximo 12 caracteres">
				</td>
			</tr>
			{!! $errors->first('chapa','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
		</table>

		<div class="center">
			<input type="submit" value="Crear">
			<a href="{{ route('listado-ug0278') }}"
			 title="Listado de Coches">Listado de Coches</a>
			 <a href="{{  route('listadoChoferyCoche-tp3-ug0059') }}" >Listado Chofer y Coche</a>
		</div>
	</form>

	@if(session('error'))
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