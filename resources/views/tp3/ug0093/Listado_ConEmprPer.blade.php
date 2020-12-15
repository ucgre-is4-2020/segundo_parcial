<h1>Listado de Contactos-Persona-Direccion-Empresa</h1>

@foreach($losdatitos as $miscontac)
    <li>
        id: {{$miscontac->id}}
        Persona externa: {{$miscontac->persona_externa->nombres}}
        Direccion Empresa: {{$miscontac->direcempre->barrio}}
        Contacto Tipo: {{$miscontac->contactipo->nombre}}
        Activo:
        <?php
        if ($miscontac->activo =="true"){
            echo "activo";
        }else
            echo"inactivo"
        ?>@endforeach
    </li>




