<?php


	session_start();
	$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

	$usuario=$_POST["username"];
	$clave=$_POST["password"];

	
	$sql="SELECT nombre,apellido,id_rol,id_activa,telefono,correo,puesto,cedula FROM usuario WHERE alias='$usuario' AND pass='$clave';";
	$resultado=mysql_query($sql,$link) or die("Error en sql");
	$res=mysql_fetch_row($resultado);

	if($res[2]!=null){
			$_SESSION["nombre"]=$res[0];
			$_SESSION["apellido"]=$res[1];
			$_SESSION["idrol"]=$res[2];
			$_SESSION["idactiva"]=$res[3];
			$_SESSION["telefono"]=$res[4];
			$_SESSION["correo"]=$res[5];
			$_SESSION["puesto"]=$res[6];
			$_SESSION["cedula"]=$res[7];

		if( $res[2] == 2 and  $res[3]==1){
			header('location: menu.php');
			
		}else{
			if($res[2] == 1 and $res[3]==1){
			
			header('location: menuAdmi.php');
			
			}
		}
		if($res[2] == 2 and $res[3]==2){
			echo "<script language='javascript'>alert('Usuario Desactivado Consulte Con El Administrador');window.location='index.html'</script>";
			}else {
			if ($res[2] == 1 and $res[3]==2){
			echo "<script language='javascript'>alert('Usuario Desactivado Consulte Con El Administrador');window.location='index.html'</script>";
			}
		}
	}else{
		echo "<script language='javascript'>alert('Error de usuario o clave');window.location='index.html'</script>";
		//header('location: login.php');
	}
	mysql_close($link);
	
?>