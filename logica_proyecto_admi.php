<?php
    date_default_timezone_set('UTC');
    session_start();
	$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 
    $lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");


    $codigo=$_POST["codigo"];
	$nombre=$_POST["nombre"];
	$ano=$_POST["ano"];
	$esta=$_POST["esta"];
	$observacion =$_POST["observacion"];


    $sql="SELECT * FROM proyectos WHERE codigo = '$codigo' ;";
    $res=mysql_query($sql,$link)or die("Error en sql");
if (mysql_num_rows($res)>=1) {
	
	echo "<script language='JavaScript'> alert('Codigo ya exite ". $codigo." .');window.location='crear_proyecto_admi.php'</script>";
    
	}else{

	$sql="INSERT  INTO `proyectos`(codigo,nombre_de_proyecto,observaciones,id_proye,ano)
    VALUES ('$codigo','$nombre','$observacion','$esta','$ano');";
    mysql_query($sql,$link)or die("Error en sql");
	mysql_close($link);
	

          $nom=$_SESSION["nombre"];
		  $ape=$_SESSION["apellido"];
		  $idrol=$_SESSION["idrol"];
		  $puesto=$_SESSION["puesto"];
		  $cedu=$_SESSION["cedula"];
          $fecha=date("Y-m-d");
          $nuevo =  $codigo . ":" . $nombre . ":" . $ano . ":" . $esta . ":" . $observacion;
          
 $sql2=" INSERT INTO `seguridad` (id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) VALUES
 ('$idrol','$fecha','$cedu','proyectos','     ','$nuevo','$nom','$ape','$puesto','insertar');";

mysql_query($sql2,$lin)or die("Error en sql");
mysql_close($lin);
echo "<script language='javascript'>alert('proyecto ". $nombre." ".$codigo." Registrado.');window.location='menuAdmi.php'</script>";

}
		
?>