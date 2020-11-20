<h1> Ver Producto {{ $resgitroVer->id }}</h1>

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
	{{ $resgitroVer->nombre }} <br>
	{{ $resgitroVer->created_at }} <br>
	{{ $resgitroVer->update_at }} <br>

</div>

<a href="{{ route('listado-ug0317') }}"> Volver al Listado </a>