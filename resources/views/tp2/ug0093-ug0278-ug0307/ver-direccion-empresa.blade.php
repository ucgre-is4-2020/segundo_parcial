<!DOCTYPE html>
<html>
<head>
	<title>Visualización de Registro</title>
	<meta charset="utf-8">
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
		input, textarea {
			margin-left: 40px;
			border: 1px solid #35B5FF;
			border-radius: 3px;
			height: 18px;
		}
		textarea {
			height: 70px;
			width: 170px;
		 }
		input:focus {
			outline: none;
			border: 1px solid #35B5FF;
			box-shadow: 0px 0px 2px #00A2FF;
		}
		input[type="number"] {
			width: 166px;
		}
		a {
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
			margin: 0 auto;
			margin-top: 30px;
		}
		a:hover {
			width: 190px;
			transition: 0.5s;
			letter-spacing: 1px;
			box-shadow: 0px 0px 1px #00A2FF, 0px 0px 12px #00A2FF !important;	
		}
		.center {
			margin: 0 auto;
			width: 170px;
    		display: block;
		}
	</style>
</head>
<body>
	<h1>Visualización de Registro de Dirección de Empresa</h1>
	<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="text" id="id" name="id"
					 value="{{ $direccionempresa->id }}"
					 disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="empresa">Empresa</label>
				</td>
				<td>
					<input type="text" id="empresa" name="empresa"
					 value="{{ $direccionempresa->empresa->razon_social }}"
					 disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="barrio">Barrio</label>
				</td>
				<td>
					<input id="barrio" name="barrio"
					value="{{ $direccionempresa->barrio->nombre }}" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="tipo_direccion">Tipo de dirección</label>						
				</td>
				<td>				 
					<input id="tipo_direccion" name="tipo_direccion"
					 value="{{ $direccionempresa->direccion_empresa_tipo->nombre }}"
					 disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="calle">Calle</label>
				</td>
				<td>
					<textarea id="calle" name="calle"
					 disabled="disabled">{{ $direccionempresa->calle }}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="numero">Número</label>
				</td>
				<td>
					<input id="numero" name="numero"
					value="{{is_numeric($direccionempresa->numero)?number_format($direccionempresa->numero,0,',','.'):$direccionempresa->numero}}" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="latitud">Latitud</label>
				</td>
				<td>
					<input id="latitud" name="latitud"
					value="{{ $direccionempresa->latitud }}" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="longitud">Longitud</label>
				</td>
				<td>
					<input id="longitud" name="longitud"
					value="{{ $direccionempresa->longitud }}" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="es_casa_central">Es casa central</label>
				</td>
				<td>
					<input id="es_casa_central" name="es_casa_central"
					value="{{ $direccionempresa->es_casa_central==1?'Es casa central':'No es casa central' }}"
					disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="nombre_ubicacion">Nombre ubicación</label>
				</td>
				<td>
					<textarea id="nombre_ubicacion" name="nombre_ubicacion"
					disabled="disabled">{{ $direccionempresa->nombre_ubicacion }}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="es_deposito">Es depósito</label>
				</td>
				<td>
					<input id="es_deposito" name="es_deposito"
					value="{{ $direccionempresa->es_deposito==1?'Es depósito':'No es depósito' }}"
					disabled="disabled">
				</td>
			</tr>
			<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $direccionempresa->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $direccionempresa->created_at?$direccionempresa->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $direccionempresa->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $direccionempresa->updated_at?$direccionempresa->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		<a href="{{ route('tp2-ug0093-ug0278-ug0307-listado-direccion-empresa') }}"
		 title="Listado de Direcciones de Empresas">Listado de Direcciones</a>
	</div>
</body>
</html>