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

        <h2>Tipo de empresa:{{$empresa_tipo_empresa->EmpresaTipo->nombre}}</h2>
        <h3>Razon social: {{$empresa_tipo_empresa ->Empresa->razon_social}}</h3>
        <h3>Estado: {{$empresa_tipo_empresa ->activo?"activo":"No activo"}}</h3>
        <h3>Creacion: {{$empresa_tipo_empresa ->created_at}}</h3>
        <h3>Modificacion: {{$empresa_tipo_empresa ->updated_at}}</h3>


 <div class="links">
   
                  
                <a href="{{route('tp2-ug0093-ug0278-ug0307-listar-empresatipoempresa')}}">Volver al listado</a>  
  
   </div>
      
  
    </body>
</html>
