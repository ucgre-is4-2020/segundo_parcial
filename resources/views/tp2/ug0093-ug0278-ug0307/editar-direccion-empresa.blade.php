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
			inpEmpresa = document.getElementById('empresa').value; 
			inpBarrio = document.getElementById('barrio').value; 
			inpTipoDireccion = document.getElementById('tipo_direccion').value; 
			inpCalle = document.getElementById('calle').value; 
			inpNumero = document.getElementById('numero').value; 
			inpLatitud = document.getElementById('latitud').value; 
			inpLongitud = document.getElementById('longitud').value; 
			inpCasaCentral = document.getElementById('es_casa_central').value; 
			inpNombreUbicacion = document.getElementById('nombre_ubicacion').value;
			inpDeposito = document.getElementById('es_deposito').value; 

			if(inpCasaCentral==0 || inpCasaCentral==1){
				inpCasaCentral = inpCasaCentral=="0" ? 0:1;
			}

			if(inpDeposito=="0" || inpDeposito=="1"){
				inpDeposito = inpDeposito=="0" ? 0:1;
			}

			//Verificar cambio de valores
			if(inpEmpresa != "{{ $direccionempresa->empresa_id }}" ||
				inpBarrio != "{{ $direccionempresa->barrio_id }}" ||
			   	inpTipoDireccion != "{{ $direccionempresa->direccion_empresa_tipo_id }}" ||
			    inpCalle != "{{ $direccionempresa->calle }}" ||
				inpNumero != "{{ $direccionempresa->numero }}" ||
				inpLatitud != "{{ $direccionempresa->latitud }}" ||
				inpLongitud != "{{ $direccionempresa->longitud }}" ||
				inpCasaCentral != "{{ $direccionempresa->es_casa_central }}" ||
				inpDeposito != "{{ $direccionempresa->es_deposito }}" ||
				inpNombreUbicacion != "{{ $direccionempresa->nombre_ubicacion }}" ){

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
		input, select, textarea {
			margin-left: 40px;
			border: 1px solid #35B5FF;
			border-radius: 3px;
		}
		input {
			height: 18px;
		}
		input:focus, textarea:focus {
			outline: none;
			border: 1px solid #35B5FF;
			box-shadow: 0px 0px 2px #00A2FF;
		}
		select {
			width: 176px;
			height: 23px;
		}
		textarea {
			width: 170px;
			height: 50px;
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
		td.msg {
			text-align: center;
		    color: #b81111;
		    background-color: #ffabab;
		    border-radius: 7px;
		}
	</style>
</head>
<body>
	<h1>Editar Registro de Dirección de Empresa</h1>
	<form action="{{ route('tp2-ug0093-ug0278-ug0307-edicion-direccion-empresa',
	 ['id' => $direccionempresa->id]) }}" method="POST">
		@method('PUT')
		@csrf
		<table>
			<tr>
				<td>
					<label for="id">Id</label>
				</td>
				<td>
					<input type="number" name="id" id="id" title="Identificador de Registro" 
					value="{{ $direccionempresa->id }}" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="empresa">Empresa</label>
				</td>
				<td>
					<select id="empresa" name="empresa" onchange="habilitarBoton('{{ $direccionempresa }}')">
						@foreach($empresas->sortBy('id') as $empresa)
							<option 
							<?=
							 	(old('empresa')==null?
						 		($direccionempresa->empresa_id==$empresa->id?"selected":""):
							 	(old('empresa')==$empresa->id?"selected":"")) 
							 ?>
							value="<?php echo $empresa->id ?>">{{ $empresa->razon_social }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="barrio">Barrio</label>
				</td>
				<td>
					<select id="barrio" name="barrio" onchange="habilitarBoton('{{ $direccionempresa }}')">
						@foreach($barrios->sortBy('id') as $unbarrio)
						<option
						<?= 
								(old('barrio')==null?
						 		($direccionempresa->barrio_id==$unbarrio->id?"selected":""):
							 	(old('barrio')==$unbarrio->id?"selected":"")) 
						?> 
						value="<?php echo $unbarrio->id ?>">{{ $unbarrio->nombre }}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="tipo_direccion">Tipo de dirección</label>						
				</td>
				<td>
					<select id="tipo_direccion" name="tipo_direccion" onchange="habilitarBoton('{{ $direccionempresa }}')">
						@foreach($direccionestipos->sortBy('id') as $undirecciontipo)
							@if($undirecciontipo->activo)
								<option
								 <?=
								 	(old('tipo_direccion')==null?
							 		($direccionempresa->direccion_empresa_tipo_id==$undirecciontipo->id?"selected":""):
								 	(old('tipo_direccion')==$undirecciontipo->id?"selected":"")) 
								 ?> 
								 value="<?php echo $undirecciontipo->id ?>"
								 >{{ $undirecciontipo->nombre }}</option>
							@endif
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="chapa">Calle</label>
				</td>
				<td>
					<textarea type="text" name="calle" id="calle"
					 title="Ingrese un valor. Minimo 1 y máximo 500 caracteres"
					 onchange="habilitarBoton('{{ $direccionempresa }}')"
					 onkeyup="habilitarBoton('{{ $direccionempresa }}')">{{ empty(old('calle'))?$direccionempresa->calle:old('calle') }}</textarea>
				</td>
			</tr>
			{!! $errors->first('calle','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="numero">Número</label>
				</td>
				<td>
					<input type="text" name="numero" id="numero"
					 value="{{ empty(old('numero'))?$direccionempresa->numero:old('numero') }}"
					 title="Ingrese un valor. Minimo 1 y máximo 20 caracteres"
					 onchange="habilitarBoton('{{ $direccionempresa }}')"
					 onkeyup="habilitarBoton('{{ $direccionempresa }}')">
				</td>
			</tr>
			{!! $errors->first('numero','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="latitud">Latitud</label>
				</td>
				<td>
					<input type="text" name="latitud" id="latitud"
					 value="{{ empty(old('latitud'))?$direccionempresa->latitud:old('latitud') }}"
					 title="Ingrese la Latitud"
					 onchange="habilitarBoton('{{ $direccionempresa }}')"
					 onkeyup="habilitarBoton('{{ $direccionempresa }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="longitud">Longitud</label>
				</td>
				<td>
					<input type="text" name="longitud" id="longitud"
					 value="{{ empty(old('longitud'))?$direccionempresa->longitud:old('longitud') }}"
					 title="Ingrese la Longitud"
					 onchange="habilitarBoton('{{ $direccionempresa }}')"
					 onkeyup="habilitarBoton('{{ $direccionempresa }}')">
				</td>
			</tr>
			<tr>
				<td>
					<label for="es_casa_central">Es casa central</label>
				</td>
				<td>
					<select id="es_casa_central" name="es_casa_central" 
					onchange="habilitarBoton('{{ $direccionempresa }}')">
						<option 
						<?=
							(
								(old('es_casa_central')==null)?
								($direccionempresa->es_casa_central ==1?"selected":""):
								(old('es_casa_central')=="1"?"selected":"")
							 )
						 ?> 
						value="1">Es casa central</option>
						<option 
						<?= 
							(
								(old('es_casa_central')==null)?
								($direccionempresa->es_casa_central ==0?"selected":"" ):
								(old('es_casa_central')=="0"?"selected":"")
							)
						?>
						 value="0">No es casa central</option>
					</select>
				</td>
			</tr>
			{!! $errors->first('es_casa_central','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="nombre_ubicacion">Nombre de ubicación</label>
				</td>
				<td>
					<textarea type="text" name="nombre_ubicacion" id="nombre_ubicacion"
					 title="Ingrese un valor. Minimo 1 y máximo 200 caracteres"
					 onchange="habilitarBoton('{{ $direccionempresa }}')"
					 onkeyup="habilitarBoton('{{ $direccionempresa }}')">{{ empty(old('nombre_ubicacion'))?$direccionempresa->nombre_ubicacion:old('nombre_ubicacion') }}</textarea>
				</td>
			</tr>
			{!! $errors->first('nombre_ubicacion','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="es_deposito">Es depósito</label>
				</td>
				<td>
					<select id="es_deposito" name="es_deposito"
					 onchange="habilitarBoton('{{ $direccionempresa }}')">
						<option
						<?=
							(
								(old('es_deposito')==null)?
								($direccionempresa->es_deposito ==1?"selected":""):
								(old('es_deposito')=="1"?"selected":"")
							)
						?>
						value="1">Es depósito</option>
						<option 
						<?=
							(
								(old('es_deposito')==null)?
								($direccionempresa->es_deposito ==0?"selected":"" ):
								(old('es_deposito')=="0"?"selected":"")
							)
						?>
						value="0">No es depósito</option>
					</select>
				</td>
			</tr>
			{!! $errors->first('es_deposito','<tr><td class="msg" colspan="2">:message</td></tr>') !!}
			<tr>
				<td>
					<label for="fec_create">Fecha de Creación</label>
				</td>
				<td>
					<input type="{!! $direccionempresa->created_at?'date-time':'text' !!}" 
					name="fec_create" id="fec_create" 
					value="{!! $direccionempresa->created_at?$direccionempresa->created_at:'Sin datos' !!}"
					title="Fecha de Creación de Registro" disabled>
				</td>
			</tr>
			<tr>
				<td>
					<label for="fec_update">Fecha de Actualización</label>
				</td>
				<td>
					<input type="{!! $direccionempresa->updated_at?'date-time':'text' !!}"
					name="fec_update" id="fec_update"
					value="{!! $direccionempresa->updated_at?$direccionempresa->updated_at:'Sin datos' !!}"
					title="Fecha de Actualización" disabled>
				</td>
			</tr>
		</table>

		<div class="center">
			<input type="submit" id="guardar" class="disabled" value="Guardar" disabled>
			<a href="{{ route('tp2-ug0093-ug0278-ug0307-listado-direccion-empresa') }}"
			 title="Listado de Direcciones">Listado de Direcciones</a>
		</div>
	</form>

	@if(session('error'))
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