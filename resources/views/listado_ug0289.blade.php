<h1>Listado de Documentos </h1>
<form action="{{route('listado_documento_tipo')}}" method="get">
    @csrf
    <input name= "buscarpor" type="search" placeholder="Buscar por nombre" aria-label="Search">
    <button type="submit"> Buscar </button>
    <ul> 
        @foreach($misDocumentos as $unDocumento)
        <li>
        <a href=" {{route ('ver_documento_tipo', ['id' => $unDocumento -> id])}}"> Ver </a>
        <a href=" {{route ('borrar_documento_tipo', ['id' => $unDocumento -> id])}}" onclick= "return confirm('borrar registro') "> Borrar </a>
        <a href=" {{route ('editar_documento_tipo', ['id' => $unDocumento -> id])}}"> Editar </a>
            {{$unDocumento-> id}} - {{$unDocumento-> nombre}} - {{$unDocumento->abreviacion}} - 
            <?php
                if ($unDocumento->activo=="1"){
                    echo "Verdadero";
                }else{
                    echo "Falso";
                }
            ?>
            
        </li>
        @endforeach

    </ul>
</form>
<a href = "{{route ('raiz')}}"> Página Principal </a>
<br>
<a href = "{{route ('crear_documento_tipo')}}"> Crear Registro </a>