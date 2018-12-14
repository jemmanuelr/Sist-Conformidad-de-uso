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
  <form action="modificar.php" method="get" class="form">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <div class="row">
            <div class="col-md-12">
              <input type="text" name="rif" id="rif" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="col-md-12">
        <div class="row">
          <div class="col">
            <button class="btn btn-lg btn-primary btn-block" type="reset">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                  Limpiar
                </font>
              </font>
            </button>
          </div>
          <div class="col">
            <button type="submit" id="btn_buscar" class="btn btn-lg btn-primary btn-block">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                  Buscar 
                </font>
              </font>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>


