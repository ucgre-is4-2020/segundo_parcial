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
			width: 250px;
		}
		textarea {
			height: 70px;
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
	<h1>Visualización de Registro de Medio de Contacto</h1>
	<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="text" id="id" name="id"
					 value="{{ $mediodecontacto->id }}"
					 disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="tipo_contacto">Tipo de Medio de Contacto</label>
				</td>
				<td>
					<input id="tipo_contacto" name="tipo_contacto"
					value="{{ $mediodecontacto->medio_de_contacto_tipo->nombre }}" disabled="disabled">
				</td>
			</tr>
			<tr>
				<td>
					<label for="direccion_empresa">Dirección de la Empresa</label>						
				</td>
				<td>				 
					<textarea id="direccion_empresa" name="direccion_empresa"
					 disabled="disabled">{{ $mediodecontacto->direccion_empresa->calle }}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="persona_contacto">Persona del Contacto</label>
				</td>
				<td>
					<textarea id="persona_contacto" name="persona_contacto"
					 disabled="disabled">{{  $mediodecontacto->contacto_persona_direccion_empresa->persona_externa->nombres }}, {{ $mediodecontacto->contacto_persona_direccion_empresa->persona_externa->apellidos }}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="valor">Valor del Contacto</label>
				</td>
				<td>
					<textarea id="valor" name="valor"
					 disabled="disabled">{{$mediodecontacto->valor}}</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="observacion">Observación</label>
				</td>
				<td>
					<textarea id="observacion" name="observacion"
					 disabled="disabled">{{ $mediodecontacto->observacion }}</textarea>
				</td>
			</tr>
			<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $mediodecontacto->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $mediodecontacto->created_at?$mediodecontacto->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $mediodecontacto->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $mediodecontacto->updated_at?$mediodecontacto->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		<a href="{{ route('tp2-ug0093-ug0278-ug0307-listado-medio-contacto') }}"
		 title="Listado de Contactos">Listado de Contactos</a>
	</div>
</body>
</html>