
<?php
 $conexion = mysql_connect("alcaldiadematurin.gob.ve", "root", "Maturinmysql2013");
      mysql_select_db("conformidad_s", $conexion);

 if(!(mysql_select_db("conformidad_s")))
                  echo "No se ha podido seleccionar la base
                de datos"; 
 ?>