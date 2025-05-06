<?php
 require('fpdf.php');
 $link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
 mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 $sql="SELECT codigo,nombre_de_proyecto,ano,observaciones FROM proyectos WHERE id_proye='1';";
 $resultado=mysql_query($sql,$link) or die("Error en sql");
header('Content-Type: text/html; charset=ISO-8859-1');


$pdf = new FPDF ('P','mm','A4');
$pdf -> AddPage();
$pdf ->Image("logos/alcaldia.jpg",10,10,30,30);
$pdf ->Image("images/logo horizontal.png",160,10,40,30);
$pdf ->SetFont('Arial','B',16);
$pdf ->Cell(200,10,'ALCALDIA DE FACATATIVA',0,1,'C');
$pdf ->Cell(200,10,'Proyecto Ejecutados',0,0,'C');
$pdf ->Ln(20);
					     




    $pdf -> SetFont('Arial','B',10);
    $pdf -> SetTextColor(255,255,255);
    $pdf -> Cell( 25 , 10 , "Codigo", 1 , 0 , 'C' , true );
    $pdf -> Cell( 65 , 10 ,"Nombre Proyecto" , 1 , 0 , 'C' , true );
    $pdf -> Cell( 25 , 10 ,  utf8_decode('Año'), 1 , 0 , 'C' , true );
    $pdf -> Cell( 65 , 10 ,"Observaciones" , 1 , 0 , 'C' , true );
$pdf ->Ln(10);
while($fila=mysql_fetch_array($resultado)){

$codigo=$fila[0];
$nombre=$fila[1];
$ano=$fila[2];
$observaciones=$fila[3];
$pdf -> SetFillColor( 255 , 255 , 255 );
$pdf -> SetTextColor(0,0,0);	
$pdf -> Cell( 25, 10 , $codigo , 1, 0, 'C' , true );
$pdf -> Cell( 65, 10 , $nombre , 1, 0, 'C' , true );
$pdf -> Cell( 25, 10 , $ano , 1, 0, 'C' , true );
$pdf -> Cell( 65, 10 , $observaciones , 1, 0, 'C' , true );
$pdf -> Ln( 10);

}
$pdf -> Output();
?>