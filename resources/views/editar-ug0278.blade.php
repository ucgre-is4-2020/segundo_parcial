<!DOCTYPE html>
<html>
<head>
	<title>Edición de Registro</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
		function habilitarBoton(coche){
			btn = document.getElementById('guardar');
			inpCodigo = document.getElementById('codigo').value; 
			inpKm = document.getElementById('km_actual').value; 
			inpEstado = document.getElementById('estado').value; 
			inpChapa = document.getElementById('chapa').value; 

			if(inpEstado=="false" || inpEstado=="true"){
				inpEstado = inpEstado=="false" ? 0:1;
			}

			//Verificar cambio de valores
			if(inpCodigo != "{{ $coche->codigo }}" || inpKm != "{{ $coche->km_actual }}" ||
			   inpEstado != "{{ $coche->activo }}" || inpChapa != "{{ $coche->chapa }}"){
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
		html {
			font-family: calibri;
		}
		h1 {
			text-align: center;
		}
		table {
			margin: 0 auto;
			width: 500px;
		}
		tr {
			height: 45px;
			width: 350px;
		}
		td:nth-child(odd) {
			text-align: right;
		}
		input, select {
			margin-left: 40px;
			border: 1px solid #35B5FF;
			border-radius: 3px;
		}
		input {
			height: 18px;
		}
		input:focus {
			outline: none;
			border: border: 1px solid #35B5FF;;
			box-shadow: 0px 0px 2px #00A2FF;
		}
		select {
			width: 176px;
			height: 23px;
		}
		input[type="number"] {
			width: 166px;
		}
		input[type="submit"] {
			font-size: 16px;
		    height: 39px !important;
		    padding-bottom: 10px;
		    margin-right: 20px !important;
		    box-shadow: none !important;
		}
		#guardar.disabled, #guardar.disabled:hover {
			background-color: #a4d3ef;
			width: 165px;
			letter-spacing: 0px;
			box-shadow: none !important;
		}
		#id, #fec_create, #fec_update {
			background-color: #EDEDED
		}
		a, input[type="submit"] {
			border: none;
			background-color: #35B5FF;
			display: inline-block;
			font-family: calibri;
			text-align: center;
			color: white;
			width: 170px;
			height: 30px;
			border-radius: 5px;
			padding-top: 10px;
			text-decoration: none;
			margin-top: 30px;
			margin: 0 auto;
		}
		a:hover, input[type="submit"]:hover {
			width: 190px;
			transition: 0.5s;
			letter-spacing: 1px;
			box-shadow: 0px 0px 1px #00A2FF, 0px 0px 12px #00A2FF !important;	
		}
		.center {
			margin: 0 auto;
			width: 390px;
		}
		.modal-contenido{
			background-color: #f64040;
		    border-radius: 15px;
		    color: white;
			width:300px;
			min-height: 200px;
			height: auto;
			padding: 10px 20px;
			margin: 16% auto;
			position: relative;
		}
		.modal-contenido button {
			border: 1px solid white;
		    border-radius: 2px;
		    color: white;
		    background-color: #f64040;
    		margin-top: 10px;
		}
		.modal-contenido.exito button {   
		    background-color: #3fdb88;
		}
		.modal-contenido.exito {   
		    background-color: #3fdb88;
		}
		.modal-contenido button:hover {
			transition: 0.5s;
			cursor: pointer;
			box-shadow: 0px 0px 1px white, 0px 0px 12px white;	
		}
		.modal-contenido h1, p {
			text-align: center;
		}
		.modal-contenido h2 {
			text-align: center;
			margin-top: 50px;
		}
		.modal-contenido p {
		    max-height: 260px;
			overflow-y: auto;
		}
		.modal{
			background-color: rgba(0,0,0,.6);
			position:fixed;
			top:0;
			right:0;
			bottom:0;
			left:0;
			transition: all 1s;
		}
		#miModal:target{
			opacity:1;
			pointer-events:auto;
		}
	</style>
</head>
<body>
	<h1>Editar Registro de Coche</h1>
	<form action="{{ route('edicion-ug0278', ['id' => $coche->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $coche->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="codigo">Código</label>
				</td>
				<td>
					<input type="text" name="codigo" id="codigo" title="Ingrese minimo 1 caracter y máximo 10" pattern="[A-Za-z0-9]{1,10}" required="required"
					value="{{ empty(old('codigo'))?$coche->codigo:old('codigo') }}" onchange="habilitarBoton('{{ $coche }}')"
					onkeyup="habilitarBoton('{{ $coche }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="km_actual">Kilometraje Actual</label>
				</td>
				<td>
					<input type="number" name="km_actual" id="km_actual" min=0 required="required"
					value="{{ empty(old('km_actual'))?$coche->km_actual:old('km_actual') }}"
					title="Ingrese un valor. Minimo 0 km."
					onchange="habilitarBoton('{{ $coche }}')"
					onkeyup="habilitarBoton('{{ $coche }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="estado">Estado</label>						
				</td>
				<td>
					<select id="estado" name="estado" onchange="habilitarBoton('{{ $coche }}')">
						<option 
						<?= (
								empty(old('estado'))?
								($coche->activo ==1?"selected":""):
								(old('estado')=="true"?"selected":"")
							 )?>
						 value="true">Activo</option>
						<option
						<?= (
								empty(old('estado'))?
								($coche->activo ==0?"selected":"" ):
								(old('estado')=="false"?"selected":"")
							)?>
							 value="false">Inactivo</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="chapa">Número de Chapa</label>
				</td>
				<td>
					<input type="text" pattern="[A-Za-z0-9]{1,12}" name="chapa" id="chapa"
					 required="required"
					 value="{{ empty(old('chapa'))?$coche->chapa:old('chapa') }}"
					 title="Ingrese un valor. Minimo 1 y máximo 12 caracteres"
					 onchange="habilitarBoton('{{ $coche }}')"
					 onkeyup="habilitarBoton('{{ $coche }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_create">Fecha de Creación</label>
				</td>
				<td>
					<input type="{!! $coche->created_at?'date-time':'text' !!}" 
					name="fec_create" id="fec_create" 
					value="{!! $coche->created_at?$coche->created_at:'Sin datos' !!}"
					title="Fecha de Creación de Registro" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_update">Fecha de Actualización</label>
				</td>
				<td>
					<input type="{!! $coche->updated_at?'date-time':'text' !!}"
					name="fec_update" id="fec_update"
					value="{!! $coche->updated_at?$coche->updated_at:'Sin datos' !!}"
					title="Fecha de Actualización" disabled>
				</td>
			</tr>
		</table>

		<div class="center">
			<input type="submit" id="guardar" class="disabled" value="Guardar" disabled>
			<a href="{{ route('listado-ug0278') }}"
			 title="Listado de Coches">Listado de Coches</a>
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