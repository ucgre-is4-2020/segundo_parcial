<h1>Listado de Choferes por Coches </h1>
<form action="{{route('listado_chofer_coche')}}" method="get">
    @csrf
    <input name= "buscarpor" type="search" placeholder="Buscar por nombre" aria-label="Search">
    <button type="submit"> Buscar </button>
    <ul>
        @foreach($misChoferCoches as $unChoferCoche)
        <li>
        <a href=" {{route ('ver_chofer_coche', ['id' => $unChoferCoche -> id])}}"> Ver </a>
        <a href=" {{route ('borrar_chofer_coche', ['id' => $unChoferCoche -> id])}}" onclick= "return confirm('borrar registro') "> Borrar </a>
        <a href=" {{route ('editar_chofer_coche', ['id' => $unChoferCoche -> id])}}"> Editar </a>
            {{$unChoferCoche-> id}} - {{$unChoferCoche-> nombre}} -
            <?php
                if ($unChoferCoche->activo=="1"){
                    echo "Verdadero";
                }else{
                    echo "Falso";
                }
            ?>

        </li>
        @endforeach

    </ul>
</form>
<a href = "{{route ('welcome')}}"> Página Principal </a>
<br>
<a href = "{{route ('crear_chofer_coche')}}"> Crear Registro </a>
