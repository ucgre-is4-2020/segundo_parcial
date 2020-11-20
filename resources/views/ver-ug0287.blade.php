<h1>Registro {{ $factura->id}}</h1>

			
				<div>
                    <table>
                        <tr style="font-weight: bold;">
                            <td>Id</td>
                            <td>Codigo</td>
                            <td>Nombre</td>
                            
                            <td>Fecha de creación</td>
                            <td>Fecha de modificación</td>
                        </tr>
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->codigo }}</td>
                            <td>{{ $factura->nombre }}</td>
                          
                            <td>{{ $factura->created_at }}</td>
                            <td>{{ $factura->updated_at }}</td>
                        </tr>
                    </table><br>
					
                <div class="sms">
                    {{ session ('mensaje') }}
                </div>
				
                </div>
				<a href="{{ route('listado-ug0287') }}">Listar registros</a>

			</div>