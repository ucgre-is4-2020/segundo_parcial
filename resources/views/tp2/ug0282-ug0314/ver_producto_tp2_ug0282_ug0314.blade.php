<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Producto {{ $producto->id}} </title>

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
					
					width: 850px;
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

				<h1>Producto {{ $producto->id}}</h1>

			
				<div>
                    <table>
                        <tr style="font-weight: bold;">
                            <td>Id</td>
                            <td>tubo_id</td>
                            <td>contenido_id</td>
                            <td>color_id</td>
                            <td>tubo_estado_id</td>
                            <td>Activo</td>
                            <td>Fecha de creacion</td>
                            <td>Fecha de actualizacion</td>
                        </tr>
                        <tr>
                            <td> {{ $producto->id }} </td>
                            <td> {{ $tubo->serial}} </td>
                            <td> 
                                @foreach($contenidos as $contenido)
                                    @if ($contenido->id == $producto->contenido_id)
                                        {{ $contenido->nombre}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>
                            <td> 
                                @foreach($colores as $color)
                                    @if ($color->id == $producto->color_id)
                                        {{ $color->nombre}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>
                            <td> 
                                @foreach($tubos_estados as $estado)
                                    @if ($estado->id == $producto->tubo_estado_id)
                                        {{ $estado->nombre}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>

                            
                            <td>{{ $producto->activo }} </td>
                            
                            <td>{{ $producto->created_at }} </td>
                            <td>{{ $producto->updated_at }}</td>
                        </tr>
                    </table><br>
					
                <div class="sms">
                    {{ session ('mensaje') }}
                </div>
				
                </div>
				<a href="{{ route('listado_producto_ug0282_ug0314') }}">Listar productos</a><br>
                <a href="{{ URL::previous() }}">Atrás</a>

			</div>

  
        </div>
    </body>
</html>










