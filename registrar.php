<?php  require_once "conexion.php";

  $cedula = $_POST['cedula'];
  $nombre_completo = $_POST['nombre_completo'];
  $telefono = $_POST['telefono'];
  $rif = $_POST['rif'];
  $nomb_empresa = $_POST['nomb_empresa'];
  $objeto = $_POST['objeto'];
  $parroquia = $_POST['parroquia'];
  $sector = $_POST['sector'];
  $direccion = $_POST['direccion'];
  $zonificacion = $_POST['zonificacion'];
  $act_comercial = $_POST['act_comercial'];
  $fecha = $_POST['fecha'];
  $status = $_POST['status'];

  $ID_Reps = $_SESSION['ID_Reps'];

    if(!isset($_SESSION['ID_Reps'])){ //Prueba la salida, por id o por Registro

      // Registro representante
      mysql_query("INSERT INTO `representante`(`cedula`, `nombre_completo`, `telefono`) VALUES ('".$cedula."', '".$nombre_completo."', '".$telefono."')");

    //consulta representante legal
      $representante = mysql_query("SELECT `id_representante` FROM `representante` WHERE `cedula`=$cedula");
      $row1=mysql_fetch_row($representante);

      $ID_Reps_Salida = $row1[0];

    } else {

      $representante = mysql_query("SELECT `id_representante` FROM `representante` WHERE `id_representante`=$ID_Reps");
      $row1=mysql_fetch_row($representante);

      $ID_Reps_Salida = $row1[0];

    }

    //registro empresa
      mysql_query("INSERT INTO `empresa` (`rif`, `nomb_empresa`, `objeto`, `parroquia`, `sector`, `direccion`, `zonificacion`, `act_comercial`, `fecha`, `status`, `representante_id`) VALUES ('".$rif."', '".$nomb_empresa."', '".$objeto."', '".$parroquia."', '".$sector."', '".$direccion."', '".$zonificacion."', '".$act_comercial."', '".$fecha."', '".$status."', '".$ID_Reps_Salida."')");

        $url="registro.php";
        echo "<SCRIPT>alert('Su registro fue procesado'); window.location='$url';</SCRIPT>"
 

?>