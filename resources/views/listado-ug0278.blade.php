<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado de Coches</title>
	<style type="text/css">
		html {
			font-family: calibri;
		}
		th {
			width: 120px;
		}
		tr {
			height: 25px;	
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
		}
		table {
			margin: 0 auto;
			border-collapse: collapse;
		}
		h1 {
			text-align: center;
		}
		a {
			background-color: #35B5FF;
			display: block;
			font-family: calibri;
			text-align: center;
			color: white;
			width: 170px;
			height: 30px;
			border-radius: 5px;
			padding-top: 10px;
			text-decoration: none;
			margin: 0 auto;
			margin-top: 30px;
		}
		a:hover {
			width: 190px;
			transition: 0.5s;
			letter-spacing: 1px;
			box-shadow: 0px 0px 1px #00A2FF, 0px 0px 12px #00A2FF;	
		}
	</style>
</head>
<body>
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
		</tr>
		
		@foreach($coches as $uncoche)
		<tr>
			<td>{{ $uncoche->id }}</td>
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
		</tr>
		@endforeach
	</table>
		
	<a href="{{ route('welcome') }}" title="Página Principal">Volver a Página Principal</a>
</body>
</html>