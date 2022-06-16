-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2022 a las 04:59:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zprba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `boleta` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `auditoria` datetime DEFAULT NULL,
  `id_rol` varchar(2) NOT NULL,
  `carrera` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`boleta`, `nombre`, `apellidos`, `correo`, `telefono`, `contrasena`, `auditoria`, `id_rol`, `carrera`) VALUES
('2022630001', 'Juan Manuel', 'Díaz Díaz', 'juan@hotmail.com', '5500000001', '202cb962ac59075b964b07152d234b70', '2022-06-15 00:06:17', '3', 'ISC'),
('2022630002', 'David ', 'Martínez Martínez', 'david@gmail.com', '5500000002', '202cb962ac59075b964b07152d234b70', '2022-06-15 00:07:42', '3', 'ISC'),
('2022630003', 'Ana', 'Domínguez  Domínguez', 'Ana@gmail.com', '5500000003', '202cb962ac59075b964b07152d234b70', '2022-06-15 00:08:27', '3', 'ISC'),
('2022630004', 'Luis Alberto', 'Arellano Arellano', 'alberto_luis@hotmail.com', '5500000004', '202cb962ac59075b964b07152d234b70', '2022-06-15 00:15:39', '3', 'LCD'),
('2022630005', 'Ximena ', 'Cruz Cruz', 'ximena.c@gmail.com', '5500000005', '202cb962ac59075b964b07152d234b70', '2022-06-15 00:17:02', '3', 'IIA'),
('2022630007', 'Eduardo', 'Rojas Rojas', 'Eduardo@gmail.com', '5500000006', NULL, '2022-06-15 00:25:59', '3', 'ISC'),
('2022630008', 'Angelica Alejandra', 'Anaya Anaya', 'angelica@gmail.com', '5500000007', NULL, '2022-06-15 00:25:59', '3', 'ISC'),
('2022630009', 'Kevin', 'Arellano Díaz', 'Diana@diaz.com', '5591023984', '202cb962ac59075b964b07152d234b70', '2022-06-15 21:08:20', '3', 'IIA'),
('2022630013', 'Juan', 'Díaz Díaz', 'Juan@juan.com', '5591023984', '202cb962ac59075b964b07152d234b70', '2022-06-15 21:34:16', '3', 'IIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `registro` int(11) NOT NULL,
  `id_TT` varchar(11) NOT NULL,
  `id_prof` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`registro`, `id_TT`, `id_prof`) VALUES
(1, '2022630001', '1993630001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `registro` int(11) NOT NULL,
  `id_TT` varchar(11) NOT NULL,
  `boleta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`registro`, `id_TT`, `boleta`) VALUES
(1, '2022630001', '2022630001'),
(2, '2022630001', '2022630007'),
(3, '2022630001', '2022630008');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_prof` varchar(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(250) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `cv` varchar(124) DEFAULT NULL,
  `auditoria` datetime DEFAULT NULL,
  `id_rol` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_prof`, `nombre`, `apellido`, `correo`, `telefono`, `contrasena`, `cv`, `auditoria`, `id_rol`) VALUES
('1993630000', 'CATT', NULL, 'CATT@hotmail.com', '5512345678', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-08 22:15:40', '1'),
('1993630001', 'Roberto ', 'Pérez Pérez', 'rober@gmail.com', '555500002', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-15 00:10:28', '2'),
('1993630001T', 'José Luis', 'López López', 'jose.luis@gmail.com', '555500001', '202cb962ac59075b964b07152d234b70', '1', '2022-06-15 00:09:30', '2'),
('1993630002', 'Carlos', 'Silva Silva', 'carlos@hotmail.com', '555500003', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-15 00:11:10', '2'),
('1993630002T', 'José', 'Luis', 'jose.luis@gmail.com', '5591023984', '202cb962ac59075b964b07152d234b70', '1', '2022-06-15 21:36:07', '2'),
('1993630003', 'Karla Patricia', 'Ramírez Ramírez ', 'karla.p@gmail.com', '555500004', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-15 00:12:27', '2'),
('1993630004', 'Ana Victoria', 'García García', 'victoria@hotmail.com', '555500005', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-15 00:18:11', '2'),
('1993630005', 'Luz María', 'Silva Pérez', 'maria@gmail.com', '555500006', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-15 00:20:11', '2'),
('1993630006', 'Leonardo', 'Martínez López', 'leo.martinez@gmail.com', '555500007', '202cb962ac59075b964b07152d234b70', NULL, '2022-06-15 00:21:13', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` varchar(2) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
('1', 'administrador'),
('2', 'profesor'),
('3', 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sinodal`
--

CREATE TABLE `sinodal` (
  `id_sinodal` varchar(11) NOT NULL,
  `id_TT` varchar(11) NOT NULL,
  `id_prof` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tt`
--

CREATE TABLE `tt` (
  `id_TT` varchar(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `resumen` varchar(200) NOT NULL,
  `pdf` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tt`
--

INSERT INTO `tt` (`id_TT`, `titulo`, `resumen`, `pdf`) VALUES
('2022630001', 'Agente Inteligente para capacitación de personal de TI. 11111', 'HOLAAAA Desarrollar un agente inteligente tipo chatbot para proveer capacitación básica al personal que recién ingresa a un área operativa de TI.', ''),
('2022630002', 'Hola', 'Hola', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`boleta`),
  ADD KEY `fk_alumno_rol` (`id_rol`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`registro`),
  ADD KEY `fk_director_tt` (`id_TT`),
  ADD KEY `fk_director_profesor` (`id_prof`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`registro`),
  ADD KEY `fk_equipo_alumno` (`boleta`),
  ADD KEY `fk_equipo_tt` (`id_TT`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_prof`),
  ADD KEY `fk_profesor_rol` (`id_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sinodal`
--
ALTER TABLE `sinodal`
  ADD PRIMARY KEY (`id_sinodal`),
  ADD KEY `fk_sinodal_tt` (`id_TT`),
  ADD KEY `fk_sinodal_profesor` (`id_prof`);

--
-- Indices de la tabla `tt`
--
ALTER TABLE `tt`
  ADD PRIMARY KEY (`id_TT`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `fk_director_profesor` FOREIGN KEY (`id_prof`) REFERENCES `profesor` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_director_tt` FOREIGN KEY (`id_TT`) REFERENCES `tt` (`id_TT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_alumno` FOREIGN KEY (`boleta`) REFERENCES `alumno` (`boleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipo_tt` FOREIGN KEY (`id_TT`) REFERENCES `tt` (`id_TT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `fk_profesor_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sinodal`
--
ALTER TABLE `sinodal`
  ADD CONSTRAINT `fk_sinodal_profesor` FOREIGN KEY (`id_prof`) REFERENCES `profesor` (`id_prof`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sinodal_tt` FOREIGN KEY (`id_TT`) REFERENCES `tt` (`id_TT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
