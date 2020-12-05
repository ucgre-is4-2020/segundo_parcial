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
				 value="{{ $Rol->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="nombre">Nombre</label>
			</td>
			<td>
				<input type="text" name="nombre" id="nombre" title="Nombre"
				value="{{ $Rol->nombre }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="codigo">Codigo</label>
			</td>
			<td>
				<input type="text" name="codigo" id="codigo" title="Rol"
				value="{{ $Rol->codigo }}"
				disabled="disabled">
			</td>
		</tr>

		
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $Rol->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $Rol->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $Rol->created_at?$Rol->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $Rol->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $Rol->updated_at?$Rol->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listadoRol-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
	</div>
</body>
</html>