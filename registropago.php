<?php include '_seciones.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include ('_headbasic.php'); ?>
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
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="./js/inputmask-full.js"></script>
<script src="./js/inputmask.extensions.js"></script>
<script>
$(document).ready(function(){
        var consulta;
        //hacemos focus al campo de búsqueda
        //$("#empresa_rif").focus();
                                                                                                     
        //comprobamos si se pulsa una tecla
        $("#empresa_rif").keyup(function(e){
                                      
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#empresa_rif").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "TEST/testearbuscar.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                  
                    $("#resultado").empty();
                    $("#resultado").append(data);
                    }
              });                                                                         
        });                                                     
}); 

  function upperCase() {
    var x=document.getElementById("empresa_rif").value
    document.getElementById("empresa_rif").value=x.toUpperCase();
  $("#empresa_rif").inputmask({"mask": "A-99999999-9"});
}
  function muestra() {
    $('input[type="text"]').removeAttr('disabled');
    $('input[type="hidden"]').removeAttr('disabled');
    $('button[type="submit"]').removeAttr('disabled');
    $('input[type="date"]').removeAttr('disabled');

  }
    function nomuestra() {
    $('input[type="hidden"]').attr('disabled','disabled');
    $('button[type="submit"]').attr('disabled','disabled');

    $('input[name="cod_aprobacion"]').attr('disabled','disabled');
    $('input[name="num_planilla"]').attr('disabled','disabled');
    $('input[name="fecha_emision"]').attr('disabled','disabled');
    $('input[name="fecha_vencimiento"]').attr('disabled','disabled');
    
   // $('input[name="id_repres"]').attr('disabled','disabled');
   // $('input[name="id_empres"]').attr('disabled','disabled');
  }
    function iddatas(a,b) { /// AQUI MIJO LINDO ESTAS CON EL PEO DEL INPUT
//    document.getElementById("id_repres").value = “Tutorial Javascript” ;
   document.getElementById("ID_Reps").value=a;
	 document.getElementById("ID_Emps").value=b;
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
  <form action="registrarpago.php" method="post" class="form" id="f1">
    <div class="row">
      <div class="col-md-12">
        <div role="tabpanel">
          <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist"><!-- pestaña de opciones -->
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#repre" role="tab" aria-controls="home" aria-selected="true"><strong> Registro de pago </strong></a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="repre" role="tabpanel" aria-labelledby="home-tab"><!-- primera pestaña -->
              <input type="text" class="form-control" id="empresa_rif" name="empresa_rif" placeholder="RIF de la Empresa" required="required"  onkeypress="return soloLetras(event)" onkeyup="upperCase()" autofocus><br>
              <div id="resultado"></div>
              <br>
              <input type="text" class="form-control" name="cod_aprobacion" placeholder="PUNTO DE VENTA - Código de Aprobación" required="required" autofocus>
              <br>
              <input type="text" class="form-control" name="num_planilla" placeholder="NUMERO DE PLANILLA" required="required" autofocus>
              <br>
              <label for="fdep" style="width: 49%;float: left;">FECHA DE EMISION DE LA PLANILLA</label><label for="fdvp" style="width: 49%;float: right;">FECHA DE VENCIMIENTO DE LA PLANILLA</label><br>
              <input type="date" class="form-control" name="fecha_emision" required="required" style="width: 49%;float: left;" id="fdep">
              
              <input type="date" class="form-control" name="fecha_vencimiento" required="required" style="width: 49%;float: right;" id="fdvp">

              <br>
              <input type="hidden" class="form-control" id="ID_Reps" name="id_repres" placeholder="ID REPRESENTANTE" required="required" style="width: 49%;float: left;">
              <input type="hidden" class="form-control" id="ID_Emps" name="id_empres" placeholder="ID EMPRESA" required="required" style="width: 49%;float: right;">
            </div>
            </div>
          </div>
        </div>
      </div>
      <br>
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
          <button  type="submit" id="btn_registrar" class="btn btn-lg btn-primary btn-block" disabled>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">
                Registrar 
              </font>
            </font>
          </button>
        </div>
      </div>
    </div>
  </form>
</div>

  <script src="cont/codigo.php"></script>
</body>
</html>


