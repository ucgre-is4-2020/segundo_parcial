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

        <h2>Razon Social:{{$empresa ->razon_social}}</h2>
        <h3>Creacion: {{$empresa ->created_at}}</h3>
        <h3>Modificacion: {{$empresa ->updated_at}}</h3>


 <div class="links">
   
                <a href="{{route('tp2-ug0093-ug0278-ug0307-listar-empresa')}}">Volver al listado</a>     
                <a href="{{ URL::previous() }}">Atras</a>
  
   </div>
      
  
    </body>
</html>
