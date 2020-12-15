<h1>Ver Colores {{$color->id}}</h1>
<div>
    {{session('mensaje')}}
</div>
<div>
    {{$color->id}} <br>
    {{$color->nombre}} <br>
    <?php
    if ($color->activo == "1"){
        echo "activo  ";
    }else{
        echo "inactivo";
    }
    ?><br>
    {{$color->codigo}} <br>
    {{$color->created_at}} <br>
    {{$color->updated_at}} <br>
</div>
<a href="{{ route('Listado-Ug0093') }}">Volver al listado</a><br>
<a href="{{ URL::previous() }}">Atrás</a>
