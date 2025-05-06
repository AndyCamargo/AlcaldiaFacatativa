<?php
require_once("dompdf/dompdf_config.inc.php"); 
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
 mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 $sql="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.barrio,a.celular,b.nombre_de_proyecto,a.fecha_ingreso,a.ced_castatral,a.sisben,a.Observaciones,f.territorio FROM personas a,proyectos b,terri f WHERE a.codigo=b.codigo AND a.id_territorio=f.id_territorio ORDER BY a.codigo";
 $resultado=mysql_query($sql,$link) or die("Error en sql");
$codigoHTML='
</head>
<body>
<div>
<table width="1200">
<tr>
<td width="400">
<img src="images/Escudo Facatativa.jpg" ALIGN="left" alt="" width="130" height="145"/>
</td>
<td  width="400">
<FONT FACE="arial"   size="5">
<label>Alcaldia De Facatativa </label>
<p>
</p>
<label>Lista De Beneficiados</label>
</FONT>
</td>
<td width="400" ALIGN="center">
<img src="images/logo horizontal.png" ALIGN="right" alt="" width="188" height="145"/>
</td>
</tr>
</table>

<FONT  size="3" FACE="arial" >
 <table border="0.5" WIDTH="1100" >
					      <tr bgcolor="#CCCCCC">
					      <td><b>Cedula</b></td>
					      <td><b>Nombres</b></td>
					      <td><b>Apellidos</b></td>
					      <td><b>Direccion</b></td>
					      <td><b>Barrio</b></td>
					      <td><b>Celular</b></td>
					      <td><b>Proyecto</b></td>
					      <td><b>fecha Ingreso</b></td>
					      <td><b>Ced Castas</b></td>
					      <td><b>Sisben</b></td>
					      <td><b>Observaciones</b></td>
					      <td><b>Territorio</b></td>
					    
					      </tr>';
					   
					   
			          		while($fila=mysql_fetch_array($resultado)){
			          			$codigoHTML.='
								<tr>
								<td> '.$fila[0].' </td>
			          			<td> '.$fila[1].' </td>
			          			<td> '.$fila[2].' </td>
                                <td> '.$fila[3].' </td>
			          			<td> '.$fila[4].' </td>
			          			<td> '.$fila[5].' </td>
			          			<td> '.$fila[6].' </td>
			          			<td> '.$fila[7].' </td>
                                <td> '.$fila[8].' </td>
			          			<td> '.$fila[9].'</td>
			          			<td> '.$fila[10].'</td>
                                <td> '.$fila[11].'</td>
			          			</tr>';
			          			
			          		   }
			          		   $codigoHTML.='
			          		  

			          		</table>
			          		</FONT>
			          		<div style="page-break-before: always;"></div>
			          		 
                     </div>
                   
                            </body>
                            </html>';
                             $codigoHTML=utf8_decode($codigoHTML);
                             $dompdf=new DOMPDF();
                             $dompdf->set_paper("A3", "landscape"); 
                            $dompdf->load_html($codigoHTML);
                            ini_set("memory_limit","128M");
                            $dompdf->render();
                            $dompdf->stream("Reporte General(R).pdf",array("Attachment" => 0));
?>