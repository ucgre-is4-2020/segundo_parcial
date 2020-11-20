<h1>Listado de Contactos </h1>
<form action="{{route('listado_contacto_tipo')}}" method="get">
    @csrf
    <input name= "buscarpor" type="search" placeholder="Buscar por nombre" aria-label="Search">
    <button type="submit"> Buscar </button>
    <ul>
        @foreach($misContactos as $unContacto)
        <li>
        <a href=" {{route ('ver_contacto_tipo', ['id' => $unContacto -> id])}}"> Ver </a>
        <a href=" {{route ('borrar_contacto_tipo', ['id' => $unContacto -> id])}}" onclick= "return confirm('borrar registro') "> Borrar </a>
        <a href=" {{route ('editar_contacto_tipo', ['id' => $unContacto -> id])}}"> Editar </a>
            {{$unContacto-> id}} - {{$unContacto-> nombre}} -
            <?php
                if ($unContacto->activo=="1"){
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
<a href = "{{route ('crear_contacto_tipo')}}"> Crear Registro </a>
