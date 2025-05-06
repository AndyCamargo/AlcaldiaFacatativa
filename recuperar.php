<?php
session_start();
date_default_timezone_set('UTC');
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

///////////////////
   $cedula=$_POST["cedula"];
   $usuario=$_POST["username"];
  
                    $sql="SELECT * FROM usuario WHERE cedula='$cedula' AND alias='$usuario';";
                    $resul=mysql_query($sql,$link) or die("Error en sql");
                    $total=mysql_num_rows($resul);
                    
                    if($total=="1"){
                    	$_SESSION["ced"]=$cedula;
                    	$_SESSION["usua"]=$usuario;

                     echo "<script language='javascript'>alert('listo para modificar');window.location='recuperar_modifica.php'</script>";
    
                    }
                    else{
                    echo "<script language='javascript'>alert('No Coincide');window.location='recuperar_contrasena.php'</script>";
                }

                    	

?>