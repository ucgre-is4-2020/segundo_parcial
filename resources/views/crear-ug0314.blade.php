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

				<h1>Agregar Compuesto</h1>


				<form action="/listado_adm_contenido/creacion_adm_contenido" method="POST" >
					<!--Agregar siempre csrf en los formularios, es un token de seguridad-->
					@csrf

					<table>
						<tr>
							<td><label>Codigo</label> </td>
							<td><input type="text" name="codigo" ></td>
						</tr>
						<tr>
							<td><label>Nombre</label></td>
							<td><input type="text" name="nombre" ></td>
						</tr>
						<tr>
							<td><label>Estado</label></td>
							<td><select name="estado" >
				  							<option value="true">activo </option>
				  							<option value="false">inactivo </option>  
										</select><br></td>
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
				



				<a href="{{ route('listado-ug0314') }}">Listar registros</a>

			</div>

  
        </div>
    </body>
</html>




