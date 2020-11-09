<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de compuestos</title>

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
					
					width: 480px;
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

				<h1>Listado de compuestos químicos</h1>

				<nav class="navbar navbar-light bg-light">
				  <form class="form-inline">

				    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				    <a href="{{ route('crear-ug0314') }}">Nuevo compuesto</a>
				  </form>
				</nav><br>
				
				
				
					<table>
						<tr style="font-weight: bold;">
							<td>Id</td>
							<td>Nombre</td>
							<td>Codigo</td>
							<td>Estado</td>
							<td>Acciones</td>

						</tr>
						@foreach($misCompuestos as $unCompuesto)
						<tr>
							<td>{{ $unCompuesto->id }}</td>
							<td>{{ $unCompuesto->nombre }} </td>
							<td>{{ $unCompuesto->codigo }}</td>
							<td>{{ $unCompuesto->estado }} </td>
							<td><a href="{{ route ('borrar-ug0314', ['id' => $unCompuesto->id]) }}" onclick="return confirm('¿Está seguro de borrar este registro?')">Borrar</a>
								<a href="{{ route ('ver-ug0314', ['id' => $unCompuesto->id]) }}">Ver</a>
								<a href="{{ route ('editar-ug0314', ['id' => $unCompuesto->id]) }}">Editar</a><br></td>
						</tr>
						@endforeach
				
					</table><br>

				<div class="sms">
					{{ session ('mensaje') }}
				</div>
				

				<h5>Tengo un total de {{count($misCompuestos)}} compuestos químicos</h5>


				<a href="{{route('home')}}"> Volver a la página principal</a>

			</div>

  
        </div>
    </body>
</html>









