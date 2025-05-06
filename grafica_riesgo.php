<?php 
// content="text/plain; charset=utf-8"

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");


$query="SELECT * FROM personas WHERE id_ries='1';";
$resul=mysql_query($query,$link) or die("Error en sql");
$total=mysql_num_rows($resul);

$que="SELECT * FROM personas;";
$resu=mysql_query($que,$link) or die("Error en sql");
$tota=mysql_num_rows($resu);

$to=$tota-$total;

$data = array($to,$total);
 
$graph = new PieGraph(570,570);
$graph->SetShadow();
 
$graph->title->Set("Poblacion De Zonas Alto Riesgo");
$graph->title->SetFont(FF_ARIAL,FS_BOLD,14);
 
$p1 = new PiePlot3D($data);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$nombres=array("Otros : $to","Riesgo : $total"); 
$p1->SetLegends($nombres);

$graph->Add($p1);
$graph->Stroke();
 
?>