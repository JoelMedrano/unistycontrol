-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 12:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unistycontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditoria`
--

CREATE TABLE `auditoria` (
  `id_auditoria` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `concepto` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `logo1` varchar(200) DEFAULT NULL,
  `logo2` varchar(200) DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `documento`, `estado`, `logo1`, `logo2`, `id_responsable`, `fecha_creacion`, `id_usuario`) VALUES
(1, 'UNISTY', '12345678910', 1, 'vistas/img/empresas/12345678910/475.png', 'vistas/img/empresas/12345678910/367.png', 6, '2021-04-21 22:37:12', 1),
(2, 'PRUEBA', '1234567891012', 1, '', '', 19, '2021-04-21 15:52:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membresia`
--

CREATE TABLE `membresia` (
  `id_membresia` int(11) NOT NULL,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `comprobante` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `id_miembro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membresia`
--

INSERT INTO `membresia` (`id_membresia`, `id_tipo_membresia`, `fecha_inicio`, `fecha_fin`, `comprobante`, `estado`, `id_usuario`, `id_miembro`) VALUES
(2, 7, '2021-04-21', '2021-05-21', '123456', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `miembros`
--

CREATE TABLE `miembros` (
  `id_miembro` int(11) NOT NULL,
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
  `eliminado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miembros`
--

INSERT INTO `miembros` (`id_miembro`, `nombre_completo`, `documento`, `celular`, `correo`, `foto`, `id_red_social`, `usuario_red_social`, `fecha_creacion`, `id_empresa`, `estado`, `id_membresia`, `id_usuario`, `eliminado`) VALUES
(4, 'Brean Flores Meza', '12345678', '123-456-789', 'bflores@gmail.com', 'vistas/img/miembros/default/anonymous.png', 3, 'brean', '2021-04-21 19:21:19', 1, 0, 0, 1, 1),
(5, 'Carlos Enrique Medrano Guere', '47283914', '987-654-321', 'carlos@gmail.com', 'vistas/img/miembros/default/anonymous.png', 5, 'carlos', '2021-04-21 16:51:13', 2, 0, 0, 6, 1),
(6, 'TRUSA SPORT', '47281037', '573-737-373', 'bflores@gmail.com', 'vistas/img/miembros/default/anonymous.png', 8, 'joeycris', '2021-04-21 19:34:37', 2, 0, 0, 6, 1),
(7, 'TIFFANY CUNZA CASTILLO', '47490910', '987-654-123', 'tiffany@gmail.com', 'vistas/img/miembros/47490910/937.jpg', 9, 'tiffany', '2021-04-21 20:32:38', 2, 0, 0, 6, 1),
(9, 'ANGELA MEDRANO', '12345678', '123-456-778', 'prueba@gamicl.com', 'vistas/img/miembros/12345678/610.jpg', 6, 'angela', '2021-04-21 20:34:56', 2, 0, 0, 6, 1),
(11, 'prueba', '231', '987-124-141', 'bflores@gmail.com', 'vistas/img/miembros/231/247.jpg', 3, 'joeycrisis', '2021-04-21 20:36:13', 2, 0, 0, 6, 1),
(13, 'TANGA SOÑADORA', '456789', '977-564-212', 'bflores@gmail.com', 'vistas/img/miembros/456789/506.jpg', 4, 'joeycrisis', '2021-04-22 17:50:50', 2, 0, 0, 6, 1),
(15, 'BOXER ELTON 3', '472839148585', '123-654-789', 'carlos@gmail.com', 'vistas/img/miembros/47283914/714.jpg', 8, 'joeycrisi', '2021-04-22 17:49:42', 2, 0, 0, 6, 1),
(16, 'Joel Medrano Güere', '47281037', '982-009-013', 'jvmedrano@gmail.com', 'vistas/img/miembros/47281037/289.jpg', 4, 'joeycrisis', '2021-04-22 17:51:59', 1, 0, 0, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`) VALUES
(1, 'Usuarios'),
(2, 'Empresas'),
(3, 'Redes'),
(4, 'Miembros'),
(5, 'Membresias'),
(6, 'Apuestas'),
(7, 'Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `precio_membresia`
--

CREATE TABLE `precio_membresia` (
  `id_precio_membresia` int(11) NOT NULL,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `nombre_precio_membresia` varchar(100) DEFAULT NULL,
  `precio` decimal(11,2) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precio_membresia`
--

INSERT INTO `precio_membresia` (`id_precio_membresia`, `id_tipo_membresia`, `nombre_precio_membresia`, `precio`, `fecha_creacion`, `id_usuario`) VALUES
(2, 4, 'MENSUAL', '20.00', '2021-04-21 19:33:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `red_social`
--

CREATE TABLE `red_social` (
  `id_red_social` int(11) NOT NULL,
  `nombre_red_social` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `red_social`
--

INSERT INTO `red_social` (`id_red_social`, `nombre_red_social`, `id_usuario`, `fecha_creacion`) VALUES
(2, 'FACEBOOK', 1, '2021-04-20 17:53:21'),
(3, 'INSTAGRAM', 1, '2021-04-20 17:58:03'),
(4, 'TWITTER', 1, '2021-04-20 17:58:12'),
(5, 'TELEGRAM', 1, '2021-04-20 17:58:22'),
(6, 'TIK TOK', 1, '2021-04-20 17:58:34'),
(7, 'WHATSAPP', 1, '2021-04-20 18:01:50'),
(8, 'SNAPCHAT', 1, '2021-04-20 18:01:58'),
(9, 'YOUTUBE', 1, '2021-04-20 18:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_membresia`
--

CREATE TABLE `tipo_membresia` (
  `id_tipo_membresia` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre_membresia` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_membresia`
--

INSERT INTO `tipo_membresia` (`id_tipo_membresia`, `id_empresa`, `nombre_membresia`, `fecha_creacion`, `id_usuario`) VALUES
(4, 1, 'VIP', '2021-04-20 22:25:53', 1),
(6, 2, 'VIP2', '2021-04-21 15:53:37', 19),
(7, 1, 'PREMIUM', '2021-04-21 16:16:40', 1),
(8, 1, 'FUTBOL', '2021-04-22 14:21:21', 6),
(9, 1, 'NBA', '2021-04-22 14:21:36', 6);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
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
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `email`, `telefono`, `estado`, `ultimo_login`, `fecha`, `correo`, `datos`, `id_empresa`) VALUES
(1, 'USUARIO ADMINISTRADOR', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/anonymous.png', NULL, NULL, 1, '2021-04-22 09:46:23', '2021-04-22 17:27:34', 0, 0, 1),
(6, 'Joel Medrano', 'jmedrano', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Master', 'vistas/img/usuarios/jmedrano/242.png', NULL, NULL, 1, '2021-04-22 09:51:14', '2021-04-22 14:51:11', 0, 0, 0),
(19, 'Brean Flores', 'bflores', '$2a$07$asxx54ahjppf45sd87a5auBfP8SzPxOC9lb4skT0/mpZfQro.Fl.a', 'Master', 'vistas/img/usuarios/bflores/944.jpg', NULL, NULL, 1, '2021-04-21 15:13:22', '2021-04-21 20:13:22', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`id_usuario_permiso`, `id_usuario`, `id_permiso`) VALUES
(8, 1, 1),
(9, 1, 2),
(10, 1, 3),
(11, 1, 4),
(12, 1, 5),
(13, 1, 6),
(14, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `membresia`
--
ALTER TABLE `membresia`
  ADD PRIMARY KEY (`id_membresia`);

--
-- Indexes for table `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id_miembro`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indexes for table `precio_membresia`
--
ALTER TABLE `precio_membresia`
  ADD PRIMARY KEY (`id_precio_membresia`);

--
-- Indexes for table `red_social`
--
ALTER TABLE `red_social`
  ADD PRIMARY KEY (`id_red_social`);

--
-- Indexes for table `tipo_membresia`
--
ALTER TABLE `tipo_membresia`
  ADD PRIMARY KEY (`id_tipo_membresia`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`id_usuario_permiso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `membresia`
--
ALTER TABLE `membresia`
  MODIFY `id_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id_miembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `precio_membresia`
--
ALTER TABLE `precio_membresia`
  MODIFY `id_precio_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `red_social`
--
ALTER TABLE `red_social`
  MODIFY `id_red_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tipo_membresia`
--
ALTER TABLE `tipo_membresia`
  MODIFY `id_tipo_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
