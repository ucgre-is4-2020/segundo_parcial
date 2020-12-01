<!DOCTYPE html>
<html>
<head>
	<title>Edición de Registro</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
		function habilitarBoton(Empresa_tipo){
			btn = document.getElementById('guardar');
			intName = document.getElementById('name').value; 
			inpEmail = document.getElementById('email').value; 
			inpEstado = document.getElementById('estado').value; 
			
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(intName != "{{ $Users->name }}" || intName != "{{ $Users->name }}" ||
			inpEmail != "{{ $Users->email }}" || inpEmail != "{{ $Users->email }}" ||
			intPass != "{{ $Users->password }}" || intPass != "{{ $Users->password }}"){
				
		}
	</script>
	<style type="text/css">
		
		
	</style>
</head>


<body>
	<h1>Editar Registro de Users</h1>
	<form action="{{ route('edicion_tp2-ug0289-ug0299', ['id' => $Users->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $Users->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="name">Nombre</label>
				</td>
				<td>
					<input type="text" name="name" id="name"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('name'))?$Users->name:old('name') }}" onchange="habilitarBoton('{{ $Users }}')"
					onkeyup="habilitarBoton('{{ $Users }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="email">Email</label>
				</td>
				<td>
					<input type="text" name="email" id="email"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('email'))?$Users->email:old('email') }}" onchange="habilitarBoton('{{ $Users }}')"
					onkeyup="habilitarBoton('{{ $Users }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_verified">Verificacion Email</label>
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
					<input type="text" name="password" id="password"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('password'))?$Users->password:old('password') }}" onchange="habilitarBoton('{{ $Users }}')"
					onkeyup="habilitarBoton('{{ $Users }}')">
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

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listadoUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios">Listado Users</a>
           
		
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

	@if($flash = Session::get('exito'))
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido exito">
		    <button onclick="cerrar()">X</button>
		    <h2>{{ $flash }}</h2>
		  </div>  
		</div>
	@endif
</body>
</html>