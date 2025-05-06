<?php
  session_start();
  date_default_timezone_set('UTC');

	$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");

  $lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
  mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");

   $cedula=$_POST["cedula"];
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
   $url= $_FILES['archivo']['name'];
   $formato = array('.jpg','.png','.jpeg','.gif','.doc','.docx','.pdf');
   $ext=substr($url,strrpos($url, '.'));
   $tamano_archivo=$_FILES['archivo']['size'];
   if(in_array($ext, $formato)){
    move_uploaded_file($_FILES['archivo']['tmp_name'],"Documentos/".$cedula."/". $url)or die("Error subida archivo");
      $sql="SELECT * FROM personas WHERE cedula='$cedula';";
    $res=mysql_query($sql,$link)or die("Error en sql");
if (mysql_num_rows($res)>=1) {


    echo "<script language='JavaScript'> alert('Usuario Ya Registrado ". $cedula." .');window.location='inscribirusuarios.php'</script>";

}else{


      

$sql="INSERT  INTO `personas`(cedula,nombres,apellidos,dirreccion,barrio,celular,codigo,N_caja,fecha_ingreso,Observaciones,id_territorio,sisben,ced_castatral,id_madre,id_des,id_ries,url)
    Values ('$cedula','$nombre','$apellido','$direccion','$barrio','$celular','$proyecto','$caja','$date','$observacion','$terri','$sisben','$cata','$mad','$des','$rie','$url');";
    mysql_query($sql,$link)or die("Error en sql");
    mysql_close($link);
     

      $nom=$_SESSION["nombre"];
      $ape=$_SESSION["apellido"];
      $idrol=$_SESSION["idrol"];
      $puesto=$_SESSION["puesto"];
      $cedu=$_SESSION["cedula"];
      $fecha=date("Y-m-d");
      $nuevo =  $cedula . ":" . $nombre . ":" . $apellido . ":" . $direccion . ":" . $barrio . ":" . $celular . ":" . $proyecto . ":" . $caja . ":" . $date . ":" . $terri . ":" . $sisben . ":" . $cata . ":" . $observacion . ":" . $mad . ":" . $des . ":" . $rie;
          
     $sql2=" INSERT INTO `seguridad` (id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) VALUES
    ('$idrol','$fecha','$cedu','personas','     ','$nuevo','$nom','$ape','$puesto','insertar');";

    mysql_query($sql2,$lin)or die("Error en sql");
    mysql_close($lin);

    echo "<script language='javascript'>alert('Usuario ". $nombre." ".$cedula." Registrado.');window.location='menu.php'</script>";

}
   
   }else{
   echo "<script> alert('Extencion no valida o demasiado grande el archivo');</script>";

   }
  

?>