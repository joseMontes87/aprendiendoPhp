<?php 
include("conexion.php");
session_start();

$con=mysql_connect($host,$user,$pw) or die("Problemas con el sevidor");
mysql_select_db($db,$con) or die("Problemas con base de datos");
//Traigo de index.php el id del curso que seleccione para modificar
$id=$_GET["id"];
//Selecciono los datos del curso segun el ID que traje de index.php
$sql="SELECT descripcion,observaciones,precio FROM cursos WHERE id LIKE $id";
$resultado=mysql_query($sql, $con);
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
				 //Estas validaciones se pueden hacer con bootstrap o con javascrip y son mucho mas amigables
				 //Se hace la modificaion en la base y me redirige a index.php
				 mysql_query("UPDATE cursos SET descripcion ='$descripcion', observaciones='$observaciones', precio='$precio' WHERE id=$id");

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
				<?php
					$row=mysql_fetch_assoc($resultado);
						$descripcion=$row["descripcion"];
						$observaciones=$row["observaciones"];
						$precio=$row["precio"];
				?>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Decripcion</label>
							<input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion;?>">
						</div>
						<div class="form-group">
							<label for="">Observacion</label>
							<input type="" class="form-control" name="observaciones" id="observaciones" value="<?php echo $observaciones;?>">
						</div>
						<div class="form-group">
							<label for="">Precio</label>
							<input type="" class="form-control" name="precio" id="precio" value="<?php echo $precio;?>">
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
			mysql_free_result($resultado);	  
				
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