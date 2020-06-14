<?php
require_once"./conexion.php";

verificarUsuario();
function verificarUsuario(){

	$mysql = conexionSQL();

	$q =("SELECT * FROM clientes WHERE user='".$_POST['username']."' AND pass ='".$_POST['contrasena']."'");
	$Users = $mysql->query($q);
	print($q);
	if(mysqli_num_rows($Users)!=0){

		session_start();
			$_SESSION['user']= $_POST['username'];
			$_SESSION['auth']= true;
	}else{
		print("no hay usuarios");
	}


	//print(mysqli_num_rows($Usuarios));

	if(isset($_SESSION['auth']) && ($_SESSION['auth']==true)){
	print("existe");
	header("Location:home.php");
	}else{
		print("no existe");
		header("Location:index.php?error=true");
	}
}
	?>

	
