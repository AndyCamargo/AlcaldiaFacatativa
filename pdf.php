
<?php
$id=$_POST["id"];

require_once("dompdf/dompdf_config.inc.php"); 
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
 mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 $que="SELECT nombre_de_proyecto FROM proyectos WHERE codigo='$id';";
 $re=mysql_query($que,$link) or die("Error en sql");
 $query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.situacion,d.estado,e.estado FROM personas a,terri b,madre c,deplazado d,riesgo e WHERE a.codigo='$id' AND  a.id_territorio=b.id_territorio AND a.id_madre=c.id_madre AND a.id_des=d.id_des AND a.id_ries=e.id_ries ;";
 $resul=mysql_query($query,$link) or die("Error en sql");
 $fil=mysql_fetch_row($re);
 if($fil!=null){
 $nombreproyecto=$fil[0];
}
   $codigoHTML='
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> lista </title>
</head>
<body>

<table width="800">
<tr>
<td width="200">
<div >
<img src="images/Escudo Facatativa.jpg" ALIGN="left" alt="" width="130" height="145"/>
</div>
</td>
<td width="400">
<div align="center">
<FONT FACE="arial">
<label>Alcaldia De Facatativa </label>
<p>
</p>
<label>'.$nombreproyecto.'</label>
</FONT>
</div>
</td>
<td width="200">
<div align="left">
<img src="images/logo horizontal.png"  alt="" width="188" height="145"/>
</div>
</td>
</tr>
</table>
<div align="center">
<FONT FACE="arial">
 <table border="0.5" align="center">
					      <tr bgcolor="#CCCCCC">
					      <td><b>Cedula</b></td>
					      <td><b>Nombres</b></td>
					      <td><b>Apellidos</b></td>
					      <td><b>Direccion</b></td>
					      <td><b>Celular</b></td>
					      <td><b>Barrio</b></td>
					      <td><b>fecha Ingreso</b></td>
					      <td><b>Sisben</b></td>
					      <td><b>Ced Castas</b></td>
					      <td><b>Observaciones</b></td>
					      <td><b>Territorio</b></td>
					    
					      </tr>';
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
			          			$codigoHTML.='
								<tr>
								<td> '.$fila[0].' </td>
			          			<td> '.$fila[1].' </td>
			          			<td> '.$fila[2].' </td>
                                <td> '.$fila[3].' </td>
			          			<td> '.$fila[4].' </td>
			          			<td> '.$fila[5].' </td>
                                
			          			<td> '.$fila[7].' </td>
			          			<td> '.$fila[8].' </td>
                                <td> '.$fila[9].' </td>
			          			<td> '.$fila[10].'</td>
			          			<td> '.$fila[11].'</td>
                              
			          			</tr>';
			          			
			          		   }
			          		   $codigoHTML.='
			          		   </FONT>
			          		</table>
			          		<div style="page-break-before: always;"></div>
			          		</div>
			          		
                            </body>
                            </html>';
                             $codigoHTML=utf8_decode($codigoHTML);
                             $dompdf=new DOMPDF();
                             $dompdf->set_paper("letter","landscape"); 
                            $dompdf->load_html($codigoHTML);
                            ini_set("memory_limit","256M");
                            $dompdf->render();
                            $dompdf->stream("$nombreproyecto.pdf");
?>