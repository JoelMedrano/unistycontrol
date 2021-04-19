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
  `estado` int(11) DEFAULT NULL,
  `logo1` varchar(50) DEFAULT NULL,
  `logo2` varchar(50) DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `empresa` */

insert  into `empresa`(`id_empresa`,`nombre`,`documento`,`estado`,`logo1`,`logo2`,`id_responsable`,`fecha_creacion`,`id_usuario`) values (1,'PRUEBA','123456789',1,NULL,NULL,12,'2021-04-17 11:17:04',12);

/*Table structure for table `membresia` */

DROP TABLE IF EXISTS `membresia`;

CREATE TABLE `membresia` (
  `id_membresia` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `comprobante` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_membresia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `membresia` */

/*Table structure for table `miembros` */

DROP TABLE IF EXISTS `miembros`;

CREATE TABLE `miembros` (
  `id_miembro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `id_red_social` int(11) DEFAULT NULL,
  `usuario_red_social` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_empresa` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_membresia` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_miembro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `miembros` */

/*Table structure for table `permisos` */

DROP TABLE IF EXISTS `permisos`;

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `permisos` */

/*Table structure for table `precio_membresia` */

DROP TABLE IF EXISTS `precio_membresia`;

CREATE TABLE `precio_membresia` (
  `id_precio_membresia` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `nombre_precio_membresia` varchar(100) DEFAULT NULL,
  `precio` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`id_precio_membresia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `precio_membresia` */

/*Table structure for table `red_social` */

DROP TABLE IF EXISTS `red_social`;

CREATE TABLE `red_social` (
  `id_red_social` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_red_social` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_red_social`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `red_social` */

/*Table structure for table `tipo_membresia` */

DROP TABLE IF EXISTS `tipo_membresia`;

CREATE TABLE `tipo_membresia` (
  `id_tipo_membresia` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre_membresia` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_membresia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipo_membresia` */

/*Table structure for table `usuario_permiso` */

DROP TABLE IF EXISTS `usuario_permiso`;

CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario_permiso` */

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (1,'USUARIO ADMINISTRADOR','admin','$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG','Administrador','vistas/img/usuarios/admin/anonymous.png',NULL,NULL,1,'2021-04-17 11:14:04','2021-04-17 11:14:04',0,1,NULL);
insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (6,'Joel Medrano','jmedrano','$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG','Master','vistas/img/usuarios/jmedrano/242.png',NULL,NULL,1,'2021-04-16 08:12:49','2021-04-17 09:21:02',0,1,NULL);
insert  into `usuarios`(`id`,`nombre`,`usuario`,`password`,`perfil`,`foto`,`email`,`telefono`,`estado`,`ultimo_login`,`fecha`,`correo`,`datos`,`id_empresa`) values (19,'Brean Flores','bflores','$2a$07$asxx54ahjppf45sd87a5auBfP8SzPxOC9lb4skT0/mpZfQro.Fl.a','Master','vistas/img/usuarios/bflores/944.jpg',NULL,NULL,1,'2021-04-17 09:21:26','2021-04-17 09:21:26',0,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
