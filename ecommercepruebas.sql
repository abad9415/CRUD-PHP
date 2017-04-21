-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2017 a las 12:53:26
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecommercepruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conocimientos`
--

CREATE TABLE IF NOT EXISTS `tbl_conocimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` tinyint(1) DEFAULT NULL,
  `porcentaje` varchar(3) DEFAULT NULL,
  `tbl_empleado_id` int(11) NOT NULL,
  `tbl_lenguajes_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_conocimientos_tbl_empleado_idx` (`tbl_empleado_id`),
  KEY `fk_tbl_conocimientos_tbl_lenguajes1_idx` (`tbl_lenguajes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_conocimientos`
--

INSERT INTO `tbl_conocimientos` (`id`, `curso`, `porcentaje`, `tbl_empleado_id`, `tbl_lenguajes_id`) VALUES
(6, 1, '10', 4, 2),
(7, 1, '50', 2, 6),
(8, 1, '25', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_economicos`
--

CREATE TABLE IF NOT EXISTS `tbl_datos_economicos` (
  `puesto` varchar(45) NOT NULL,
  `salario` float NOT NULL,
  `tbl_empleado_id` int(11) NOT NULL,
  PRIMARY KEY (`tbl_empleado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_datos_economicos`
--

INSERT INTO `tbl_datos_economicos` (`puesto`, `salario`, `tbl_empleado_id`) VALUES
('Desarrollador Web', 15000, 2),
('Mantenimiento', 14859, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE IF NOT EXISTS `tbl_empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `edad` int(3) DEFAULT NULL,
  `direccion` text,
  `estado` tinyint(1) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`id`, `nombre`, `edad`, `direccion`, `estado`, `fecha_nacimiento`, `telefono`) VALUES
(2, 'Eduardo Abad Tinoco', 23, 'Calle Miguel Venegas #1127 Col. Solidaridad Mexicali', 1, '1994-03-15', '6862224097'),
(4, 'Pedro Godines', 75, 'Av. Pareto #31416 col. Pitagoras Mexicali B.C', 1, '1942-01-22', '6869454754');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lenguajes`
--

CREATE TABLE IF NOT EXISTS `tbl_lenguajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lenguaje` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbl_lenguajes`
--

INSERT INTO `tbl_lenguajes` (`id`, `lenguaje`) VALUES
(2, 'Java'),
(6, 'JavaScript.'),
(8, 'PHP');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_conocimientos`
--
ALTER TABLE `tbl_conocimientos`
  ADD CONSTRAINT `fk_tbl_conocimientos_tbl_empleado` FOREIGN KEY (`tbl_empleado_id`) REFERENCES `tbl_empleado` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_conocimientos_tbl_lenguajes1` FOREIGN KEY (`tbl_lenguajes_id`) REFERENCES `tbl_lenguajes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_datos_economicos`
--
ALTER TABLE `tbl_datos_economicos`
  ADD CONSTRAINT `fk_tbl_datos_economicos_tbl_empleado1` FOREIGN KEY (`tbl_empleado_id`) REFERENCES `tbl_empleado` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
