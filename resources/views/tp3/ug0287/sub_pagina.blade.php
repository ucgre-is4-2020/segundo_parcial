<h1>Direccion {{$registros->id}}</h1>

{{$registros->id}}<br>
 {{$registros->nombre}}<br>
 {{$registros->created_at}}<br>
 {{$registros->activo}}<br>
 {{$registros->updated_at}}<br><br>
Lista de direcciones<br>
@foreach ($registros->direcciones_empresas as $d)
	

	@foreach ($empresas as $empresa)
		@if ($empresa->id == $d->empresa_id)
           Nombre empresa: {{ $empresa->razon_social}} - 
        	@break
        @endif
		

	@endforeach
	Calle: {{$d->calle}} <br>


@endforeach


<br>
<a href="{{ route('listar_direccion_empresa_tipo') }}">Listar registros</a>
