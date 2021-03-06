<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar registro</title>

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
					
					width: 800px;
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

				<h1>Editar registro</h1>

				
				<form action="{{ route('edicion-ug0314', ['id' => $compuesto->id]) }}" method="POST" >

					@method('PUT')
					<!--Agregar siempre csrf en los formularios, es un token de seguridad-->
					@csrf


					<table>
						<tr>
							<td style="width: 10px;"><label>Id</label></td>
							<td><label>Codigo</label></td>
							<td><label>Nombre</label></td>
							<td><label>Estado</label></td>
							<td>Fecha de creación</td>
                            <td>Fecha de modificación</td>
						</tr>
						<tr>
							<td><input name="id" value="{{$compuesto->id}}" disabled="disabled"></td>
							<td><input type="text" name="codigo" value="{{$compuesto->codigo}}"></td>
							<td> <input type="text" name="nombre" value="{{$compuesto->nombre}}"></td>
							<td>@if ($compuesto->estado == true)
							   		<select name="estado" value="{{$compuesto->estado}}">
				  							<option value="true">activo </option>
				  							<option value="false">inactivo </option>  
									</select>
							   	@else
							   		<select name="estado" value="{{$compuesto->estado}}">
				  							<option value="false">inactivo </option>
				  							<option value="true">activo </option>  
									</select>
								@endif
							</td>
							<td><input type="text" name="creacion" value="{{$compuesto->created_at}}" disabled="disabled"></td>
							<td><input type="text" name="modificacion" value="{{$compuesto->updated_at}}" disabled="disabled"></td>
						</tr>

					</table><br>

					<input type="submit">

					
				</form><br>

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

				<div class="sms">
					{{ session ('mensaje') }}
				</div>

				<a href="{{ route('listado-ug0314') }}">Listar registros</a>

			</div>

  
        </div>
    </body>
</html>




