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

<h1>Ver Empresa</h1>

<table border="1" style="margin-top: 20px;"> 

    <tr>
        
        <td>
            Calle
        </td>

        <td>
           Direccion Numero
        </td>

         <td>
           Direccion Tipo
        </td>


         <td>
           Barrio
        </td>

         <td>
           Ciudad
        </td>


         <td>
          Departamento
        </td>

    </tr>

 @foreach ( $empresa ->direcciones_empresas as  $direcciones)

<tr>
<td>
    
    <li>{{$direcciones ->calle}}</li>

</td>

<td>
    
    <li>{{$direcciones ->numero}}</li>

</td>

 
    <td>
        
                  <li> {{$direcciones -> direccion_empresa_tipo->nombre}}</li>

    </td>   

    <td>
        
        <li>{{$direcciones ->barrio->nombre}}</li>

    </td>

     <td>
        
        <li>{{$direcciones ->barrio->ciudad ->nombre}}</li>

    </td>

    <td>
        
        <li>{{$direcciones ->barrio->ciudad ->departamento->nombre}}</li>

    </td>
</tr>

 @endforeach
 

  </table>


 <div class="links">
   
                  
                <a href="{{route('tp3-ug0307-listar-empresa')}}">Volver al listado</a>  
  
   </div>
      
  
    </body>
</html>
