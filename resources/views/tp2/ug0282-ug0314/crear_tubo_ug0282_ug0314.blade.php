<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear registro</title>

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


            input, button, select{
            	font-family: 'Nunito', sans-serif;
            }

            #formulario{
					
					width: 300px;
					margin: auto;
					padding: 6px;

				}

			table, td{
				
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

				<h1>Agregar Tubo</h1>


				<form action="/listado-tubo-tp2-ug0282-ug0314/creacion-tubo" method="POST" >
					<!--Agregar siempre csrf en los formularios, es un token de seguridad-->
					@csrf

					<table>
						<tr>
							<td><label>Serial</label> </td>
							<td><input type="text" name="serial" ></td>
						</tr>
						<tr>
							<td><label>Codigo</label></td>
							<td><input type="text" name="codigo" ></td>
						</tr>
						<tr>
							<td><label>Fecha de compra</label> </td>
							<td><input type="date" name="compra" ></td>
						</tr>
						<tr>
							<td><label>Fecha de vencimiento</label></td>
							<td><input type="date" name="vencimiento" ></td>
						</tr>
					</table><br>

					<input type="submit">

					<div class="sms">
						@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
					</div>		
				</form><br>

				

				<div class="sms">
					{{ session ('mensaje') }}
				</div>
				



				<a href="{{ route('listado_tubo_ug0282_ug0314') }}">Listar tubos</a>

			</div>

  
        </div>
    </body>
</html>




