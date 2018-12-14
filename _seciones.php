<?php session_start();
  include("conexion.php");
	include("_funciones.php");
   
   $user_check = $_SESSION['login_user'];
   $token_check = $_SESSION['token'];
   $n_pc =  gethostbyaddr($_SERVER['REMOTE_ADDR']);
   
   $ses_sql = mysql_query("SELECT * FROM usuarios WHERE user = '".$user_check."' ");
   $row = mysql_fetch_array($ses_sql);
   $login_session = $row['user'];

    if ($token_check  == $row['tokentmp']) {
     // echo $token_check ."<br>";
     // echo $row['tokentmp'];
    } else {
      $evento = "Intento de Logueo en otro equipo con la misma cuenta";
      log_events($login_session,$evento,$n_pc);

      session_destroy();
      header("location:login.php?token=invalido");
    }
    
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   } else {
   	$evento = "Entro en esta seccion";
   	log_events($login_session,$evento,$n_pc);
   }
?>