<?php
require_once("dompdf/dompdf_config.inc.php"); 
date_default_timezone_set('UTC');
$ced=$_POST["id"];
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 
$sql="SELECT nombres,apellidos,dirreccion,barrio,celular FROM personas WHERE cedula='$ced';";
$resultado=mysql_query($sql,$link) or die("Error en sql");
$fecha=date("d-m-Y");
if($fila=mysql_fetch_array($resultado)){
$nom=$fila[0];
$ape=$fila[1];
}
$lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");
$sq="SELECT * FROM responsable";
$resul=mysql_query($sq,$link) or die("Error en sql");
if($fil=mysql_fetch_array($resul)){
$nom_res=$fil[0];
$cedu=$fil[1];
$fun=$fil[2];
}
$codigoHTML='
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title> lista </title>
</head>
<body background="images/escudo.png"" bgcolor="aqua">
<table WIDTH="390" height="200" align="center" >
<tr>
<td></td>
<td>
<center>
<img src="images/Cocunfa.png"  width="80" height="92"/>
</center>
</td>
<td></td>
</tr>
<tr>
<td></td>
<td align="center">
ALCALDIA DE FACATATIVA
</td>
<td></td>

</tr>
<br></br>
</table>

<br></br>
<br></br>
    <table WIDTH="330" height="200" align="center">
    <tr>
    <td>
 <p ALIGN=justify>
 El (La) Señor(a)  identificado(a) con CC. cumplió con toda la documentación necesaria para poder acceder al 
 beneficio de mejoramiento de vivienda.
 </p>
<label> Se Certifica Que : </label>
<br></br>
<br></br>
<br></br>
<p ALIGN=justify>
El (La) Señor(a) '.$nom.' '.$ape.'  identificado(a) con CC.'.$ced.' cumplió con toda la documentación 
necesaria para poder acceder al beneficio de mejoramiento de vivienda.
</p>
<p ALIGN=justify>
La presente certificación se expide a solicitud del (de la) interesado(a) en Facatativá para QUIEN INTERESE, '.$fecha.' .
<p ALIGN=justify>
La certificación tiene validez de un mes con respecto a la fecha de generación.
</p>

    </td>
    </tr>
    </table>
<br></br>
<br></br>
<br></br>
<br></br> 
<br></br>
____________________________
    <table>
  <tr>
  <td>
   '.$nom_res.'
  </td>
  </tr>
   <tr>
   <td>
     CC.'.$cedu.'
   </td>
  </tr>
  <tr>
  <td>
'.$fun.'
  </td>
  </tr>
    </table>
    <br></br>
    <br></br>
 <font size=1 COLOR="#B8B8B8"> 
Teléfono: (57+1) 8424822
Fax:(57+1) 8424822 EXT. 118
Correo electrónico:
contactenos@facatativa-cundinamarca.gov.co
Dirección:
Cra 3 No. 5-68 -Parque Principal (Facatativá-Cundinamarca) </font>
</body>
</html>';
                             $codigoHTML=utf8_decode($codigoHTML);
                             $dompdf=new DOMPDF();
                             $dompdf->set_paper("A5", "portrait"); 
                            $dompdf->load_html($codigoHTML);
                            ini_set("memory_limit","256M");
                            $dompdf->render();
                            $dompdf->stream("$ced.pdf", array("Attachment" => 0));
?>