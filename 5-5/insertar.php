<?php 
include("conexion.php");
session_start();

$con=mysql_connect($host,$user,$pw) or die("Problemas con el sevidor");
mysql_select_db($db,$con) or die("Problemas con base de datos");

//Si detecta por POST que se preciono el boton guardar efecuta el codigo
if(isset($_POST['guardar'])){
	//Recojo por POST descripcion, observaciones y precio del formulario y los guardo en variables
	$descripcion=$_POST['descripcion'];
	$observaciones=$_POST['observaciones'];
	$precio=$_POST['precio'];
	
	/*pregunto si vino la variable por post y si no esta vacia. Si se cumplen las dos cosas pregunto por el proximo dato sino no sigo ejecutando*/
	if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
		if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])){
			if(isset($_POST['precio']) && !empty($_POST['precio'])){
				 //Si todos vinieron bien y no estan vacios lo inserto en la base
				 //Estas validaciones se pueden hacer con bootstrap o con javascrip y son mucho mas amigables
				 mysql_query("INSERT INTO cursos(descripcion,observaciones,precio) values ('$descripcion','$observaciones','$precio')");
				 //Se hace la insercion en la base y me redirige a index.php
				 header("Location: index.php");
			}else echo"El precio no puede estar vacio"; //Si el precio esta vacio imprimo este mensaje	
		}else echo"Las observaciones no puede estar vacia"; //Si las observaciones estan vacias imprimo este mensaje
	}else echo"La descripcion no puede estar vacia"; //Si la descripcion esta vacia imprimo este mensaje
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
						<h1>Insertar Curso</h1>	
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Decripcion</label>
							<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Redactar brevemente la descripcion del curso">
						</div>
						<div class="form-group">
							<label for="">Observacion</label>
							<input type="" class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones">
						</div>
						<div class="form-group">
							<label for="">Precio</label>
							<input type="" class="form-control" name="precio" id="precio" placeholder="Insertar el precio con dos digitos para los centavos. Ej: 127.00">
						</div>
					</div>	
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" name="guardar" id="guardar" class="btn btn-default">Guardar</button>
						<a href="index.php" class="btn btn-default">Regresar</a>
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
</body>

</html>