<?php 
include("conexion.php");

$con=mysql_connect($host,$user,$pw) or die("Problemas con el sevidor");
mysql_select_db($db,$con) or die("Problemas con base de datos");

//Si detecta por POST que se preciono el boton guardar efecuta el codigo
if(isset($_POST['crear'])){
	//Recojo por POST descripcion, observaciones y precio del formulario y los guardo en variables
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$dni=$_POST['dni'];
	$telefono=$_POST['telefono'];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	
	/*pregunto si vino la variable por post y si no esta vacia. Si se cumplen las dos cosas pregunto por el proximo dato sino no sigo ejecutando*/
	if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
		if(isset($_POST['apellido']) && !empty($_POST['apellido'])){
			if(isset($_POST['dni']) && !empty($_POST['dni'])){
				if(isset($_POST['telefono']) && !empty($_POST['telefono'])){
					if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
				 		if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
				 			if(isset($_POST['password']) && !empty($_POST['password'])){
						 		mysql_query("INSERT INTO cliente(nombre,apellido,dni,telefono) values ('$nombre','$apellido','$dni','$telefono')");
						 		mysql_query("INSERT INTO login(usuario,password) values ('$usuario','$password')");
						 	 	header("Location: login.php");
				 			}
				 		}
				 	}
				}
			} 	
		} 
	} 
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
		<form action="" method="post">
			<div class="row">
				<div class="col-12">
					<h1>Registrar Usuario</h1>	
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
					</div>
					<div class="form-group">
						<label for="">Usuario</label>
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
					</div>

					<div class="form-group">
						<label for="">Contraseña</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="">
					</div>

					<div class="form-group">
						<label for="">Apellido</label>
						<input type="" class="form-control" name="apellido" id="apellido" placeholder="apellido">
					</div>
					<div class="form-group">
						<label for="">Dni</label>
						<input type="" class="form-control" name="dni" id="dni" placeholder="Dni">
					</div>
					<div class="form-group">
						<label for="">Telefono</label>
						<input type="" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
					</div>						
				</div>	
			</div>
			<div class="row">
				<div class="col-12">
					<button type="submit" name="crear" id="crear" class="btn btn-default">Crear Usuario</button>
					<a href="login.php" class="btn btn-default">Regresar</a>
				</div>
			</div>
		</form>
	</div>

	<!------------Scripts------------>
	<script type="text/javascript" src="js/jquery-2.2.3.min"></script>
	<script type="text/javascript" src="js/bootstrap.min"></script>
</body>

</html>