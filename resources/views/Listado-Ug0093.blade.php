
<h1  style="text-align: center"  >Listado de Colores</h1>
<input name="buscarpor" type="search">
<button type="submit">Buscar</button>
<a href="{{ route('Crear-Ug0093') }}">Crear nuevo Color </a>
{{session('mensaje')}}
<ul>
    @foreach($misColores ?? '' as $unColor)
        <li>
            <a href="{{route('Borrar-Color', ['id' => $unColor->id]) }}">Borrar</a>
            <a href="{{route('Ver-Color', ['id' => $unColor->id]) }}">Ver</a>
            <a href="{{route('Editar-Color', ['id' => $unColor->id]) }}">Editar</a>
         {{ $unColor->nombre }} - {{ $unColor->activo }} - {{ $unColor->codigo }}
        </li>
    @endforeach
</ul>
<a href="{{ route('raiz') }}">Volver al inicio</a>
