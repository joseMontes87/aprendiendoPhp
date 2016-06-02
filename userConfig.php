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
						<h1>Modificar Datos Usuario</h1>	
					</div>
				</div>
				<?php
						$row = $resultado->fetch_assoc();
						$nombre=$row["nombre"];
						$apellido=$row["apellido"];
						$dni=$row["dni"];
						$telefono=$row["telefono"];
						$usuario=$row["usuario"];
						$password=$row["password"];
				?>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="">Apellido</label>
							<input type="text" class="form-control" name="descripcion" id="apellido" value="<?php echo $apellido;?>">
						</div>
						<div class="form-group">
							<label for="">Nombre</label>
							<input type="" class="form-control" name="observaciones" id="nombre" value="<?php echo $nombre;?>">
						</div>
						<div class="form-group">
							<label for="">Dni</label>
							<input type="" class="form-control" name="dni" id="dni" value="<?php echo $dni;?>">
						</div>
						<div class="form-group">
							<label for="">Telefono</label>
							<input type="" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono;?>">
						</div>
						<div class="form-group">
							<label for="">Usuario</label>
							<input type="" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario;?>">
						</div>
						<div class="form-group">
							<label for="">Contraseña</label>
							<input type="" class="form-control" name="password" id="password" value="<?php echo $password;?>">
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