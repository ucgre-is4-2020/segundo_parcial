<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Coches</title>
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
			width: 120px;
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
			width: 120px;
			height: 35px;
		}
		td:nth-child(9), td:nth-child(8) {
			width: 100px;
			height: 35px;	
		}
		table {
			margin: 0 auto;
			margin-bottom: 100px;
			border-collapse: collapse;
			font-size: 15px;
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
			width: 1050px;
		}
		.buscar {
			margin-left: 250px;
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

	<h1>Listado de Coches</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Código</th>
			<th>Km. actual</th>
			<th>Activo</th>
			<th>Chapa</th>
			<th>Fecha Creado</th>
			<th>Fecha Actualizado</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($coches->sortBy('id') as $uncoche)
		<tr>
			<td><a href="{{ route('ver-ug0278', ['id' => $uncoche->id]) }}"
			 title="Mostrar datos del Coche">{{ $uncoche->id }}</a></td>
			<td>{{ $uncoche->codigo }}</td>
			<td>{{number_format($uncoche->km_actual,0,',','.')}}</td>
			@if ($uncoche->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $uncoche->chapa }}</td>
			<td>{{ $uncoche->created_at }}</td>
			<td>{{ $uncoche->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editar-ug0278', ['id' => $uncoche->id]) }}"
				title="Editar Registro">Editar</a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrar-ug0278', ['id' => $uncoche->id]) }}"
				title="Borrar Registro">Borrar</a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Página Principal">Página Principal</a>
			<a href="{{ route('crear-ug0278') }}" title="Crear Registro">Crear Registro</a>
			
			<form action="/listado-coche" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por código..." value="{{ empty($busqueda)?'':$busqueda }}">
				<button class="btn-buscar" type="submit">Buscar</button>
				<a href="{{ route('listado-ug0278') }}" class="btn-buscar" >Limpiar</a>
			</form>

		</div>	
	</div>
</body>
</html>