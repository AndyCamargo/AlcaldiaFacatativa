<?php
session_start();
date_default_timezone_set('UTC');

$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

$li=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$li)or die("Error base de datos");


$lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");

    $nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	$cargo=$_POST["cargo"];
	$usuario=$_POST["usuario"];
	$pass=$_POST["pass"];
	$cedula=$_POST["cedula"];
	$rol=$_POST["rol"];
	$est=$_POST["est"];

///////////////

$sql2="SELECT nombre,apellido,telefono,correo,puesto,alias,pass,id_rol,id_activa FROM usuario WHERE cedula='$cedula';";
$resul=mysql_query($sql2,$li) or die("Error en sql");
$fila=mysql_fetch_row($resul);
if($fila!=null){
 $nombre2=$fila[0];
 $apellido2=$fila[1];
 $telefono2=$fila[2];
 $correo2=$fila[3];
 $cargo2=$fila[4];
 $usuario2=$fila[5];
 $pass2=$fila[6];
 $rol2=$fila[7];
 $est2=$fila[8];
 }


	////////////////

$sql="UPDATE usuario SET nombre='$nombre',apellido='$apellido',telefono='$telefono',correo='$correo',puesto='$cargo',alias='$usuario',pass='$pass',id_rol='$rol',id_activa='$est' WHERE cedula='$cedula';";
mysql_query($sql,$link)or die("Error en sql");
mysql_close($link);


/////////////////

          $nom=$_SESSION["nombre"];
		  $ape=$_SESSION["apellido"];
		  $idrol=$_SESSION["idrol"];
		  $puesto=$_SESSION["puesto"];
		  $cedu=$_SESSION["cedula"];
          $fecha=date("Y-m-d");
          $antes = $nombre2 . ":" . $apellido2 . ":" . $telefono2 . ":" . $correo2 . ":" . $cargo2 . ":" . $usuario2 . ":" . $pass2 . ":" . $rol2 . ":" . $est2;
          $nuevo = $nombre . ":" . $apellido . ":" . $telefono . ":" . $correo . ":" . $cargo . ":" . $usuario . ":" . $pass . ":" . $rol . ":" . $est;


//////////////////////////////          

$sql3=" INSERT INTO `seguridad` (id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) VALUES
 ('$idrol','$fecha','$cedu','usuario','$antes','$nuevo','$nom','$ape','$puesto','modificar');";
mysql_query($sql3,$lin)or die("Error en sql");
mysql_close($lin);

echo "<script language='javascript'>alert('Usuario ". $nombre."  ".$apellido."  Modificado.');window.location='menuAdmi.php'</script>";


?>