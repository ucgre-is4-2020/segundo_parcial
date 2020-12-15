<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de productos</title>

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

				<h1>Listado de produtos</h1>

				<nav class="navbar navbar-light bg-light">
				  <form class="form-inline">

				    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				    <a href="{{ route('crear_producto_ug0282_ug0314') }}">Nuevo producto</a>
				  </form>
				</nav><br>



					<table>
						<tr style="font-weight: bold;">
							<td>Id</td>
							<td>Tubo</td>
							<td>Contenido</td>
							<td>Color</td>
							<td>Tubo Estado</td>
							<td>Activo</td>
							<td>Fecha de creacion</td>
							<td>Fecha de actualizacion</td>

							<td colspan="3">Acciones</td>
							

						</tr>

						@foreach($misProductos as $unaUnidad)

						<tr>
							<td>{{ $unaUnidad->id }}</td>
							<td>
								@foreach($tubos as $tubo)
									@if ($unaUnidad->tubo_id == $tubo->id)
								   		{{ $tubo->serial}}
								   		@break
									@endif
								@endforeach
								
							</td>
							<td>
								@foreach($contenidos as $c)
									@if ($unaUnidad->contenido_id == $c->id)
								   		{{ $c->nombre}}
								   		@break
									@endif
								@endforeach
								
							</td>
							<td>
								@foreach($colores as $cl)
									@if ($unaUnidad->color_id == $cl->id)
								   		{{ $cl->nombre}}
								   		@break
									@endif
								@endforeach
								
							</td>
							<td>
								@foreach($tubos_estados as $tb)
									@if ($unaUnidad->tubo_estado_id == $tb->id)
								   		{{ $tb->nombre}}
								   		@break
									@endif
								@endforeach
								
							</td>
							<td>
								@if ($unaUnidad->activo == true)
							   		activo
							   	@else
							   		inactivo
								@endif
							</td>
							<td>{{ $unaUnidad->created_at }} </td>
							<td>{{ $unaUnidad->updated_at }}</td>
							

							<td><a href="{{ route ('borrar_producto_tp2_ug0282_ug0314', ['id' => $unaUnidad->id]) }}" onclick="return confirm('¿Está seguro de borrar este registro?')">Borrar</a>

								<a href="{{route('ver_producto_producto_tp2_ug0282_ug0314', [
                                    'producto' => $unaUnidad->id,
                                    'tubo' => $unaUnidad->tubo_id
                                    ]) }}">Ver</a>
								

								<a href="{{ route ('editar_producto_tp2_ug0282_ug0314', ['id' => $unaUnidad->id]) }}">Editar</a><br>
							</td>
						</tr>





						@endforeach

					</table><br>

				<div class="sms">
					{{ session ('mensaje') }}
				</div>


				<h5>Tengo un total de {{count($misProductos ?? '')}} unidades de medida</h5>


				<a href="{{route('welcome')}}"> Volver a la página principal</a>

			</div>


        </div>
    </body>
</html>









