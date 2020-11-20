<h1> Ver Registro </h1>

<div>
    {{$documento -> id}} <br>
    {{$documento -> nombre}} <br>
    {{$documento -> abreviacion}} <br>
    {{$documento -> created_at}} <br>
    {{$documento -> updated_at}} <br>
</div>
<br>
<br>
<a href = "{{route ('welcome')}}"> Página Principal </a><br><br>
<a href = "{{route ('listado_documento_tipo')}}"> Listado de Documentos </a>
