<?php 
	session_start();
	date_default_timezone_set('UTC');

  $link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
  mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

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

    $sql="SELECT * FROM usuario WHERE alias = '$usuario';";
    $res=mysql_query($sql,$link)or die("Error en sql");
if (mysql_num_rows($res)>=1) {
	
	echo "<script language='JavaScript'> alert('Usuario ya exite ". $usuario." .');window.location='crearusuAdmi.php'</script>";
    //echo "<script language='javascript'>alert('Usuario ya exite ". $usuario." .');</script>";
   
	}else{

	$sql="INSERT  INTO `usuario`(nombre,apellido,telefono,correo,puesto,alias,pass,id_rol,cedula,id_activa)
    VALUES ('$nombre','$apellido','$telefono','$correo','$cargo','$usuario','$pass','$rol','$cedula','$est');";
    mysql_query($sql,$link)or die("Error en sql");
	  mysql_close($link);

      $nom=$_SESSION["nombre"];
      $ape=$_SESSION["apellido"];
      $idrol=$_SESSION["idrol"];
      $puesto=$_SESSION["puesto"];
      $cedu=$_SESSION["cedula"];
      $fecha=date("Y-m-d");
      
      $nuevo =  $nombre . ":" . $apellido . ":" . $telefono . ":" . $correo . ":" . $cargo . ":" . $usuario . ":" . $pass . ":" . $cedula . ":" . $rol . ":" . $est;
      //echo $nuevo;
     $sql2=" INSERT INTO `seguridad` (id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) VALUES
    ('$idrol','$fecha','$cedu','usuario','     ','$nuevo','$nom','$ape','$puesto','insertar');";

    mysql_query($sql2,$lin)or die("Error en sql");
    mysql_close($lin);

	echo "<script language='javascript'>alert('Usuario ". $nombre." ".$apellido." Registrado.');window.location='menuAdmi.php'</script>";
	
}


    
?>