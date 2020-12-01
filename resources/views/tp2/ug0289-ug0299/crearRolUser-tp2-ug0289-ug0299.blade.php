<!DOCTYPE html>
<html>
<head>
	<title>Creacion de Nuevos Registros</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
	</script>
	<style type="text/css">
		
	</style>
</head>
<body>
	<h1>Registrar Nueva RolUser</h1>
	<form action="creacionUserRol" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="user_id">Usuario</label>
				</td>
				<td>
					<input type="number" name="user_id" id="user_id" value="{{ old('user_id') }}" pattern="[0-9]{1,40}" required="required"
					value="{{ old('codigo') }}">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="nombre">Rol</label>
				</td>
				<td>
					<input type="number" name="rol_id" id="rol_id" value="{{ old('rol_id') }}" pattern="[0-9]{1,40}" required="required"
					value="{{ old('codigo') }}">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado">
						<option <?= old('estado')=="true"?"selected":"" ?> value="true">Activo</option>
						<option <?= old('estado')=="false"?"selected":"" ?> value="false">Inactivo</option>
					</select>
				</td>
			</tr>
			
		</table>

		<div class="center">
		   	<button  type="submit" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></button>
			   <a href="{{ route('listadoRolUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
		</div>
	</form>

	@if($errors->any()) 
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    @foreach($errors->all() as $error)
		    	<h1>Error :(</h1>
		    	<p>{{ $error }}</p>
	    	@endforeach
		  </div>  
		</div>
	@elseif(session('error'))
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    	<h1>Error :(</h1>
		    	<p>{{ session('error') }}</p>
		  </div>  
		</div>
	@endif
</body>
</html>