<h1> Ver Ciudad {{ $resgitroVer->id }}</h1>

@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session('mensaje'))
<div class="alert alert-success">
	<p> {{ session('mensaje') }} </p>
</div>
@endif


<div>
	
	{{ $resgitroVer->id }} <br>
	{{ $resgitroVer->departamento->nombre }} <br>
	{{ $resgitroVer->nombre }} <br>
	{{ $resgitroVer->abreviacion }} <br>
	{{ $resgitroVer->created_at }} <br>
	{{ $resgitroVer->update_at }} <br>

</div>

<a href="{{ route('tp2-ug0317-listado-ciudad') }}"> Volver al Listado </a>