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
				 value="{{ $Users->id }}"
				 disabled="disabled">
			</td>
		</tr>
		<tr>
			<td>
				<label for="name">Nombre</label>
			</td>
			<td>
				<input type="text" name="name" id="name" title="name"
				value="{{ $Users->name }}"
				disabled="disabled">
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="email">Email</label>
			</td>
			<td>
				<input type="text" name="email" id="email" title="email"
				value="{{ $Users->email }}"
				disabled="disabled">
			</td>
		</tr>

		<tr>
			<td>
				<label for="email_verified_at">Verificacion Email</label>
			</td>
			<td>
				<input type="{!! $Users->email_verified_at?'date-time':'text' !!}" 
				name="fec_verified" id="fec_verified" 
				value="{!! $Users->email_verified_at?$Users->email_verified_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="password">Contraseña</label>
			</td>
			<td>
				<input type="text" name="password" id="password" title="password"
				value="{{ $Users->password }}"
				disabled="disabled">
			</td>
		</tr>
		
		
		<tr>
			<td>
				<label for="fec_create">Fecha de Creación</label>
			</td>
			<td>
				<input type="{!! $Users->created_at?'date-time':'text' !!}" 
				name="fec_create" id="fec_create" 
				value="{!! $Users->created_at?$Users->created_at:'Sin datos' !!}"
				title="Fecha de Creación de Registro" disabled>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fec_update">Fecha de Actualización</label>
			</td>
			<td>
				<input type="{!! $Users->updated_at?'date-time':'text' !!}"
				name="fec_update" id="fec_update"
				value="{!! $Users->updated_at?$Users->updated_at:'Sin datos' !!}"
				title="Fecha de Actualización" disabled>
			</td>
		</tr>
	</table>

	<div class="center">
		 <a href="{{ route('listadoUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
	</div>
</body>
</html>