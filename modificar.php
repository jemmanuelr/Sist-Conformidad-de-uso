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
  <form action="actualizar.php" method="post" class="form">
    <div class="row">
      <div class="col-md-12">
      <?php
        require('act.php');
      ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-lg btn-primary btn-block" type="submit" id="actualizar">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">
                ACTUALIZAR REGISTRO 
              </font>
            </font>
          </button>
        </div>
        <br>
    </div>
  </form>
</div>

</body>
</html>


