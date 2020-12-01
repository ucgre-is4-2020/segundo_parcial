<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editar producto</title>

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

			#tabla1, .td{
				border: black solid 1px; 
				border-collapse: collapse;

			}
			table{
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

				<h1>Editar producto</h1>

				
				<form action="{{ route('edicion_producto_tp2_ug0282_ug0314', ['id' => $productos->id]) }}" method="POST" >

					@method('PUT')
					<!--Agregar siempre csrf en los formularios, es un token de seguridad-->
					@csrf


					<table id="tabla1">
						<tr>
							<td class="td" style="width: 10px;"><label>Id</label></td>
							<td class="td" ><label>Tubo</label></td>
							<td class="td" ><label>Contenido</label></td>
							<td class="td" ><label>Color</label></td>
							<td class="td" ><label>Tubo Estado</label></td>
							<td class="td" ><label>Activo</label></td>
							<td class="td" >Fecha de creación</td>
                            <td class="td" >Fecha de modificación</td>
						</tr>
						Datos actuales
						<tr>
							<td class="td" > {{ $productos->id }} </td>
                             <td class="td" > 
                                @foreach($tubos as $tubo)
                                    @if ($tubo->id == $productos->tubo_id)
                                        {{ $tubo->serial}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>
                            <td class="td" > 
                                @foreach($contenidos as $contenido)
                                    @if ($contenido->id == $productos->contenido_id)
                                        {{ $contenido->nombre}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>
                            <td class="td" > 
                                @foreach($colores as $color)
                                    @if ($color->id == $productos->color_id)
                                        {{ $color->nombre}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>
                            <td class="td" > 
                                @foreach($tubos_estados as $estado)
                                    @if ($estado->id == $productos->tubo_estado_id)
                                        {{ $estado->nombre}}
                                        @break
                                    @endif
                                @endforeach 
                            </td>

<<<<<<< HEAD
                            
                            <td class="td" >{{ $productos->activo }} </td>
=======
                            <td>@if ($productos->activo == true)
							   		activo
							   	@else
							   		inactivo
								@endif
							</td>
                            
>>>>>>> 309225a0264978c9dd9a2633970b502894ca9b3b
                            
                            <td class="td" >{{ $productos->created_at }} </td>
                            <td class="td" >{{ $productos->updated_at }}</td>
							
						</tr>
						
						

					</table><br>
					<table>
						Datos editables
						<tr>
							<td class="td" ><label>Tubo</label></td>
							<td class="td" ><label>Contenido</label></td>
							<td class="td" ><label>Color</label></td>
							<td class="td" ><label>Tubo Estado</label></td>
							<td class="td" ><label>Activo</label></td>
							
						</tr>
						<tr>
							
							<td>
								<select name="tubo_id">  
									@foreach($tubos as $tubo)
										<option value="{{ $tubo->id}}">{{ $tubo->serial}}</option>
									@endforeach
								</select>
							</td>
						
							</td>
							<td>
								<select name="contenido_id">  
									@foreach($contenidos as $contenido)
										<option value="{{ $contenido->id}}">{{ $contenido->nombre}}</option>
									@endforeach
								</select>
							</td>
						
							
							<td>
								<select name="color_id">  
									@foreach($colores as $color)
										<option value="{{ $color->id}}">{{ $color->nombre}}</option>
									@endforeach
								</select>
							</td>
						
							 </td>
							<td>
								<select name="tubo_estado_id">  
									@foreach($tubos_estados as $tubo_estado)
										<option value="{{ $tubo_estado->id}}">{{ $tubo_estado->nombre}}</option>
									@endforeach
								</select>
							</td>
						
							<td><select name="activo" >
				  							<option value="true">activo </option>
				  							<option value="false">inactivo </option>  
								</select><br>
							</td>
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

				<a href="{{ route('listado_producto_ug0282_ug0314') }}">Listar registros</a>

			</div>

  
        </div>
    </body>
</html>




