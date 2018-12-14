<?php function fecha()
{ 
$mes = date("n"); 
$mesArray = array( 
1 => "Enero", 
2 => "Febrero", 
3 => "Marzo", 
4 => "Abril", 
5 => "Mayo", 
6 => "Junio", 
7 => "Julio", 
8 => "Agosto", 
9 => "Septiembre", 
10 => "Octubre", 
11 => "Noviembre", 
12 => "Diciembre" 
); 
 
$semana = date("D"); 
$semanaArray = array( 
"Mon" => "Lunes", 
"Tue" => "Martes", 
"Wed" => "Miercoles", 
"Thu" => "Jueves", 
"Fri" => "Viernes", 
"Sat" => "S&aacute;bado", 
"Sun" => "Domingo", 
); 
 
$mesReturn = $mesArray[$mes]; 
$semanaReturn = $semanaArray[$semana]; 
$dia = date("d"); 
$año = date ("Y"); 
 
return $semanaReturn." ".$dia." de ".$mesReturn." de ".$año; 
}
function cambia_fecha_a_normal($fecha)
{ 
	preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/", $fecha, $mifecha); 
	$lafecha = $mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
	return $lafecha; 
}
function cambia_fecha_post_normal($fecha)
{ 
	preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2} ) ([0-9]{1,2}):([0-9]{1,2})/", $fecha, $mifecha); 
	$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1]; 
	return $lafecha; 
}
function cambia_fecha_a_mysql($fecha){ 
    preg_match( "/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})/", $fecha, $mifecha); 
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
    return $lafecha; 
}
function cambia_fecha_a_normal1($fecha)
{ 
	preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})/", $fecha, $mifecha); 
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]; 
	return $lafecha; 
}
function cambia_fecha_hora($fecha)
{ 
	preg_match( "/([0-9]{2,4})\/([0-9]{1,2})\/([0-9]{2,4})-([0-9]{1,2}):([0-9]{1,2})/", $fecha, $mifecha); 
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1]." ".$mifecha[4].":".$mifecha[5]; 
	return $lafecha; 
}
function descomponer_fecha_hora($fecha)
{ 
	preg_match( "/([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2})/", $fecha, $mifecha); 
	return $mifecha; 
}
function suma_fechas($fecha,$ndias)            
{   
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
              list($dia,$mes,$año)=split("/", $fecha);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
              list($dia,$mes,$año)=split("-",$fecha);
        $nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
        $nuevafecha=date("d/m/Y",$nueva);
      return ($nuevafecha);         
}
function fecha_imprimir()
{ 
$mes = date("n"); 
$mesArray = array( 
1 => "Enero", 
2 => "Febrero", 
3 => "Marzo", 
4 => "Abril", 
5 => "Mayo", 
6 => "Junio", 
7 => "Julio", 
8 => "Agosto", 
9 => "Septiembre", 
10 => "Octubre", 
11 => "Noviembre", 
12 => "Diciembre" 
); 
$semana = date("D"); 
$semanaArray = array( 
"Mon" => "Lunes", 
"Tue" => "Martes", 
"Wed" => "Miercoles", 
"Thu" => "Jueves", 
"Fri" => "Viernes", 
"Sat" => "Sábado", 
"Sun" => "Domingo", 
); 
$mesReturn = $mesArray[$mes]; 
$semanaReturn = $semanaArray[$semana]; 
$dia = date("d"); 
$año = date ("Y"); 
return $dia." de ".$mesReturn." de ".$año; 
}
function fecha_pers($dateint)
{ 
$mes = date("n", $dateint);
$mesArray = array( 
1 => "Enero", 
2 => "Febrero", 
3 => "Marzo", 
4 => "Abril", 
5 => "Mayo", 
6 => "Junio", 
7 => "Julio", 
8 => "Agosto", 
9 => "Septiembre", 
10 => "Octubre", 
11 => "Noviembre", 
12 => "Diciembre" 
);
$semana = date("D", $dateint); 
$semanaArray = array( 
"Mon" => "Lunes", 
"Tue" => "Martes", 
"Wed" => "Miercoles", 
"Thu" => "Jueves", 
"Fri" => "Viernes", 
"Sat" => "Sábado", 
"Sun" => "Domingo", 
); 
$mesReturn = $mesArray[$mes]; 
$semanaReturn = $semanaArray[$semana]; 
$dia = date("d", $dateint); 
$año = date ("Y", $dateint); 
return $dia." de ".$mesReturn." de ".$año; 
}
 function fecha_imprimir1()
{ 
$mes = date("n"); 
$mesArray = array( 
1 => "Enero", 
2 => "Febrero", 
3 => "Marzo", 
4 => "Abril", 
5 => "Mayo", 
6 => "Junio", 
7 => "Julio", 
8 => "Agosto", 
9 => "Septiembre", 
10 => "Octubre", 
11 => "Noviembre", 
12 => "Diciembre" 
); 
 
$semana = date("D"); 
$semanaArray = array( 
"Mon" => "Lunes", 
"Tue" => "Martes", 
"Wed" => "Miercoles", 
"Thu" => "Jueves", 
"Fri" => "Viernes", 
"Sat" => "Sábado", 
"Sun" => "Domingo", 
); 
$mesReturn = $mesArray[$mes]; 
$semanaReturn = $semanaArray[$semana]; 
$dia = date("d"); 
$año = date ("Y");
return $dia." días del mes de ".$mesReturn." del ".$año; 
}
?>