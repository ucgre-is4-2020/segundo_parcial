<!DOCTYPE html>
<html>
<head>
	<title>Edición FMP</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
		function habilitarBoton(Empresa_tipo){
			btn = document.getElementById('guardar');
			inpUser_id = document.getElementById('nombre').value; 
			inpEstado = document.getElementById('estado').value; 
			
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(inpUser_id != "{{ $FacturaMedioPago->nombre }}" || inpUser_id != "{{ $FacturaMedioPago->nombre }}" ||
			   inpEstado != "{{ $FacturaMedioPago->activo }}" || inpEstado != "{{ $FacturaMedioPago->activo }}"){
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
	<form action="{{ route('edicionFMP-ug0059', ['id' => $FacturaMedioPago->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $FacturaMedioPago->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="nombre">Nombre</label>
				</td>
				<td>
					<input type="text" name="nombre" id="nombre"  pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('nombre'))?$FacturaMedioPago->nombre:old('nombre') }}" onchange="habilitarBoton('{{ $FacturaMedioPago }}')"
					onkeyup="habilitarBoton('{{ $FacturaMedioPago }}')">
				</td>
			</tr>
			
			
			
			
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $FacturaMedioPago }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($FacturaMedioPago->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($FacturaMedioPago->activo ==0?"selected":"" ):
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
					<input type="{!! $FacturaMedioPago->created_at?'date-time':'text' !!}" 
					name="fec_create" id="fec_create" 
					value="{!! $FacturaMedioPago->created_at?$FacturaMedioPago->created_at:'Sin datos' !!}"
					title="Fecha de Creación de Registro" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_update">Fecha de Actualización</label>
				</td>
				<td>
					<input type="{!! $FacturaMedioPago->updated_at?'date-time':'text' !!}"
					name="fec_update" id="fec_update"
					value="{!! $FacturaMedioPago->updated_at?$FacturaMedioPago->updated_at:'Sin datos' !!}"
					title="Fecha de Actualización" disabled>
				</td>
			</tr>
		</table>

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listadoFMP-tp2-ug0059') }}" title="Listado de Empresas">Listado FMP</a>
           
		
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