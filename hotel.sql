-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2019 a las 15:02:36
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletines`
--

DROP TABLE IF EXISTS `boletines`;
CREATE TABLE IF NOT EXISTS `boletines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(400) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boletines`
--

INSERT INTO `boletines` (`id`, `nombre`, `telefono`, `correo`) VALUES
(1, 'Melvin Geovanny', '7689-4567', 'melvin_64@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo`
--

DROP TABLE IF EXISTS `combo`;
CREATE TABLE IF NOT EXISTS `combo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(400) NOT NULL,
  `precio` decimal(16,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `combo`
--

INSERT INTO `combo` (`id`, `detalle`, `precio`) VALUES
(1, 'Disfruta de una habitacion lujosa para 4 personas, con todo lo q puedas comer por 3 dias', '1500.00'),
(2, 'Disfruta de una habitacion Penthouse con todo incluido', '2500.00'),
(3, 'Disfruta de una habitacion Penthouse con todo incluido', '1700.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_com`
--

DROP TABLE IF EXISTS `detalle_com`;
CREATE TABLE IF NOT EXISTS `detalle_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_combo` int(11) NOT NULL,
  `id_servi_extra` int(11) NOT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `fecha_llegada` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_combo` (`id_combo`),
  KEY `id_servi_extra` (`id_servi_extra`),
  KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_re`
--

DROP TABLE IF EXISTS `detalle_re`;
CREATE TABLE IF NOT EXISTS `detalle_re` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reservacion` int(11) NOT NULL,
  `id_servi_extra` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_reservacion` (`id_reservacion`),
  KEY `id_servi_extra` (`id_servi_extra`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_re`
--

INSERT INTO `detalle_re` (`id`, `id_reservacion`, `id_servi_extra`) VALUES
(4, 4, 2),
(5, 4, 1),
(8, 13, 4),
(9, 14, 2),
(10, 14, 4),
(11, 4, 2),
(12, 16, 2),
(13, 16, 1),
(14, 16, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE IF NOT EXISTS `habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle_hab` varchar(250) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `numero_habitacion` char(2) NOT NULL,
  `piso` char(2) NOT NULL,
  `id_t_habitacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_t_habitacion` (`id_t_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `detalle_hab`, `estado`, `numero_habitacion`, `piso`, `id_t_habitacion`) VALUES
