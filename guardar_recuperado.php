<?php
session_start();
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

///////////////////
  $passwd=$_POST["passwd2"]; 
  $cedu=$_SESSION["ced"];
  $usuar=$_SESSION["usua"];
$sql="UPDATE usuario SET pass='$passwd' WHERE cedula='$cedu' AND alias='$usuar';";
mysql_query($sql,$link)or die("Error en sql");
mysql_close($link);
echo "<script type='text/javascript'> alert('Pass Modificado'); window.location='index.html';</script>";

session_destroy();           
?>