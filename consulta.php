<?php include '_seciones.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include ('_headbasic.php'); ?>
  <script src="./js/inputmask-full.js"></script>
  <script src="./js/inputmask.extensions.js"></script>
  <script>
function soloLetras(e) {
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = "jgve0123456789";
   especiales = [8, 37, 39, 46];

   tecla_especial = false
   for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;

           break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
        $("#buscar").inputmask({"mask": "A-99999999-9"});
}

// function limpia() {
//    var tam = val.length;
//    for(i = 0; i < tam; i++) {
//        if(!isNaN(val[i]))
//            document.getElementById("codcon").value = '';
//    }
//}
  function upperCase() {
    var x=document.getElementById("buscar").value
    document.getElementById("buscar").value=x.toUpperCase();
}
</script>
</head>

<body>
<?php
  include '_nav.php';
?>
<br>

<div class="container">
  <br>
  <form action="buscar.php" method="post" class="form">
    <div class="row">
      <div class="col-md-12">
        <input type="text" name="buscar" id="buscar" class="form-control" placeholder="BUSCAR POR RIF" onkeypress="return soloLetras(event)" onkeyup="upperCase()">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="buscar">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">
              BUSCAR 
            </font>
          </font>
        </button>
      </div>
    </div>
  </form>

</div>

<script src="codigo.js"></script>
</body>
</html>


