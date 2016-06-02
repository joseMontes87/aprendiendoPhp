<?php 
include("conexion.php");
include("acciones.php");
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

<?php 
include("nav.php")
?>
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