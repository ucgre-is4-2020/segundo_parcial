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

				    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Serial" aria-label="Search">

				    <select name="color_id">  
							@foreach($colores as $color)
								<option value="{{ $color->id}}">{{ $color->nombre}}</option>
							@endforeach
					</select>

					<select name="contenido_id">  
						@foreach($contenidos as $contenido)
							<option value="{{ $contenido->id}}">{{ $contenido->nombre}}</option>
						@endforeach
					</select>

				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				    <a href="{{ route('crear_tubo') }}">Nuevo tubo</a>
				  </form>
				</nav><br>




					<table>
						<tr style="font-weight: bold;">
							<td>Id</td>
							<td>serial</td>
							<td>codigo</td>
							<td>Unidad de Medida</td>
							<td>Fecha de compra</td>
							<td>Fecha de vencimiento</td>
							<td>Fecha de creacion</td>
							<td>Fecha de actualizacion</td>
							<td>Productos</td>
							<td>Color</td>
							<td>Contenido</td>
							<td>Tubo Estado</td>

							

							<td colspan="3">Acciones</td>


						</tr>

						@foreach($misTubos as $unaUnidad)

						<tr>
							<td>{{ $unaUnidad->id }}</td>
							<td>{{ $unaUnidad->serial }} </td>
							<td>{{ $unaUnidad->codigo }}</td>


							<td>
								@foreach($medidasTubo as $medidaTubo)
									@if ($unaUnidad->id == $medidaTubo->tubo_id)

		                                @foreach($medidas as $medida)
											@if ($medida->id == $medidaTubo->unidad_medida_id)
		                                       	{{ $medida->nombre}}<br>
		                                        @break
		                                    @endif
										@endforeach
		                                        
                                        
                                    @endif
								@endforeach
							</td>


							<td>{{ $unaUnidad->fecha_compra }} </td>
							<td>{{ $unaUnidad->fecha_vencimiento }}</td>
							<td>{{ $unaUnidad->created_at }} </td>
							<td>{{ $unaUnidad->updated_at }}</td>
							<td>
								@foreach($misProductos as $unProducto)
									@if ($unaUnidad->id == $unProducto->tubo_id)

										<a href="{{ route('ver_producto_producto_tp2_ug0282_ug0314', [
                                    'tubo' => $unaUnidad->id,
                                    'producto' => $unProducto->id
                                    ])}}">Producto {{$unProducto->id}} </a> <br>

                                    @endif
								@endforeach
							</td>
							<td>
								@foreach($misProductos as $unProducto)
									@if ($unaUnidad->id == $unProducto->tubo_id)

                                       	@foreach($colores as $color)
											@if ($color->id == $unProducto->color_id)
											<a href="{{route('Ver-Color', ['id' => $color->id]) }}"> {{ 
												$color->nombre}}</a> <br>	
		                                        @break
		                                    @endif
										@endforeach
                                        
                                    @endif
								@endforeach
							</td>
							<td>
								
								@foreach($misProductos as $unProducto)
									@if ($unaUnidad->id == $unProducto->tubo_id)

                                       	@foreach($contenidos as $contenido)
											@if ($contenido->id == $unProducto->contenido_id)

												<a href="{{route('ver-ug0314', ['id' => $contenido->id]) }}"> {{ $contenido->nombre}}</a> <br>
		                                        @break
		                                    @endif
										@endforeach
                                        
                                    @endif
								@endforeach
							
							</td>
							<td>
								
								@foreach($misProductos as $unProducto)
									@if ($unaUnidad->id == $unProducto->tubo_id)

                                       	@foreach($estados as $estado)
											@if ($estado->id == $unProducto->tubo_estado_id)
		                                       	{{ $estado->nombre}}<br>
		                                        @break
		                                    @endif
										@endforeach
                                        
                                    @endif
								@endforeach
							
							</td>

							<td><a href="{{ route ('borrar_tubo', ['id' => $unaUnidad->id]) }}" onclick="return confirm('¿Está seguro de borrar este registro?')">Borrar</a>

								<a href="{{ route ('ver_tubo', ['id' => $unaUnidad->id]) }}">Ver</a>

								<a href="{{ route ('editar_tubo', ['id' => $unaUnidad->id]) }}">Editar</a><br>
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









