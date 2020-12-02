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
				 value="{{ $RolUser->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="user_id">Usuario</label>
			</td>
			<td>
				<input type="number" name="user_id" id="user_id" title="Usuario"
				value="{{ $RolUser->user_id }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="nombre">Rol</label>
			</td>
			<td>
				<input type="number" name="rol_id" id="rol_id" title="Rol"
				value="{{ $RolUser->rol_id }}"
				disabled="disabled">
			</td>
		</tr>

		
		<tr>
			<td>
				<label for="estado">Estado</label>						
			</td>
			<td>
				<input type="text" name="estado" id="estado" title="Estado"
				value="{{ $RolUser->activo==1?"Activo":"Inactivo" }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $RolUser->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $RolUser->created_at?$RolUser->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $RolUser->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $RolUser->updated_at?$RolUser->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listadoRolUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
	</div>
</body>
</html>