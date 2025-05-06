<?php 
// content="text/plain; charset=utf-8"

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');
 
$data = array(50,50);
 
$graph = new PieGraph(570,570);
$graph->SetShadow();
 
$graph->title->Set("poblacion");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$p1 = new PiePlot3D($data);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends($gDateLocale->GetShortMonth());
 
$graph->Add($p1);
$graph->Stroke();
 
?>
