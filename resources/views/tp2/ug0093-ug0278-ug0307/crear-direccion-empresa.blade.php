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
			width: 176px;
			height: 23px;
		}
		textarea {
			width: 170px;
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
			margin: 20px auto;
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
	<h1>Creación de Registro de Dirección de Empresa</h1>
	<form action="{{ route('tp2-ug0093-ug0278-ug0307-creacion-direccion-empresa') }}" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="empresa">Empresa</label>
				</td>
				<td>
					<select id="empresa" name="empresa">
						@foreach($empresas->sortBy('id') as $unaempresa)
						<option
						 <?= old('empresa')==$unaempresa->id?"selected":"" ?> 
						 value="<?php echo $unaempresa->id ?>"
						 >{{ $unaempresa->razon_social }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="barrio">Barrio</label>
				</td>
				<td>
					<select id="barrio" name="barrio">
						@foreach($barrios->sortBy('id') as $unbarrio)
						<option
						 <?= old('barrio')==$unbarrio->id?"selected":"" ?> 
						 value="<?php echo $unbarrio->id ?>"
						 >{{ $unbarrio->nombre }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="tipo_direccion">Tipo de dirección</label>						
				</td>
				<td>
					<select id="tipo_direccion" name="tipo_direccion">
						@foreach($direccionestipos->sortBy('id') as $undirecciontipo)
							@if($undirecciontipo->activo)
								<option
								 <?= old('tipo_direccion')==$undirecciontipo->id?"selected":"" ?> 
								 value="<?php echo $undirecciontipo->id ?>"
								 >{{ $undirecciontipo->nombre }}</option>
							@endif
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="calle">Calle</label>
				</td>
				<td>
					<textarea type="text" name="calle" id="calle" title="Ingrese un valor. Minimo 1 y máximo 500 caracteres">{{ old('calle') }}</textarea>
				</td>
			</tr>
			{!! $errors->first('calle','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="numero">Número</label>
				</td>
				<td>
					<input type="text" name="numero" id="numero" value="{{ old('numero') }}" title="Ingrese un valor. Minimo 1 y máximo 20 caracteres">
				</td>
			</tr>
			{!! $errors->first('numero','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="latitud">Latitud</label>
				</td>
				<td>
					<input type="text" name="latitud" id="latitud" value="{{ old('latitud') }}" title="Ingrese un valor. Minimo 1 caracter">
				</td>
			</tr>
			<tr>
				<td>
					<label for="longitud">Longitud</label>
				</td>
				<td>
					<input type="text" name="longitud" id="longitud" value="{{ old('longitud') }}" title="Ingrese un valor. Minimo 1 y máximo 12 caracteres">
				</td>
			</tr>
			<tr>
				<td>
					<label for="es_casa_central">Es casa central</label>
				</td>
				<td>
					<select id="es_casa_central" name="es_casa_central">
						<option <?= old('es_casa_central')=="1"?"selected":"" ?> value="1">Es casa central</option>
						<option <?= old('es_casa_central')=="0"?"selected":"" ?> value="0">No es casa central</option>
					</select>
				</td>
			</tr>
			{!! $errors->first('es_casa_central','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="nombre_ubicacion">Nombre ubicación</label>
				</td>
				<td>
					<textarea type="text" name="nombre_ubicacion" id="nombre_ubicacion" title="Ingrese un valor. Minimo 1 y máximo 200 caracteres">{{ old('nombre_ubicacion') }}</textarea>
				</td>
			</tr>
			{!! $errors->first('nombre_ubicacion','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="es_deposito">Es depósito</label>
				</td>
				<td>
					<select id="es_deposito" name="es_deposito">
						<option <?= old('es_deposito')=="1"?"selected":"" ?> value="1">Es depósito</option>
						<option <?= old('es_deposito')=="0"?"selected":"" ?> value="0">No es depósito</option>
					</select>
				</td>
			</tr>
			{!! $errors->first('es_deposito','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td colspan="2">
					<div class="center">
						<input type="submit" value="Crear">
						<a href="{{ route('tp2-ug0093-ug0278-ug0307-listado-direccion-empresa') }}"
						 title="Listado de Direcciones">Listado de Direcciones</a>
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