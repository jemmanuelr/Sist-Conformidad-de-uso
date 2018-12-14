<?php 
 error_reporting(E_ALL);
 ini_set('display_errors', '1');

require_once "conexion.php";
  $empresa_rif = $_POST['empresa_rif'];
  $cod_aprobacion = $_POST['cod_aprobacion'];
  $num_planilla = $_POST['num_planilla'];
  $fecha_emision= $_POST['fecha_emision'];
  $f_vencimiento = $_POST['fecha_vencimiento'];
  $id_repres = $_POST['id_repres'];
  $id_empres = $_POST['id_empres'];

//$fechahoy = date ( 'Y-m-j' ,strtotime ('2010-11-11'));
$fechahoy = date ( 'Y-m-j' );

//consulta representante legal
$representante = mysql_query("SELECT * FROM representante, empresa WHERE representante.id_representante=$id_repres and empresa.id_empresa=$id_empres");
$RepEmpreR=mysql_fetch_array($representante);

$id_empres1=$RepEmpreR['id_empresa'];
$id_repres1=$RepEmpreR['id_representante'];

//verificar si se emitio un pago o existe uno vigente
$verificarp =  mysql_query("SELECT * FROM `pago` WHERE empresa_id=$id_empres and representante_id=$id_repres ORDER BY fecharegistro DESC LIMIT 1");
$VerPG=mysql_fetch_array($verificarp);

if($VerPG == false) { //No hay registros Disponibles.
echo "no hay un coño";

		mysql_query("INSERT INTO pago(empresa_id, representante_id, CodAprob, NumPlanilla, fechaemsion, fechavence, fecharegistro) VALUES ('".$id_empres1."', '".$id_repres1."', '".$cod_aprobacion."', '".$num_planilla."', '".$fecha_emision."', '".$f_vencimiento."', '".$fechahoy."')");

		//Rutina para crear la conformidad de uso en un periodo anual
		$pagosconsul = mysql_query("SELECT id_pago FROM pago WHERE representante_id=$id_repres1 and empresa_id=$id_empres1 and NumPlanilla=$num_planilla");
		$PgconsultR=mysql_fetch_array($pagosconsul);
		$id_pago=$PgconsultR["id_pago"];

		mysql_query("INSERT INTO confor(representante_id, empresa_id, pago_id, fechaemi) VALUES ('".$id_repres1."', '".$id_empres1."', '".$id_pago."', '".$fechahoy."')");

		$ConsultPg=mysql_fetch_array(mysql_query("SELECT correlativo, pago_id FROM confor WHERE pago_id=$id_pago"));
		$correlativo= abs($ConsultPg["correlativo"]+1);

		mysql_query("UPDATE confor Set correlativo=$correlativo Where pago_id=$id_pago");

		echo "Resumen de trabajo realizado: <br> Se ha cargado correctamente el pago y se genero una Conformidad de uso por el Periodo establecido";

} else {

echo "ahora si hay <br>";

 //verificar si existe un pago, de ser asi verifica si todavia esta vigente
	$fechabd = $VerPG['fecharegistro']; //Extrae fecha guardada
	$nuevafecha = strtotime ( '+1 year' , strtotime ( $fechabd ) ) ; //agrega 1 año a la fecha guardada para el calculo
	$fechabd1y = date ( 'Y-m-j' , $nuevafecha );

	$dias	= (strtotime($fechabd1y)-strtotime($fechahoy))/86400; //calculo de dias restantes
	$dias 	= abs($dias); //salida de dias

		if (strtotime($fechabd1y) > strtotime($fechahoy)) { //si quedan dias vigente, se notifica, no puede guardar un nuevo pago hasta su fecha de vencimiento
		echo "quedas dias <br>";
		echo "Su ultimo pago todavia está vigente y quedan ".$dias." Dias<br>"; 

		} else {// puede continuar con el proceso de pago al verificar que esta vencida

		
		mysql_query("INSERT INTO pago(empresa_id, representante_id, CodAprob, NumPlanilla, fechaemsion, fechavence, fecharegistro) VALUES ('".$id_empres1."', '".$id_repres1."', '".$cod_aprobacion."', '".$num_planilla."', '".$fecha_emision."', '".$f_vencimiento."', '".$fechahoy."')");

		//Rutina para crear la conformidad de uso en un periodo anual
		$pagosconsul = mysql_query("SELECT id_pago FROM pago WHERE representante_id=$id_repres1 and empresa_id=$id_empres1 and NumPlanilla=$num_planilla");
		$PgconsultR=mysql_fetch_array($pagosconsul);
		$id_pago=$PgconsultR["id_pago"];

		mysql_query("INSERT INTO confor(representante_id, empresa_id, pago_id, fechaemi) VALUES ('".$id_repres1."', '".$id_empres1."', '".$id_pago."', '".$fechahoy."')");

		$ConsultPg=mysql_fetch_array(mysql_query("SELECT correlativo, pago_id FROM confor WHERE pago_id=$id_pago"));
		$correlativo= abs($ConsultPg["correlativo"]+1);

		mysql_query("UPDATE confor Set correlativo=$correlativo Where pago_id=$id_pago and empresa_id=$id_empres1");

		echo "Resumen de trabajo realizado: <br> Se ha cargado correctamente el pago y se genero una nueva Conformidad de uso por el Periodo establecido";


		}
}

//registro empresa
//$registro_emp = "INSERT INTO `empresa` (`rif`, `nomb_empresa`, `objeto`, `parroquia`, `sector`, `direccion`, `zonificacion`, `act_comercial`, `fecha`, `status`, `representante_id`) VALUES ('".$rif."', '".$nomb_empresa."', '".$objeto."', '".$parroquia."', '".$sector."', '".$direccion."', '".$zonificacion."', '".$act_comercial."', '".$fecha."', '".$status."', '".$row1[0]."')";
//$resultado_b = mysql_query($registro_emp);

$url="registro.php";
//echo "<SCRIPT>alert('Su registro fue procesado'); window.location='$url';</SCRIPT>"

?>