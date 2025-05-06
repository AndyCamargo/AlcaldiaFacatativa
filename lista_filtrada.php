<html>
<?php 

  session_start();
  if($_SESSION["cedula"]==null){
  		 echo "<script language='javascript'>window.location='index.html'</script>";
  	}
  $link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 ?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Mejoramiento de vivienda 2014</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
	
		<script>
         $(document).ready( function(){

      $('#pdf').click(funcion(){
alert("esto");
window.open("pdf.php","listas de proyectos","width=600,height=600");

return false;
      });
         });
		</script>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <style type="text/css">
<!--
.Estilo1 {
	font-size: 18px
}
.Estilo2 {font-size: 24px}
-->
                 #heade {
                margin:auto;
                width:200px;
                font-family:Arial, Helvetica, sans-serif;
            }
            
            ul, ol {
                list-style:none;
            }
            
            
            .nav li a {
                background-color:#000;
                color:#fff;
                text-decoration:none;
                padding:8px 10px;
                display:block;
				
            }
            
            .nav li a:hover {
                background-color:#434343;
            }
            
            .nav li ul {
                display:none;
                position:absolute;
                min-width:140px;
            }
            
            .nav li:hover > ul {
                display:block;
            }
            
            .nav li ul li {
                position:relative;
            }
            
            .nav li ul li ul {
                right:-140px;
                top:0px;
            }
            
        </style>	

        
        <link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
    <style type="text/css">
