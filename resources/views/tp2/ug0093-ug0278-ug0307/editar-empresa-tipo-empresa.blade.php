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


  <h1>Editar empresa tipo empresa</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{route('tp2-ug0093-ug0278-ug0307-edicion-empresatipoempresa',['id' =>$seleccionada ->id])}}" method="post">
    @method('PUT')
    
  @csrf 

 



 <select name="empresa_tipo_id">
  @foreach ($tEmpresa as $tipoEmpresa)

   
       
          <option     <?=  $tipoEmpresa->id==$seleccionada->empresa_tipo_id?"selected":""   ?>  value="{{$tipoEmpresa->id}}">{{$tipoEmpresa->nombre}}</option>

     

  @endforeach
  </select>

<select name="empresa_id">
   @foreach ($Empresa as $Empresa)

     
       
          <option    <?=  $Empresa->id==$seleccionada->empresa_id?"selected":""   ?>   value="{{$Empresa->id}}">{{$Empresa->razon_social}}</option>

     

  @endforeach
  </select>
    

     <select name="activo">
       
          <!--<option value="true" >activo</option>
          <option value="false" >no activo</option>-->

     
<!--selected="{{$seleccionada->activo==1?'selected':''}}"-->




     <option  <?=  $seleccionada->activo==true?"selected":""   ?> value="true"  >activo</option>
     <option  <?=  $seleccionada->activo==false?"selected":""   ?>  value="false"  >no activo</option>




  </select>

  <input type="submit"><br>


  </form>

  

<br>

   <div class="links">
   
                    <a href="{{route('tp2-ug0093-ug0278-ug0307-listar-empresatipoempresa')}}">Listar empresa tipo empresa</a>
  
   </div>
   
   <br>

   @if(session('incorrecto'))
        <h1 style="color: red">Se produjeron los siguientes errores *</h1>
        <h3 style="color: red">{{session('incorrecto')}}</h3>
   @endif

    </body>
</html>
