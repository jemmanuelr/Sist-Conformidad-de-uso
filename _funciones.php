<?php
function log_events($usuario, $evento, $n_pc) {
  $url = htmlspecialchars($_SERVER["PHP_SELF"]);
  $fecha = date('d-m-Y H:i:s');
  $ip = $_SERVER['REMOTE_ADDR'];

mysql_query("INSERT INTO log (usuario, fecha, url, evento, ip, n_pc ) VALUES ('$usuario', '$fecha', '$url' , '$evento', '$ip', '$n_pc')");

} ?>