<!--
.Estilo3 {color: #FFFFFF}
.Estilo4 {
	color: #801005;
	font-size: 16px;
}
.Estilo6 {font-size: 14px}
.Estilo7 {
	color: #000000;
	font-weight: bold;
	font-size: 20px;
}
-->
    </style>
</head>
<body>

<div id="logo-wrap">
<div id="logo">
   <center>
    <div align="center"></div>
    <p><span class="Estilo3"><img src="images/Cocunfa.png" alt="" width="130" height="143"/><img src="images/Letras Logo.png" alt="" width="630" height="150"/></span><span class="Estilo3"><img src="images/logo_inf.png" alt="" width="129" height="143"/></span>    
    <span class="Estilo3"><h1 class="Estilo4"></h1>
    </span><br>
    </center>
    <div align="center"></div>
</div>
</div>

<!-- start header -->
<div id="header">
	<div id="menu">
		<ul>
			<ul>
			  <ul>
			   <li><a class="" href="menu.php">Inicio</a><a tabindex="-1" href="MANUAL.pdf" class="MenuBarItemSubmenu">Ayuda</a><a class="" href=".php"></a><a tabindex="-1" href=".php" class="MenuBarItemSubmenu"></a></li>
		  </ul>
		  </ul>
	      <li></li>
		  <li></li>
		  <li></li>
		   <li class="last"></li>
		</ul>
  </div>
</div>
<!-- end header -->
<!-- start page -->
<div id="wrapper">-
<div id="wrapper-btm">
<div id="page">
	<!-- start content -->
	<div id="content">
		<div class="post">
			<h1 class="title">&nbsp;</h1>
			
		  <div class="entry">

         <!-- start -->
					<div id="output"></div>
					
					<div id="slider">
						
                      <form  action="lista_filtrada.php" method="post"> 
                      <h1>Lista de Filtrada</h1> 		
                       <p>                
					   </p>
                       <table>
                       <tr>
                       <td><input type="checkbox" name="option1" value="1">Madre C</td>
                       <td><input type="checkbox" name="option2" value="2">Desplazados</td>
                       <td><input type="checkbox" name="option3" value="3">Zona R</td>
                       <td><input type="submit" name="Mostrar" value="Mostrar"></td>
                       </tr>
                       </table>
                       <div id="Layer1" style="width:590px; height:400px; overflow: scroll;">
                       	<?php
                        if(isset($_REQUEST['Mostrar'])){
                       if (isset($_POST['option1']) && $_POST['option1'] == '1' && isset($_POST['option2']) && $_POST['option2'] == '2'&& isset($_POST['option3']) && $_POST['option3'] == '3')
                       {
                        $query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.estado,d.situacion,e.estado FROM personas a,terri b,deplazado c,madre d,riesgo e WHERE a.id_des='1' AND a.id_madre='1'AND a.id_ries='1' AND a.id_madre=d.id_madre AND a.id_ries=e.id_ries AND  a.id_territorio=b.id_territorio AND a.id_des=c.id_des ;
                          ";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N.Caja</b></td>";
					      echo"<td><b>fechaIngreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>CedCastas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>Desplazados</b></td>";
					      echo"<td><b>M.Familia</b></td>";
					      echo"<td><b>Zona.R</b></td>";

					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
                       }
                       	else {
						if (isset($_POST['option1']) && $_POST['option1'] == '1' && isset($_POST['option2']) && $_POST['option2'] == '2'){

						 $query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.estado,d.situacion FROM personas a,terri b,deplazado c,madre d WHERE a.id_des='1' and a.id_madre='1'and a.id_ries='1' and a.id_madre=d.id_madre and  a.id_territorio=b.id_territorio AND a.id_des=c.id_des ;
                          ";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N Caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>Desplazados</b></td>";
					      echo"<td><b>M.Familia</b></td>";
					      

					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
                                
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
                       }else {
					   if (isset($_POST['option1']) && $_POST['option1'] == '1' && isset($_POST['option3']) && $_POST['option3'] == '3'){
						
						 $query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,d.situacion,e.estado FROM personas a,terri b,madre d,riesgo e WHERE  a.id_madre='1'AND a.id_ries='1' AND a.id_madre=d.id_madre AND a.id_ries=e.id_ries AND  a.id_territorio=b.id_territorio;
                          ";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N Caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>M.Familia</b></td>";
					      echo"<td><b>Zona.R</b></td>";
					      

					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
                                
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";

                       }else {
					   if (isset($_POST['option2']) && $_POST['option2'] == '2' && isset($_POST['option3']) && $_POST['option3'] == '3'){
						  $query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.estado,d.estado FROM personas a,terri b,deplazado c,riesgo d WHERE  a.id_des='1' AND a.id_ries='1'  AND a.id_ries=d.id_ries AND a.id_des=c.id_des AND  a.id_territorio=b.id_territorio;
                          ";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N Caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>Desplazados</b></td>";
					      echo"<td><b>Zona.R</b></td>";
					      

					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
                                
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";

                       }else{
					   if (isset($_POST['option1']) && $_POST['option1'] == '1')
                       {
                       	$query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.situacion FROM personas a,terri b,madre c WHERE a.id_madre='1'AND  a.id_territorio=b.id_territorio AND a.id_madre=c.id_madre ;";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N Caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>M.Familia</b></td>";
					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
                       }else{
					    if (isset($_POST['option2']) && $_POST['option2'] == '2')
                       {
                       	$query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.estado FROM personas a,terri b,deplazado c WHERE a.id_des='1' AND  a.id_territorio=b.id_territorio AND a.id_des=c.id_des ;";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N Caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>Desplazado</b></td>";
					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
                       }else{
					   if (isset($_POST['option3']) && $_POST['option3'] == '3')
                       {
                       	$query="SELECT a.cedula,a.nombres,a.apellidos,a.dirreccion,a.celular,a.barrio,a.N_caja,a.fecha_ingreso,a.sisben,a.ced_castatral,a.Observaciones,b.territorio,c.estado FROM personas a,terri b,riesgo c WHERE a.id_ries='1'AND  a.id_territorio=b.id_territorio AND a.id_ries=c.id_ries ;
                        ";
                          $resul=mysql_query($query,$link) or die("Error en sql");
                          $total=mysql_num_rows($resul);
                          echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Nombres</b></td>";
					      echo"<td><b>Apellidos</b></td>";
					      echo"<td><b>Dirección</b></td>";
					      echo"<td><b>Celular</b></td>";
					      echo"<td><b>Barrio</b></td>";
					      echo"<td><b>N Caja</b></td>";
					      echo"<td><b>fecha Ingreso</b></td>";
					      echo"<td><b>Sisben</b></td>";
					      echo"<td><b>Ced Castas</b></td>";
					      echo"<td><b>Observaciones</b></td>";
					      echo"<td><b>Territorio</b></td>";
					      echo"<td><b>Zona.R</b></td>";
					      echo "</tr>";
					   
					   
			          		while($fila=mysql_fetch_array($resul)){
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
   			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
                       }
					   }
					   }
					   }
					   }
					   }
					   }
                        }
                       ?>
                       </div>
					  </form>
                       
					  <div class="viewer">
					    <div class="reel">
									<!-- Add 3 thumbnails per slide, you can duplicate this as many times as needed. -->	
									<!-- Start first slide -->
					      <div class="slide"></div>
						</div>
					  </div>
			</div>					
<div id="captions"><div id="nav"></div>	
						
						</div>			
					<br class="clear" />
					
					<script type="text/javascript">

						$('#slider').slidertron({
							viewerSelector:			'.viewer',
							reelSelector:			'.viewer .reel',
							slidesSelector:			'.viewer .reel .slide',
							slidernavPreviousSelector:	'.previous',
							slidernavNextSelector:		'.next',
							slidernavFirstSelector:		'.first',
							slidernavLastSelector:		'last',
							slideradvanceDelay:			'16000',	
							slideradvanceResume:			'16000'
						});
													
					</script>		
					<script type="text/javascript">

						$.gallerax({
							outputSelector: 		'#output img',				// Output selector
							thumbnailsSelector:		'.thumbnails li img',		// Thumbnails selector
							captionSelector:		'#captions .line',			// Caption selector
							captionLines:			2,							// Caption lines (3 lines)
							fade: 					'fast',						// Transition speed (fast)
							navNextSelector:		'#nav a.navNext',			// 'Next' selector
							navPreviousSelector:	'#nav a.navPrevious',		// 'Previous' selector
							navFirstSelector:		'#nav a.navFirst',			// 'First' selector
							navLastSelector:		'#nav a.navLast',			// 'Last' selector
							navStopAdvanceSelector:	'#nav a.navStopAdvance',	// 'Stop Advance' selector
							navPlayAdvanceSelector:	'#nav a.navPlayAdvance',	// 'Play Advance' selector
							advanceFade:			'slow',						// Advance transition speed (slow)
							advanceDelay:			4000,						// Advance delay (4 seconds)
							advanceResume:			12000,						// Advance resume (12 seconds)
							thumbnailsFunction: 	function(s) {				// Thumbnails function
							
								return s.replace(/_thumb\.jpg$/, '.jpg');
								
							}
						});

					</script>					

			<!-- end -->		
		  </div>
		  <div class="meta">
				
            <div class="entry">
				
                <p align="center"><span class="title Estilo2"><strong>Con el apoyo de: </strong></span></p>
                <p align="justify" class="Estilo1">&nbsp;</p>
              <p align="justify" class="Estilo1">&nbsp;</p>
              <p align="justify" class="Estilo1">&nbsp;&nbsp;<img src="Logos/GENERAL HORIZONTAL.png" width="195" height="86">  &nbsp;&nbsp;<img src="Logos/planeacion.jpg" width="207" height="107"><img src="Logos/UDEC.png" width="93" height="101"></p>
            </div>
	  <div class="post"></div>
		</div>
	  </div>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar">
		
		        <br>
				<h1>Menu</h1>
				<br>
	       <div id="heade">
            <ul class="nav">
                    <li><a href="">Proyectos</a>
				<ul>
                        <li><a href="proyectosejecutados.php">Proyectos Ejecutados</a></li>
                        <li><a href="proyectoscurso.php">Proyecto En Curso</a></li>
                        <li><a href="nuevo_proyecto.php">Nuevo Proyecto</a></li>
						</ul>
				</li>
                <li><a href="">Listas</a>
                    <ul>
                        
                        <li><a href="lista_proyectos.php">Lista por Proyecto</a></li>
                        <li><a href="lista_filtrada.php">Lista por filtrado</a></li>
                    </ul>
                </li>
                <li><a href="consulta_usuario.php">Consulta De Usuario</a></li>
                <li><a href="">Modificar </a>
				<ul>
				        <li><a href="modificarUsuario.php">Modificar Usuario</a></li>
                        <li><a href="modificarProyecto.php">Modificar Proyecto</a></li>
						</ul>
				</li>
				<li><a href="inscribirusuarios.php">Inscripcion De Usuario</a></li>
				<li><a href="">Graficas</a>
                 <ul>
                 	<li><a href="lista_grafica_proyecto.php">Graficas por Proyecto</a></li>
                 	<li><a href="listas_graficas_filtradas.php">Graficas Filtradas</a></li>
                 </ul>
				</li>

                <li><a href="exit.php">Cerra Sesion</a></li>
            </ul>
        </div>
				<h2>&nbsp;</h2>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
	  <p>&nbsp;</p>
	</div>
	<!-- end sidebar -->
	<div style="clear: both;"></div>
</div>
<!-- end page -->   
              
            

</div>
<!-- start footer -->
<div id="footer">
	<div id="footer-wrap">
	<p id="legal">Teléfono

: (57+1) 8424822

Fax

:(57+1) 8424822 EXT. 118

Correo electrónico:

contactenos@facatativa-cundinamarca.gov.co

Dirección:

Cra 3 No. 5-68 -Parque Principal (Facatativá-Cundinamarca)

Horario de atención:

Lunes a Viernes de 8:00 a.m - 12:00 y 2:00 p.m - 5:00 p.m </p>
	</div>
</div>
<!-- end footer -->
</body>
</html>
