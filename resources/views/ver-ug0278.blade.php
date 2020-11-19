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
		input {
			margin-left: 40px;
			border: 1px solid #35B5FF;
			border-radius: 3px;
			height: 18px;
		}
		input:focus {
			outline: none;
			border: border: 1px solid #35B5FF;;
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
	<h1>Visualización de Registro de Coche</h1>
	<table>
		<tr>
			<td>
				<label for="id">Id</label>
			</td>
			<td>
				<input type="number" name="id" id="id" title="Id"
				 value="{{ $coche->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="codigo">Código</label>
			</td>
			<td>
				<input type="text" name="codigo" id="codigo" title="Código"
				value="{{ $coche->codigo }}"
				disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="km_actual">Kilometraje Actual</label>
			</td>
			<td>
				<input type="text" name="km_actual" id="km_actual" 
				value="{!!  number_format($coche->km_actual,0,',','.')  !!}"
				title="Km. Actual" disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $coche->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="chapa">Número de Chapa</label>
			</td>
			<td>
				<input type="text" name="chapa" id="chapa" 
				value="{{ $coche->chapa }}"
				title="Número de Chapa"
				disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $coche->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $coche->created_at?$coche->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $coche->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $coche->updated_at?$coche->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		<a href="{{ route('listado-ug0278') }}"
		 title="Listado de Coches">Listado de Coches</a>
	</div>
</body>
</html>