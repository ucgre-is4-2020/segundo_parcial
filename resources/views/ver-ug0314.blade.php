<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registro {{ $compuesto->id}} </title>

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
					
					width: 500px;
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

				<h1>Registro {{ $compuesto->id}}</h1>

			
				<div>
                    <table>
                        <tr style="font-weight: bold;">
                            <td>Id</td>
                            <td>Codigo</td>
                            <td>Nombre</td>
                            <td>Estado</td>
                            <td>Fecha de creación</td>
                            <td>Fecha de modificación</td>
                        </tr>
                        <tr>
                            <td>{{ $compuesto->id }}</td>
                            <td>{{ $compuesto->codigo }}</td>
                            <td>{{ $compuesto->nombre }}</td>
                            <td>{{ $compuesto->estado }}</td>
                            <td>{{ $compuesto->created_at }}</td>
                            <td>{{ $compuesto->update_at }}</td>
                        </tr>
                    </table><br>
					
                <div class="sms">
                    {{ session ('mensaje') }}
                </div>
				
                </div>
				<a href="{{ route('listado-ug0314') }}">Listar productos</a>

			</div>

  
        </div>
    </body>
</html>










