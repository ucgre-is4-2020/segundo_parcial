<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Direcciones de Empresas</title>
	<script type="text/javascript">
		function cerrar() {
			document.getElementById("miModal").style.display = "none";
		}
	</script>
	<style type="text/css">
		html, body {
			font-family: calibri;
			margin: 0;
		}
		th {
			width: 100px;
		}
		tr {
			height: 37px;	
		}
		th {
			background-color: #68C5FB;
			color: white;
			font-weight: normal;
			font-size: 17px;
			height: 25px;
		}
		tr:nth-child(odd)  {
			background-color: #E9E9E9;
		}
		td {
			text-align: center;
			font-family: calibri;
			word-break: break-word;
			width: 120px;
			height: 35px;
		}
		th:nth-child(1){
			width: 70px;
		}
		th:nth-child(2){
			width: 120px;
		}
		th:nth-child(3){
			width: 180px;
		}
		th:nth-child(4){
			width: 280px;
		}
		th:nth-child(5){
			width: 120px;
		}
		th:nth-child(6){
			width: 200px;
		}
		th:nth-child(7){
			width: 40px;
		}
		th:nth-child(8), th:nth-child(9){
			width: 120px;
		}
		td:nth-child(1){
			width: 60px;
		}
		td:nth-child(3){
			text-align: left;
			width: 180px;
		}
		td:nth-child(7){
			width: 40px;
		}
		td:nth-child(8), td:nth-child(9) {
			width: 60px;
		}
		table {
			margin: 0 auto;
			margin-bottom: 30px;
			border-collapse: collapse;
			font-size: 15px;
			table-layout: fixed;
		}
		h1 {
			text-align: center;
		}
		.fondo {
			background-color: #56747c;
			position: fixed;
			width: 100%;
		    bottom: 0px;
		}
		.center {
			margin: 15px auto;
			width: 1080px;
		}
		.buscar {
			border: none;
			border-radius: 6px;
			height: 30px;
			width: 240px;
			padding-left: 10px;
		}
		.buscar:focus {
			outline: none;
			border: border: 1px solid #35B5FF;
			box-shadow: 0px 0px 7px white;
		}
		tr td:nth-child(1) a {
			color: #006dab;
			font-size: 16px;
			font-weight: bold;
		}
		.center a:nth-child(1) {
			margin-right: 5px;
		}
		.center a, a.accion, .btn-buscar {
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
		}
		.center a:hover,  a.accion:hover, .btn-buscar:hover{
			transition: 0.5s;
			letter-spacing: 1px;
			box-shadow: 0px 0px 1px #00A2FF, 0px 0px 12px #00A2FF;	
		}
		.btn-buscar:focus {
			outline: none;
			border: 1px solid white;
		}
		.center a {
			margin-top: 0px;
		}
		a.borrar:hover {
			box-shadow: 0px 0px 1px #ff5555, 0px 0px 12px #ff5555;	
		}
		a.borrar {
			background-color: #ff5555;
		}
		a.editar:hover {
			box-shadow: 0px 0px 1px #f3ae3d, 0px 0px 12px #f3ae3d;	
		}
		a.editar {
			background-color: #f3ae3d;
		}
		a.accion {
			margin-top: 0px;
			padding-top: 5px;
			padding-bottom: 5px;
			width: 95px;
			height: 20px;
		}
		a.accion:hover {
			width: 95px;
			transition: 0.3s;
		}
		.modal-contenido{
			background-color: #3fdb88;
		    border-radius: 15px;
		    color: white;
			width:300px;
			height: 200px;
			padding: 10px 20px;
			margin: 16% auto;
			position: relative;
		}
		.modal-contenido button {
			border: 1px solid white;
		    border-radius: 2px;
		    color: white;
		    background-color: #3fdb88;
    		margin-top: 10px;
		}
		.modal-contenido button:hover {
			transition: 0.5s;
			cursor: pointer;
			box-shadow: 0px 0px 1px white, 0px 0px 12px white;	
		}
		.modal-contenido h2 {
			text-align: center;
			margin-top: 50px;
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
		form {
			display: inline-block;
		}
		.selects {
			width: 320px;
			margin-left: 120px;
			display: inline-block;
		}
		.selects div {
			width: 140px;
			margin-right: 10px;
			display: inline-block;
		}
		.selects select {
			display: inline-block;
			height: 25px;
			border-radius: 4px;
			width: 150px;
		}
		.selects span {
			color: white;
		}
		.btn-buscar {
			width: 90px !important;
			font-size: 14px;
			padding: 0px;
			border: none;
			cursor: pointer;
			margin-top: 0px;
		}
		a.btn-buscar {
			height: 22px !important;
			padding-top: 6px;
    		padding-bottom: 2px;
		}
		li.disabled a{
			color: gray;
		}
		li.active a{
			color: green;
		}
		.links {
			width: 100%;
			margin-bottom: 100px;
			text-align: center;
		}
		.links ul {
			padding: 0px;
			display: inline-block;
			width: 90%;
		}
		.links li {
			list-style-type: none;
			display: inline-block;
		}
		.links li a {
			text-decoration: none;
			color: #35B5FF;
			border: 1px solid #35B5FF;
			padding: 5px 10px;
			border-radius: 2px;
		}
		.links a span {
			font-weight: bold;
		}
		.links .active a {
			pointer-events: none;
			color: white;
			background-color: #35B5FF;
		}
		.links .next a:hover {
			transition:  0.2s;
			background-color: #DEE2E6;
			border: 1px solid #DEE2E6;
		}
		.links a:visited {
			color: auto;
		}		
		.links .disabled a.disabled{
			background-color: #96CAE8;
			pointer-events: none;
			border: 1px solid #96CAE8;
			cursor: auto;
			color: white;
		}
	</style>

</head>
<body>
	@if($flash = Session::get('exito'))
		<div id="miModal" onclick="cerrar()" class="modal">
		  <div class="modal-contenido">
		    <button onclick="cerrar()">X</button>
		    <h2>{{ $flash }}</h2>
		  </div>  
		</div>
	@endif

	<h1>Listado de Direcciones de Empresas</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Empresa</th>
			<th>Tipo/s de Empresa</th>
			<th>Ubicación</th>
			<th>Tipo de dirección</th>
			<th>Calle</th>
			<th>Cant. de Contactos</th>
			<th>Fecha Creado</th>
			<th>Fecha Actualizado</th>
		</tr>			
		@foreach($direccionesempresas->sortBy('id') as $undireccionempresa)
		<tr>
			<td>{{ $undireccionempresa->id }}</a></td>
			<td>{{ $undireccionempresa->empresa->razon_social }}</td>
			<td>
				<ul>
					@foreach($undireccionempresa->empresa->empresa_tipo_empresa as $untipo)
						<li>{{ $untipo->EmpresaTipo->nombre }}</li>
					@endforeach
				</ul>
			</td>
			<td>{{ $undireccionempresa->barrio->ciudad->departamento->nombre }}, {{ $undireccionempresa->barrio->ciudad->nombre }}, {{ $undireccionempresa->barrio->nombre }}</td>
			<td>{{ $undireccionempresa->direccion_empresa_tipo->nombre }}</td>
			<td>{{ $undireccionempresa->calle }}, N° {{is_numeric($undireccionempresa->numero)?number_format($undireccionempresa->numero,0,',','.'):$undireccionempresa->numero}}</td>
			<td>{{ $undireccionempresa->medios_de_contactos->count() }}</td>
			<td>{{ $undireccionempresa->created_at }}</td>
			<td>{{ $undireccionempresa->updated_at }}</td>
		</tr>
		@endforeach
		@if($direccionesempresas->isEmpty())
			<tr>
				<td colspan="9">No hay resultados</td>
			</tr>
		@endif
	</table>
	<div class="links">

	@if ($direccionesempresas->lastPage() > 1)
	<ul class="pagination">
	    <li class="{{ ($direccionesempresas->currentPage() == 1) ? 'disabled' : 'next' }}">
	        <a href="{{ $direccionesempresas->appends(['empresa' => $inp_empresa, 'departamento' => $inp_departamento, 'buscar' => $busqueda])->url($direccionesempresas->currentPage()-1)  }}" class="{{ $direccionesempresas->currentPage() == 1?'disabled':'' }}"><span><</span></a>
	    </li>
	    @for ($i = 1; $i <= $direccionesempresas->lastPage(); $i++)
	        <li class="{{ ($direccionesempresas->currentPage() == $i) ? 'active' : 'next' }}">
	            <a href="{{ $direccionesempresas->url($i) }}">{{ $i }}</a>
	        </li>
	    @endfor
	    <li class="{{ ($direccionesempresas->currentPage() == $direccionesempresas->lastPage()) ? 'disabled' : 'next' }}">
	        <a href="{{ $direccionesempresas->appends(['empresa' => $inp_empresa, 'departamento' => $inp_departamento, 'buscar' => $busqueda])->url($direccionesempresas->currentPage()+1) }}" class="{{ $direccionesempresas->currentPage() == $direccionesempresas->lastPage()?'disabled':'' }}"><span>></span></a>
	    </li>
	</ul>
	@endif
	</div>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Página Principal">Página Principal</a>
			
			<form action="/tp3/ug0278/listado-direccion-empresa" method="GET">
					<div class="selects">
						<div>
							<span>Empresa:</span>
							<select name="empresa" id="empresa">
									<option value="0">...</option>
								@foreach($empresas as $empresa)
									<option value="{{ $empresa->id }}" <?= (empty($inp_empresa)?(''):($inp_empresa==$empresa->id?'selected':'')) ?> >{{ $empresa->razon_social }}</option>
								@endforeach
							</select>
						</div>
						<div>
							<span>Departamento:</span>
							<select name="departamento" id="departamento">
									<option value="0">...</option>
								@foreach($departamentos as $departamento)
									<option value="{{ $departamento->id }}" <?= (empty($inp_departamento)?(''):($inp_departamento==$departamento->id?'selected':'')) ?> >{{ $departamento->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por calle..." value="{{ empty($busqueda)?'':$busqueda }}">
				<button class="btn-buscar" type="submit">Buscar</button>
				<a href="{{ route('tp3-ug0278-listado-direccion-empresa') }}" class="btn-buscar" >Limpiar</a>
			</form>

		</div>	
	</div>
</body>
</html>