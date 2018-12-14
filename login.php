<?php
ini_set("session.cookie_lifetime","4200");
ini_set("session.gc_maxlifetime","4200");
session_start();
  include("conexion.php");
  include("_funciones.php");
    
    $hora = date('H:i');
    $session_id = session_id();
    $token = hash('sha256', $hora.$session_id);
    $error = $_GET['token'];

    $_SESSION['token'] = $token;
 
    //echo $_SESSION['token'];
    //setcookie("tokencok", $token, time() + 3600, "/", "alcaldiadematurin.gob.ve");

   if(isset($_SESSION['login_user'])){
      header("location:index.php");
   }
      $myusername = $_POST['user'];
      $mypassword = $_POST['pass'];

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $buscaldap = mysql_query("SELECT * FROM usuarios 
      WHERE UPPER(user) LIKE UPPER('".$myusername."') AND UPPER(clave_user) LIKE UPPER('".$mypassword."')");
     
      $count = mysql_num_rows($buscaldap);
        
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         mysql_query("UPDATE usuarios SET tokentmp ='".$token."' WHERE user='".$myusername."' "); // Funcion TOken

         $evento = "Inicio de Session";
         log_events($myusername, $evento, $n_pc); //Auditoria
         header("location: index.php");
      } else {
         $error = "El Usuario o Contraseña es incorrecto!";
         echo "<SCRIPT>alert('$error');</SCRIPT>";
      }
   }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.ico">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="esti.css" rel="stylesheet">
</head>

  <body class="text-center">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-signin" name="from1">
      <img class="mb-4" src="img/logo.png" alt="" width="272" height="150" /><br>
      <img src="img/SiRCCU.png" width="110px"/>
      <br>
      <br>
      <?php if ($error == "invalido") { ?>
      <div class="alert alert-danger" role="alert"> Su cuenta fue iniciada en otro equipo!</div>
      <?php } ?>

      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Clave</label>
      <input type="password" id="pass" name="pass" class="form-control" placeholder="Clave" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inicio</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
  

</body>
</html>