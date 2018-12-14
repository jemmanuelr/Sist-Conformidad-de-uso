<?php

  require_once "conexion.php";

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

// Registro representante
$registro_rep = "UPDATE `representante` SET `cedula`='".$cedula."',`nombre_completo`='".$nombre_completo."',`telefono`='".$telefono."'";
$resultado_a = mysql_query($registro_rep);
$cedula=(int)$cedula;

//consulta representante legal
$representante = "SELECT `id_representante` FROM `representante` WHERE `cedula`=$cedula";
$resultado_r = mysql_query($representante);
$row1=mysql_fetch_row($resultado_r);

//registro empresa
$registro_emp = "UPDATE `empresa` SET `rif`='".$rif."',`nomb_empresa`='".$nomb_empresa."',`objeto`='".$objeto."',`parroquia`='".$parroquia."',`sector`='".$sector."',`direccion`='".$direccion."',`act_comercial`='".$act_comercial."',`zonificacion`='".$zonificacion."',`fecha`='".$fecha."',`status`='".$status."',`representante_id`='".$row1[0]."'";
$resultado_b = mysql_query($registro_emp);

$url="index.php";

echo "<SCRIPT>window.location='$url';</SCRIPT>"

?>

