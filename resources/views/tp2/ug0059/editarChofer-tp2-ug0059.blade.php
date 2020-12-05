<!DOCTYPE html>
<html>
<head>
	<title>Editar Chofer</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
		function habilitarBoton(Empresa_tipo){
			btn = document.getElementById('guardar');
			inpNombre = document.getElementById('nombre').value; 
			inpApellido = document.getElementById('apellido').value; 
			inpDocumentoConducir = document.getElementById('documento_conducir').value; 
			inpTipoSangre = document.getElementById('tipo_sangre').value; 
			inpDocumento = document.getElementById('documento').value; 
			inpEstado = document.getElementById('estado').value; 
			
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(inpNombre != "{{ $Chofer->nombre }}" || inpNombre != "{{ $Chofer->nombre }}" ||
			inpApellido != "{{ $Chofer->apellido }}" || inpApellido != "{{ $Chofer->apellido }}" ||
			inpDocumentoConducir != "{{ $Chofer->documento_conducir }}" || inpDocumentoConducir != "{{ $Chofer->documento_conducir }}" ||
			inpTipoSangre != "{{ $Chofer->tipo_sangre }}" || inpTipoSangre != "{{ $Chofer->tipo_sangre }}" ||
			inpDocumento != "{{ $Chofer->documento }}" || inpDocumento != "{{ $Chofer->documeno }}" ||
			   inpEstado != "{{ $Chofer->activo }}" || inpEstado != "{{ $Chofer->activo }}"){
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
	<h1>Editar Registro</h1>
	<form action="{{ route('edicionChofer-ug0059', ['id' => $Chofer->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $Chofer->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="nombre">Nombre</label>
				</td>
				<td>
					<input type="text" name="nombre" id="nombre"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('nombre'))?$Chofer->nombre:old('nombre') }}" onchange="habilitarBoton('{{ $Chofer }}')"
					onkeyup="habilitarBoton('{{ $Chofer }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="apellido">Apellido</label>
				</td>
				<td>
					<input type="text" name="apellido" id="apellido"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('apellido'))?$Chofer->apellido:old('apellido') }}" onchange="habilitarBoton('{{ $Chofer }}')"
					onkeyup="habilitarBoton('{{ $Chofer }}')">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="documento_conducir">Documento de Conducir</label>
				</td>
				<td>
					<input type="text" name="documento_conducir" id="documento_conducir"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('documento_conducir'))?$Chofer->documento_conducir:old('documento_conducir') }}" onchange="habilitarBoton('{{ $Chofer }}')"
					onkeyup="habilitarBoton('{{ $Chofer }}')">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="tipo_sangre">Tipo de Sangre</label>
				</td>
				<td>
					<input type="text" name="tipo_sangre" id="tipo_sangre"  pattern="{1,10}" required="required"
					value="{{ empty(old('tipo_sangre'))?$Chofer->tipo_sangre:old('tipo_sangre') }}" onchange="habilitarBoton('{{ $Chofer }}')"
					onkeyup="habilitarBoton('{{ $Chofer }}')">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="documento">Documento</label>
				</td>
				<td>
					<input type="text" name="documento" id="documento"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('documento'))?$Chofer->documento:old('documento') }}" onchange="habilitarBoton('{{ $Chofer }}')"
					onkeyup="habilitarBoton('{{ $Chofer }}')">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $Chofer }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($Chofer->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($Chofer->activo ==0?"selected":"" ):
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
					<input type="{!! $Chofer->created_at?'date-time':'text' !!}" 
					name="fec_create" id="fec_create" 
					value="{!! $Chofer->created_at?$Chofer->created_at:'Sin datos' !!}"
					title="Fecha de Creación de Registro" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_update">Fecha de Actualización</label>
				</td>
				<td>
					<input type="{!! $Chofer->updated_at?'date-time':'text' !!}"
					name="fec_update" id="fec_update"
					value="{!! $Chofer->updated_at?$Chofer->updated_at:'Sin datos' !!}"
					title="Fecha de Actualización" disabled>
				</td>
			</tr>
		</table>

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listadoChofer-tp2-ug0059') }}" title="Listado Chofer">Listado Chofer</a>
           
		
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