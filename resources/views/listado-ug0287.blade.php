
<h1> Listado de Facturas </h1>

<a href="{{route('crear-ug0287')}}">NuevaFactura </a>



<ul>
    @foreach($misFacturas as $unaFactura)
        <li>
            <a href="{{route('editar-ug0287',['id' =>$unaFactura->id])}}">EditarFactura</a>
            

            <a href="{{ route ('borrar-ug0287', ['id' => $unaFactura->id]) }}" onclick="return confirm('¿Está seguro de borrar este registro?')">BorrarFactura</a>

            <a href="{{ route ('ver-ug0287', ['id' => $unaFactura->id]) }}">Ver</a>

             {{$unaFactura->nombre}} - {{ $unaFactura->codigo}}
        </li>
    @endforeach
</ul>
<h5>Tengo en total {{count($misFacturas)}} listado-ug0287</h5>

<a href="{{ route('raiz') }}">Volver al inicio </a>
