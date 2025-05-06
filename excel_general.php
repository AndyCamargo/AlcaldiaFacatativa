<?php

$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
$sql="SELECT  a.cedula,a.nombres,a.apellidos,a.dirreccion,a.barrio,a.celular,b.nombre_de_proyecto,a.N_caja,a.fecha_ingreso,a.ced_castatral,a.sisben,a.Observaciones,f.territorio,c.situacion,d.estado,e.estado FROM personas a,proyectos b,madre c,riesgo d,deplazado e,terri f WHERE a.codigo=b.codigo AND a.id_territorio=f.id_territorio AND a.id_madre=c.id_madre AND a.id_ries=d.id_ries AND a.id_des=e.id_des;";
	
			
$resultado=mysql_query($sql,$link) or die("Error en sql");

 header("Content-Type: application/vnd.ms-excel");
     header("Expires: 0");
     header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     header("content-disposition: attachment;filename=Lista De Personas Beneficiadas.xls");
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
 echo "<td><b> Lista De Personas Beneficiadas</b></td>";
 echo "<td></td>";  
 echo "</tr>";
 echo "<tr></tr>";
 echo "<tr></tr>";
 echo "<tr></tr>";
echo "</table>";



					      echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Proyecto</b></td>";
					      echo"<td><b>N caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>M.Familia</b></td>";
					      echo"<td><b>Zona.R</b></td>";
					      echo"<td><b>Desplazado</b></td>";
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
			          			echo "<td>".$fila[10]."</td>";
			          			echo "<td>".$fila[11]."</td>";
			          			echo "<td>".$fila[12]."</td>";
                                echo "<td>".$fila[13]."</td>";
                                echo "<td>".$fila[14]."</td>";
                                echo "<td>".$fila[15]."</td>";
			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
			          		echo "</FONT>";
?>                         