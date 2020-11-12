<h1> Crear Factura </h1>

<form action="/ug0287/creacion" method="post">
	@csrf
	<label>Nombre</label> <input name="nombre"><br>
	<label>Codigo</label> <input name="codigo"><br>	
	<input type="submit"><br>
</form>