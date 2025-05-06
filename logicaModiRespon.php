<?php
session_start();

 $nombre=$_POST["nombres"];
 $cedula=$_POST["cedula"];
 $funcion=$_POST['funcion'];

 $link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
 mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
$sql="UPDATE responsable SET nombre_responsable='$nombre',cedula='$cedula',funcion='$funcion';";
mysql_query($sql,$link)or die("Error en sql");
mysql_close($link);
echo "<script language='javascript'>alert('Responsable ". $nombre." Modificado.');window.location='menuAdmi.php'</script>";

?>