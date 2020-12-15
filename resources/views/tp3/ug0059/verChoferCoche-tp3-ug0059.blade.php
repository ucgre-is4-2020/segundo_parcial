<!DOCTYPE html>
<html>
<head>
	<title>Datos del Registro</title>
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
				 value="{{ $ChoferCoche->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="coche_id">Chofer</label>
			</td>
			<td>
				<input type="number" name="chofer_id" id="chofer_id" title="Chofer"
				value="{{ $ChoferCoche->chofer_id }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="coche_id">Coche</label>
			</td>
			<td>
				<input type="number" name="coche_id" id="coche_id" title="Coche"
				value="{{ $ChoferCoche->coche_id }}"
				disabled="disabled">
			</td>
		</tr>

		
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $ChoferCoche->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		
		
		<tr>
			<td>
				<label for="dia">Dia</label>
			</td>
			<td>
				<input type="text" name="dia" id="dia" title="Dia"
				value="{{ $ChoferCoche->dia }}"
				disabled="disabled">
			</td>
		</tr>



<tr>
			<td>
				<label for="inicio">Desde</label>
			</td>
			<td>
				<input type="date" name="fecha_desde" id="fecha_desde" title="inicio"
				value="{{ $ChoferCoche->fecha_desde }}"
				disabled="disabled">
			</td>
		</tr>



<tr>
			<td>
				<label for="date">Hasta</label>
			</td>
			<td>
				<input type="date" name="fecha_hasta" id="fecha_hasta" title="hasta"
				value="{{ $ChoferCoche->fecha_hasta}}"
				disabled="disabled">
			</td>
		</tr>

		
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $ChoferCoche->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $ChoferCoche->created_at?$ChoferCoche->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $ChoferCoche->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $ChoferCoche->updated_at?$ChoferCoche->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listadoChoferCoche-tp3-ug0059') }}" title="Listado ChoferCoche">lista</a>
		 
           
	</div>
</body>
</html>