<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de productos</title>

        <!-- Fonts -->
        

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #black;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            #formulario{

					width: 1400px;
					margin: auto;
					padding: 6px;

				}

			table, td{
				border: black solid 2px;
				border-collapse: collapse;
			}

			.sms{
				background-color: #black;
				border-radius: 3px;
				color: white;

			}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

			<div id="formulario">

				<h1>Listado de Produtos</h1>

				<nav class="navbar navbar-light bg-light">
				  <form class="form-inline">

				    <select name="buscarpor" type="search">  
									@foreach($colores as $color)
										<option value="{{ $color->id}}">{{ $color->nombre}}</option>
									@endforeach
								</select>
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
				    Buscar</button>

				    
				    
				  </form>
				  <select name="buscarporcontenido" type="search">  
									@foreach($contenidos as $contenido)
										<option value="{{ $contenido->id}}">{{ $contenido->nombre}}</option>
									@endforeach
								</select>
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
				    Buscar</button>
				</nav><br>



					<table>
						<tr style="font-weight: bold;">
							<td>Id</td>
							<td>Tubo</td>
							<td>Contenido</td>
							<td>Color</td>
							<td>Tubo Estado</td>
							<td>Activo</td>

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
						</tr>

						@endforeach


					</table><br>

				<div class="sms">
					{{ session ('mensaje') }}
				</div>


				

				<a href="{{route('listado_producto_ug0282')}}">Recargar Listar Producto</a><br>
				<a href="{{route('welcome')}}"> Volver a la página principal</a>

			</div>


        </div>
    </body>
</html>









