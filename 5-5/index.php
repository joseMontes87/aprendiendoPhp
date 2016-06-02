<?php 
include("conexion.php");
session_start();
//Conecto a el host, user y passwword que traigo de conexion.php}
//si hay algun problema digo que hay problemas con el servidor
$con=mysql_connect($host,$user,$pw) or die("Problemas con el sevidor");
//selecciono la base de datos y le paso los datos de la conexion que guarde en la linea anterior
//Si hay algun problema digo que hay problemas con la base de datos
mysql_select_db($db) or die("Problemas con base de datos");
//Guardo dentro de una varible la consulta sql
$sql="SELECT id,descripcion,observaciones,precio FROM cursos";
//La ejecuto y la guardo como Resultado. Puedo tambien hacerlo en una sola linea
$resultado=mysql_query($sql);

//Si existe un POST de modificar entonces ejecuto sino pregunto por eliminar o insertar
if(isset($_POST['modificar'])){
	$check=$_POST['check'];
	header('Location: modificar.php?id='.urlencode($check));
}
else if(isset($_POST['eliminar'])){
	$check=$_POST['check'];
	mysql_query("DELETE FROM cursos WHERE id=$check");
	header("Location: index.php");

}
else if(isset($_POST['insertar'])){
	$check=$_POST['check'];
	header("location: insertar.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ABM PHP</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/pisando.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

	<div class="container">
		<?php
			if(isset($_SESSION['usuarioSession'])){
		?>
		<form action="" method="post">
			<div class="row">
				<div class="col-12">
					<h1>ABM php</h1>	
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Id</th>
								<th>Descripcion</th>
								<th>observaciones</th>
								<th>precio</th>
								<th>Accion</th>	
							</tr>
						</thead>
						<tbody>
						<?php						
						while ($row=mysql_fetch_array($resultado)){
							$id=$row["id"];
							$descripcion=$row["descripcion"];
							$observaciones=$row["observaciones"];
							$precio=$row["precio"];
						?>
							<tr>
								<td><?php echo($id); ?></td>
								<td><?php echo($descripcion); ?></td>
								<td><?php echo($observaciones); ?></td>
								<td><?php echo($precio); ?></td>
								<td>
									<input name="check" type="checkbox" id="<?php echo($id); ?>"  value="<?php echo($id); ?>"/>
									<label for="<?php echo($id); ?>"></label>
								</td>
							</tr>
						
						<?php 
						}
						mysql_free_result($resultado);
						?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" name="modificar" id="modificar" class="btn btn-default">Modificar</button>
					<button type="submit" name="eliminar" id="eliminar" class="btn btn-default" onclick="confirmar()">Eliminar</button>
					<button type="submit" name="insertar" id="insertar" class="btn btn-default">Insertar</button>
				</div>
			</div>
		</form>
		<?php	
			}else{
				header("Location: login.php");
			}
		?>

			
	</div>

	<!------------Scripts------------>
	<script type="text/javascript" src="js/jquery-2.2.3.min"></script>
	<script type="text/javascript" src="js/bootstrap.min"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	
</body>

</html>