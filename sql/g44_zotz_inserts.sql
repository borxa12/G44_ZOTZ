-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2015 a las 05:02:34
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `g44_zotz`
--

--
-- Volcado de datos para la tabla `codigopincho`
--

INSERT INTO `codigopincho` (`codigopincho`, `like`, `establecimiento_usuarios_login`, `pincho_idpincho`) VALUES('4423ASD', 1, 'establecimiento1', 1);
INSERT INTO `codigopincho` (`codigopincho`, `like`, `establecimiento_usuarios_login`, `pincho_idpincho`) VALUES('51ASDF', NULL, 'establecimiento1', 1);

--
-- Volcado de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`edicion`, `folleto`, `gastromapa`, `fechac`, `fechaf`, `usuarios_login`) VALUES(1, './folletos/2015/folleto.png', './gastromapas/2015/gastromapa.png', '2015-11-11', '2015-12-28', 'organizador');

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('establecimiento1', 'Establecimiento 1', 'Cerca de aqui', '362147852', 'www.restaurante-r.com', '09.00 - 23.00', 'pos mu bonito');
INSERT INTO `establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimento`) VALUES('establecimiento2', 'Establecimiento 2', 'Lexos de aqui', '412578962', 'www.restaurante-lonxe.com', '09.30-23.00', 'pos máis bonito');

--
-- Volcado de datos para la tabla `juradoprofesional`
--

INSERT INTO `juradoprofesional` (`usuarios_login`, `fotojuradoprofesional`, `nombrejuradoprofesional`, `reconocimientos`) VALUES('juradoprofesional', './img/jpro/default.png', 'Alfredo Martínez', NULL);

--
-- Volcado de datos para la tabla `pincho`
--

INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(1, 'pincho1', './img/pinchos/default.png', 'riquisimo', 'algún leva', 2.02, 'N', 1, 'establecimiento1');
INSERT INTO `pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES(2, 'pincho2', './img/pinchos/default.png', 'rico e barato', 'algún leva', 1.02, 'N', 1, 'establecimiento2');

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('establecimiento1', 'estpass', 'establecimiento@est.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('establecimiento2', 'estpass', 'establecimiento@est.com', 'est');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('juradoprofesional', 'jpropass', 'juradoprofesional@jpro.com', 'jpro');
INSERT INTO `usuarios` (`login`, `password`, `email`, `tipo`) VALUES('organizador', 'orgpass', 'organizador@org.com', 'org');

--
-- Volcado de datos para la tabla `votaprofesional`
--

INSERT INTO `votaprofesional` (`pincho_idpincho`, `juradoprofesional_usuarios_login`, `votoprofesional`) VALUES(1, 'juradoprofesional', NULL);
INSERT INTO `votaprofesional` (`pincho_idpincho`, `juradoprofesional_usuarios_login`, `votoprofesional`) VALUES(2, 'juradoprofesional', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
