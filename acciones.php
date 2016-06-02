<?php 
include("conexion.php");
session_start();

//Cerrar Sesion------------------------------------------------------------------------------------
if(isset($_POST['cerrarSesion'])){
	session_destroy();
    header('Location: login.php');
}
		
?>

<script type="text/javascript">
	var url=location.href;
	switch (url){
		//Index------------------------------------------------------------------------------------
		case "http://localhost/aprendiendoPhp/6-5/index.php":
			<?php
				//Index
				if(isset($_POST['modificar'])){
					$check=$_POST['check'];
					header('Location: modificar.php?id='.urlencode($check));
				}
				else if(isset($_POST['eliminar'])){
					$check=$_POST['check'];
					mysqli_query($con,"DELETE FROM cursos WHERE id=$check");
					header("Location: index.php");

				}
				else if(isset($_POST['insertar'])){
					$check=$_POST['check'];
					header("location: insertar.php");
				}
			?>
		break;
		
		//Insertar------------------------------------------------------------------------------------
		case "http://localhost/aprendiendoPhp/6-5/insertar.php":
			<?php 			
				if(isset($_POST['guardar'])){
					$descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
					$observaciones=mysqli_real_escape_string($con,$_POST['observaciones']);
					$precio=mysqli_real_escape_string($con,$_POST['precio']);
					
					if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
						if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])){
							if(isset($_POST['precio']) && !empty($_POST['precio'])){
								 mysqli_query($con,"INSERT INTO cursos(descripcion,observaciones,precio) values ('$descripcion','$observaciones','$precio')");
								 header("Location: index.php");
							}else echo"El precio no puede estar vacio";	
						}else echo"Las observaciones no puede estar vacia";
					}else echo"La descripcion no puede estar vacia";
				}
			?>
		break;

		//Modificar------------------------------------------------------------------------------------
		case "http://localhost/aprendiendoPhp/6-5/modificar.php":
			<?php 
				if(isset($_POST['guardar'])){
					$descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
					$observaciones=mysqli_real_escape_string($con,$_POST['observaciones']);
					$precio=mysqli_real_escape_string($con,$_POST['precio']);

					if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])){
						if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])){
							if(isset($_POST['precio']) && !empty($_POST['precio'])){
								 mysqli_query($con, "UPDATE cursos SET descripcion ='$descripcion', observaciones='$observaciones', precio='$precio' WHERE id=$id");
								 header("Location: index.php");
							}else echo"El precio no puede estar vacio";
						}else echo"Las observaciones no puede estar vacia";
					}else echo"La descripcion no puede estar vacia";
				}
			?>
		
		break;

		//Registrar------------------------------------------------------------------------------------
		case "http://localhost/aprendiendoPhp/6-5/registrar.php":
		<?php
			if(isset($_POST['crear'])){
				$nombre=mysqli_real_escape_string($con,$_POST['nombre']);
				$apellido=mysqli_real_escape_string($con,$_POST['apellido']);
				$dni=mysqli_real_escape_string($con,$_POST['dni']);
				$telefono=mysqli_real_escape_string($con,$_POST['telefono']);
				$usuario=mysqli_real_escape_string($con,$_POST['usuario']);
				$password=mysqli_real_escape_string($con,$_POST['password']);
				
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
		
		break;

		//userConfig------------------------------------------------------------------------------------
		case "http://localhost/aprendiendoPhp/6-5/userConfig.php":
			<?php 
				$resultado= $con->query("SELECT 
									c.id,
									apellido,
									nombre,
									dni,
									telefono,
									usuario,
									l.idlogin,
									password,
									usuario 

									FROM
									cliente c,
									login l

									WHERE 
									c.id=l.idLogin");
				//FALTA EL UPDATE!
			?>
		break;

		//Login------------------------------------------------------------------------------------
		case "http://localhost/aprendiendoPhp/6-5/login.php":
		<?php  
			if(isset($_POST['registrar'])){
			    header('Location: registrar.php');
			}
		?>
		break;	

		}
</script>