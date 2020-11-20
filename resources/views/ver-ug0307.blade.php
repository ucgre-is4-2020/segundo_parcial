<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <style>
	  .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            label{
              width: 200px;
              display: inline-block;
            }
	  </style>
    </head>
    <body>

        <h2>Nombre:{{$departamento ->nombre}}</h2>
        <h3>Abeviacion: {{$departamento ->abreviacion}}</h3>
        <h3>Creacion: {{$departamento ->created_at}}</h3>
        <h3>Modificacion: {{$departamento ->updated_at}}</h3>


 <div class="links">
   
                <a href="{{route('listar-ug0307')}}">Volver al listado</a>     
  
   </div>
      
  
    </body>
</html>
