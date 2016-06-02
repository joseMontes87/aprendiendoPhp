<?php 
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

		sarasa
	</div>
	<!------------Scripts------------>
	<script type="text/javascript" src="js/jquery-2.2.3.min"></script>
	<script type="text/javascript" src="js/bootstrap.min"></script>
</body>
</html>
<!-- joako -->