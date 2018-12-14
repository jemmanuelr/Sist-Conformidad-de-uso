<?php session_start();
	include("conexion.php");
	include("_funciones.php");
	$user_check = $_SESSION['login_user'];
  	$n_pc =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
 	$evento = "Se desconecto del sistema";

   if(!isset($_SESSION['login_user'])){ //si ya se termino la sesion o intenta entrar aqui
   	  session_destroy();
      header("location:login.php");
   } else { // confirma si el usuario esta en linea y cierra sesion
	log_events($user_check,$evento,$n_pc);
	session_destroy();
	header('Location: login.php');
   }
?>