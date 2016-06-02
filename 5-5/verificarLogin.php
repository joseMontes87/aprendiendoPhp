<?php 
session_start();

include("conexion.php");

if(isset($_POST['usuario']) && !empty($_POST['usuario'])){

	if(isset($_POST['password']) && !empty($_POST['password'])){
		//La contraseña existe y no esta vacia
		$con=mysql_connect($host,$user,$pw) or die("Problemas con el sevidor");
		mysql_select_db($db,$con) or die("Problemas con base de datos");
		$sel=mysql_query("SELECT usuario,password FROM login WHERE usuario='$_POST[usuario]'",$con);
		$sesion=mysql_fetch_array($sel);

		if($_POST['usuario']==$sesion['usuario']){
			if ($_POST['password']==$sesion['password']){
				$_SESSION['usuarioSession']=$_POST['usuario'];
				header("Location:index.php");
			}else{
				echo "La contraseña es incorrecta";
			}		
		}else{
			echo "Usuario incorrecto";
		}
	}else{
		echo "Campo CONTRASEÑA vacio. Debes llenarlo";
	}
}else{
	echo "Campo DNI USUARIO vacio. Debes llenarlo";
}

?>