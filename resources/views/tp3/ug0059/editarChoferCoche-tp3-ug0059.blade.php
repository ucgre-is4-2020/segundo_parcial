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
			inpChofer_id = document.getElementById('chofer_id').value; 
			inpCoche_id = document.getElementById('coche_id').value; 
			inpEstado = document.getElementById('estado').value; 
			inpDia = document.getElementById('dia').value; 
			inpDesde = document.getElementById('fecha_desde').value; 
			inpHasta = document.getElementById('fecha_hasta').value;
			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			if(inpChofer_id != "{{ $ChoferCoche->chofer_id }}" || inpChofer_id != "{{ $ChoferCoche->chofer_id }}" ||
			inpCoche_id != "{{ $ChoferCoche->coche_id }}" || inpCoche_id != "{{ $ChoferCoche->coche_id }}" ||
			   inpEstado != "{{ $ChoferCoche->activo }}" || inpEstado != "{{ $ChoferCoche->activo }}"||
			   
			  	inpDia != "{{ $ChoferCoche->dia }}" || inpDia != "{{ $ChoferCoche->dia }}" || 
				inpDesde != "{{ $ChoferCoche->fecha_desde }}" || inpDesde != "{{ $ChoferCoche->fecha_desde }}" ||
				inpHasta != "{{ $ChoferCoche->fecha_hasta }}" || inpHasta != "{{ $ChoferCoche->fecha_hasta }}" 
			   ){
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
	<h1>Editar Registro de ChoferCoche</h1>
	<form action="{{ route('edicion-ug0299', ['id' => $ChoferCoche->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $ChoferCoche->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="nombre">Chofer</label>
				</td>
				<td>
					<input type="number" name="chofer_id" id="chofer_id"   required="required"
					value="{{ empty(old('chofer_id'))?$ChoferCoche->nombre:old('chofer_id') }}" onchange="habilitarBoton('{{ $ChoferCoche }}')"
					onkeyup="habilitarBoton('{{ $ChoferCoche }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="nombre">Coche</label>
				</td>
				<td>
					<input type="number" name="coche_id" id="coche_id"  required="required"
					value="{{ empty(old('coche_id'))?$ChoferCoche->coche_id:old('coche_id') }}" onchange="habilitarBoton('{{ $ChoferCoche }}')"
					onkeyup="habilitarBoton('{{ $ChoferCoche }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $ChoferCoche }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($ChoferCoche->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($ChoferCoche->activo ==0?"selected":"" ):
								(old('estado')=="false"?"selected":"")
							)?>
							 value="false">Inactivo</option>
					</select>
				</td>
			</tr>
			
			
			
			<tr>
				<td>
					<label for="nombre">Dia</label>
				</td>
				<td>
					<input type="text" name="dia" id="dia"  required="required"
					value="{{ empty(old('dia'))?$ChoferCoche->dia:old('dia') }}" onchange="habilitarBoton('{{ $ChoferCoche }}')"
					onkeyup="habilitarBoton('{{ $ChoferCoche }}')">
				</td>
			</tr>
			
			
			
			<tr>
				<td>
					<label for="nombre">Desde</label>
				</td>
				<td>
					<input type="date" name="fecha_desde" id="fecha_desde"  required="required"
					value="{{ empty(old('fecha_desde'))?$ChoferCoche->coche_id:old('fecha_desde') }}" onchange="habilitarBoton('{{ $ChoferCoche }}')"
					onkeyup="habilitarBoton('{{ $ChoferCoche }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="nombre">Hasta</label>
				</td>
				<td>
					<input type="date" name="fecha_hasta" id="fecha_hasta"  required="required"
					value="{{ empty(old('fecha_hasta'))?$ChoferCoche->fecha_hasta:old('fecha_hasta') }}" onchange="habilitarBoton('{{ $ChoferCoche }}')"
					onkeyup="habilitarBoton('{{ $ChoferCoche }}')">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<label for="fec_create">Fecha de Creación</label>
				</td>
				<td>
					<input type="{!! $ChoferCoche->created_at?'date-time':'text' !!}" 
					name="fec_create" id="fec_create" 
					value="{!! $ChoferCoche->created_at?$ChoferCoche->created_at:'Sin datos' !!}"
					title="Fecha de Creación de Registro" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_update">Fecha de Actualización</label>
				</td>
				<td>
					<input type="{!! $ChoferCoche->updated_at?'date-time':'text' !!}"
					name="fec_update" id="fec_update"
					value="{!! $ChoferCoche->updated_at?$ChoferCoche->updated_at:'Sin datos' !!}"
					title="Fecha de Actualización" disabled>
				</td>
			</tr>
		</table>

		
			<button  type="submit" title="Editar Registro">Editar</button>
			 <a href="{{ route('listadoChoferCoche-tp3-ug0059') }}" title="Listado ChoferCoche">Listado ChoferCoche</a>
           
		
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