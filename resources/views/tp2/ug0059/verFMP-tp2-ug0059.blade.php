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
				 value="{{ $FacturaMedioPago->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="nombre">Nombre</label>
			</td>
			<td>
				<input type="text" name="nombre" id="nombre" title="Nombre"
				value="{{ $FacturaMedioPago->nombre }}"
				disabled="disabled">
			</td>
		</tr>
		
		

		
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $FacturaMedioPago->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $FacturaMedioPago->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $FacturaMedioPago->created_at?$FacturaMedioPago->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $FacturaMedioPago->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $FacturaMedioPago->updated_at?$FacturaMedioPago->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listadoFMP-tp2-ug0059') }}" title="Listado FMP">Listado FMP</a>
           
	</div>
</body>
</html>