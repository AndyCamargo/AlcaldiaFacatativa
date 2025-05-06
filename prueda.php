<html>
<?php

$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
 mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 $sql="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.barrio,a.celular,b.nombre_de_proyecto,a.fecha_ingreso,a.ced_castatral,a.sisben,a.Observaciones,f.territorio FROM personas a,proyectos b,terri f WHERE a.codigo=b.codigo AND a.id_territorio=f.id_territorio ORDER BY a.codigo";
 $resultado=mysql_query($sql,$link) or die("Error en sql");
?>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> lista </title>
</head>
<body>
<div>
<table width="300">
<tr>
<td width="200">
<img src="images/Escudo Facatativa.jpg" ALIGN="left" alt="" width="130" height="145"/>

</td>
<td width="400">

<FONT FACE="arial">
<label>Alcaldia De Facatativa </label>
<p>
</p>
<label>Lista De Beneficiados</label>
</FONT>

</td>
<td width="200">

<img src="images/logo horizontal.png"  alt="" width="188" height="145"/>

</td>
</tr>
</table>

<FONT  size=2 FACE="arial" >
 <table border=1 WIDTH="300" >
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
              
                </tr>
             
             <?php
                    while($fila=mysql_fetch_array($resultado)){
                    ?>  
                <tr>
                <td><?php echo "$fila[0]"?> </td>
                      <td> <?php echo "$fila[0]"?></td>
                      <td> <?php echo "$fila[1]"?></td>
                      <td> <?php echo "$fila[2]"?> </td>
                      <td> <?php echo "$fila[3]"?> </td>
                      <td> <?php echo "$fila[4]"?></td>
                      <td> <?php echo "$fila[5]"?> </td>
                      <td> <?php echo "$fila[6]"?></td>
                     <td> <?php echo "$fila[7]"?> </td>
                      <td> <?php echo "$fila[8]"?></td>
                      <td> <?php echo "$fila[9]"?></td>
                      <td> <?php echo "$fila[10]"?></td>
                      </tr>
                      <?php
                       }
                      
                      ?>
                       

                    </table>
                    </FONT>
                     <div style="page-break-before: always;"></div>
                    </div>
                            </body>
                            </html>