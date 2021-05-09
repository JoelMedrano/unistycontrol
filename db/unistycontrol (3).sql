-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2021 a las 03:21:33
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unistycontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuestas`
--

CREATE TABLE `apuestas` (
  `id_apuestas` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `tipo_apuesta` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `partido` varchar(100) DEFAULT NULL,
  `pronostico` varchar(300) DEFAULT NULL,
  `cuota` decimal(6,2) DEFAULT NULL,
  `monto` decimal(6,2) DEFAULT '1.00',
  `estado` int(11) DEFAULT '0',
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  `eliminado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apuestas`
--

INSERT INTO `apuestas` (`id_apuestas`, `id_empresa`, `id_tipo_membresia`, `tipo_apuesta`, `fecha`, `partido`, `pronostico`, `cuota`, `monto`, `estado`, `fecha_creacion`, `id_usuario`, `eliminado`) VALUES
(67, 2, 12, '2', '2021-05-01 00:00:00', 'Real Madrid Vs Osasuna | Sporting Lisboa vs Nacional', 'Ganador: Real Madrid | Ganador: Sporting Lisboa', '1.73', '1.00', 1, '2021-05-01 05:25:27', 6, 1),
(68, 2, 12, '1', '2021-05-01 00:00:00', 'Ac Millan Vs Benevento', 'Local Y +1.5 Goles', '1.35', '1.00', 1, '2021-05-01 05:26:15', 6, 1),
(69, 2, 12, '1', '2021-05-01 00:00:00', 'Borussia Dortmund Vs Holstein Klel', 'Gol En Ambos Tiempo: Si', '1.40', '1.00', 3, '2021-05-01 05:27:33', 6, 1),
(70, 2, 12, '1', '2021-05-01 00:00:00', 'Crotone Vs Inter De Milan', 'N° Goles: +2.5', '1.38', '1.00', 3, '2021-05-01 05:28:11', 6, 1),
(71, 2, 12, '1', '2021-05-01 00:00:00', 'Paris Sg Vs Lens', 'Ganador: Paris Sg', '1.36', '1.00', 1, '2021-05-01 05:28:41', 6, 1),
(72, 2, 12, '1', '2021-05-01 00:00:00', 'Elche Vs Atletico De Madrid', 'Ganador: Atletico De Madrid', '1.40', '1.00', 1, '2021-05-01 05:29:18', 6, 1),
(73, 3, 14, '1', '2021-05-01 00:00:00', 'Elche Vs Atletico De Madrid', '-0.5 Handicap Corners', '1.47', '1.00', 3, '2021-05-01 14:44:50', 6, 1),
(74, 3, 14, '1', '2021-05-01 00:00:00', 'Lille Vs Niza', 'Ganador: Lille', '1.43', '1.00', 1, '2021-05-01 14:46:12', 6, 1),
(75, 3, 14, '1', '2021-05-01 00:00:00', 'Lask Vs  Rb Salzburgo', 'Se Clasifica: Rb Salzburgo', '1.28', '1.00', 1, '2021-05-01 14:47:08', 6, 1),
(76, 3, 14, '1', '2021-05-01 00:00:00', 'Waalwijk Vs Az Alkmar', 'Ganador: Az Alkmar', '1.37', '1.00', 1, '2021-05-01 14:48:45', 6, 1),
(77, 3, 14, '2', '2021-05-01 00:00:00', 'Waalwijk Vs Az Alkmar | Lask Vs Fc Salzburg', 'Ganador: Az Alkmar | Se Clasifica: Fc Salzburg', '1.75', '1.00', 1, '2021-05-01 14:50:31', 6, 1),
(78, 3, 14, '1', '2021-05-01 00:00:00', 'Charlote Hornets Vs Detroit Pistons', 'Ganador: Charlote Hornets', '1.38', '1.00', 1, '2021-05-01 22:03:37', 6, 1),
(79, 3, 14, '1', '2021-05-01 00:00:00', 'Minnesota Timberwolves Vs New Orleans Pelicans', '+10.5 Handicap', '1.29', '1.00', 1, '2021-05-01 22:05:04', 6, 1),
(80, 3, 14, '2', '2021-05-01 00:00:00', 'Charlote Hornets Vs Detroit Pistons | Minnesota  Vs New Orleans Pelicans', 'Ganador: Charlote Hornets | +10.5 Handicap', '1.78', '1.00', 1, '2021-05-02 02:56:26', 21, 1),
(81, 2, 12, '1', '2021-05-02 00:00:00', 'Ajax Vs Fc Emmen', 'Handicap: Emmen +4', '1.33', '1.00', 3, '2021-05-02 15:49:07', 6, 1),
(82, 2, 12, '1', '2021-05-02 00:00:00', 'Sassuolo Vs Atalanta', 'Visita: +1.5 Goles', '1.33', '1.00', 3, '2021-05-02 15:49:49', 6, 1),
(83, 2, 12, '1', '2021-05-02 00:00:00', 'Bologna Vs Fiorentina', 'Doble Oportunidad: X2', '1.42', '1.00', 1, '2021-05-02 15:50:20', 6, 1),
(84, 2, 12, '1', '2021-05-02 00:00:00', 'Udinese Vs Juventus', 'Ganador: Juventus', '1.44', '1.00', 1, '2021-05-02 15:50:58', 6, 1),
(85, 2, 12, '1', '2021-05-02 00:00:00', 'Tottenham Vs Sheffield ', 'Ganador: Tottenham', '1.32', '1.00', 1, '2021-05-02 15:51:42', 6, 1),
(86, 2, 12, '2', '2021-05-02 00:00:00', 'Manchester United Vs Liverpol', 'Corner: +5.5 | Ambos Anotan: Si | -6.5 Goles', '1.86', '1.00', 2, '2021-05-02 15:52:46', 6, 1),
(87, 2, 12, '2', '2021-05-02 00:00:00', 'Valencia Vs Barcelona', 'Barcelona: +1.5 Goles | Barcelona: +3.5 Corners | -6.5 Goles', '1.80', '1.00', 3, '2021-05-02 15:53:48', 6, 1),
(88, 3, 14, '1', '2021-05-02 00:00:00', 'Houston Rockets Vs New York Knicks', 'Handicap -7.5', '1.73', '1.00', 1, '2021-05-02 19:51:18', 6, 1),
(89, 3, 14, '1', '2021-05-02 00:00:00', 'New York Yankees Vs Detroit Tigers', 'Ganador: New York Yankes', '1.40', '1.00', 1, '2021-05-02 19:52:21', 6, 1),
(90, 3, 14, '1', '2021-05-02 00:00:00', 'Deen Haag  Vs Feyenoord', 'Ganador: Feyenoord', '1.32', '1.00', 3, '2021-05-02 19:53:26', 6, 1),
(91, 3, 14, '1', '2021-05-02 00:00:00', 'Lazio Vs Genoa', 'Primer Gol: Lazio', '1.37', '1.00', 1, '2021-05-02 19:54:07', 6, 1),
(92, 3, 14, '1', '2021-05-02 00:00:00', 'Tottenham Vs Sheffield', 'Gana Tottenham Y +1.5 Goles', '1.48', '1.00', 1, '2021-05-02 19:54:52', 6, 1),
(93, 3, 14, '1', '2021-05-02 00:00:00', 'Sporting Cristal Vs Alianza Lima', 'Alianza Lima No Gana Cualquier Mitad', '1.40', '1.00', 1, '2021-05-02 19:55:36', 6, 1),
(94, 3, 14, '2', '2021-05-02 00:00:00', 'Sporting Cristal Vs Alianza Lima | Deen Haag Vs Feyenoord', 'Alianza Lima No Gana Cualquier Mitad | Ganador: Feyenoord', '1.85', '1.00', 3, '2021-05-02 19:56:42', 6, 1),
(95, 3, 14, '2', '2021-05-02 00:00:00', 'Houston Rockets Vs New York Knicks', 'Handicap: New York Knicks -7.5', '1.73', '1.00', 1, '2021-05-02 19:57:30', 6, 1),
(96, 2, 12, '1', '2021-05-02 00:00:00', 'San Antonio Spurs Vs Philadelphia 76eras | Dallas Mavericks Vs Sacramento Kings', 'Ganador 1x2: San Antonio Spurs | Ganador 1x2: Dallas Mavericks', '1.79', '1.00', 3, '2021-05-03 01:20:46', 6, 1),
(97, 2, 12, '1', '2021-05-03 00:00:00', 'Mainz Vs Hertha Berlin', 'N° Goles 1er Tiempo:  +0.5', '1.45', '1.00', 1, '2021-05-03 20:05:56', 6, 1),
(98, 2, 12, '1', '2021-05-03 00:00:00', 'Ce Sabadell Fc Vs Rayo Vallecano', 'Doble Oportunidad: X2', '1.30', '1.00', 3, '2021-05-03 20:06:31', 6, 1),
(99, 2, 12, '1', '2021-05-03 00:00:00', 'Torino Vs Parma', 'N° Goles 1er Tiempo: +0.5', '1.30', '1.00', 3, '2021-05-03 20:07:07', 6, 1),
(100, 2, 12, '1', '2021-05-03 00:00:00', 'Burnley Vs West Ham United', 'Doble Oportunidad: X2', '1.41', '1.00', 1, '2021-05-03 20:07:40', 6, 1),
(101, 2, 12, '1', '2021-05-03 00:00:00', 'Club Cienciano Vs Carlos Mannucci', 'N° Goles: +1.5', '1.36', '1.00', 1, '2021-05-03 20:08:11', 6, 1),
(102, 2, 12, '2', '2021-05-03 00:00:00', 'Sevilla Vs Athletic Bilbao', 'Sevilla Triunfo | Sevilla -3.5 Goles', '1.86', '1.00', 3, '2021-05-03 20:08:55', 6, 1),
(103, 3, 14, '2', '2021-05-03 00:00:00', 'West Bromwich Albion Vs Wolverhampton Wanderers Fc', 'Wolverhampton Wanderers Fc Corner 1x2', '1.80', '1.00', 1, '2021-05-03 20:10:42', 6, 1),
(104, 3, 14, '1', '2021-05-03 00:00:00', 'Cesar Vallejo Vs Cusco Fc', '+1.5 Goles', '1.28', '1.00', 1, '2021-05-03 20:25:49', 6, 1),
(105, 3, 14, '1', '2021-05-03 00:00:00', 'Sevilla Vs Athletic Bilbao', 'Ganador: Sevilla', '1.61', '1.00', 3, '2021-05-03 20:26:38', 6, 1),
(106, 3, 14, '1', '2021-05-03 00:00:00', 'Ugo Humbert Vs Aslan Karatsev ', 'Ganador: Aslan Katatsev', '1.30', '1.00', 1, '2021-05-03 20:29:18', 6, 1),
(107, 3, 14, '1', '2021-05-03 00:00:00', 'Golden State Warriors Vs New Orleans Pelicans', '+230.5 Puntos', '1.53', '1.00', 1, '2021-05-03 20:30:28', 6, 1),
(108, 3, 14, '1', '2021-05-03 00:00:00', 'Memphis Grizzlies Vs New York Knicks', 'Handicap +5.5: New York Knicks', '1.66', '1.00', 1, '2021-05-03 20:32:03', 6, 1),
(109, 2, 12, '1', '2021-05-04 00:00:00', 'Deportes Union La Calera Cs Velez Sarfield', 'Apuesta Sin Empate: Velez Sarfield', '1.53', '1.00', 1, '2021-05-04 18:11:47', 6, 1),
(110, 2, 12, '1', '2021-05-04 00:00:00', 'Defensa Y Justicia Vs Palmeiras', 'N° Goles: +1.5 Goles', '1.38', '1.00', 1, '2021-05-04 18:12:26', 6, 1),
(111, 2, 12, '1', '2021-05-04 00:00:00', 'Barcelona Sc Vs Boca Juniors', 'Doble Oportunidad: X2', '1.57', '1.00', 3, '2021-05-04 18:12:59', 6, 1),
(112, 2, 12, '1', '2021-05-04 00:00:00', 'Ldu Quito Vs Flamengo', 'Ambos Equipos Anotan: Si', '1.53', '1.00', 1, '2021-05-04 18:13:41', 6, 1),
(113, 2, 12, '2', '2021-05-04 00:00:00', 'Manchester City Vs Paris Sg', 'Handicap Asiatico: Paris Sg +1.0', '1.79', '1.00', 3, '2021-05-04 18:14:23', 6, 1),
(114, 3, 14, '1', '2021-05-04 00:00:00', 'Kawasaki Frontale Vs Grampus', 'Ganador: Kawasaki Frontale', '1.50', '1.00', 1, '2021-05-04 18:15:19', 6, 1),
(115, 3, 14, '1', '2021-05-04 00:00:00', 'Flamengo Vs Ldu Quito', '+2.5 Goles', '1.78', '1.00', 1, '2021-05-04 19:03:29', 6, 1),
(116, 3, 14, '2', '2021-05-04 00:00:00', 'Paris Sg Vs Manchester City', 'Ambos Anotan Y +2.5 Goles', '1.79', '1.00', 3, '2021-05-04 19:04:25', 6, 1),
(117, 3, 14, '1', '2021-05-04 00:00:00', 'Nikoloz Basilashvili Vs Benoit Paire', 'Ganador: Nikoloz Basilashvili', '1.28', '1.00', 3, '2021-05-04 19:05:42', 6, 1),
(118, 3, 14, '2', '2021-05-04 00:00:00', 'New Orleans Pelicans Vs Golden State Warrior', 'Ganador: Golden State Warrior', '2.23', '1.00', 3, '2021-05-05 03:36:00', 6, 1),
(119, 3, 14, '1', '2021-05-04 00:00:00', 'Milwaukee Bucks Vs Brooklyn Nets', 'Handicap: Brooklyn Nets +8.5', '1.34', '1.00', 1, '2021-05-05 03:37:16', 6, 1),
(120, 3, 14, '1', '2021-05-04 00:00:00', 'Carolina Hurricanes Vs Chicago Blackhawks', 'Ganador: Carolina Hurricanes', '1.37', '1.00', 1, '2021-05-05 03:38:10', 6, 1),
(121, 2, 12, '2', '2021-05-05 00:00:00', 'Chelsea Vs Real Madrid', 'Corner: +3.5 Real Madrid | Goles: Cada Equipo -2.5', '1.82', '1.00', 3, '2021-05-05 17:17:12', 6, 1),
(122, 2, 12, '2', '2021-05-05 00:00:00', 'Chelsea Vs Real Madrid', 'Visitante: +2.5 Tarjetas', '1.99', '1.00', 1, '2021-05-05 17:17:56', 6, 1),
(123, 2, 12, '1', '2021-05-05 00:00:00', 'Independiente Del Valle Vs Universitario', 'N° Goles: +2.5', '1.40', '1.00', 1, '2021-05-05 17:19:54', 6, 1),
(124, 2, 12, '1', '2021-05-05 00:00:00', 'Bolivar La Paz Vs Ceará', 'Local Y +1.5 Goles', '1.47', '1.00', 3, '2021-05-05 17:21:15', 6, 1),
(125, 2, 12, '1', '2021-05-05 00:00:00', 'Internacional Vs Olimpia Asuncion', 'N° Goles: -3.5', '1.38', '1.00', 3, '2021-05-05 17:22:55', 6, 1),
(126, 2, 12, '1', '2021-05-05 00:00:00', 'Red Bul Bragantino Vs Talleres De Cordoba', 'Ganador: Red Bull Bragantino', '1.72', '1.00', 3, '2021-05-05 17:23:40', 6, 1),
(127, 3, 14, '1', '2021-05-05 00:00:00', 'Chelsea Vs Real Madrid', 'N° Goles: +1.5', '1.35', '1.00', 1, '2021-05-05 17:24:58', 6, 1),
(128, 3, 14, '1', '2021-05-05 00:00:00', 'Independiente Del Valle Vs Universitario', 'N° Goles: +2.5', '1.70', '1.00', 1, '2021-05-05 17:25:28', 6, 1),
(129, 3, 14, '1', '2021-05-05 00:00:00', 'Racing Vs Sao Paulo', 'N° Goles: +1.5', '1.35', '1.00', 3, '2021-05-05 17:25:57', 6, 1),
(130, 3, 14, '1', '2021-05-05 00:00:00', 'Sporting Cristal Vs Rentistas', '2° Tiempo: Doble Oportunidad 1x', '1.34', '1.00', 1, '2021-05-05 17:27:03', 6, 1),
(131, 3, 14, '1', '2021-05-05 00:00:00', 'Chistian Garin Vs Hugo Dellien', 'Ganador: Chistian Garin', '1.40', '1.00', 1, '2021-05-05 17:30:25', 6, 1),
(132, 3, 14, '2', '2021-05-05 00:00:00', 'Chelsea Vs Real Madrid | Racing Vs Sao Paulo', 'N° Goles: +1.5 | N° Goles: +1.5', '1.82', '1.00', 3, '2021-05-05 21:14:25', 6, 1),
(133, 3, 14, '1', '2021-05-05 00:00:00', 'Milwaukee Bucks Vs Washington Wizards', '+236.5 Puntos', '1.74', '1.00', 1, '2021-05-05 22:21:38', 6, 1),
(134, 3, 14, '1', '2021-05-05 00:00:00', 'Boston Red Sox Vs Detroit Tigers', 'Ganador: Boston Red Sox', '1.55', '1.00', 3, '2021-05-05 22:23:03', 6, 1),
(135, 3, 14, '1', '2021-05-05 00:00:00', 'San Jose Sharks Vs Colorado Avalanche', 'Ganador: Colorado Avalanche (inc. Prorroga Y Penales)', '1.35', '1.00', 3, '2021-05-05 22:25:49', 6, 1),
(136, 3, 14, '2', '2021-05-05 00:00:00', 'Denver Nuggets Vs New York Knicks | Utah Jazz Vs San Antonio Spurs', 'Handicap: New York Knicks +9.5 Ganador: Utah Jazz', '1.76', '1.00', 3, '2021-05-06 01:12:43', 6, 1),
(137, 2, 12, '1', '2021-05-06 00:00:00', 'Arsenal Vs Villarreal', 'Goles Totales (rango): 2 - 3', '2.07', '1.00', 3, '2021-05-06 16:45:57', 6, 1),
(138, 2, 12, '1', '2021-05-06 00:00:00', 'Atletico Nacional Vs Argentinos Juniors', 'Local Y +0.5 Goles', '1.36', '1.00', 3, '2021-05-06 16:48:39', 6, 1),
(139, 2, 12, '1', '2021-05-06 00:00:00', 'Peñarol Vs River Plate Asuncion', 'Ganador: Peñarol', '1.45', '1.00', 1, '2021-05-06 17:46:19', 6, 1),
(140, 2, 12, '1', '2021-05-06 00:00:00', 'Sport Huancayo Vs Corintians', 'Ganador: Corintians', '1.38', '1.00', 1, '2021-05-06 19:57:03', 6, 1),
(141, 2, 12, '1', '2021-05-06 00:00:00', 'Gremio Vs Aragua', 'Ganador: Gremio 1er Tiempo', '1.40', '1.00', 1, '2021-05-06 19:57:47', 6, 1),
(142, 2, 12, '1', '2021-05-06 00:00:00', 'Deportivo La Guaira Vs America De Cali', 'Doble Oportunidad: X2', '1.36', '1.00', 1, '2021-05-06 19:58:28', 6, 1),
(143, 3, 14, '1', '2021-05-06 00:00:00', 'Arsenal Vs Villarreal', 'N° Goles: +0.5 1er Tiempo', '1.35', '1.00', 3, '2021-05-06 19:59:41', 6, 1),
(144, 3, 14, '1', '2021-05-06 00:00:00', 'Always Ready Vs Deportivo Tachira', 'Ganador: Always Ready', '1.31', '1.00', 1, '2021-05-06 20:00:43', 6, 1),
(145, 3, 14, '1', '2021-05-06 00:00:00', 'Peñarol Vs River Plate Asuncion', 'Ganador: Peñarol', '1.47', '1.00', 1, '2021-05-06 20:01:16', 6, 1),
(146, 3, 14, '1', '2021-05-06 00:00:00', 'Sport Huancayo Vs Corintians', 'Ganador: Corintians', '1.40', '1.00', 1, '2021-05-06 20:01:43', 6, 1),
(147, 3, 14, '2', '2021-05-06 00:00:00', 'Peñarol Vs River Plate Asuncion | Sport Huancayo Vs Corinthians', 'Ganador: Peñarol | Ganador: Corinthians', '2.06', '1.00', 1, '2021-05-06 20:02:53', 6, 1),
(148, 2, 12, '2', '2021-05-06 00:00:00', 'Roma Vs Mancester United', 'N° Goles: -5.5| Ambos Equipos Anotan: Si', '1.85', '1.00', 1, '2021-05-06 20:19:45', 6, 1),
(149, 3, 14, '1', '2021-05-06 00:00:00', 'Golden State Warriors Vs Oklahoma City Thunder', 'Handicap: Golden State Warriors -9.5', '1.54', '1.00', 1, '2021-05-07 13:05:59', 6, 1),
(150, 3, 14, '1', '2021-05-06 00:00:00', 'Toronto Raptors Vs Washington Wizards', 'Handicap: Washington Wizards +8.5', '1.32', '1.00', 1, '2021-05-07 13:07:23', 6, 1),
(151, 3, 14, '2', '2021-05-06 00:00:00', 'La Clippers Vs Los Angeles Lakers', '-213.5 Ptos. Inc. Prorroga', '1.66', '1.00', 1, '2021-05-07 13:24:57', 6, 1),
(152, 2, 12, '1', '2021-05-07 00:00:00', 'Academia Cantolao Vs Sport Boys', 'Doble Oportunidad: X2', '1.33', '1.00', 3, '2021-05-07 21:05:56', 6, 1),
(153, 2, 12, '1', '2021-05-07 00:00:00', 'Sparta Rotterdam Vs Vitesse', 'Doble Oportunidad: X2', '1.36', '1.00', 3, '2021-05-07 21:06:54', 6, 1),
(154, 2, 12, '1', '2021-05-07 00:00:00', 'Stuttgart Vs Augsburgo', 'N° Goles: +0.5 - 1er Tiempo', '1.38', '1.00', 1, '2021-05-07 21:07:26', 6, 1),
(155, 2, 12, '1', '2021-05-07 00:00:00', 'Leicester City Vs Newcastle United', 'Ganador: Leicester City', '1.44', '1.00', 3, '2021-05-07 21:08:25', 6, 1),
(156, 2, 12, '1', '2021-05-07 00:00:00', 'Tenerife Vs Almeria', 'Doble Oportunidad: X2', '1.35', '1.00', 1, '2021-05-07 21:08:47', 6, 1),
(157, 2, 12, '2', '2021-05-07 00:00:00', 'Al Shabab Vs Al Hilal', 'Apuesta Sin Empate: Visita', '1.78', '1.00', 1, '2021-05-07 21:14:51', 6, 1),
(158, 3, 14, '1', '2021-05-07 00:00:00', 'Lens Vs Lille', 'Apuesta Sin Empate: Visita', '1.40', '1.00', 1, '2021-05-07 21:18:10', 6, 1),
(159, 3, 14, '1', '2021-05-07 00:00:00', 'Leicester City Vs Newcastle United', 'Ganador: Leicester City', '1.40', '1.00', 3, '2021-05-07 21:18:44', 6, 1),
(160, 3, 14, '1', '2021-05-07 00:00:00', 'Academia Cantolao Vs Sport Boys', 'Ganador: Sport Boys Y +1.5 Goles', '1.57', '1.00', 3, '2021-05-07 21:19:41', 6, 1),
(161, 3, 14, '1', '2021-05-07 00:00:00', 'Alianza Lima Vs Binacional', 'Ganador: Alianza Lima', '1.76', '1.00', 1, '2021-05-07 21:21:06', 6, 1),
(162, 3, 14, '2', '2021-05-07 00:00:00', 'Krc Genc Vs Club Brugge | Portland Trail Blazers Vs Los Angeles Lakers', 'Doble Oportunidad: X2 | Ganador: Portland Trail Blazers', '1.75', '1.00', 3, '2021-05-07 21:21:54', 6, 1),
(163, 3, 14, '2', '2021-05-07 00:00:00', 'Alianza Lima Vs Binacional', 'Ganador: Alianza Lima', '1.79', '1.00', 1, '2021-05-07 21:23:55', 6, 1),
(164, 3, 14, '2', '2021-05-07 00:00:00', 'Milwaukee Bucks Vs Houston Rockets', 'Handicap: Milwaukee Bucks -16.5', '1.91', '1.00', 3, '2021-05-08 18:38:21', 6, 1),
(165, 3, 14, '1', '2021-05-07 00:00:00', 'Philadelphia 76ers Vs New Orleans Pelicans', 'Handicap: Philadelphia 76ers -2.5', '1.30', '1.00', 1, '2021-05-08 18:40:42', 6, 1),
(166, 3, 14, '1', '2021-05-07 00:00:00', 'Milwaukee Bucks Vs Houston Rockets', 'Handicap: Milwaukee Bucks -16.5', '1.91', '1.00', 3, '2021-05-08 18:41:25', 6, 1),
(167, 3, 14, '1', '2021-05-08 00:00:00', 'Cusco Vs Sporting Cristal', 'Apuesta Sin Empate: Visita', '1.41', '1.00', 0, '2021-05-08 18:42:59', 6, 1),
(168, 3, 14, '1', '2021-05-08 00:00:00', 'Fiorentina Vs Lazio', 'N° Goles: +2.5', '1.62', '1.00', 3, '2021-05-08 18:43:31', 6, 1),
(169, 3, 14, '1', '2021-05-08 00:00:00', 'Atlethic Bilbao Vs Ozasuna', 'Anota 1er Gol : Local', '1.61', '1.00', 1, '2021-05-08 18:45:17', 6, 1),
(170, 3, 14, '1', '2021-05-08 00:00:00', 'Gamba Ozaka Vs Kawasaki Frontale', 'Ganador: Kawasaki', '1.45', '1.00', 1, '2021-05-08 18:46:10', 6, 1),
(171, 3, 14, '1', '2021-05-08 00:00:00', 'Barcelona Vs Atletico Madrid', 'N° Goles: +2.0', '1.38', '1.00', 3, '2021-05-08 18:46:46', 6, 1),
(172, 3, 14, '1', '2021-05-08 00:00:00', 'Lyon Vs Lorient', 'N° Goles: +2.5', '1.44', '1.00', 1, '2021-05-08 18:47:18', 6, 1),
(173, 3, 14, '1', '2021-05-08 00:00:00', 'Universitario Vs Cienciano', 'Handicap: Cienciano +0.5', '1.46', '1.00', 3, '2021-05-08 18:48:13', 6, 1),
(174, 3, 14, '2', '2021-05-08 00:00:00', 'Carlos Manucci Vs Ayacucho Fc | Bayern Munich Borussia Mgladbach', 'N° Goles: +0.5 Local | Ganador: Bayern Munich', '1.90', '1.00', 0, '2021-05-08 19:04:41', 6, 1),
(175, 3, 14, '2', '2021-05-08 00:00:00', 'Cusco Vs Sporting Cristal | Fiorentina Vs Lazio', 'Apuesta Sin Empate: Visita | N° Goles: +2.5', '2.28', '1.00', 0, '2021-05-08 19:24:08', 6, 1),
(176, 2, 12, '2', '2021-05-08 00:00:00', 'Barcelona Vs Atletico Madrid', 'Ambos Anotan', '1.80', '1.00', 3, '2021-05-08 19:48:01', 6, 1),
(177, 2, 12, '1', '2021-05-08 00:00:00', 'Borussia Dortmund Vs Rb Leipzig', 'Doble Oportunidad: 1x', '1.38', '1.00', 1, '2021-05-08 19:49:04', 6, 1),
(178, 2, 12, '1', '2021-05-08 00:00:00', 'Lyon Vs Lorient', 'Ganador: Lyon', '1.39', '1.00', 1, '2021-05-08 19:49:54', 6, 1),
(179, 2, 12, '1', '2021-05-08 00:00:00', 'Fiorentina Vs Lazio', 'N° Goles: +0.5 1er Tiempo', '1.32', '1.00', 1, '2021-05-08 19:50:34', 6, 1),
(180, 2, 12, '1', '2021-05-08 00:00:00', 'Liverpool Vs Southampton', 'Ganador: Liverpool ', '1.30', '1.00', 0, '2021-05-08 19:52:59', 6, 1),
(181, 2, 12, '1', '2021-05-08 00:00:00', 'Az Alkmaar Vs Fortuna Sittard', 'Ganador: Alkmaar', '1.30', '1.00', 1, '2021-05-08 19:53:41', 6, 1),
(182, 2, 12, '2', '2021-05-08 00:00:00', 'Cusco Vs Sporting Cristal | Universitario Vs Cienciano', 'Doble Oportunidad: X2 | Doble Oportunidad: X2', '1.75', '1.00', 3, '2021-05-08 19:55:11', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id_auditoria` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `concepto` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
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
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `documento`, `estado`, `logo1`, `logo2`, `id_responsable`, `fecha_creacion`, `id_usuario`) VALUES
(1, 'Unisty Control', '12345678910', 1, 'vistas/img/empresas/12345678910/475.png', 'vistas/img/empresas/12345678910/367.png', 6, '2021-05-01 06:12:15', 1),
(2, 'Peruvian Picks', '12345678', 1, 'vistas/img/empresas/12345678910/475.png', 'vistas/img/empresas/12345678910/367.png', 20, '2021-05-05 04:21:10', 6),
(3, 'MVPicks', '87654321', 1, 'vistas/img/empresas/87654321/256.jpg', '', 22, '2021-05-05 02:55:48', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

CREATE TABLE `membresia` (
  `id_membresia` int(11) NOT NULL,
  `id_tipo_membresia` int(11) DEFAULT NULL,
  `id_precio_membresia` int(11) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `comprobante` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `id_miembro` int(11) DEFAULT NULL,
  `destino` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `membresia`
--

INSERT INTO `membresia` (`id_membresia`, `id_tipo_membresia`, `id_precio_membresia`, `fecha_inicio`, `fecha_fin`, `comprobante`, `estado`, `id_usuario`, `id_miembro`, `destino`) VALUES
(10026, 10, 3, '2021-03-27', '2021-04-27', 'vistas/img/comprobantes/18/343.jpg', 2, 19, 18, 0),
(10027, 10, 3, '2021-04-28', '2021-05-28', 'vistas/img/comprobantes/19/250.png', 0, 19, 19, 10032),
(10030, 12, 5, '2021-04-28', '2021-05-28', 'vistas/img/comprobantes/20/836.jpg', 0, 20, 20, 0),
(10032, 10, 3, '2021-05-29', '2021-06-29', '', 1, 19, 19, 0),
(10033, 14, 9, '2021-05-01', '2021-06-30', 'vistas/img/comprobantes/22/849.jpg', 0, 6, 22, 0),
(10034, 14, 9, '2021-05-04', '2021-07-04', 'vistas/img/comprobantes/23/210.jpg', 0, 6, 23, 0),
(10035, 14, 9, '2021-05-04', '2021-07-04', 'vistas/img/comprobantes/24/340.jpg', 0, 6, 24, 0),
(10036, 14, 10, '2021-05-04', '2021-05-19', 'vistas/img/comprobantes/25/612.jpg', 0, 6, 25, 0),
(10038, 14, 9, '2021-05-06', '2021-07-06', 'vistas/img/comprobantes/27/433.jpg', 0, 22, 27, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
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
  `eliminado` int(11) DEFAULT '1',
  `id_usuario_activador` int(11) DEFAULT '0',
  `codigo_activador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id_miembro`, `nombre_completo`, `documento`, `celular`, `correo`, `foto`, `id_red_social`, `usuario_red_social`, `fecha_creacion`, `id_empresa`, `estado`, `id_membresia`, `id_usuario`, `eliminado`, `id_usuario_activador`, `codigo_activador`) VALUES
(18, 'Joel Medrano Guere', '47281037', '982-009-013', 'jvmedrano@gmail.com', 'vistas/img/miembros/47281037/892.png', 3, 'joey_crisis', '2021-04-28 16:10:00', 1, 1, 10029, 6, 1, 6, '6f4922f45568161a8cdf4ad2299f6d23'),
(19, 'Brean Flores Meza', '75355990', '934-513-573', 'bryanfm1998@gmail.com', 'vistas/img/miembros/75355990/626.jpg', 2, 'Bryanflores', '2021-05-05 02:58:20', 1, 1, 10032, 19, 1, 19, '1f0e3dad99908345f7439f8ffabdffc4'),
(20, 'Tiffany Cunza Castillo', '47490910', '987-654-321', 'cunza.dg@gmail.com', 'vistas/img/miembros/default/anonymous.png', 2, 'Tiffany Cunza', '2021-04-28 16:36:39', 2, 1, 10030, 20, 1, 20, '98f13708210194c475687be6106a3b84'),
(21, 'Probando', '12345678910', '123-456-789', 'bryanfm1998@gmail.com', 'vistas/img/miembros/default/anonymous.png', 2, 'Bryanflores', '2021-04-30 14:54:12', 1, 0, 0, 19, 0, 0, NULL),
(22, 'Julio Soto Sagastegui', '45985701', '987-654-321', 'noreply@unistycontrol.com', 'vistas/img/usuarios/default/anonymous.png', 3, 'juliosotosagasti', '2021-05-05 03:23:28', 3, 1, 10033, 21, 1, 6, 'b6d767d2f8ed5d21a44b0e5886680cb9'),
(23, 'Jhon Nils Ulfe Armanza', '12345676', '123-456-789', 'noreply@unistycontrol.com', 'vistas/img/usuarios/default/anonymous.png', 3, 'jhonnils', '2021-05-05 03:26:44', 3, 1, 10034, 6, 1, 6, '37693cfc748049e45d87b8c7d8b9aacd'),
(24, 'Joel Medrano Guere', '47281037', '982-009-013', 'jvmedrano@gmail.com', 'vistas/img/usuarios/default/anonymous.png', 3, 'joey_crisis', '2021-05-05 03:29:12', 3, 1, 10035, 6, 1, 6, '1ff1de774005f8da13f42943881c655f'),
(25, 'Luis Angel Rojas Castillo', '12345678', '123-456-789', 'noreply@unistycontrol.com', 'vistas/img/usuarios/default/anonymous.png', 3, 'luisangel', '2021-05-05 03:30:18', 3, 1, 10036, 6, 1, 6, '8e296a067a37563370ded05f5a3bf3ec'),
(26, 'Probando Crear Miembro', '12345678', '123-456-789', 'roreply@unistycontrol.com', 'vistas/img/usuarios/default/anonymous.png', 2, 'probando', '2021-05-07 14:37:42', 3, 0, 10037, 6, 0, 0, '4e732ced3463d06de0ca9a15b6153677'),
(27, 'Jorge Alfons Matos Sempertegui', '12345678', '123-456-789', 'roreply@unistycontrol.com', 'vistas/img/miembros/12345678/352.png', 3, 'jorgealfons', '2021-05-07 14:38:42', 3, 1, 10038, 6, 1, 0, '02e74f10e0327ad868d138f2b4fdd6f0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`) VALUES
(1, 'Usuarios'),
(2, 'Empresas'),
(3, 'Redes'),
(4, 'Miembros'),
(5, 'Membresias'),
(6, 'Apuestas'),
(7, 'ApuestasPlayer'),
(8, 'Dashboard'),
(9, 'Perfil'),
(10, 'PerfilGral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_membresia`
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
-- Volcado de datos para la tabla `precio_membresia`
--

INSERT INTO `precio_membresia` (`id_precio_membresia`, `id_tipo_membresia`, `nombre_precio_membresia`, `precio`, `fecha_creacion`, `id_usuario`) VALUES
(3, 10, 'Membresia Mensual', '6.00', '2021-04-28 14:35:50', 6),
(4, 11, 'Membresia Anual', '60.00', '2021-04-28 14:36:02', 6),
(5, 12, '1 mes', '50.00', '2021-04-28 16:34:47', 20),
(6, 12, '2 meses', '75.00', '2021-04-28 16:34:58', 20),
(8, 14, '1 mes', '50.00', '2021-04-29 14:39:28', 6),
(9, 14, '2 meses', '75.00', '2021-04-29 14:39:40', 6),
(10, 14, '15 dias', '25.00', '2021-05-05 02:56:22', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_social`
--

CREATE TABLE `red_social` (
  `id_red_social` int(11) NOT NULL,
  `nombre_red_social` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `red_social`
--

INSERT INTO `red_social` (`id_red_social`, `nombre_red_social`, `id_usuario`, `fecha_creacion`) VALUES
(2, 'FACEBOOK', 1, '2021-04-20 17:53:21'),
(3, 'INSTAGRAM', 1, '2021-04-20 17:58:03'),
(4, 'TWITTER', 1, '2021-04-20 17:58:12'),
(5, 'TELEGRAM', 1, '2021-04-20 17:58:22'),
(6, 'TIK TOK', 1, '2021-04-20 17:58:34'),
(7, 'WHATSAPP', 1, '2021-04-20 18:01:50'),
(8, 'SNAPCHAT', 1, '2021-04-20 18:01:58'),
(9, 'YOUTUBE', 19, '2021-04-20 18:02:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_membresia`
--

CREATE TABLE `tipo_membresia` (
  `id_tipo_membresia` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `nombre_membresia` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_membresia`
--

INSERT INTO `tipo_membresia` (`id_tipo_membresia`, `id_empresa`, `nombre_membresia`, `fecha_creacion`, `id_usuario`) VALUES
(10, 1, 'Control Mensual', '2021-04-28 14:35:00', 6),
(11, 1, 'Control Anual', '2021-04-28 14:35:11', 6),
(12, 2, 'VIP Futbol', '2021-04-28 16:34:18', 6),
(14, 3, 'VIP', '2021-04-29 14:34:32', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
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
  `id_empresa` int(11) DEFAULT NULL,
  `id_miembro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `email`, `telefono`, `estado`, `ultimo_login`, `fecha`, `correo`, `datos`, `id_empresa`, `id_miembro`) VALUES
(1, 'USUARIO ADMINISTRADOR', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/anonymous.png', 'bryanfm1998@gmail.com', NULL, 1, '2021-04-29 11:28:25', '2021-04-29 16:28:25', 0, 0, 1, NULL),
(6, 'Joel Medrano', 'jmedrano', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Master', 'vistas/img/usuarios/jmedrano/242.png', 'jmedrano@gmail.com', '987-654-321', 1, '2021-05-08 20:18:12', '2021-05-09 01:18:12', 0, 0, 0, NULL),
(19, 'Brean Flores', 'bflores', '$2a$07$asxx54ahjppf45sd87a5auBfP8SzPxOC9lb4skT0/mpZfQro.Fl.a', 'Master', 'vistas/img/usuarios/bflores/944.jpg', 'bryanfm1998@gmail.com', '987-654-321', 1, '2021-05-08 19:59:29', '2021-05-09 00:59:29', 0, 0, 0, 19),
(20, 'Carlos Enrique Medrano Guere', 'cmedrano', '$2a$07$asxx54ahjppf45sd87a5auj.qdSQMKfXvMT9VWiGiVdKgYX/yOp4u', 'Administrador', '', 'jvmedrano@gmail.com', '123-654-789', 1, '2021-05-08 19:59:46', '2021-05-09 00:59:46', 0, 0, 2, NULL),
(22, 'Bryan Gutiérrez Salazar', 'bgutierrez', '$2a$07$asxx54ahjppf45sd87a5auzDfcZNcRvwjCG8wSCm.SBvo/ur.FnkC', 'Administrador', 'vistas/img/usuarios/bgutierrez/852.jpg', 'jvmedranog@gmail.com', '997-481-578', 1, '2021-05-08 20:11:41', '2021-05-09 01:11:41', 0, 0, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `id_usuario_permiso` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`id_usuario_permiso`, `id_usuario`, `id_permiso`) VALUES
(37, 1, 4),
(38, 1, 5),
(39, 1, 6),
(47, 20, 4),
(48, 20, 5),
(49, 20, 6),
(73, 19, 1),
(74, 19, 2),
(75, 19, 3),
(76, 19, 4),
(77, 19, 5),
(78, 19, 6),
(79, 19, 7),
(80, 19, 9),
(101, 6, 1),
(102, 6, 2),
(103, 6, 3),
(104, 6, 4),
(105, 6, 5),
(106, 6, 6),
(107, 6, 7),
(108, 6, 8),
(109, 6, 9),
(110, 6, 10),
(125, 22, 4),
(126, 22, 5),
(127, 22, 6),
(128, 22, 8),
(129, 22, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  ADD PRIMARY KEY (`id_apuestas`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD PRIMARY KEY (`id_membresia`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id_miembro`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `precio_membresia`
--
ALTER TABLE `precio_membresia`
  ADD PRIMARY KEY (`id_precio_membresia`);

--
-- Indices de la tabla `red_social`
--
ALTER TABLE `red_social`
  ADD PRIMARY KEY (`id_red_social`);

--
-- Indices de la tabla `tipo_membresia`
--
ALTER TABLE `tipo_membresia`
  ADD PRIMARY KEY (`id_tipo_membresia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`id_usuario_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuestas`
--
ALTER TABLE `apuestas`
  MODIFY `id_apuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `membresia`
--
ALTER TABLE `membresia`
  MODIFY `id_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10039;
--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id_miembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `precio_membresia`
--
ALTER TABLE `precio_membresia`
  MODIFY `id_precio_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `red_social`
--
ALTER TABLE `red_social`
  MODIFY `id_red_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipo_membresia`
--
ALTER TABLE `tipo_membresia`
  MODIFY `id_tipo_membresia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`admin`@`%` EVENT `caducar_membresias` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-28 11:00:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
  UPDATE 
    miembros 
    LEFT JOIN membresia 
      ON miembros.id_membresia = membresia.id_membresia SET miembros.id_membresia = '0',
    membresia.estado = '2' 
  WHERE DATE(membresia.fecha_fin) <= DATE(NOW()) ;
END$$

CREATE DEFINER=`admin`@`%` EVENT `renovar_membresia` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-28 11:10:00' ON COMPLETION PRESERVE ENABLE DO BEGIN
UPDATE 
  membresia me 
  LEFT JOIN miembros m 
    ON me.id_miembro = m.id_miembro SET m.id_membresia = me.id_membresia 
WHERE me.estado = '1' 
  AND DATE(me.fecha_inicio) = DATE(NOW()) ;
END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
