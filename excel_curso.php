<?php

$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
$sql="SELECT codigo,nombre_de_proyecto,ano,observaciones FROM proyectos WHERE id_proye='2';";
$resultado=mysql_query($sql,$link) or die("Error en sql");

 header("Content-Type: application/vnd.ms-excel");
     header("Expires: 0");
     header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     header("content-disposition: attachment;filename=proyectos en curso.xls");
?>
 <?php 
 echo "<head>";
 echo "<meta http-equiv='content-type' content='text/html; charset=utf-8' />";
 echo "</head>";
 echo "<FONT FACE='arial'>";
 echo "<table>";
 echo "<tr>";
 echo "<td></td>";
 echo "<td><b> Alcaldia De Facatativa</b></td>";
 echo "<td></td>";
 echo "</tr>";
 echo "<tr>";
 echo "<td></td>";
 echo "<td><b> Proyectos En Curso</b></td>";
 echo "<td></td>";  
 echo "</tr>";
 echo "<tr></tr>";
 echo "<tr></tr>";
 echo "<tr></tr>";
echo "</table>";



					      echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Codigo</b></td>";
					      echo"<td><b>Nombre De Proyecto</b></td>";
					      echo"<td><b>Año</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resultado)){
								echo "<tr>";
								
								echo "<td>".$fila[0]."</td>";
			          			echo "<td>".$fila[1]."</td>";
			          			echo "<td>".$fila[2]."</td>";
			          			echo "<td>".$fila[3]."</td>";
			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
			          		echo "</FONT>";
?>                         