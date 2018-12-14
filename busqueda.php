<?php include('conexion.php');

$rifbus = strtoupper($_POST['buscar']);

$conexion = mysql_query("SELECT id_empresa, representante_id FROM empresa WHERE rif ='".$rifbus."'");
//$bus1 = mysql_fetch_row($conexion); //toma carga de las demas tablas
$bus1 = mysql_fetch_array($conexion);


if(is_null($bus1)) {
echo "<center>DATA NO ENCONTRADA</center>";
} else {


$consulta2= mysql_query("SELECT * FROM representante, empresa WHERE empresa.id_empresa= $bus1[id_empresa] AND representante.id_representante= $bus1[representante_id] ");

//$row2=mysql_fetch_row($resultado2);
$row2 = mysql_fetch_array($consulta2);

echo '<div class="container">
  <br>
    <div class="row">
      <div class="col-md-12">
        <div role="tabpanel">
          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist"><!-- pestaña de opciones -->
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#repre" role="tab" aria-controls="home" aria-selected="true"> Representante Legal </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#empresa" role="tab" aria-controls="profile" aria-selected="false"> Datos de la Empresa </a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="repre" role="tabpanel" aria-labelledby="home-tab">
            	<!-- primera pestaña -->
              <br>
              <input type="text" class="form-control" name="cedula" disabled value="'.$row2['cedula'].'">
              <br>
              <input type="text" class="form-control" name="nombre_completo" disabled value="'.$row2['nombre_completo'].'">
              <br>
              <input type="text" class="form-control" name="telefono" disabled value="'.$row2['telefono'].'">
            </div>
            <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="profile-tab"><!-- segunda pestaña -->
              <br>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" name="rif" disabled value="'.$row2['rif'].'">
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="nomb_empresa" disabled value="'.$row2['nomb_empresa'].'">
                </div>
              </div>
              <br>
              <input type="text" class="form-control" name="objeto" disabled value="'.$row2['objeto'].'">
              <br>
              <!-- 
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" name="objeto" disabled value="'.$row2['6'].'">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="sector" placeholder="Sector" required="required">
                </div>
              </div>
              <br>
              -->
              <input type="text" class="form-control" name="direccion" disabled value="'.$row2['direccion'].'">
              <br>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" name="zonificacion" disabled value="'.$row2['zonificacion'].'">
                    <br>
                    <input type="text" class="form-control" name="act_comercial" disabled value="'.$row2['act_comercial'].'">
                  </div>
                  <div class="col">
                    <input type="text" name="fecha" id="fecha" class="form-control" disabled value="'.$row2['fecha'].'">
                    <br>
                    <input type="text" name="status" id="status" class="form-control" disabled value="'.$row2['status'].'">
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
}

mysqli_close($conexion);
?>