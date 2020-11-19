<div>
    <h1  style="text-align: center"  >Listado de Colores</h1>
   <form action="Listado-Ug0093_submit">
       <input name="buscarpor" type="search" aria-label="Search">
       <button type="submit">Buscar</button>

    <a href="{{ route('Crear-Ug0093') }}">Crear nuevo Color </a>
    {{session('mensaje')}}
    <ul>
        @foreach($misColores ?? '' as $unColor)
            <li>
                <a href="{{route('Borrar-Color', ['id' => $unColor->id]) }}">Borrar</a>
                <a href="{{route('Ver-Color', ['id' => $unColor->id]) }}">Ver</a>
                <a href="{{route('Editar-Color', ['id' => $unColor->id]) }}">Editar</a>
                Color: {{ $unColor->nombre }}
                - Estado:
                <?php
                if ($unColor->activo == "1"){
                    echo "activo  ";
                }else{
                    echo "inactivo";
                }

                ?>
                - Codigo:{{ $unColor->codigo}}
                - Creacion:{{ $unColor->created_at}}
                -Modificacion: {{ $unColor->updated_at}}
            </li>
        @endforeach
    </ul>
</form>
    <a href="{{ route('raiz') }}">Volver al inicio</a>
</div>

