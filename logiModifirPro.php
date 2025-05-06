<?php
session_start();
date_default_timezone_set('UTC');
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

$li=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$li)or die("Error base de datos");


$lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");

///////////////////
$id=$_POST["id"];
$nombre=$_POST["nombres"];
$obser=$_POST["obser"];
$esta=$_POST["esta"];
$ano=$_POST["ano"];


///////////////

$sql2="SELECT nombre_de_proyecto,observaciones,id_proye,ano FROM proyectos WHERE codigo = '$id';";
$resul=mysql_query($sql2,$li) or die("Error en sql");
$fila=mysql_fetch_row($resul);
if($fila!=null){
 $nombre2=$fila[0];
 $obser2=$fila[1];		                
 $id_proye2=$fila[2];
 $ano2=$fila[3];
 }


$sql="UPDATE proyectos SET nombre_de_proyecto = '$nombre', observaciones = '$obser', id_proye ='$esta',ano='$ano' WHERE codigo = $id;";
mysql_query($sql,$link)or die("Error en sql");
mysql_close($link);

          $nom=$_SESSION["nombre"];
		  $ape=$_SESSION["apellido"];
		  $idrol=$_SESSION["idrol"];
		  $puesto=$_SESSION["puesto"];
		  $cedu=$_SESSION["cedula"];
          $fecha=date("Y-m-d");
          $antes = $nombre2 . ":" . $obser2 . ":" . $id_proye2 . ":" .$ano2;
          $nuevo =  $nombre . ":" . $obser . ":" . $esta . ":" . $ano;
          
 $sql3=" INSERT INTO `seguridad` (id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) VALUES
 ('$idrol','$fecha','$cedu','proyectos','$antes','$nuevo','$nom','$ape','$puesto','modificar');";
mysql_query($sql3,$lin)or die("Error en sql");
mysql_close($lin);

echo "<script language='javascript'>alert('Proyecto ". $nombre."  Modificado.');window.location='menu.php'</script>";

?>