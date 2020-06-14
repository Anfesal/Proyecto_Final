<?php

define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASS","");
define("DB","bandstore");

function conexionSQL(){

$link = new mysqli("localhost","root","","bandstore");
if($link->connect_error){
	$error="Error de conexion:".$link->connect_error."Mensaje: ".$link->connect_error;
	die($error);
}else{

	$q= "SET CHARACTER SET UTF8";

	return $link;

}
}
