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
			inpNombre = document.getElementById('nombre').value; 
			inpEstado = document.getElementById('estado').value; 
			
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(inpNombre != "{{ $Empresa->nombre }}" || inpNombre != "{{ $Empresa->nombre }}" ||
			   inpEstado != "{{ $Empresa->activo }}" || inpEstado != "{{ $Empresa->activo }}"){
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
	<h1>Editar Registro de Empresa</h1>
	<form action="{{ route('edicion-ug0299', ['id' => $Empresa->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $Empresa->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="nombre">Nombre</label>
				</td>
				<td>
					<input type="text" name="nombre" id="nombre"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('nombre'))?$Empresa->nombre:old('nombre') }}" onchange="habilitarBoton('{{ $Empresa }}')"
					onkeyup="habilitarBoton('{{ $Empresa }}')">
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $Empresa }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($Empresa->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($Empresa->activo ==0?"selected":"" ):
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
					<input type="{!! $Empresa->created_at?'date-time':'text' !!}" 
					name="fec_create" id="fec_create" 
					value="{!! $Empresa->created_at?$coche->created_at:'Sin datos' !!}"
					title="Fecha de Creación de Registro" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_update">Fecha de Actualización</label>
				</td>
				<td>
					<input type="{!! $Empresa->updated_at?'date-time':'text' !!}"
					name="fec_update" id="fec_update"
					value="{!! $Empresa->updated_at?$Empresa->updated_at:'Sin datos' !!}"
					title="Fecha de Actualización" disabled>
				</td>
			</tr>
		</table>

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listado-ug0299') }}" title="Listado de Empresas">Listado Empresa</a>
           
		
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