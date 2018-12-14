<?php include '_seciones.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include ('_headbasic.php'); ?>
</head>

<body>
<?php
  include '_nav.php';
?>
<br>

<div class="container">
  <br>
  <div class="row">
    <div class="col-md-12">
    <?php
      require('busqueda.php');
    ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="buscar">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">
              <a href="consulta.php">
                SIGUIENTE BUSQUEDA 
              </a>
            </font>
          </font>
        </button>
      </div>
  </div>
</div>

</body>
</html>


