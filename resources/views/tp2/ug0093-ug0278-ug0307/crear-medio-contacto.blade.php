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
		body {
			padding-bottom: 30px;
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
		input, select, textarea {
			margin-left: 40px;
			border: 1px solid #35B5FF;
			border-radius: 3px;
			width: 250px;
		}
		input {
			height: 18px;
		}
		input:focus, textarea:focus {
			outline: none;
			border: 1px solid #35B5FF;
			box-shadow: 0px 0px 2px #00A2FF;
		}
		select {
			width: 255px;
			height: 23px;
		}
		textarea {
			height: 50px;
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
			margin: 30px auto;
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
	<h1>Creación de Registro de Medio de Contacto</h1>
	<form action="{{ route('tp2-ug0093-ug0278-ug0307-creacion-medio-contacto') }}" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="tipo_medio_contacto">Tipo de Medio de Contacto</label>
				</td>
				<td>
					<select id="tipo_medio_contacto" name="tipo_medio_contacto">
						@foreach($mediosdecontactostipos->sortBy('id') as $mediodecontactotipo)
							@if($mediodecontactotipo->activo)
								<option
								 <?= old('tipo_medio_contacto')==$mediodecontactotipo->id?"selected":"" ?>
								 value="<?php echo $mediodecontactotipo->id ?>"
								 >{{ $mediodecontactotipo->nombre }}</option>
							 @endif
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="direccion_empresa">Dirección de la Empresa</label>
				</td>
				<td>
					<select id="direccion_empresa" name="direccion_empresa">
						@foreach($direccionesempresas->sortBy('id') as $direccionempresa)
						<option
						 <?= old('direccion_empresa')==$direccionempresa->id?"selected":"" ?> 
						 value="<?php echo $direccionempresa->id ?>"
						 >{{ $direccionempresa->nombre_ubicacion }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="persona_contacto">Persona del Contacto</label>						
				</td>
				<td>
					<select id="persona_contacto" name="persona_contacto">
						@foreach($contactospersonasdireccionesempresas->sortBy('id') as $personacontacto)
							@if($personacontacto->activo)
								<option
								 <?= old('persona_contacto')==$personacontacto->id?"selected":"" ?> 
								 value="<?php echo $personacontacto->id ?>"
								 >{{ $personacontacto->persona_externa->nombres }}, {{ $personacontacto->persona_externa->apellidos }}</option>
							@endif
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="valor">Valor del Contacto</label>
				</td>
				<td>
					<textarea type="text" name="valor" id="valor" title="Ingrese un valor. Minimo 1 y máximo 200 caracteres">{{ old('valor') }}</textarea>
				</td>
			</tr>
			{!! $errors->first('valor','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="observacion">Observación</label>
				</td>
				<td>
					<textarea type="text" name="observacion" id="observacion" title="Ingrese un valor. Minimo 1 caracter">{{ old('observacion') }}</textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="center">
						<input type="submit" value="Crear">
						<a href="{{ route('tp2-ug0093-ug0278-ug0307-listado-medio-contacto') }}"
						 title="Listado de Contactos">Listado de Contactos</a>
					</div>
				</td>
			</tr>
		</table>

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