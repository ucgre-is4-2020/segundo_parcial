<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de tubos</title>

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

				<h1>Listado de tubos</h1>

				<nav class="navbar navbar-light bg-light">
				  <form class="form-inline">

				    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				    <a href="{{ route('crear_tubo_ug0282_ug0314') }}">Nuevo tubo</a>
				  </form>
				</nav><br>



					<table>
						<tr style="font-weight: bold;">
							<td>Id</td>
							<td>serial</td>
							<td>codigo</td>
							<td>Fecha de compra</td>
							<td>Fecha de vencimiento</td>
							<td>Fecha de creacion</td>
							<td>Fecha de actualizacion</td>

							<td colspan="3">Acciones</td>
							

						</tr>

						@foreach($misTubos ?? '' as $unaUnidad)

						<tr>
							<td>{{ $unaUnidad->id }}</td>
							<td>{{ $unaUnidad->serial }} </td>
							<td>{{ $unaUnidad->codigo }}</td>
							<td>{{ $unaUnidad->fecha_compra }} </td>
							<td>{{ $unaUnidad->fecha_vencimiento }}</td>
							<td>{{ $unaUnidad->created_at }} </td>
							<td>{{ $unaUnidad->updated_at }}</td>
							

							<td><a href="{{ route ('borrar_unidad_medida_tp2_ug0282_ug0314', ['id' => $unaUnidad->id]) }}" onclick="return confirm('¿Está seguro de borrar este registro?')">Borrar</a>

								<a href="{{ route ('ver_tubos_tp2_ug0282_ug0314', ['id' => $unaUnidad->id]) }}">Ver</a>

								<a href="{{ route ('editar_unidad_medida_tp2_ug0282_ug0314', ['id' => $unaUnidad->id]) }}">Editar</a><br>
							</td>
						</tr>





						@endforeach

					</table><br>

				<div class="sms">
					{{ session ('mensaje') }}
				</div>


				<h5>Tengo un total de {{count($misTubos ?? '')}} unidades de medida</h5>


				<a href="{{route('welcome')}}"> Volver a la página principal</a>

			</div>


        </div>
    </body>
</html>









