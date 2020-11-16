<h1> Ver Registro </h1>

<div>
    {{$contacto -> id}} <br>
    {{$contacto -> nombre}} <br>
    {{$contacto -> created_at}} <br>
    {{$contacto -> updated_at}} <br>
</div>
<br>
<br>
<a href = "{{route ('raiz')}}"> Página Principal </a><br><br>
<a href = "{{route ('listado_contacto_tipo')}}"> Listado de Contactos </a>