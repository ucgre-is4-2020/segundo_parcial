<h1> Listado de Registros </h1>
<a href="{{ route ('crear-ug0317') }}">Nuevo Resgistro</a>



<form class="form-inline my-2 my-lg-0 float-right">

    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" value="{{ $buscarpor }}">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>

</form>


<ul>
	@foreach($misListados as $unListado)

		<li>
			<a href="{{route('ver-formulario', ['id' => $unListado->id]) }}"> Ver - </a>
			<a href="{{route('borrar-formulario', ['id' => $unListado->id])}}" onclick= "return confirm('Estas Seguro de Eliminar este Registro?')"> Borrar -</a>
			<a href="{{route('editar-formulario', ['id' => $unListado->id]) }}"> Editar </a>
			{{ $unListado->id }} - {{ $unListado->nombre }}
			
		</li>
	@endforeach
</ul>



<a href="{{ route('welcome') }}">Pagina de Inicio </a>