(2, 'Cama, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'R', '1', '1', 1),
(3, 'Dos Camas, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'D', '11', '4', 4),
(4, 'Una cama King, BaÃ±o, Cocina, TelevisiÃ³n, WIFI, Armario grande', 'R', '21', '2', 2),
(5, 'Una cama grande, BaÃ±o con tina y ducha, Cocina, Chimenea, TelevisiÃ³n, WIFI, Armario grnde, Vista panorÃ¡mica', 'R', '31', '3', 3),
(6, 'Cama, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'R', '2', '1', 1),
(7, 'Dos Camas, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'D', '12', '4', 4),
(8, 'Cama, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'R', '3', '1', 1),
(9, 'Cama, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'D', '4', '1', 1),
(10, 'Dos Camas, BaÃ±o, Cocina, TelevisiÃ³n, Armario pequeÃ±o', 'D', '13', '4', 4),
(11, 'Una cama King, BaÃ±o, Cocina, TelevisiÃ³n, WIFI, Armario grande', 'D', '22', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `detalle`) VALUES
(1, 'Estados Unidos'),
(2, 'China'),
(3, 'Italia'),
(4, 'México'),
(5, 'Reino Unido'),
(6, 'Turquía'),
(7, 'Francia'),
(8, 'España'),
(9, 'Corea del Sur'),
(10, 'Corea del Norte'),
(11, 'El Salvador'),
(12, 'Turquía'),
(13, 'Alemania'),
(14, 'Rusia'),
(15, 'Hong Kong');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimen_comida`
--

DROP TABLE IF EXISTS `regimen_comida`;
CREATE TABLE IF NOT EXISTS `regimen_comida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(250) NOT NULL,
  `precio` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regimen_comida`
--

INSERT INTO `regimen_comida` (`id`, `detalle`, `precio`) VALUES
(1, 'Solo Alojamiento', '0.00'),
(2, 'Desayuno', '50.00'),
(3, 'Desayuno y Cena', '100.00'),
(4, 'Pensión Completa', '150.00'),
(5, 'Todo Incluido', '300.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE IF NOT EXISTS `reservacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_habitacion` int(11) NOT NULL,
  `id_regimen_comida` int(11) NOT NULL,
  `f_llegada` varchar(200) NOT NULL,
  `f_salida` varchar(200) NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Espera',
  `id_usuarios` int(11) NOT NULL,
  `id_t_habitacion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_habitacion` (`id_habitacion`),
  KEY `id_regimen_comida` (`id_regimen_comida`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_t_habitacion` (`id_t_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id`, `id_habitacion`, `id_regimen_comida`, `f_llegada`, `f_salida`, `estado`, `id_usuarios`, `id_t_habitacion`) VALUES
(4, 2, 5, '2019-04-26', '2019-04-30', 'Aprobada', 11, 1),
(6, 5, 2, '2019-04-25', '2019-04-28', 'Espera', 14, 3),
(9, 5, 4, '2019-04-25', '2019-04-30', 'Aprobada', 15, 3),
(10, 4, 3, '2019-04-28', '2019-04-30', 'Aprobada', 15, 2),
(13, 8, 3, '2019-04-27', '2019-04-30', 'Aprobada', 17, 1),
(14, 9, 5, '2019-04-25', '2019-04-27', 'Espera', 19, 1),
(15, 9, 4, '2019-04-27', '2019-04-28', 'Espera', 11, 1),
(16, 10, 2, '2019-05-18', '2019-05-23', 'Espera', 21, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servi_extra`
--

DROP TABLE IF EXISTS `servi_extra`;
CREATE TABLE IF NOT EXISTS `servi_extra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `precio` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servi_extra`
--

INSERT INTO `servi_extra` (`id`, `descripcion`, `precio`) VALUES
(1, 'Servicio de taxi ', '150.00'),
(2, 'Aperitivos a su gusto', '100.00'),
(3, 'Servicio al cuarto', '100.00'),
(4, 'Pacific SPA', '200.00'),
(5, 'Pacific GYM', '50.00'),
(6, 'Casino', '100.00'),
(7, 'Combo 1', '1500.00'),
(8, 'Combo 2', '1000.00'),
(9, 'Combo 3', '1500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

DROP TABLE IF EXISTS `tusuario`;
CREATE TABLE IF NOT EXISTS `tusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`id`, `detalle`) VALUES
(1, 'normal'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_habitacion`
--

DROP TABLE IF EXISTS `t_habitacion`;
CREATE TABLE IF NOT EXISTS `t_habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(250) NOT NULL,
  `precio` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_habitacion`
--

INSERT INTO `t_habitacion` (`id`, `detalle`, `precio`) VALUES
(1, 'Simple', '150.00'),
(2, 'Lujosa', '350.00'),
(3, 'Penthouse', '500.00'),
(4, 'Doble', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `id_tusuario` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tusuario` (`id_tusuario`),
  KEY `id_pais` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `pass`, `id_tusuario`, `id_pais`) VALUES
(8, 'michelle', 'morales', '71176371', 'gabyb1a4@outlook.com', '$2y$10$6lWjhElCUNTCvJ0BCboNQuRC6zwGjy.ZsB7QL1XpdqRNm64UBdyk.', 1, 9),
(9, 'aletjandra', 'lopez', '61303127', 'alet@gmail.com', '$2y$10$8DheFimAOsBgZEMSa5DdDOnD87mmaB5h3X4eDaF40/Ebgon4JocGm', 1, 10),
(10, 'Melvin', 'Lopez', '7410-7285', 'melvin@admin.com', '$2y$10$8DheFimAOsBgZEMSa5DdDOnD87mmaB5h3X4eDaF40/Ebgon4JocGm', 2, 4),
(11, 'Melvin ', 'Lopez ', '54652335', 'melvin_64@gmail.com', '$2y$10$sIqCgOP36tppVoPXqC88H.a3uuVNGK6hy0rfW6OLep878ZDAGF66i', 1, 1),
(12, 'Jairo', 'lopez', '76372837', 'skywars503@gmail.com', '$2y$10$FtK9k9NnkTDE/b4zyH8LsuQdLtOw7OPd73fWP1OGXcX4t.2v7oabC', 1, 11),
(13, 'Gaby ', 'Morales', '79587996', 'gaby@admin.com', '$2y$10$ndT.BumAjgT5piBkvj7/DuYWsranXiNbeh0jf6sM2W1Y/9aoHYT/u', 2, 9),
(14, 'michelle', 'escalante', '7689-4567', 'escalante@gmail.com', '$2y$10$UbXi7Snnbtg.oOIuOaFXsuxx2M3vvNKEd2MF4ATq3Jxn3xcLPA4BG', 1, 10),
(15, 'Diego', 'Rodriguez', '78521100', 'diego@hotmail.com', '$2y$10$6ryt9gDUg4Llncb.NEhbCuCtYdOSeO.pkHTekQsVHjHBQN1LdxTrS', 1, 11),
(17, 'altair', 'Castro', '73648750', 'altair@gmail.com', '$2y$10$MaYHTUe1lMeK8Y7yJzt9FeRQtyt4OxD7TfYnACQ3UMPyshmIqe7Iy', 1, 1),
(18, 'Denis ', 'castro', '79587996', 'denis@admin.com', '$2y$10$SJeTId21MvRP0V9nNQssa.GvZUPSl/PXx0Wa7gDQ1tZZ79bzRSzZW', 2, 11),
(19, 'Denis ', 'Castro', '34233244', 'denis@gmail.com', '$2y$10$LLpf0g5GffkHWjVYNoj2t.Yzx..wM8cWMoc1ocp62Njgf7wfICYuy', 1, 11),
(20, 'esau', 'lopez', '311234124314', 'esau@gmail.com', '$2y$10$UKQx2jSy5tuUU6TlS0rf0uor4/Hc.kwyFtE3OsGtpUemuqmKFQzd.', 1, 11),
(21, 'Gaby ', 'lopez', '7689-4567', 'gaby@gmail.com', '$2y$10$F0KmKI.pkJY/b26veb7wm.Pqn9//Oj6G06CVpAFHN5LZKZj.K.1FS', 1, 9);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_com`
--
ALTER TABLE `detalle_com`
  ADD CONSTRAINT `detalle_com_ibfk_1` FOREIGN KEY (`id_combo`) REFERENCES `combo` (`id`),
  ADD CONSTRAINT `detalle_com_ibfk_2` FOREIGN KEY (`id_servi_extra`) REFERENCES `servi_extra` (`id`),
  ADD CONSTRAINT `id_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detalle_re`
--
ALTER TABLE `detalle_re`
  ADD CONSTRAINT `detalle_re_ibfk_1` FOREIGN KEY (`id_reservacion`) REFERENCES `reservacion` (`id`),
  ADD CONSTRAINT `detalle_re_ibfk_2` FOREIGN KEY (`id_servi_extra`) REFERENCES `servi_extra` (`id`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_t_habitacion`) REFERENCES `t_habitacion` (`id`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`id_regimen_comida`) REFERENCES `regimen_comida` (`id`),
  ADD CONSTRAINT `reservacion_ibfk_3` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reservacion_ibfk_4` FOREIGN KEY (`id_t_habitacion`) REFERENCES `t_habitacion` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tusuario`) REFERENCES `tusuario` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
