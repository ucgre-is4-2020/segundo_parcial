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
	<h1>Registrar Nuevo Usuario</h1>
	<form action="creacionUser" method="POST">
		@csrf
		<table>
			<tr>
				<td>
					<label for="name">Nombre</label>
				</td>
				<td>
					<input type="text" name="name" id="name" value="{{ old('name') }}" pattern="[A-Za-z0-9]{1,40}" required="required"
					value="{{ old('email') }}">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="email">Email</label>
				</td>
				<td>
					<input type="text" name="email" id="email" value="{{ old('email') }}" pattern="[A-Za-z0-9]{1,40}" required="required"
					value="{{ old('email') }}">
				</td>
			</tr>
			
			
			
			<tr>
				<td>
					<label for="password">Contraseña</label>
				</td>
				<td>
					<input type="text" name="password" id="password" value="{{ old('password') }}" pattern="[A-Za-z0-9]{1,40}" required="required"
					value="{{ old('password') }}">
				</td>
			</tr>
			
			
			
		</table>

		<div class="center">
		   	<button  type="submit" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></button>
			   <a href="{{ route('listadoUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
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