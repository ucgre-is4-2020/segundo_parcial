<h1> Crear Factura </h1>



@if ($errors->any())
	


    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/listado-adm_factura_tipo/creacion-adm_factura_tipo" method="POST">
	@csrf
	<label>Nombre</label> <input name="nombre" required><br>
	<label>Codigo</label> <input name="codigo" required><br>	
	<input type="submit"><br>

	<a href="{{ route('listado-ug0287') }}">Listar</a>

</form>