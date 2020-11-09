<h1>Ver Colores {{$color->id}}</h1>
<div>
    {{session('mensaje')}}
</div>
<div>
    {{$color->id}} <br>
    {{$color->nombre}} <br>
    {{$color->activo}} <br>
    {{$color->codigo}} <br>
    {{$color->created_at}} <br>
    {{$color->updated_at}} <br>
</div>
<a href="{{ route('Listado-Ug0093') }}">Volver al listado</a>
