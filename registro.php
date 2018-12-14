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
        $("#cedrepre").keyup(function(e){                       
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#cedrepre").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "TEST/ajx_Repress.php",
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

        $("#rif_reg").keyup(function(e){                       
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#rif_reg").val();
              //hace la búsqueda                                                                                  
              $.ajax({
                    type: "POST",
                    url: "TEST/ajx_Empress.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                    //imagen de carga
                    $("#resultadob").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                    },
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                  
                    $("#resultadob").empty();
                    $("#resultadob").append(data);
                    }
              });                                                                         
        });

}); 

  function upperCase() {
    var x=document.getElementById("cedrepre").value
    document.getElementById("cedrepre").value=x.toUpperCase();
    $("#rif_reg").inputmask({"mask": "A-99999999-9"});
    $("#cedrepre").inputmask({"mask": "99999999"});
}
  function muestra_repress(v) {

    $('input[name="nombre_completo"]').show().removeAttr('disabled');
    $('input[name="telefono"]').show().removeAttr('disabled');
    $('input[name="ID_Reps"]').hide().attr('disabled','disabled');

       if (v == true) {
        $('#resultado').text("");
        $('#resultadob').text("");

        mostrar_empress();
      }
  }
    function no_muestra() {

    $('input[name="nombre_completo"]').hide().attr('disabled','disabled');
    $('input[name="telefono"]').hide().attr('disabled','disabled');
    $('input[name="ID_Reps"]').removeAttr('disabled');
  }
    function iddatas(a,b) { /// AQUI MIJO LINDO ESTAS CON EL PEO DEL INPUT
    document.getElementById("ID_Reps").value=a;
   // document.getElementById("ID_Emps").value=b;
    }

    function mostrar_empress(v) {
      if (v == true) { // Empresa Existe
     $('input[name="nomb_empresa"]').attr('disabled','disabled');
     $('input[name="objeto"]').attr('disabled','disabled');
     $('select[name="parroquia"]').attr('disabled','disabled');
     $('input[name="sector"]').attr('disabled','disabled');
     $('input[name="direccion"]').attr('disabled','disabled');
     $('input[name="zonificacion"]').attr('disabled','disabled');
     $('select[name="act_comercial"]').attr('disabled','disabled');
     $('input[name="fecha"]').attr('disabled','disabled');
     $('select[name="status"]').attr('disabled','disabled');
     $('button[type="submit"]').attr('disabled','disabled');

      } else { // no existe, regristrar

     $('input[name="nomb_empresa"]').removeAttr('disabled');
     $('input[name="objeto"]').removeAttr('disabled');
     $('select[name="parroquia"]').removeAttr('disabled');
     $('input[name="sector"]').removeAttr('disabled');
     $('input[name="direccion"]').removeAttr('disabled');
     $('input[name="zonificacion"]').removeAttr('disabled');
     $('select[name="act_comercial"]').removeAttr('disabled');
     $('input[name="fecha"]').removeAttr('disabled');
     $('select[name="status"]').removeAttr('disabled');
     $('button[type="submit"]').removeAttr('disabled');

      }
    }
</script>



<!--  <script src="./js/inputmask-full.js"></script>
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
        $("#rif_reg").inputmask({"mask": "A-99999999-9"});
        $("#cedrepre").inputmask({"mask": "A-99999999"});
}

// function limpia() {
//    var tam = val.length;
//    for(i = 0; i < tam; i++) {
//        if(!isNaN(val[i]))
//            document.getElementById("codcon").value = '';
//    }
//}
  function upperCase() {
    var x=document.getElementById("rif_reg").value
    document.getElementById("rif_reg").value=x.toUpperCase();
}
</script> -->
</head>
<body>

<?php
  include '_nav.php';
?>
<br>

<div class="container">
  <br>
  <form action="registrar.php" method="post" class="form">
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
            <div class="tab-pane fade show active" id="repre" role="tabpanel" aria-labelledby="home-tab"><!-- primera pestaña -->
              <br>
              <input type="text" class="form-control" id="cedrepre" name="cedula" placeholder="CI DEL REPRESENTANTE LEGAL" required="required" autofocus onkeypress="return soloLetras(event)" onkeyup="upperCase()"><br>
              <div id="resultado"></div>
              <input type="hidden" class="form-control" id="ID_Reps" name="ID_Reps" placeholder="ID REPRESENTANTE LEGAL" required="required" disabled>
              <br>
              <input type="text" class="form-control" name="nombre_completo" placeholder="NOMBRES Y APELLIDOS DEL REPRESENTANTE LEGAL" required="required">
              <br>
              <input type="text" class="form-control" name="telefono" placeholder="TELEFONO DEL REPRESENTATNTE LEGAL" required="required">
            </div>
            <div class="tab-pane fade" id="empresa" role="tabpanel" aria-labelledby="profile-tab"><!-- segunda pestaña -->
              <br>
              <div class="row">
                <div class="col-md-4">
                  <input type="text" class="form-control" id="rif_reg" name="rif" placeholder="RIF de la Empresa" required="required"  onkeypress="return soloLetras(event)" onkeyup="upperCase()">
                </div>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="nomb_empresa" placeholder="Nombre de la Empresa" required="required">
                  <br><div id="resultadob"></div>
                </div>
              </div>
              <br>
              <input type="text" class="form-control" name="objeto" placeholder="Objeto de la Empresa" required="required">
              <br>
              <div class="row">
                <div class="col-md-6">
                  <select name="parroquia" id="parroquia" class="form-control"  required="required">
                    <option value="">Parroquia</option>
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
                  <input type="text" class="form-control" name="sector" placeholder="Sector" required="required">
                </div>
              </div>
              <br>
              <input type="text" class="form-control" name="direccion" placeholder="Dirección Fiscal" required="required">
              <br>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control" name="zonificacion" placeholder="Zonificación" required="required">
                    <br>
                    <select name="act_comercial" id="act_comercial" class="form-control" required="required">
                      <option value=""> Actividad Comercial</option>
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
                    <input type="date" name="fecha" id="fecha" class="form-control" required="required">
                    <br>
                    <select name="status" id="status" class="form-control" required="required">
                      <option value="">Status</option>
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
      <div class="row">
        <div class="col">
          <button class="btn btn-lg btn-primary btn-block" type="reset" onclick="muestra_repress(true);">
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">
                Limpiar
              </font>
            </font>
          </button>
        </div>
        <div class="col">
          <button  type="submit" id="btn_registrar" class="btn btn-lg btn-primary btn-block">
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


