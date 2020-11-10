<!DOCTYPE html>
<html>
<head>
	<title>Datos del Registro</title>
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
	
			border-radius: 3px;
			height: 18px;
		}
		input:focus {
			outline: none;
			
			box-shadow: 0px 0px 2px #00A2FF;
		}
		input[type="number"] {
			width: 166px;
		}
		
		.center {
			margin: 0 auto;
			width: 170px;
    		display: block;
		}
	</style>
</head>
<body>
	<h1>Visualización de Registro </h1>
	<table>
		<tr>
			<td>
				<label for="id">Id</label>
			</td>
			<td>
				<input type="number" name="id" id="id" title="Id"
				 value="{{ $Empresa->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="nombre">Nombre</label>
			</td>
			<td>
				<input type="text" name="nombre" id="nombre" title="Nombre"
				value="{{ $Empresa->nombre }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $Empresa->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $Empresa->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $Empresa->created_at?$Empresa->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $Empresa->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $Empresa->updated_at?$Empresa->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listado-ug0299') }}" title="Listado de Empresas"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
	</div>
</body>
</html>