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
			inpUser_id = document.getElementById('nombre').value; 
			inpRol_id = document.getElementById('codigo').value; 
			inpEstado = document.getElementById('estado').value; 
			
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(inpUser_id != "{{ $Rol->nombre }}" || inpUser_id != "{{ $Rol->nombre }}" ||
			inpRol_id != "{{ $Rol->codigo }}" || inpRol_id != "{{ $Rol->codigo }}" ||
			   inpEstado != "{{ $Rol->activo }}" || inpEstado != "{{ $Rol->activo }}"){
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
	<h1>Editar Registro de Rol</h1>
	<form action="{{ route('ediciontp2-ug0289-ug0299', ['id' => $Rol->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $Rol->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="nombre">Nombre</label>
				</td>
				<td>
					<input type="text" name="nombre" id="nombre"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('nombre'))?$Rol->nombre:old('nombre') }}" onchange="habilitarBoton('{{ $Rol }}')"
					onkeyup="habilitarBoton('{{ $Rol }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="codigo">Codigo</label>
				</td>
				<td>
					<input type="text" name="codigo" id="codigo"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('codigo'))?$Rol->codigo:old('codigo') }}" onchange="habilitarBoton('{{ $Rol }}')"
					onkeyup="habilitarBoton('{{ $Rol }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $Rol }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($Rol->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($Rol->activo ==0?"selected":"" ):
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

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listadoRol-tp2-ug0289-ug0299') }}" title="Listado de Roles de Usuarios">Listado Rol</a>
           
		
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