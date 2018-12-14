<?php

require_once("Cne.php");
require_once("Responsable.php");
require_once("Asociado.php");
require_once("conexion.php");

if( isset($_POST['bResp']) ){

    $data_resp = new Responsable();
    $data_resp = $data_resp->consultar($_POST['nac_resp'].$_POST['cedula_resp']);

    if(count($data_resp) > 0){
        echo json_encode($data_resp);
        return;
    }

    $cne = new Cne();
    $r = $cne->obtenerElector($_POST['nac_resp'],$_POST['cedula_resp']);
    echo json_encode($r);
    return;
}

if( isset($_POST['bAsoc']) ){
    $cne = new Cne();
    $r = $cne->obtenerElector($_POST['nac'],$_POST['cedula']);
    echo json_encode($r);
    return;
}

if( isset($_POST['btn_registrar']) ){
    $asoc = new Asociado();
    $nuevo = $asoc->nuevo($_POST);
    $x = json_encode($nuevo);
    echo $x;
    return;
}




