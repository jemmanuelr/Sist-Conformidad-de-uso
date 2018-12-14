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
       	$("#codcon").inputmask({"mask": "A-99999999-9"});
}

// function limpia() {
//    var tam = val.length;
//    for(i = 0; i < tam; i++) {
//        if(!isNaN(val[i]))
//            document.getElementById("codcon").value = '';
//    }
//}
	function upperCase() {
   	var x=document.getElementById("codcon").value
   	document.getElementById("codcon").value=x.toUpperCase();
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
  <form action="pdf/confpdf/confor_uso.php" method="get" class="form">
    <div class="row">
      <div class="col-md-12">
        <input type="text" name="codcon" id="codcon" class="form-control" onkeypress="return soloLetras(event)" onblur="limpia()" placeholder="RIF - Generar Conformidad de Uso" onkeyup="upperCase()">
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
</body>
</html>