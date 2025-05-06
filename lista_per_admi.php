<html>
<?php 

  session_start();
  if($_SESSION["cedula"]==null){
  		 echo "<script language='javascript'>window.location='index.html'</script>";
  	}
  	$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
 
    $sql="SELECT a.nombre,a.apellido,a.telefono,a.correo,a.puesto,a.alias,a.cedula,b.nombre,c.rol FROM usuario a,activa b,sg_mv_rol c WHERE a.id_rol=c.id_rol AND a.id_activa=b.id_activa ;";
    $resultado=mysql_query($sql,$link) or die("Error en sql");
 ?>

<head>
<!--
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

-->
<title>Mejoramiento de vivienda 2014</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/jquery.gallerax-0.2.js"></script>
<script type="text/javascript" src="js/jquery.slidertron-0.1.js"></script>
<script type="text/javascript" src="js/filter.js"></script>		
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <style type="text/css">
<!--
.Estilo1 { 
	font-size: 18px
}
.Estilo2 {font-size: 24px}
-->
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
			   <li><a class="" href="menuAdmi.php">Inicio</a><a tabindex="-1" href=".php" class="MenuBarItemSubmenu">Ayuda</a><a class="" href=".php"></a><a tabindex="-1" href=".php" class="MenuBarItemSubmenu"></a></li>
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
						
                    <form>  		
                                       
					    <h1>Lista Personas Sistema</h1>
                        <p> 
                        </p> 
                         <div id="Layer1" style="width:590px; height:400px; overflow: scroll;">
                         <?php
                  $page = 1; 
		           if(array_key_exists('pg', $_GET)){
		           $page = $_GET['pg']; 
		      }
		    
		    $mysqli = new mysqli("localhost","root","","sg_modulo_vivienda");
		    if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}


		    $conteo_query =  $mysqli->query("SELECT  COUNT(*) AS conteo FROM seguridad a,sg_mv_rol b WHERE a.id_rol=b.id_rol ORDER BY a.fecha;");
		    $conteo = "";
		    if($conteo_query){
		    	while($obj = $conteo_query->fetch_object()){ 
		    	 	$conteo =$obj->conteo; 
		    	}
		    }
		    $conteo_query->close(); 
		    unset($obj); 
		    $max_num_paginas = intval($conteo/10); //en esto caso 10
    		
                        ?>

                       <?php 
					      echo "<table border='1' align='center'>";
					      echo "<tr bgcolor='#CCCCCC'>";
					      echo"<td><b>Nombre</b></td>";
					      echo"<td><b>Apellido</b></td>";
					      echo"<td><b>Telefono</b></td>";
					      echo"<td><b>Correo</b></td>";
					      echo"<td><b>Puesto</b></td>";
                          echo"<td><b>Nom.usuario</b></td>";
					      echo"<td><b>Cedula</b></td>";
					      echo"<td><b>Estado</b></td>";
					      echo"<td><b>Rol</b></td>";
                          
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
			          			echo "</tr>";
			          			
			          		}
			          		echo "</table>";
?>                        </div> 
                      </form> 
                          <!--

                          boton pdf
                          <form target="_blank" action="" method="get">
			          		<table>
			          		<tr>
			          		<td> <input type ="submit" name = "PDF" value = "PDF"></td>
			          		</tr>
			          		</table>
                            </form>
-->


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
               <p>&nbsp;</p>
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
                <li><a href="">Registrar</a>
                 <ul>
                 <li><a href="crearusuAdmi.php">Crear Usuario Sistema</a></li>
                 <li><a href="crearusuperadmi.php">Crear Usuario </a></li>
                 <li><a href="crear_proyecto_admi.php">Crear Proyecto</a></li>
                </ul>
                </li>
                <li><a href="">Listas</a>
                 <ul>
                 	<li><a href="lista_per_admi.php">Lista de Usuarios Sistema</a></li>
                 	<li><a href="lista_filtrada_admi.php">Listas Filtradas</a></li>
                 	<li><a href="lista_proyectos_admi.php">Lista de proyectos</a></li>
                 	<li><a href="lista_personas_general.php">Lista Personas Beneficiadas</a></li>
                 	<li><a href="lista_proyectos_pro_admi.php">Lista de P.C.E</a></li>
                    </ul>
                 </li>
                <li><a href="">Consultar</a>
                <ul>
                <li><a href="consultaUsuarioAdmi.php">Consulta Usuario de Sistema</a></li>
                <li><a href="consulta_usuario_admi.php">Consulta Personas Beneficiadas</a></li>
                </ul>
                </li>

                <li><a href="">Modificar</a>
				<ul>
                        <li><a href="modifiUsuario_per.php">Modificar Usuario Sistema</a></li>
                        <li><a href="modificarProyecto_admi.php">Modificar Proyectos</a></li>
                        <li><a href="modificarUsuario_admi.php">Modificar Personas</a></li>
                         <li><a href="modificar_respon.php">Modificar Responsable</a></li>
                    </ul></li>

                    <li><a href="">Graficas</a>
                 <ul>
                 	<li><a href="lis_gra_pro_admi.php">Graficas por Proyecto</a></li>
                 	<li><a href="lista_gra_fil_admi.php">Graficas Filtradas</a></li>
                 </ul>
				</li>
				<li><a href="">Seguridad</a>
                 <ul>
                    <li><a href="seguridad.php">Seguridad General</a></li>
                    <li><a href="fecha_seguridad.php">Fecha Seguridad</a></li>
                    <li><a href="seguridad_accion.php">Accion Seguridad</a></li>
                 </ul>  
                </li>
                <li><a href="exit.php">Cerra Sesion</a></li>
            </ul>
        </div>
				<h2>&nbsp;</h2>
				<ul>
			
			    </ul>
		  </li>
		
		
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
