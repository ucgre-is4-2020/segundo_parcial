<h1> Listado de Barrios </h1>
<a href="{{ route ('tp2-ug0317-crear-barrio') }}">Nuevo Resgistro</a>



<form class="form-inline my-2 my-lg-0 float-right">

    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" value="{{ old ('buscarpor') }}">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>

</form>


<ul>
	@foreach($misListados->sortBy('id') as $unListado)

		<li>

			<a href="{{route('tp2-ug0317-ver-barrio', ['id' => $unListado->id]) }}"> Ver - </a>
			<a href="{{route('tp2-ug0317-borrar-barrio', ['id' => $unListado->id])}}" onclick= "return confirm('Estas Seguro de Eliminar este Registro?')"> Borrar -</a>
			<a href="{{route('tp2-ug0317-editar-barrio', ['id' => $unListado->id]) }}"> Editar </a>
			{{ $unListado->id }} - {{ $unListado->ciudad->nombre }}  - {{ $unListado->nombre }} -  {{ $unListado->codigo }} 
			<div style="color: blueviolet;"></div>
			
		</li>
	@endforeach
</ul>



<a href="{{ route('welcome') }}">Pagina de Inicio </a>

