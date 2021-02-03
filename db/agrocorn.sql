-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2021 a las 04:10:50
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agrocorn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `codigo` int(11) NOT NULL,
  `usuariof` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`codigo`, `usuariof`, `password`) VALUES
(14, 'aresly27', '202cb962ac59075b964b07152d234b70'),
(16, 'sofia123', '202cb962ac59075b964b07152d234b70'),
(17, 'sofia123', '202cb962ac59075b964b07152d234b70'),
(18, 'sofia36', '48042b1dae4950fef2bd2aafa0b971a1'),
(19, 'sofia36', '48042b1dae4950fef2bd2aafa0b971a1'),
(20, 'lucia123', '202cb962ac59075b964b07152d234b70'),
(21, 'lucia123', '202cb962ac59075b964b07152d234b70'),
(22, 'william22', '202cb962ac59075b964b07152d234b70'),
(23, 'william22', '202cb962ac59075b964b07152d234b70'),
(24, 'diana123', '202cb962ac59075b964b07152d234b70'),
(25, 'diana123', '202cb962ac59075b964b07152d234b70'),
(26, 'fabricio12', '202cb962ac59075b964b07152d234b70'),
(27, 'fabricio12', '202cb962ac59075b964b07152d234b70'),
(28, 'user', '202cb962ac59075b964b07152d234b70'),
(29, 'user', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `codigor` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` int(11) NOT NULL,
  `hectareas` float DEFAULT NULL,
  `D_horizontal` float DEFAULT NULL,
  `D_diagonal` float DEFAULT NULL,
  `trancas` int(11) DEFAULT NULL,
  `plantas` int(11) DEFAULT NULL,
  `quintales` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `inversion_Maquinaria` float DEFAULT NULL,
  `inversion_abono` float DEFAULT NULL,
  `inversion_pesticida` float DEFAULT NULL,
  `inversion_semillas` float DEFAULT NULL,
  `inversion_total` float DEFAULT NULL,
  `ganancia_estimada` float DEFAULT NULL,
  `ganancia_asegurada` float DEFAULT NULL,
  `perdida_estimada` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`codigor`, `nombre`, `fecha`, `codigo`, `hectareas`, `D_horizontal`, `D_diagonal`, `trancas`, `plantas`, `quintales`, `subtotal`, `inversion_Maquinaria`, `inversion_abono`, `inversion_pesticida`, `inversion_semillas`, `inversion_total`, `ganancia_estimada`, `ganancia_asegurada`, `perdida_estimada`) VALUES
(0, 'cultivo 1', '2021-01-04', 28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(0, 'cultivo 2', '2021-01-05', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `apellido`, `cedula`, `direccion`, `email`, `telefono`) VALUES
('aresly27', 'Aresly', 'Macias', '0955326491', 'Sur', 'wendu@gmail.com', '0963257841'),
('diana123', 'Diana', 'Arbeláez', '0955326491', 'Sur', '', '0963257841'),
('fabricio12', 'Fabricio', 'Gomez', '0955326491', 'Sur', '', '0963257841'),
('lucia123', 'Lucia', 'Macias', '0955326491', 'Sur', 'lucia@gmail.com', '0983654215'),
('sofia123', 'Sofia', 'Farina', '0955326491', 'Sur', 'sofia@gmail.com', '0963257841'),
('sofia36', 'Sofia', 'Farina', '0955326491', 'Sur', 'sofia@gmail.com', '0963257841'),
('user', 'juan', 'piguabe', '0950048504', 'guayaquil', 'juanpi@gmail.com', '0956374567'),
('william22', 'fggfgfg', 'Macias', '0955326491', 'Sur', 'erick@gmail.com', '0963257841');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `usuario` (`usuariof`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`usuariof`) REFERENCES `usuarios` (`usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
