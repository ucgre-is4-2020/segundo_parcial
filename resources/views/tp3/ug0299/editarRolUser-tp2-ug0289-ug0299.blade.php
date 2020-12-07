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
			inpUser_id = document.getElementById('user_id').value; 
			inpRol_id = document.getElementById('rol_id').value; 
			inpEstado = document.getElementById('estado').value; 
			
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(inpUser_id != "{{ $RolUser->user_id }}" || inpUser_id != "{{ $RolUser->user_id }}" ||
			inpRol_id != "{{ $RolUser->rol_id }}" || inpRol_id != "{{ $RolUser->rol_id }}" ||
			   inpEstado != "{{ $RolUser->activo }}" || inpEstado != "{{ $RolUser->activo }}"){
				btn.disabled = false;
				btn.className = "";
			}else {
				btn.disabled = true;
				btn.className = "";
				btn.className += "disabled";
			}
		}
	</script>
	<style type="text/css">
		
		
	</style>
</head>


<body>
	<h1>Editar Registro de RolUser</h1>
	<form action="{{ route('edicion-ug0299', ['id' => $RolUser->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $RolUser->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="user_id">Usuario</label>
				</td>
				<td>
					<input type="number" name="user_id" id="user_id"  pattern="{1,10}" required="required"
					value="{{ empty(old('user_id'))?$RolUser->nombre:old('user_id') }}" onchange="habilitarBoton('{{ $RolUser }}')"
					onkeyup="habilitarBoton('{{ $RolUser }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="rol_id">Rol</label>
				</td>
				<td>
					<input type="number" name="rol_id" id="rol_id"  pattern="{1,10}" required="required"
					value="{{ empty(old('rol_id'))?$RolUser->rol_id:old('rol_id') }}" onchange="habilitarBoton('{{ $RolUser }}')"
					onkeyup="habilitarBoton('{{ $RolUser }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $RolUser }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($RolUser->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($RolUser->activo ==0?"selected":"" ):
								(old('estado')=="false"?"selected":"")
							)?>
							 value="false">Inactivo</option>
					</select>
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

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listadoRolUser-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios">Listado RolUser</a>
           
		
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