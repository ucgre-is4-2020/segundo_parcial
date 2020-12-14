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

				<h1>Tubo {{ $unidadMedida->id}}</h1>

			
				<div>
                    <table>
                        <tr style="font-weight: bold;">
                            <td>Id</td>
                            <td>serial</td>
                            <td>codigo</td>
                            <td>Fecha de compra</td>
                            <td>Fecha de vencimiento</td>
                            <td>Fecha de creacion</td>
                            <td>Fecha de actualizacion</td>
                        </tr>
                        <tr>
                            <td>{{ $unidadMedida->id }}</td>
                            <td>{{ $unidadMedida->serial }} </td>
                            <td>{{ $unidadMedida->codigo }}</td>
                            <td>{{ $unidadMedida->fecha_compra }} </td>
                            <td>{{ $unidadMedida->fecha_vencimiento }}</td>
                            <td>{{ $unidadMedida->created_at }} </td>
                            <td>{{ $unidadMedida->updated_at }}</td>
                        </tr>
                    </table><br>
                    <h3>Listado de productos</h3>
                    

                        <table>
                            <tr>
                                
                                <td>Id del producto</td>
                                <td>tubo_id</td>
                                <td>contenido_id</td>
                                <td>Accciones</td>
                            </tr>
                            @foreach($unidadMedida->producto as $u)
                            <tr>
                                
                                <td>{{ $u->id }} </td>
                                <td>{{ $u->tubo_id }}</td>
                                <td>{{ $u->contenido_id }}</td>
                                <td><a href="{{ route('ver_producto_producto_tp2_ug0282_ug0314', [
                                    'tubo' => $unidadMedida->id,
                                    'producto' => $u->id
                                    ])}}">Ver Producto</a> </td>
                            </tr>
                            @endforeach
                        </table><br>
                        
                    
					
                <div class="sms">
                    {{ session ('mensaje') }}
                </div>
				
                </div>
				<a href="{{ route('listado_tubo_ug0282_ug0314') }}">Listar registros</a>

			</div>

  
        </div>
    </body>
</html>










