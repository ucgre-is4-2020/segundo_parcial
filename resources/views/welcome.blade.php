<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {   
                
			
                color: black;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                align: center;
                top: 518px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 100px;
            }

            .links > a {
                color: blue;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="top-right links">
                <ul>
                    <li>Anniella Almada - UG0059 - annialma27@gmail.com</li>
                    <li>Carlos Dario - Gonzalez Veron - UG0299 - CVeron20@gmail.com</li>
                    <li>Dennis Rafael - Noguera Mongelos - ug0307</li>
                    <li>Sinthia Raquel Cristaldo Gill - UG0287 - sinthiacristaldo11@gmail.com </li>
                    <li>Mercedes María Luz - Enciso Núñez - UG0289</li>
                    <li>Luis Felipe- Samaniego Mora- ug0314</li>
                    <li>luissamaniegobusiness@gmail.com</li>
                    <li>Higinio Raúl Bordón Martínez - UG0282 - raulbordon94@gmail.com</li>
                    <li>Juan - Barreto - UG0278</li>
                    <li>Justo Miguel Ojeda Rojas - UG0093</li>
                    <li>just.ojeda1997@gmail.com</li>
                    <li>0984-648-576</li>
                    <li>Dahiana - Taboada - UG0317 - dahiiataboada@gmail.com</li>
                </ul>

            </div>


            <div class="content">
                <div class="title m-b-md">
                    Laravel
                    <!-- Agregar los enlaces a cada pagina aqui -->
                </div>
               <a href="{{ route('listado-ug0299') }}" title="Listado de Empresas"><img src="../resources/imagenes/listado.png" height= "50px" width= "50px"></a>
           
		   </div>
                Enlaces:
                <br>
                <br>
                <div class="links">
                  <a href="{{ route('listado-ug0287') }}">Facturas -</a>
                     <a href="{{ route('listado-ug0317') }}">Listados de Registros</a>
                    <a href = "{{route ('listado_documento_tipo')}}"> Listado de Documentos </a>
                    <a href=listado_tubo_estado>Listado UG0282 tubo_estado</a>
                    <!-- Agregar los enlaces a cada pagina aqui -->
                    <a href="{{route ('listado_contacto_tipo')}}">Listado de Contactos</a>
                    <a href="{{route('listar-ug0307')}}">Listar Departamentos</a>

                    <a href="{{ route ('Listado-Ug0093') }}">Listado-Ug0093</a>
                    <a href="{{ route ('Crear-Ug0093') }}">Crear-Ug0093</a>
                    <a href="{{route('listado-ug0314')}}">Compuestos</a>
                    <a href="{{ route('listado-ug0278') }}"
                       title="Listado de Coches">Listado de Coches</a>
                </div>
            </div>
        </div>
    </body>
</html>
