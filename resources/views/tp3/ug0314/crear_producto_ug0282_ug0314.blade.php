<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crear producto</title>

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
					
					width: 400px;
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

				<h1>Agregar nuevo producto</h1>


				<form action="/listado-producto-tp2-ug0282-ug0314/creacion-producto" method="POST" >
					<!--Agregar siempre csrf en los formularios, es un token de seguridad-->
					@csrf

					<table>
						<tr>
							<td><label>Seleccione el tubo</label> </td>
							<td>
								<select name="tubo_id">  
									@foreach($tubos as $tubo)
										<option value="{{ $tubo->id}}">{{ $tubo->serial}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Seleccione el Contenido</label> </td>
							<td>
								<select name="contenido_id">  
									@foreach($contenidos as $contenido)
										<option value="{{ $contenido->id}}">{{ $contenido->nombre}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Seleccione el Color</label> </td>
							<td>
								<select name="color_id">  
									@foreach($colores as $color)
										<option value="{{ $color->id}}">{{ $color->nombre}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Seleccione el Tubo Estado</label> </td>
							<td>
								<select name="tubo_estado_id">  
									@foreach($tubos_estados as $tubo_estado)
										<option value="{{ $tubo_estado->id}}">{{ $tubo_estado->nombre}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Seleccione el estado</label></td>
							<td><select name="activo" >
				  							<option value="true">activo </option>
				  							<option value="false">inactivo </option>  
								</select><br>
							</td>
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
				



				<a href="{{ route('listado_producto_ug0282_ug0314') }}">Listar productos</a>

			</div>

  
        </div>
    </body>
</html>




