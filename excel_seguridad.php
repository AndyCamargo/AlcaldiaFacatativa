<?php

$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
$sql="SELECT a.fecha,a.cedula,a.nombre_usuario,a.apellido,a.puesto,b.rol,a.tabla,a.antes,a.ahora,a.accion
 FROM seguridad a,sg_mv_rol b WHERE a.id_rol=b.id_rol ORDER BY a.fecha ;";

$resultado=mysql_query($sql,$link) or die("Error en sql");

 header("Content-Type: application/vnd.ms-excel");
     header("Expires: 0");
     header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     header("content-disposition: attachment;filename=Lista Seguridad.xls");
?>
 <?php 
 echo "<head>";
 echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
 echo "</head>";
 echo "<FONT FACE='arial'>";
 echo "<table>";
 echo "<tr>";
 echo "<td></td>";
 echo "<td><b> Secretaria de Planeacion </b></td>";
 echo "<td></td>";
 echo "</tr>";
 echo "<tr>";
 echo "<td></td>";
 echo "<td><b> Registro de Sucesos del Sistema Modulo de vivienda</b></td>";
 echo "<td></td>";  
 echo "</tr>";
 echo "<tr></tr>";
 echo "<tr></tr>";
 echo "<tr></tr>";
echo "</table>";



					      echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>fecha Modificacion</b></td>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombre</b></td>";
					      echo"<td><b>Apellido</b></td>";
					      echo"<td><b>Puesto</b></td>";
					      echo"<td><b>Rol</b></td>";
					      echo"<td><b>Tabla BD</b></td>";
					      echo"<td><b>Antes</b></td>";
					      echo"<td><b>Ahora</b></td>";
					      echo"<td><b>Accion</b></td>";
					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resultado)){
								echo "<tr>";
								
								echo "<td>".$fila[0]."</td>";
			          			echo "<td>".$fila[1]."</td>";
			          			echo "<td>".$fila[2]."</td>";
                                echo "<td>".$fila[3]."</td>";
			          			echo "<td>".$fila[4]."</td>";
			          			echo "<td>".$fila[5]."</td>";
                                echo "<td>".$fila[6]."</td>";
			          			echo "<td>".$fila[7]."</td>";
			          			echo "<td>".$fila[8]."</td>";
                                echo "<td>".$fila[9]."</td>";
			          			
			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
			          		echo "</FONT>";
?>                         