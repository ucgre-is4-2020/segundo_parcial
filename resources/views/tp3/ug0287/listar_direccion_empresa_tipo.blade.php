
<Style>
table, td{
				border: black solid 1px;
				border-collapse: collapse;
			}

</Style>		
<h1>Direcciones</h1>


<table>
	<tr>
		<td>
			Id
		</td>
		<td>
			Nombre
		</td>
		<td>
			Activo
		</td>
		<td>
			Fecha de Modificacion
		</td>
		<td>
			Fecha de Creacion
		</td>
		<td>
			Empresa
		</td>
		<td>
			Barrio
		</td>

	</tr>
	@foreach($direcciones as $dir)
	<tr>
		<td>
			<a href="{{ route ('sub_pagina', ['id' => $dir->id]) }}"> {{ $dir->id}}</a>

		</td>
		<td>
			{{ $dir->nombre}}

		</td>
		<td>
			{{ $dir->activo}}

		</td>
		<td>
			{{ $dir->created_at}}
		</td>
		<td>
			{{ $dir->updated_at}}
		</td>
		
	 
	 	<td>
	 		@foreach($dirempresas as $emp)
			   @if ($dir->id == $emp->direccion_empresa_tipo_id)
				   @foreach($empresas as $empresa)
				  
					   @if ($emp->empresa_id == $empresa->id)
							
							<a href="{{ route ('ver-ug0299', ['id' => $empresa->id]) }}"> {{$empresa->razon_social}} <br></a>
							
		               @endif

					@endforeach
					

               @endif

			@endforeach
			
		</td>
		<td>
	 		@foreach($dirempresas as $emp)
			   @if ($dir->id == $emp->direccion_empresa_tipo_id)
				   @foreach($barrios as $barrio)
				  
					   @if ($emp->barrio_id == $barrio->id)
							
							<a href="{{ route ('tp2-ug0317-ver-barrio', ['id' => $barrio->id]) }}"> {{$barrio->nombre}} <br></a>
							
		               @endif

					@endforeach
					

               @endif

			@endforeach
			
		</td>
	</tr>
	@endforeach
</table>


	















