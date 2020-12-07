<?php 

	$conexion = pg_connect("host=127.0.0.1 dbname=UG0299 user=postgres password=carlosdario99");

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Codigo</td>
			<td>Estado</td>
			<td>Fecha de Creacion</td>
			<td>Fecha de Actualizacion</td>
			<td>Usuario</td>
			<td>Email</td>	
		</tr>

		<?php 
		$sql="select * from roles_users as ru full join roles as r on ru.rol_id=r.id  full join users as u  on ru.user_id=u.id ;";
		$result=pg_query($conexion,$sql);

		while($mostrar=pg_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['codigo'] ?></td>
			<td><?php echo $mostrar['activo'] ?></td>
			<td><?php echo $mostrar['created_at'] ?></td>
			<td><?php echo $mostrar['updated_at'] ?></td>
			<td><?php echo $mostrar['name'] ?></td>
			<td><?php echo $mostrar['email'] ?></td>
		
		</tr>
	<?php 
	}
	 ?>
	</table>
	


</body>
</html>