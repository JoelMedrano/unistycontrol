/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.16-MariaDB : Database - unistycontrol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`unistycontrol` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `unistycontrol`;

/*Table structure for table `auditoria` */

DROP TABLE IF EXISTS `auditoria`;

CREATE TABLE `auditoria` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `concepto` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `auditoria` */

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `logo1` varchar(200) DEFAULT NULL,
  `logo2` varchar(200) DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `empresa` */

insert  into `empresa`(`id_empresa`,`nombre`,`documento`,`estado`,`logo1`,`logo2`,`id_responsable`,`fecha_creacion`,`id_usuario`) values (1,'UNISTY','12345678910',1,'vistas/img/empresas/12345678910/475.png','vistas/img/empresas/12345678910/367.png',6,'2021-04-21 17:37:12',1);
insert  into `empresa`(`id_empresa`,`nombre`,`documento`,`estado`,`logo1`,`logo2`,`id_responsable`,`fecha_creacion`,`id_usuario`) values (2,'PRUEBA','1234567891012',1,'','',19,'2021-04-21 10:52:43',1);

/*Table structure for table `estadisticas` */

DROP TABLE IF EXISTS `estadisticas`;

CREATE TABLE `estadisticas` (
  `id_estadistica` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `tipo_apuesta` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `partido` varchar(100) DEFAULT NULL,
  `pronostico` varchar(100) DEFAULT NULL,
  `cuota` decimal(6,2) DEFAULT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estadistica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estadisticas` */

/*Table structure for table `membresia` */

DROP TABLE IF EXISTS `membresia`;

CREATE TABLE `membresia` (
  `id_membresia` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `comprobante` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `id_miembro` int(11) DEFAULT NULL,
  `destino` int(11) DEFAULT '0',
  PRIMARY KEY (`id_membresia`)
) ENGINE=InnoDB AUTO_INCREMENT=10013 DEFAULT CHARSET=latin1;

/*Data for the table `membresia` */

insert  into `membresia`(`id_membresia`,`id_tipo_membresia`,`fecha_inicio`,`fecha_fin`,`comprobante`,`estado`,`id_usuario`,`id_miembro`,`destino`) values (10004,4,'2021-04-24','2021-04-30','vistas/img/comprobantes/5/207.jpg',0,19,5,10007);
insert  into `membresia`(`id_membresia`,`id_tipo_membresia`,`fecha_inicio`,`fecha_fin`,`comprobante`,`estado`,`id_usuario`,`id_miembro`,`destino`) values (10007,4,'2021-05-01','2021-06-01','vistas/img/comprobantes/5/158.jpg',1,19,5,0);
insert  into `membresia`(`id_membresia`,`id_tipo_membresia`,`fecha_inicio`,`fecha_fin`,`comprobante`,`estado`,`id_usuario`,`id_miembro`,`destino`) values (10009,7,'2021-04-19','2021-04-22','vistas/img/comprobantes/17/284.jpg',2,6,17,10010);
insert  into `membresia`(`id_membresia`,`id_tipo_membresia`,`fecha_inicio`,`fecha_fin`,`comprobante`,`estado`,`id_usuario`,`id_miembro`,`destino`) values (10010,7,'2021-04-23','2021-04-30','vistas/img/comprobantes/17/492.jpg',1,19,17,0);
insert  into `membresia`(`id_membresia`,`id_tipo_membresia`,`fecha_inicio`,`fecha_fin`,`comprobante`,`estado`,`id_usuario`,`id_miembro`,`destino`) values (10012,4,'2021-04-27','2021-05-27','vistas/img/comprobantes/13/915.jpg',0,19,13,0);

/*Table structure for table `miembros` */

DROP TABLE IF EXISTS `miembros`;

CREATE TABLE `miembros` (
  `id_miembro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `id_red_social` int(11) DEFAULT NULL,
  `usuario_red_social` varchar(20) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_empresa` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `id_membresia` int(11) DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `eliminado` int(11) DEFAULT '1',
  `id_usuario_activador` int(11) DEFAULT '0',
  `codigo_activador` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_miembro`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `miembros` */

insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (4,'Brean Flores Meza','12345678','123-456-789','bflores@gmail.com','vistas/img/miembros/default/anonymous.png',3,'brean','2021-04-23 16:22:04',1,0,0,1,0,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (5,'Carlos Enrique Medrano Guere','47283914','987-654-321','carlos@gmail.com','vistas/img/miembros/47283914/722.jpg',5,'carlos','2021-04-23 16:35:27',1,1,10004,6,1,6,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (6,'NUEVO MIEMBRO','47281037','573-737-373','bflores@gmail.com','vistas/img/miembros/47281037/589.jpg',8,'joeycris','2021-04-23 16:22:04',1,0,0,6,0,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (7,'TIFFANY CUNZA CASTILLO','47490910','987-654-123','tiffany@gmail.com','vistas/img/miembros/47490910/937.jpg',9,'tiffany','2021-04-23 16:22:05',1,0,0,6,0,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (9,'ANGELA MEDRANO','12345678','123-456-778','prueba@gamicl.com','vistas/img/miembros/12345678/610.jpg',6,'angela','2021-04-23 16:22:05',2,0,0,6,0,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (11,'prueba','231','987-124-141','bflores@gmail.com','vistas/img/miembros/231/247.jpg',3,'joeycrisis','2021-04-23 16:22:05',2,0,0,6,1,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (13,'TANGA SOÑADORA','456789','977-564-212','bflores@gmail.com','vistas/img/miembros/456789/506.jpg',4,'joeycrisis','2021-04-26 11:17:03',2,0,0,6,1,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (15,'BOXER ELTON 3','472839148585','123-654-789','carlos@gmail.com','vistas/img/miembros/47283914/714.jpg',8,'joeycrisi','2021-04-26 11:17:03',2,0,0,6,1,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (16,'Joel Medrano Güere','47281037','982-009-013','jvmedrano@gmail.com','vistas/img/miembros/47281037/289.jpg',4,'joeycrisis','2021-04-23 16:22:06',1,0,0,6,0,0,NULL);
insert  into `miembros`(`id_miembro`,`nombre_completo`,`documento`,`celular`,`correo`,`foto`,`id_red_social`,`usuario_red_social`,`fecha_creacion`,`id_empresa`,`estado`,`id_membresia`,`id_usuario`,`eliminado`,`id_usuario_activador`,`codigo_activador`) values (17,'Joel Medrano Guere','47281037','982-009-013','jvmedrano@gmail.com','vistas/img/miembros/47281037/232.jpg',3,'joeycrisis','2021-04-26 11:17:04',1,1,0,1,1,6,NULL);

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `permisos` */

insert  into `permisos`(`id_permiso`,`nombre`) values (1,'Usuarios');
insert  into `permisos`(`id_permiso`,`nombre`) values (2,'Empresas');
insert  into `permisos`(`id_permiso`,`nombre`) values (3,'Redes');
insert  into `permisos`(`id_permiso`,`nombre`) values (4,'Miembros');
insert  into `permisos`(`id_permiso`,`nombre`) values (5,'Membresias');
insert  into `permisos`(`id_permiso`,`nombre`) values (6,'Estadisticas');
insert  into `permisos`(`id_permiso`,`nombre`) values (7,'Dashboard');

/*Table structure for table `precio_membresia` */

DROP TABLE IF EXISTS `precio_membresia`;

CREATE TABLE `precio_membresia` (
  `id_precio_membresia` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `nombre_precio_membresia` varchar(100) DEFAULT NULL,
  `precio` decimal(11,2) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_precio_membresia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `precio_membresia` */

insert  into `precio_membresia`(`id_precio_membresia`,`id_tipo_membresia`,`nombre_precio_membresia`,`precio`,`fecha_creacion`,`id_usuario`) values (2,4,'MENSUAL',20.00,'2021-04-21 14:33:41',1);

/*Table structure for table `red_social` */

DROP TABLE IF EXISTS `red_social`;

CREATE TABLE `red_social` (
  `id_red_social` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_red_social` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_red_social`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `red_social` */

insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (2,'FACEBOOK',1,'2021-04-20 12:53:21');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (3,'INSTAGRAM',1,'2021-04-20 12:58:03');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (4,'TWITTER',1,'2021-04-20 12:58:12');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (5,'TELEGRAM',1,'2021-04-20 12:58:22');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (6,'TIK TOK',1,'2021-04-20 12:58:34');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (7,'WHATSAPP',1,'2021-04-20 13:01:50');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (8,'SNAPCHAT',1,'2021-04-20 13:01:58');
insert  into `red_social`(`id_red_social`,`nombre_red_social`,`id_usuario`,`fecha_creacion`) values (9,'YOUTUBE',1,'2021-04-20 13:02:06');

/*Table structure for table `tipo_membresia` */

DROP TABLE IF EXISTS `tipo_membresia`;

CREATE TABLE `tipo_membresia` (
  `id_tipo_membresia` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre_membresia` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_membresia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_membresia` */

insert  into `tipo_membresia`(`id_tipo_membresia`,`id_empresa`,`nombre_membresia`,`fecha_creacion`,`id_usuario`) values (4,1,'VIP','2021-04-20 17:25:53',1);
insert  into `tipo_membresia`(`id_tipo_membresia`,`id_empresa`,`nombre_membresia`,`fecha_creacion`,`id_usuario`) values (6,2,'VIP2','2021-04-21 10:53:37',19);
insert  into `tipo_membresia`(`id_tipo_membresia`,`id_empresa`,`nombre_membresia`,`fecha_creacion`,`id_usuario`) values (7,1,'PREMIUM','2021-04-21 11:16:40',1);
insert  into `tipo_membresia`(`id_tipo_membresia`,`id_empresa`,`nombre_membresia`,`fecha_creacion`,`id_usuario`) values (8,1,'FUTBOL','2021-04-22 09:21:21',6);
insert  into `tipo_membresia`(`id_tipo_membresia`,`id_empresa`,`nombre_membresia`,`fecha_creacion`,`id_usuario`) values (9,1,'NBA','2021-04-22 09:21:36',6);

/*Table structure for table `usuario_permiso` */

DROP TABLE IF EXISTS `usuario_permiso`;

CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `usuario_permiso` */

insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (23,6,1);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (24,6,2);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (25,6,3);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (26,6,4);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (27,6,5);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (28,6,6);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (29,6,7);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (37,1,4);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (38,1,5);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (39,1,6);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (40,19,1);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (41,19,2);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (42,19,3);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (43,19,4);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (44,19,5);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (45,19,6);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (46,19,7);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (47,20,4);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (48,20,5);
insert  into `usuario_permiso`(`id_usuario_permiso`,`id_usuario`,`id_permiso`) values (49,20,6);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `correo` int(11) DEFAULT '0',
  `datos` int(11) DEFAULT '0',
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (1,'USUARIO ADMINISTRADOR','admin','$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG','Administrador','vistas/img/usuarios/admin/anonymous.png','bryanfm1998@gmail.com',NULL,1,'2021-04-23 11:54:38','2021-04-23 17:14:00',0,0,1);
insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (6,'Joel Medrano','jmedrano','$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG','Master','vistas/img/usuarios/jmedrano/242.png',NULL,NULL,1,'2021-04-24 11:14:38','2021-04-24 11:14:33',0,0,0);
insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (19,'Brean Flores','bflores','$2a$07$asxx54ahjppf45sd87a5auBfP8SzPxOC9lb4skT0/mpZfQro.Fl.a','Master','vistas/img/usuarios/bflores/944.jpg','bryanfm1998@gmail.com','987-654-321',1,'2021-04-26 09:42:26','2021-04-26 09:42:26',0,0,0);
insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (20,'Carlos Enrique Medrano Guere','cmedrano','$2a$07$asxx54ahjppf45sd87a5auj.qdSQMKfXvMT9VWiGiVdKgYX/yOp4u','Administrador','','jvmedrano@gmail.com','123-654-789',1,'0000-00-00 00:00:00','2021-04-23 16:59:27',0,0,NULL);

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `evento_asistencia` */

/*!50106 DROP EVENT IF EXISTS `evento_asistencia`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`unistystore_admin`@`%` EVENT `evento_asistencia` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-23 13:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
  INSERT INTO red_social (nombre_red_social, id_usuario) values ('PRUEBITA',1) ;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
