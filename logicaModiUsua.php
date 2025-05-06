<?php
session_start();
date_default_timezone_set('UTC');

$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

$li=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$li)or die("Error base de datos");


$lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");


   $cedula=$_POST["ced"];
   $nombre=$_POST["nombre"];
   $apellido=$_POST["apellido"];
   $direccion=$_POST["direccion"];
   $barrio=$_POST["barrio"];
   $celular=$_POST["celular"];
   $proyecto=$_POST["proyecto"];
   $caja=$_POST["caja"];
   $date=$_POST["date"];
   $terri=$_POST["terri"];
   $sisben=$_POST["sisben"];
   $cata=$_POST["cata"];
   $observacion=$_POST["observacion"];
   $mad=$_POST["mad"];
   $des=$_POST["des"];
   $rie=$_POST["rie"];


   //////////////////////////////////
 $sql2="SELECT nombres,apellidos,dirreccion,barrio,celular,codigo,N_caja,fecha_ingreso,Observaciones,id_territorio,sisben,ced_castatral,id_madre,id_des,id_ries FROM personas WHERE cedula='$cedula';";
$resul=mysql_query($sql2,$li) or die("Error en sql");
$fila=mysql_fetch_row($resul);
if($fila!=null){
   $nombre2=$fila[0];
   $apellido2=$fila[1];
   $direccion2=$fila[2];
   $barrio2=$fila[3];
   $celular2=$fila[4];
   $proyecto2=$fila[5];
   $caja2=$fila[6];
   $date2=$fila[7];
   $terri2=$fila[8];
   $sisben2=$fila[9];
   $cata2=$fila[10];
   $observacion2=$fila[11];
   $mad2=$fila[12];
   $des2=$fila[13];
   $rie2=$fila[14];

 }


////////////////////////////////
 $sql="UPDATE personas SET nombres='$nombre',apellidos='$apellido',dirreccion='$direccion',barrio='$barrio',celular='$celular',codigo='$proyecto',N_caja='$caja',fecha_ingreso='$date',Observaciones='$observacion',id_territorio='$terri',sisben='$sisben',ced_castatral='$cata',id_madre='$mad',id_des='$des',id_ries='$rie' WHERE cedula=$cedula;";

mysql_query($sql,$link)or die("Error en sql");
mysql_close($link);
        $nom=$_SESSION["nombre"];
        $ape=$_SESSION["apellido"];
        $idrol=$_SESSION["idrol"];
        $puesto=$_SESSION["puesto"];
        $cedu=$_SESSION["cedula"];
        $fecha=date("Y-m-d");
        $antes = $nombre2 . ":" . $apellido2 . ":" . $direccion2 . ":" . $barrio2 . ":" . $celular2 . ":" . $proyecto2 . ":" . $caja2 . ":" .  $date2 . ":" . $terri2 . ":" . $sisben2 . ":" . $cata2 . ":" . $observacion2 . ":" . $mad2 . ":" . $des2 . ":" . $rie2; 
        $nuevo = $nombre . ":" . $apellido . ":" . $direccion . ":" . $barrio . ":" . $celular . ":" . $proyecto . ":" . $caja . ":" .  $date . ":" . $terri . ":" . $sisben . ":" . $cata . ":" . $observacion . ":" . $mad . ":" . $des . ":" . $rie; 
        
        
$sql3=" INSERT INTO `seguridad` (id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) VALUES
 ('$idrol','$fecha','$cedu','personas','$antes','$nuevo','$nom','$ape','$puesto','modificar');";
mysql_query($sql3,$lin)or die("Error en sql");
mysql_close($lin);

echo "<script language='javascript'>alert('Usuario ". $nombre."".$apellido."  Modificado.');window.location='menu.php'</script>";


?>