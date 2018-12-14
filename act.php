<?php

$buscar = $_GET["buscar"];
require_once "conexion.php";
$bus=(int)$buscar;

$consulta1=("SELECT `id_empresa` FROM empresa WHERE rif=$bus");
$resultado1=mysql_query($consulta1);
$row1=mysql_fetch_row($resultado1);

$consulta2=("SELECT `empresa`.`id_empresa`, `empresa`.`rif`, `empresa`.`nomb_empresa`, `empresa`.`act_comercial`, `empresa`.`zonificacion`, `empresa`.`objeto`, `empresa`.`direccion`, `empresa`.`status`, `empresa`.`fecha`, `empresa`.`parroquia`, `empresa`.`sector`,  `representante`.`id_representante`, `representante`.`cedula`, `representante`.`nombre_completo`, `representante`.`telefono` FROM `representante`, `empresa` WHERE `empresa`.`id_empresa`=$row1[0]. AND `representante`.`id_representante`=$row1[0]");
$resultado2=mysql_query($consulta2);
$row2=mysql_fetch_row($resultado2);

echo '<div class="container">
  <br>
    <div class="row">
      <div class="col-md-12">
        <div role="tabpanel">

<!-- pestaña de opciones -->

          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#repre" role="tab" aria-controls="home" aria-selected="true"> Representante Legal </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#empresa" role="tab" aria-controls="profile" aria-selected="false"> Datos de la Empresa </a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            
<!-- primera pestaña -->
            
            <div class="tab-pane fade show active" id="repre" role="tabpanel" aria-labelledby="home-tab">
              <br>
              <input type="text" class="form-control" name="cedula" placeholder="CI DEL REPRESENTANTE LEGAL" value="'.$row2[12].'">
              <br>
              <input type="text" class="form-control" name="nombre_completo" placeholder="NOMBRES Y APELLIDOS DEL REPRESENTANTE LEGAL" value="'.$row2[13].'">
              <br>
              <input type="text" class="form-control" name="telefono" placeholder="TELEFONO DEL REPRESENTATNTE LEGAL" value="'.$row2[14].'">
            </div>
            <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="profile-tab">

<!-- segunda pestaña -->
            
              <br>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" name="rif" placeholder="RIF de la Empresa" value="'.$row2[1].'">
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="nomb_empresa" placeholder="Nombre de la Empresa" value="'.$row2[2].'">
                </div>
              </div>
              <br>
              <input type="text" class="form-control" name="objeto" placeholder="Objeto de la Empresa" value="'.$row2[5].'">
              <br>
              <div class="row">
                <div class="col-md-6">
                  <select name="parroquia" id="parroquia" class="form-control" required="required">
                    <option value="'.$row2[9].'">'.$row2[9].'</option>
                    <option value="Alto de Los Godos">Alto de Los Godos</option>
                    <option value="Boquerón">Boquerón</option>
                    <option value="Las Cocuizas">Las Cocuizas</option>
                    <option value="San Simón">San Simón</option>
                    <option value="Maturín">Maturín</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="El Corozo">El Corozo</option>
                    <option value="El Furrial">El Furrial</option>
                    <option value="Jusepín">Jusepín</option>
                    <option value="La Pica">La Pica</option>
                    <option value="San Vicente">San Vicente</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="sector" placeholder="Sector" required="required" value="'.$row2[10].'">
                </div>
              </div>
              <br>
              <input type="text" class="form-control" name="direccion" placeholder="Dirección Fiscal" value="'.$row2[6].'">
              <br>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Zonificación" name="zonificacion" value="'.$row2[4].'">
                    <br>
                    <select name="act_comercial" id="act_comercial" class="form-control" required="required">
                      <option value="'.$row2[3].'">'.$row2[3].'</option>
                      <option value="Comercial">Comercial</option>
                      <option value="Deportiva">Deportiva</option>
                      <option value="Educacional">Educacional</option>
                      <option value="Empresarial">Empresarial</option>
                      <option value="Industrial">Industrial</option>
                      <option value="Residencial">Residencial</option>
                      <option value="Residencial-Comercial">Residencial-Comercial</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="text" name="fecha" id="fecha" class="form-control" disable value="'.$row2[8].'">
                    <br>
                    <select name="status" id="status" class="form-control" required="required">
                      <option value="'.$row2[7].'">'.$row2[7].'</option>
                      <option value="renovacion">Renovación</option>
                      <option value="Impeccionado por: Gerardo Marquina">Impeccionado por: Gerardo Marquina</option>
                      <option value="Impeccionado por: Juan Saragay">Impeccionado por: Juan Saragay</option>
                      <option value="Impeccionado por: Karla Amaris">Impeccionado por: Karla Amaris</option>
                      <option value="Impeccionado por: Neurelis Morales">Impeccionado por: Neurelis Morales</option>
                      <option value="Impeccionado por: Rodolfo Cortez">Impeccionado por: Rodolfo Cortez</option>
                    </select>
                  </div>
                </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
</div>';

mysqli_close($conexion);

?>