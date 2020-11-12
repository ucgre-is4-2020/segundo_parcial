<h1> Crear Factura </h1>

<form action="/listado-adm_factura_tipo/creacion-adm_factura_tipo" method="POST">
	@csrf
	<label>Nombre</label> <input name="nombre"><br>
	<label>Codigo</label> <input name="codigo"><br>	
	<input type="submit"><br>

	<a href="{{ route('listado-ug0287') }}">Listar</a>

</form>