<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Empresas</title>
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
			
			
			font-weight: normal;
			font-size: 17px;
			height: 25px;
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
			width: 240px;
			padding-left: 10px;
		}
	
		tr td:nth-child(1) a {
			color: black;
			font-size: 16px;
			font-weight: bold;
		}
		.center a:nth-child(1) {
			margin-right: 5px;
		}
		.center a, a.accion, .btn-buscar {
			
			display: inline-block;
			font-family: calibri;
			text-align: center;
			color: beige;
			width: 170px;
			height: 30px;			
			text-decoration: none;
			margin-top: 30px;
		}
	
	
		.center a {
			margin-top: 0px;
		}
		
		
		a.accion {
			margin-top: 0px;
			padding-top: 5px;
			padding-bottom: 5px;
			width: 95px;
			height: 20px;
		}
		
		.modal-contenido{
		
			width:300px;
			height: 200px;
			padding: 10px 20px;
			margin: 16% auto;
			position: relative;
		}
		
		
		.modal-contenido h2 {
			text-align: center;
			margin-top: 50px;
		}
		.modal{
		
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
			
			padding: 0px;
		
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

	<h1>Listado de Empresas</h1>

	<table>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Activo</th>
			<th>Fecha de Creacion</th>
			<th>Fecha de Actualizacion</th>
			<th colspan="2">Acciones</th>
		</tr>
		
		@foreach($empresatipo->sortBy('id') as $empre)
		<tr>
			<td><a href="{{ route('ver-ug0299', ['id' => $empre->id]) }}"
			 title="Mostrar datos de la Empresa">{{ $empre->id }}</a></td>
			<td>{{ $empre->nombre }}</td>
			@if ($empre->activo)
				<td>{{ "activo" }}</td>
			@else
				<td>{{ "inactivo" }}</td>
			@endif 
			<td>{{ $empre->created_at }}</td>
			<td>{{ $empre->updated_at }}</td>
			<td><a class="accion editar" 
				href="{{ route('editar-ug0299', ['id' => $empre->id]) }}"
				title="Editar Registro"><img src="../resources/imagenes/editarregistro.png" height= "30px" width= "30px"></a>
			</td>
			<td><a class="accion borrar" 
				href="{{ route('confirmar-borrar-ug0299', ['id' => $empre->id]) }}"
				title="Borrar Registro" title="Borrar Registro"><img src="../resources/imagenes/borrarregistro.png" height= "30px" width= "30px"></a>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="fondo">
		<div class="center">		
		
			<a href="{{ route('welcome') }}" title="Inicio"><img src="../resources/imagenes/inicio.png" height= "50px" width= "50px"></a>
			<a href="{{ route('crear-ug0299') }}" title="Crear Registro"><img src="../resources/imagenes/crearregistro.png" height= "50px" width= "50px"></a>
			
			<form action="/listado-empresa" method="GET">
				<input class="buscar" id="buscar" name="buscar" type="text" 
				placeholder="Buscar por nombre..." value="{{ empty($busqueda)?'':$busqueda }}">
				
				<button  type="submit" title="Buscar Registro"><img src="../resources/imagenes/buscarregistro.png" height= "50px" width= "50px"></button>
				
				<a href="{{ route('listado-ug0299') }}" class="btn-buscar" title="Limpiar Busqueda"><img src="../resources/imagenes/limpiarregistro.png" height= "50px" width= "50px"></a>
			</form>

		</div>	
	</div>
</body>
</html>