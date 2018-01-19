-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2018 a las 23:53:24
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `etla_sys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_com`
--

CREATE TABLE `su_com` (
  `id_com` smallint(5) UNSIGNED NOT NULL,
  `com` char(50) NOT NULL,
  `db` char(50) NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `ts_ins` datetime NOT NULL,
  `ts_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_com`
--

INSERT INTO `su_com` (`id_com`, `com`, `db`, `b_del`, `ts_ins`, `ts_upd`) VALUES
(1, 'EMPRESA SA DE CV', 'etla_com', 0, '2018-01-05 12:55:19', '2018-01-05 12:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `su_sys`
--

CREATE TABLE `su_sys` (
  `id_sys` smallint(5) UNSIGNED NOT NULL,
  `ver` smallint(5) UNSIGNED NOT NULL,
  `ver_ts` datetime NOT NULL,
  `b_del` tinyint(1) NOT NULL,
  `ts_ins` datetime NOT NULL,
  `ts_upd` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `su_sys`
--

INSERT INTO `su_sys` (`id_sys`, `ver`, `ver_ts`, `b_del`, `ts_ins`, `ts_upd`) VALUES
(1, 10001, '2018-01-05 12:55:19', 0, '2018-01-05 12:55:19', '2018-01-05 12:55:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `su_com`
--
ALTER TABLE `su_com`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `su_sys`
--
ALTER TABLE `su_sys`
  ADD PRIMARY KEY (`id_sys`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
