<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registro {{ $unidadMedida->id}} </title>

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
                
                justify-content: center;
            }


            input, button{
            	font-family: 'Nunito', sans-serif;
            }

            #formulario{
					
					width: 530px;
					margin: auto;
					padding: 6px;

				}

			table, td{
				border: black solid 1px; 
				border-collapse: collapse;
			}

            .sms{
                background-color: #0099FF;
                border-radius: 3px;
                color: white;

            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

			<div id="formulario">

				<h1>Registro {{ $unidadMedida->id}}</h1>

			
				<div>
                    <table>
                        <tr style="font-weight: bold;">
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Abreviación</td>
                            <td>Activo</td>
                            <td>Fecha de creación</td>
                            <td>Fecha de modificación</td>
                        </tr>
                        <tr>
                            <td>{{ $unidadMedida->id }}</td>
                            <td>{{ $unidadMedida->nombre }}</td>
                            <td>{{ $unidadMedida->abreviacion }}</td>
                            <td>
                                @if ($unidadMedida->activo == true)
                                    activo
                                @else
                                    inactivo
                                @endif
                            </td>
                            <td>{{ $unidadMedida->created_at }}</td>
                            <td>{{ $unidadMedida->updated_at }}</td>
                        </tr>
                    </table><br>
                    <h3>Listado de tubos</h3>
                    

                        <table>
                            <tr>
                                
                                <td>Id del tubo</td>
                                <td>Cantidad</td>
                                <td>Descripción</td>
                            </tr>
                            @foreach($unidadMedida->unidad_medida_tubo as $u)
                            <tr>
                                
                                <td>{{ $u->tubo_id }}  </td>
                                <td>{{ $u->cantidad }}</td>
                                <td>{{ $u->descripcion }}</td>
                            </tr>
                            @endforeach
                        </table>
                        
                    
					
                <div class="sms">
                    {{ session ('mensaje') }}
                </div>
				
                </div>
				<a href="{{ route('listado_unidad_medida_ug0282_ug0314') }}">Listar registros</a>

			</div>

  
        </div>
    </body>
</html>










