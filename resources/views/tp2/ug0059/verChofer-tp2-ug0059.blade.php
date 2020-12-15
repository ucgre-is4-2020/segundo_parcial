<!DOCTYPE html>
<html>
<head>
	<title>Visualizar Datos</title>
	<meta charset="utf-8">
	<style type="text/css">
		
	</style>
</head>
<body>
	<h1>Datos del Registro </h1>
	<table>
		<tr>
			<td>
				<label for="id">Id</label>
			</td>
			<td>
				<input type="number" name="id" id="id" title="Id"
				 value="{{ $Chofer->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="nombre">Nombre</label>
			</td>
			<td>
				<input type="text" name="nombre" id="nombre" title="Nombre"
				value="{{ $Chofer->nombre }}"
				disabled="disabled">
			</td>
		</tr>
		
			<tr>
			<td>
				<label for="apellido">Apellido</label>
			</td>
			<td>
				<input type="text" name="apellido" id="apellido" title="Apellido"
				value="{{ $Chofer->apellido }}"
				disabled="disabled">
			</td>
		</tr>
		
	<tr>
			<td>
				<label for="documento_conducir">Documento de Conducir</label>
			</td>
			<td>
				<input type="text" name="documento_conducir" id="documento_conducir" title="Documento_Conducir"
				value="{{ $Chofer->documento_conducir }}"
				disabled="disabled">
			</td>
		</tr>
		
			<tr>
			<td>
				<label for="tipo_sangre">Tipo de Sangre</label>
			</td>
			<td>
				<input type="text" name="tipo_sangre" id="tipo_sangre" title="Tipo_Sangre"
				value="{{ $Chofer->tipo_sangre }}"
				disabled="disabled">
			</td>
		</tr>
		
			<tr>
			<td>
				<label for="documento">Documento</label>
			</td>
			<td>
				<input type="text" name="documento" id="documento" title="documento"
				value="{{ $Chofer->documento }}"
				disabled="disabled">
			</td>
		</tr>
		
		
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $Chofer->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $Chofer->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $Chofer->created_at?$Chofer->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $Chofer->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $Chofer->updated_at?$Chofer->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listadoChofer-tp2-ug0059') }}" title="Listado Chofer">Lista de Chofer</a>
           <a href="{{  route('listadoChoferyCoche-tp3-ug0059') }}" >Listado Chofer y Coche</a>
	</div>
</body>
</html>