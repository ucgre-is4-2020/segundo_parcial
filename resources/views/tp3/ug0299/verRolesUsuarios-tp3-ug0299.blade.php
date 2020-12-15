<?php 

	$conexion = pg_connect("host=127.0.0.1 dbname=UG0299 user=postgres password=carlosdario99");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Datos del Registro</title>
	<meta charset="utf-8">
	<style type="text/css">
		
	</style>
</head>
<body>
	<h1>Datos del Registro </h1>

<div class="links" style="display: inline-block; position: ">
<a href="{{route('welcome')}}">Inicio</a>
  </div>
  
 


 <table border="1" style="margin-top: 20px; border-collapse:collapse">
 <tr>
   <td>id</td>
   <td>Nombre</td>
   <td>Codigo</td>
   <td>Activo</td>
   <td>Fecha de Creacion</td>
   <td>Fecha de Actualizacion</td>
   <td>Usuario</td>
 </tr>
 
 <?php
$sql="select * from roles_users as ru full join roles as r on ru.rol_id=r.id  full join users as u  on ru.user_id=u.id ;";
$result=pg_query($conexion,$sql);




  foreach($respuesta as $var){
    foreach($result as $mostrar){
    echo "<tr>" 
      ."<td>" .$var->id ."</td>"
      ."<td>" .$var->nombre."</td>"
      ."<td>" .$var->codigo."</td>"
      ."<td>" .$var->activo."</td>"
      ."<td>" .$var->created_at."</td>"
      ."<td>" .$var->updated_at."</td>"."</tr>";
  }



  
    
    echo "<tr>" 
    ."<td>" .$mostrar->name ."</td>"
    ."<td>" .$var->email."</td>"."</tr>";

 
  }







  
  while($mostrar=pg_fetch_array($result)){
    ?>
  
   <tr>
    <td><?php echo $mostrar['nombre'] ?></td>
     <td><?php echo $mostrar['name'] ?></td>
     <td><?php echo $mostrar['email'] ?></td>
   
   </tr>
  <?php 
  }
  ?>
  



	
</table>
	</div>
</body>
</html>