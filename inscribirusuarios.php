<html>
<?php 

  session_start();
if($_SESSION["cedula"]==null){
         echo "<script language='javascript'>window.location='index.html'</script>";
    }
$link=mysql_connect("localhost","root","") or die("Erro en la Conexion");
	mysql_select_db("sg_modulo_vivienda",$link)or die("Error base de datos");
$lin=mysql_connect("localhost","root","") or die("Erro en la Conexion");
    mysql_select_db("sg_modulo_vivienda",$lin)or die("Error base de datos");
 
    $sql="SELECT codigo,nombre_de_proyecto FROM proyectos;";
	$resultado=mysql_query($sql,$link) or die("Error en sql");

	$data="SELECT id_territorio,territorio FROM terri;";
	$resu=mysql_query($data,$link)or die("Error en sql");

 ?>
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Mejoramiento de vivienda 2014</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/jquery.gallerax-0.2.js"></script>
<script type="text/javascript" src="js/jquery.slidertron-0.1.js"></script>
<script type="text/javascript" src="js/filter.js"></script>		
		<script>
    function solonumeros(e){
            
            key = e.keyCode || e.which;
            
            teclado = String.fromCharCode(key);
            
            numeros = "0123456789";
            especiales = "8-37-38-46";// array 
            teclado_especial =false;
            
            for(var i in especiales){
                
                if(key==especiales[i]){
                        teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)== -1 && !teclado_especial){
                    return false;
            }
    }
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
                    <form  action="inscribirusuarios.php" method="post"> 
					<table>
                     <tr>
                     <td>Cedula:</td>
                     <td></td>
                     <td><input type="text" size="20" id="cedu" value=""name="cedu" required onkeypress="return solonumeros(event)" onpaste="false" ></td>
                     <td></td>
                     <td><input type="submit" name="Consultar" value="Consultar"></td>
                     </tr>
                     </table>
                     </form>
                     <div id="Layer1" style="width:590px; height:400px; overflow: scroll;">
                     <?php
					 
                      if(isset($_REQUEST['Consultar'])){
                      	$cedu=$_POST["cedu"];

                       $directorio = "Documentos/$cedu";

                       if (!file_exists("$directorio")) {
                       mkdir("$directorio", 0777, true);
                        }
                        $sq="SELECT * FROM personas WHERE cedula='$cedu';";
						$res=mysql_query($sq,$lin)or die("Error en sql");
                        $fi=mysql_fetch_row($res);
                        if($fi!=null){
                        
                      echo "<script language='javascript'>alert('esta persona ya se encuentra registrada');window.location='inscribirusuarios.php'</script>";
    

                        }else{
?>
                      <form  action="logicaincribir.php" method="post" enctype="multipart/form-data">         
                    <h1>Inscribir Usuarios</h1>
                      <p>
                     </p>
                     <fieldset>
                     <table cellpadding="3" cellspacing="0">
                     <tr>
                     <td>Cedula:</td>
                     <td></td>
                     <td><input type="text" size="20" id="cedula" value="<?php echo "$cedu"; ?>"  readonly=”readonly” name="cedula" ></td>
                      </tr>
                      <tr>
                     <td>Nombre:</td>
                     <td></td>
                     <td><input type="text" size="20" id="nombre" value=""name="nombre"  required></td>
                     </tr>
                      <tr>
                     <td>Apellido:</td>
                     <td></td>
                     <td><input type="text" size="20" id="apellido" value=""name="apellido"  required></td>
                     </tr>
                     <tr>
                     <td>Direccion:</td>
                     <td></td>
                     <td><input type="text" size="20" id="direccion" value=""name="direccion" required ></td>
                     </tr>
                     <tr>
                     <td>Barrio:</td>
                     <td></td>
                     <td><input type="text" size="20" id="barrio" value=""name="barrio"  ></td>
                     </tr>
                     <tr>
                     <td>Celular:</td>
                     <td></td>
                     <td><input type="text" size="20" id="celular" value=""name="celular" onkeypress="return solonumeros(event)" required></td>
                     </tr>
                     <tr>
                     <td>Proyecto:</td>
                     <td></td>
                     <td>
                      <select id="proyecto" name="proyecto"> 
                       <?php
                       while ($row=mysql_fetch_array($resultado))
                        {
                        
                        echo " <option  value=$row[codigo]>$row[nombre_de_proyecto]</option>";
                        
                       }
                       ?>
                     </select>
                     </td>
                     </tr>
                     <tr>
                     <td>N Caja:</td>
                     <td></td>
                     <td><input type="text" size="20" id="caja" value=""name="caja"  ></td>
                     </tr>
                     <tr>
                     <td>Fecha:</td>
                     <td></td>
                     <td><div><input type="text" name="date" class="tcal" value="" /></div></td>
                     </tr>
                     <tr>
                     <td>Territorio:</td>
                     <td></td>
                     <td><select id="terri" name="terri"> 
                       <?php
                       while ($ros=mysql_fetch_array($resu))
                        {
                        
                        echo"<option  value= $ros[id_territorio]>$ros[territorio]</option>";
                        
                       }
                       ?>
                     </select></td> 
                     </tr>
                     <tr>
                     <td>Sisben:</td>
                     <td></td>
                     <td><input type="text" size="20" id="sisben" value=""name="sisben"  ></td>
                     </tr>
                     <tr>
                     <td>Ced Catastral</td>
                     <td></td>
                     <td><input type="text" size="20" id="cata" value=""name="cata"  ></td>
                     </tr>
                     <tr>
                     <td>Madre Cab:</td>
                     <td></td>
                     <td><select id="mad" name="mad">
                        <option value="">Elija Opcion</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select></td>
                     </tr>
                     <tr>
                     <td>Desplazado:</td>
                     <td></td>
                     <td><select id="des" name="des">
                        <option value="">Elija Opcion</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select></td>
                     </tr>
                     <tr>
                     <td>Riesgo:</td>
                     <td></td>
                     <td><select id="rie" name="rie">
                        <option value="">Elija Opcion</option>
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select></td>
                     </tr>
                     <tr>
                     <td>Observaciones:</td>
                     <td></td>
                     <td><textarea  name="observacion" rows="10" cols="40"></textarea></td>
                     </tr>
                     <tr>
                     <td></td> 
                     <td></td>
                     <td><input type="file" name="archivo" value="Selecione Archivo"></td> 
                     </tr>
                     <tr> 
                      <td></td>
                     <td></td>
                     <td><input type="submit" name="regi" value="Registrarse"></td>
                     </tr>
                     </table>
                     </fieldset>
                      </form>  
<?php
                        }

                       }
					 ?>
                     </div>
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
