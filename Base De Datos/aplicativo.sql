/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.24-log : Database - sg_modulo_vivienda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`sg_modulo_vivienda` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sg_modulo_vivienda`;

/*Table structure for table `activa` */

DROP TABLE IF EXISTS `activa`;

CREATE TABLE `activa` (
  `id_activa` int(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_activa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `activa` */

insert  into `activa`(id_activa,nombre) values (1,'activado'),(2,'desactivado');

/*Table structure for table `deplazado` */

DROP TABLE IF EXISTS `deplazado`;

CREATE TABLE `deplazado` (
  `id_des` int(10) NOT NULL,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_des`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `deplazado` */

insert  into `deplazado`(id_des,estado) values (1,'si'),(2,'no');

/*Table structure for table `madre` */

DROP TABLE IF EXISTS `madre`;

CREATE TABLE `madre` (
  `id_madre` int(10) NOT NULL,
  `situacion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_madre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `madre` */

insert  into `madre`(id_madre,situacion) values (1,'si'),(2,'no');

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `cedula` varchar(20) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `dirreccion` varchar(30) DEFAULT NULL,
  `barrio` varchar(30) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `codigo` int(10) DEFAULT NULL,
  `N_caja` varchar(20) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `Observaciones` varchar(180) DEFAULT NULL,
  `id_territorio` int(10) DEFAULT NULL,
  `sisben` varchar(30) DEFAULT NULL,
  `ced_castatral` varchar(30) DEFAULT NULL,
  `id_madre` int(10) DEFAULT NULL,
  `id_des` int(10) DEFAULT NULL,
  `id_ries` int(10) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cedula`),
  KEY `FK_personas` (`codigo`),
  KEY `FK_personas1` (`id_territorio`),
  KEY `FK_personas2` (`id_madre`),
  KEY `FK_personas3` (`id_des`),
  KEY `FK_personas4` (`id_ries`),
  CONSTRAINT `FK_personas` FOREIGN KEY (`codigo`) REFERENCES `proyectos` (`codigo`),
  CONSTRAINT `FK_personas1` FOREIGN KEY (`id_territorio`) REFERENCES `terri` (`id_territorio`),
  CONSTRAINT `FK_personas2` FOREIGN KEY (`id_madre`) REFERENCES `madre` (`id_madre`),
  CONSTRAINT `FK_personas3` FOREIGN KEY (`id_des`) REFERENCES `deplazado` (`id_des`),
  CONSTRAINT `FK_personas4` FOREIGN KEY (`id_ries`) REFERENCES `riesgo` (`id_ries`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `personas` */

insert  into `personas`(cedula,nombres,apellidos,dirreccion,barrio,celular,codigo,N_caja,fecha_ingreso,Observaciones,id_territorio,sisben,ced_castatral,id_madre,id_des,id_ries,url) values ('1234567890','andy ','camargo','CALLE 63 BIS N 70 D 60','normandia','3115567635',6,'001-120','2015-06-03','prueba prueba',2,'10254126','fhgqwfh231131',2,2,2,'usuario_aplicativo.jpg'),('12345678904567','sdfgsdfg','edfghdfghyu','rdctfvgycfvg','rctvyburfcvtgb','3453456345345',1,'23456','2014-11-07','sdfghsdfgh',1,'23456','1234567',1,1,1,NULL),('1646468464','jkfs','safas','sfafs','asfas','456465469',7,'1231','2014-10-16','jflsjflka',1,'45646','564df64s',1,1,1,NULL),('20332990','Maria Roselena','Sanchez Camargo','CALLE 6E No 2-22 ','Chico I','3204659276',6,'001','2013-07-09','CONTACTO:Personalmente\r\nNO APLICA PARA MEJORAMIENTO\r\ncambio de proyecto \r\n\r\n\r\n\r\n',1,'23456','2345fg',2,2,2,NULL),('20404474','Ana Silvia','Cabrejo','Cra 1 sur No 25-52','Cartagenita','3203168412',7,'001','2014-07-10','NO APLICA PARA MEJORAMIENTO',1,NULL,NULL,2,2,2,NULL),('20525795','Mariela','Cardenas Tellez','Calle 5B No 4-28','Chico II','',7,'001','2014-07-14','CONTACTO:Personalmente\r\nFALTA VISITA\r\n',1,'','',2,2,1,NULL),('234567891','dfghjk','dfghjk','edfghjkl','sdfghj','123456789',1,'1234er','2015-06-08','jhslkjaslkjdl',1,'123456','jshkdjhajs',1,2,2,'formato-articulos-IEEE.doc'),('321564897','andy','camargo','CALLE 63 BIS N 70 D 60','qwerty','3115567635',1,'12345','2015-06-03','erdtfhjkl',1,'qwerty','jkleq',1,1,1,'escudo-facatativa.jpg'),('35524458','Adriana','Hernandez Moreno    ','NO TIENE','','3118614131',7,'001','2014-10-03','CONTACTO:PERSONAL\r\nVivienda Nueva\r\n',2,'','',2,2,1,NULL),('36184390','daniela','molina','carrera 4 # 14 - 20','funza','31202286754',2,'','2014-11-07','se debe hacer la prueba para que sea aceptada en el sisben ',1,'456','dalkfj934nkasnq3k',1,2,1,NULL),('4546513548','jgsdlkjlks','hfksjhfka','jkdhfsiuh','hgsdjhdgja','546456464',7,'5464','2014-10-16','hdkfjhsakj',1,'1','1',1,1,1,NULL),('456789','asd','safd','sadsffs','qwerty','1234567890',1,'12345','2015-05-21','me vale madre',1,'qwerty','213456789',1,1,1,NULL),('789879879878','jkfsdfdssd','jkfdssd','jjkfdgdfd','fdfsdfsd','87987987',7,'564654','2014-10-16','fdfdsfdgff',1,'1','1',1,1,1,NULL),('87987846546','jfklejsklfjsl','hfdhskjfhskj','dkjshfkjsdhfjk','kfsdkjhfks','8789798765',7,'588484','2014-10-16','njgkdshgkjvhsdkj',1,'1','1',1,1,1,NULL),('89464930','ani','sdlflp','werty','werty','12345567',7,'2345','2014-10-16','prueba',1,'23456','234ertyu',1,1,1,NULL),('89654724','leando','camargo','universidad de cundinamarca','cerezos','31155689745',1,'01','2015-04-15','esta persona hace falta de documentos ',1,'80','',1,2,1,'11245382_10206489099845543_536186063_n.jpg'),('89797654879','kldjflksjfl','kjhfskjhfjkash','jkjkshdjkf','hfkjshkjfhsak','8798798464',7,'65464','2014-10-16','hfsakjhfkja',1,'1','1',1,1,1,NULL);

/*Table structure for table `proyec` */

DROP TABLE IF EXISTS `proyec`;

CREATE TABLE `proyec` (
  `id_proyecto` int(10) NOT NULL,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `proyec` */

insert  into `proyec`(id_proyecto,estado) values (1,'Ejecutado'),(2,'En curso');

/*Table structure for table `proyectos` */

DROP TABLE IF EXISTS `proyectos`;

CREATE TABLE `proyectos` (
  `id_proyectos` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` int(10) NOT NULL,
  `nombre_de_proyecto` varchar(30) DEFAULT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  `id_proye` int(10) DEFAULT NULL,
  `ano` int(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `id_proyectos` (`id_proyectos`),
  KEY `FK_proyectos1` (`id_proye`),
  CONSTRAINT `FK_proyectos1` FOREIGN KEY (`id_proye`) REFERENCES `proyec` (`id_proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `proyectos` */

insert  into `proyectos`(id_proyectos,codigo,nombre_de_proyecto,observaciones,id_proye,ano) values (1,1,'reubicados','',1,2013),(2,2,'100 subsidios','',1,2011),(3,3,'82 subsidios',NULL,2,NULL),(4,4,'90 mejoramientos',NULL,2,NULL),(5,5,'116 mejoramientos',NULL,2,2015),(6,6,'lista de beneficiados','',1,2014),(7,7,'Mejoramiento ','mejoramiento de vivenda prueba',2,2015),(9,12,'100 baÃ±os','prueba',1,2015);

/*Table structure for table `responsable` */

DROP TABLE IF EXISTS `responsable`;

CREATE TABLE `responsable` (
  `nombre_responsable` varchar(50) DEFAULT NULL,
  `cedula` int(15) NOT NULL,
  `funcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `responsable` */

insert  into `responsable`(nombre_responsable,cedula,funcion) values ('Andy Leandro Camargo',1014210492,'Ingeniero Sistemas AlcaldÃ­a Facatativa');

/*Table structure for table `riesgo` */

DROP TABLE IF EXISTS `riesgo`;

CREATE TABLE `riesgo` (
  `id_ries` int(10) NOT NULL,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_ries`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `riesgo` */

insert  into `riesgo`(id_ries,estado) values (1,'si'),(2,'no');

/*Table structure for table `seguridad` */

DROP TABLE IF EXISTS `seguridad`;

CREATE TABLE `seguridad` (
  `id_seguridad` int(15) NOT NULL AUTO_INCREMENT,
  `id_rol` int(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `tabla` varchar(30) DEFAULT NULL,
  `antes` varchar(1000) DEFAULT NULL,
  `ahora` varchar(1000) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `puesto` varchar(30) DEFAULT NULL,
  `accion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_seguridad`),
  KEY `FK_seguridad` (`id_rol`),
  CONSTRAINT `FK_seguridad` FOREIGN KEY (`id_rol`) REFERENCES `sg_mv_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `seguridad` */

insert  into `seguridad`(id_seguridad,id_rol,fecha,cedula,tabla,antes,ahora,nombre_usuario,apellido,puesto,accion) values (1,1,'0000-00-00','123456789','wedrfghj','sdfghjk','dfghjk','sdfgbhj','dfvgbn','dfghnj',NULL),(2,2,'0000-00-00','1234567890','proyectos','     ','asdfghjsdfghjsdfgh','sdfghjsdfgh','dfghjdfgh','cvbnfghjfvgbhn','insertar'),(3,1,'2013-11-05','1014210492','proyectos','     ','123456789:sdfghjkdfgh:234567:1:wserftujrdctfvghnjcdrvgnj','andy leandro','camargo','ingeniero sistemas','insertar'),(4,2,'2014-11-06','1014210493','proyectos','     ','111:casa:2015:1:zzzxxx','andy','camargo','ingeniero','insertar'),(5,2,'2014-11-06','1014210493','proyectos','     ','5673:casas:2014:2:asdf','andy','camargo','ingeniero','insertar'),(6,1,'2014-11-06','1014210492','proyectos','     ','890:casas:2015:1:asdasd','andy leandro','camargo','ingeniero sistemas','insertar'),(7,1,'2014-11-06','1014210492','proyectos','     ','891:casas:2014:1:','andy leandro','camargo','ingeniero sistemas','insertar'),(8,2,'2014-11-06','1014210493','proyectos','lista de beneficiarios::1:','lista :modificado:2:2014','andy','camargo','ingeniero','modificar'),(9,2,'2014-11-06','1014210493','proyectos','lista :modificado:2:2014','lista de beneficiados::1:2014','andy','camargo','ingeniero','modificar'),(10,1,'2014-11-07','1014210492','usuario','     ','','andy leandro','camargo','ingeniero sistemas','insertar'),(11,1,'2014-11-07','1014210492','personas','     ','12345678904567:sdfgsdfg:edfghdfghyu:rdctfvgycfvg:rctvyburfcvtgb:3453456345345:1:23456:2014-11-07:1:2','andy leandro','camargo','ingeniero sistemas','insertar'),(12,1,'2014-11-07','1014210492','usuario','wertyhuj:sdfghj:21345678:wertyui:sdfghjk:sdfghj:sdfghj:1:1','prueba:prueba:9876543:wertyui:sdfghjk:sdfghj:sdfghj:2:1','andy leandro','camargo','ingeniero sistemas','modificar'),(13,1,'2014-11-07','1014210492','personas','Maria Roselena             :Sanchez Camargo:CALLE 6E No 2-22 :Chico I:320 4659276:1:001:2013-07-09:C','Maria Roselena              :Sanchez Camargo:CALLE 6E No 2-22 :Chico I:320 4659276:1:001:2013-07-09:','andy leandro','camargo','ingeniero sistemas','modificar'),(14,1,'2014-11-07','1014210492','usuario','prueba:prueba:9876543:wertyui:sdfghjk:sdfghj:sdfghj:2:1','prueba seguridad:prueba seguridad:123456789:wertyui:sdfghjk:sdfghj:prueba:1:1','andy leandro','camargo','ingeniero sistemas','modificar'),(15,1,'2014-11-07','1014210492','usuario','     ','sdcfvgbhnjm:asdfgh:12345678:sdfghjk:sdfgnhjm:edfghjmk:dfghjk:1016036892:1:1','andy leandro','camargo','ingeniero sistemas','insertar'),(16,2,'2014-11-07','1014210493','personas','Maria Roselena              :Sanchez Camargo:CALLE 6E No 2-22 :Chico I:320 4659276:1:001:2013-07-09:CONTACTO:Personalmente\r\nNO APLICA PARA MEJORAMIENTO\r\ncambio de proyecto \r\nprueba de  seguridad \r\n\r\n\r\n:1:23456:2345fg:2:1:1','Maria Roselena               :Sanchez Camargo:CALLE 6E No 2-22 :Chico I:3204659276:1:001:2013-07-09:1:23456:2345fg:CONTACTO:Personalmente\r\nNO APLICA PARA MEJORAMIENTO\r\ncambio de proyecto \r\nprueba de  seguridad  desde usuario del sistema\r\n\r\n\r\n:2:2:2','andy','camargo','ingeniero','modificar'),(17,2,'2014-11-07','1014210493','proyectos','100 subsidios::1:','100 subsidios::1:2011','andy','camargo','ingeniero','modificar'),(18,2,'2014-11-07','1014210493','personas','     ','36184390:daniela:molina:carrera 4 # 14 - 20:funza:31202286754:2::2014-11-07:1:456:dalkfj934nkasnq3k:se debe hacer la prueba para que sea aceptada en el sisben :1:2:1','andy','camargo','ingeniero','insertar'),(19,2,'2014-11-07','1014210493','proyectos','     ','34256:pruena:5373:1:sdfgjhslkjfklsj','andy','camargo','ingeniero','insertar'),(20,2,'2014-11-07','1014210493','proyectos','pruena:sdfgjhslkjfklsj:1:5373','prueba:sdfgjhslkjfklsj:1:5373','andy','camargo','ingeniero','modificar'),(21,1,'2014-11-11','1014210492','proyectos','Mejoramiento de vivenda:mejoramiento de vivenda:1:2014','Mejoramiento :mejoramiento de vivenda prueba:2:2015','andy leandro','camargo','ingeniero sistemas','modificar'),(22,1,'2014-11-11','1014210492','personas','Maria Roselena               :Sanchez Camargo:CALLE 6E No 2-22 :Chico I:3204659276:1:001:2013-07-09:CONTACTO:Personalmente\r\nNO APLICA PARA MEJORAMIENTO\r\ncambio de proyecto \r\nprueba de  seguridad  desde usuario del sistema\r\n\r\n\r\n:1:23456:2345fg:2:2:2','Maria Roselena                :Sanchez Camargo:CALLE 6E No 2-22 :Chico I:3204659276:1:001:2013-07-09:1:23456:2345fg:CONTACTO:Personalmente\r\nNO APLICA PARA MEJORAMIENTO\r\ncambio de proyecto \r\n\r\n\r\n\r\n:2:2:2','andy leandro','camargo','ingeniero sistemas','modificar'),(23,1,'2014-11-11','1014210492','usuario','andy leandro:camargo:3115567635:apanda_3@hotmail.com:ingeniero sistemas:admi:12345:1:1','andy leandro:camargo:3115567635:apanda_3@hotmail.com:ingeniero sistemas:admi:1234:1:1','andy leandro','camargo','ingeniero sistemas','modificar'),(24,1,'2014-11-11','1014210492','usuario','andy leandro:camargo:3115567635:apanda_3@hotmail.com:ingeniero sistemas:admi:1234:1:1','andy leandro:camargo:3115567635:apanda_3@hotmail.com:ingeniero sistemas:admi:1234:1:1','andy leandro','camargo','ingeniero sistemas','modificar'),(25,1,'2014-11-11','1014210492','usuario','andy leandro:camargo:3115567635:apanda_3@hotmail.com:ingeniero sistemas:admi:1234:1:1','andy leandro:camargo:3115567635:apanda_3@hotmail.com:ingeniero sistemas:admi:1234:1:2','andy leandro','camargo','ingeniero sistemas','modificar'),(28,1,'0000-00-00','123456789','wedrfghj','sdfghjk','dfghjk','sdfgbhj','dfvgbn','dfghnj',NULL),(29,1,'0000-00-00','123456789','wedrfghj','sdfghjk','dfghjk','sdfgbhj','dfvgbn','dfghnj',NULL),(30,1,'0000-00-00','123456789','wedrfghj','sdfghjk','dfghjk','sdfgbhj','dfvgbn','dfghnj',NULL),(31,1,'2015-05-20','123456789','wedrfghj','sdfghjk','dfghjk','sdfgbhj','dfvgbn','dfghnj',NULL),(32,2,'2015-05-21','1014210493','personas','     ','456789:asd:safd:sadsffs:qwerty:1234567890:1:12345:2015-05-21:1:qwerty:213456789:me vale madre:1:1:1','andy','camargo','ingeniero','insertar'),(33,1,'2015-05-26','123456789','proyectos','     ','12:100 baÃ±os:2015:1:prueba','administrador','alcaldia','ingeniero','insertar'),(34,1,'2015-05-26','123456789','usuario','     ','arquitecto:arquitecto:31554869:arquitecto@hotmail.com:prueba:arquitecto:1234:1234567890:2:1','administrador','alcaldia','ingeniero','insertar'),(35,2,'2015-06-03','1234567890','personas','     ','123456789:andy:camargo:CLL 1ESTE # 1B 41 SUR:qwerty:3115567635:1:12345:2015-06-03:1:qwerty:jkleq:sdfghj:1:1:1','arquitecto','arquitecto','prueba','insertar'),(36,2,'2015-06-03','1234567890','personas','     ','1234567890:andy:camargo:CLL 1ESTE # 1B 41 SUR:qwerty:3115567635:1:12345:2015-06-03:1:qwerty:jkleq:sdfghj:1:1:1','arquitecto','arquitecto','prueba','insertar'),(37,2,'2015-06-03','1234567890','personas','     ','1234567890:andy:camargo:DIAGONAL 1 1A#39:qwerty:3115567635:1:12345:2015-06-03:1:qwerty:jkleq:sdfsad:1:1:1','arquitecto','arquitecto','prueba','insertar'),(38,2,'2015-06-03','1234567890','personas','     ','1234567890:andy:camargo:CALLE 63 BIS N 70 D 60:normandia:3115567635:1:001-120:2015-06-03:2:10254126:fhgqwfh231131:prueba:2:2:2','arquitecto','arquitecto','prueba','insertar'),(39,2,'2015-06-03','1234567890','personas','andy:camargo:CALLE 63 BIS N 70 D 60:normandia:3115567635:1:001-120:2015-06-03:prueba:2:10254126:fhgqwfh231131:2:2:2','andy :camargo:CALLE 63 BIS N 70 D 60:normandia:3115567635:6:001-120:2015-06-03:2:10254126:fhgqwfh231131:prueba prueba:2:2:2','arquitecto','arquitecto','prueba','modificar'),(40,1,'2015-06-03','123456789','usuario','arquitecto:arquitecto:31554869:arquitecto@hotmail.com:prueba:arquitecto:1234:2:1','arquitecto:arquitecto:31554869:arquitecto@hotmail.com:prueba:arquitecto:1234:2:2','administrador','alcaldia','ingeniero','modificar'),(41,1,'2015-06-04','123456789','personas','     ','234567891:dfghjk:dfghjk:edfghjkl:sdfghj:123456789:1:1234er:2015-06-03:1:123456:jshkdjhajs:sadfghjdsfghj:2:2:2','administrador','alcaldia','ingeniero','insertar'),(42,1,'2015-06-04','123456789','personas','     ','234567891:dfghjk:dfghjk:edfghjkl:sdfghj:123456789:1:1234er:2015-06-03:1:123456:jshkdjhajs:drfghjtfrcgvhjkgfvhj:1:1:1','administrador','alcaldia','ingeniero','insertar'),(43,2,'2015-06-04','1234567890','personas','     ','321564897:andy:camargo:CALLE 63 BIS N 70 D 60:qwerty:3115567635:1:12345:2015-06-03:1:qwerty:jkleq:erdtfhjkl:1:1:1','arquitecto','arquitecto','prueba','insertar'),(44,1,'2015-06-09','123456789','personas','     ','234567891:dfghjk:dfghjk:edfghjkl:sdfghj:123456789:1:1234er:2015-06-08:1:123456:jshkdjhajs:jhslkjaslkjdl:1:2:2','administrador','alcaldia','ingeniero','insertar'),(45,1,'2015-06-16','123456789','personas','     ','89654724:leando:camargo:universidad de cundinamarca:cerezos:31155689745:1:01:2015-04-15:1:80::esta persona hace falta de documentos :1:2:1','administrador','alcaldia','ingeniero','insertar');

/*Table structure for table `sg_mv_rol` */

DROP TABLE IF EXISTS `sg_mv_rol`;

CREATE TABLE `sg_mv_rol` (
  `id_rol` int(10) NOT NULL,
  `rol` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sg_mv_rol` */

insert  into `sg_mv_rol`(id_rol,rol) values (1,'administrador'),(2,'arquitecto');

/*Table structure for table `terri` */

DROP TABLE IF EXISTS `terri`;

CREATE TABLE `terri` (
  `id_territorio` int(10) NOT NULL,
  `territorio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_territorio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `terri` */

insert  into `terri`(id_territorio,territorio) values (1,'urbano'),(2,'rural');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `puesto` varchar(30) DEFAULT NULL,
  `alias` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `id_rol` int(10) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `id_activa` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`cedula`),
  KEY `FK_usuario` (`id_rol`),
  KEY `FK_usuario1` (`id_activa`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_rol`) REFERENCES `sg_mv_rol` (`id_rol`),
  CONSTRAINT `FK_usuario1` FOREIGN KEY (`id_activa`) REFERENCES `activa` (`id_activa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(id_usuario,nombre,apellido,telefono,correo,puesto,alias,pass,id_rol,cedula,id_activa) values (1,'administrador','alcaldia',NULL,'admin@alcaldia.com','ingeniero','admin','1234',1,'123456789',1),(9,'arquitecto','arquitecto','31554869','arquitecto@hotmail.com','prueba','arquitecto','1234',2,'1234567890',1);

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `mensual` */

/*!50106 DROP EVENT IF EXISTS `mensual`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `mensual` ON SCHEDULE EVERY 1 MONTH STARTS '2015-05-20 21:34:52' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
	   UPDATE personas SET codigo ='6',Observaciones='Se cambia de proyecto por que ya trascurioeron 5 años en el listado y esta listo para otro mejoramiento de vivienda ' WHERE TIMESTAMPDIFF(YEAR, fecha_ingreso, CURDATE())='5';
	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
