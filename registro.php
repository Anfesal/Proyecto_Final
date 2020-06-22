<?php
require_once"./conexion.php";

verificarUsuario();
function verificarUsuario(){

	$mysql = conexionSQL();

  
 
    
    $q = "SELECT * FROM clientes WHERE user='$_POST[username]' AND names='$_POST[nombre]'";
    $Users = $mysql->query($q);
    $contador = mysqli_num_rows($Users);
    if ($contador<1) {
        $query = "INSERT INTO `clientes` (`id`, `user`, `pass`, `names`, `email`) VALUES (NULL,'$_POST[username]','$_POST[contrasena]','$_POST[nombre]','$_POST[correo]')";  
        
        if( $mysql->query($query) === TRUE){

            session_start();
                $_SESSION['user']= $_POST['username'];
                $_SESSION['names']= $_POST['nombre'];
                $_SESSION['auth']= true;
	    } else{
            print("usuarios no registrados");
        } 
       if(isset($_SESSION['auth']) && ($_SESSION['auth']==true)){
                print("existe");
                header("Location:home.php");
        } 

	
    } else{
        print("usuarios ya registrados");
    } 
    mysqli_close($mysql);

}
?>