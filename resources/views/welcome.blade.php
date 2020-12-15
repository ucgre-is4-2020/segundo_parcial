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
                background-color: #fff;
                color: #636b6f;
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
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
                    <li>Higinio Raúl Bordón Martínez - UG0282 - raulbordon94@gmail.com</li>
                    <li>Juan - Barreto - UG0278</li>
                    <li>Justo Miguel Ojeda Rojas - UG0093</li>
                    <li>Dahiana - Taboada - UG0317 - dahiiataboada@gmail.com</li>
                </ul>

            </div>


            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                Enlaces Primera Entrega TP:
                <br>
                <br>
                <div class="links">
                    <a href="{{ route('listado-ug0299') }}" >Tipos de Empresas</a>
                  <a href="{{ route('listado-ug0287') }}">Tipo de Facturas</a>
                     <a href="{{ route('listado-ug0317') }}">Seguimientos Tipos</a>
                    <a href = "{{route ('listado_documento_tipo')}}"> Tipos de Documentos </a>
                    <a href={{route('listado_tubo_estado')}}>Estados de Tubos</a>
                    <!-- Agregar los enlaces a cada pagina aqui -->
                    <a href="{{route ('listado_contacto_tipo')}}">Tipos de Contactos</a>
                    <a href="{{route('listar-ug0307')}}">Listar Departamentos</a>

                    <a href="{{ route ('Listado-Ug0093') }}">Colores</a>
                    <a href="{{route('listado-ug0314')}}">Compuestos</a>
                    <a href="{{ route('listado-ug0278') }}"
                       title="Listado de Coches">Listado de Coches</a>
                </div>

                <br>
                <br>

                <div class="content">


                    <div class="links">
                        <a href="{{route('Listado_ConEmprPer')}}">Listado de Contacto Persona Direccion Empresa</a>
                    </div>
                </div>

            </div>

        </div>
    </body>
</html>
