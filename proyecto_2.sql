-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2019 a las 21:06:59
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
-- Base de datos: `proyecto_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadalumno`
--

CREATE TABLE `actividadalumno` (
  `idActividad` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `calificacion` int(3) NOT NULL,
  `fechaRealizada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividadalumno`
--

INSERT INTO `actividadalumno` (`idActividad`, `idAlumno`, `calificacion`, `fechaRealizada`) VALUES
(5, 2, 85, '2019-04-09'),
(5, 4, 98, '2019-04-09'),
(6, 2, 80, '2019-04-10'),
(6, 4, 100, '2019-04-11'),
(7, 2, 98, '2019-04-12'),
(7, 4, 99, '2019-04-12'),
(8, 2, 87, '2019-04-15'),
(8, 4, 100, '2019-04-15'),
(9, 2, 87, '2019-04-16'),
(9, 4, 97, '2019-04-16'),
(10, 2, 89, '2019-04-17'),
(10, 4, 99, '2019-04-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idActividad` int(11) NOT NULL,
  `idMaestro` int(11) NOT NULL,
  `nombreActividad` varchar(150) NOT NULL,
  `temaActividad` varchar(150) NOT NULL,
  `idAreaActividad` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `idTipoActividad` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaLiberacion` date NOT NULL,
  `estadoActividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idActividad`, `idMaestro`, `nombreActividad`, `temaActividad`, `idAreaActividad`, `descripcion`, `idTipoActividad`, `fechaCreacion`, `fechaLiberacion`, `estadoActividad`) VALUES
(5, 7, 'Sopa', 'Magia', 1, 'No es mas que otro ejemplo', 2, '2018-10-19', '2018-11-01', 1),
(6, 8, 'Sopa_2', 'Sopa_2', 1, 'Sopa_2', 2, '2019-04-08', '2019-04-08', 1),
(7, 8, 'Sopa_3', 'Sopa_3', 1, 'Sopa_3', 2, '2019-04-10', '2019-04-10', 1),
(8, 8, 'Sopa_4', 'Sopa_4', 1, 'Sopa_4', 2, '2019-04-12', '2019-04-12', 1),
(9, 8, 'Sopa_5', 'Sopa_5', 1, 'Sopa_5', 2, '2019-04-15', '2019-04-15', 1),
(10, 8, 'Sopa_6', 'Sopa_6', 1, 'Sopa_6', 2, '2019-04-17', '2019-04-17', 1),
(11, 8, 'Sopa_7', 'Sopa_7', 1, 'Sopa_7', 2, '2019-04-16', '2019-04-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `nombreAlumno` varchar(150) NOT NULL,
  `apellidoAlumno` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `idGrupo`, `nombreAlumno`, `apellidoAlumno`, `estado`) VALUES
(2, 2, 'Samuel', 'Ake', 1),
(3, 2, 'Miguel', 'GCanton', 1),
(4, 2, 'Carlos', 'Poot', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areaeducacional`
--

CREATE TABLE `areaeducacional` (
  `idArea` int(11) NOT NULL,
  `nombreArea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areaeducacional`
--

INSERT INTO `areaeducacional` (`idArea`, `nombreArea`) VALUES
(1, 'Español'),
(2, 'Matematicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL,
  `idMaestro` int(11) NOT NULL,
  `grado` int(2) NOT NULL,
  `grupo` varchar(2) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `idMaestro`, `grado`, `grupo`, `estado`) VALUES
(1, 7, 1, 'B', 1),
(2, 7, 2, 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `idMaestro` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(16) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`idMaestro`, `usuario`, `clave`, `estado`) VALUES
(7, 'admin', 'admin', 0),
(8, 'charlie', 'elprofe', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactividad`
--

CREATE TABLE `tipoactividad` (
  `idTipoActividad` int(11) NOT NULL,
  `nombreTipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoactividad`
--

INSERT INTO `tipoactividad` (`idTipoActividad`, `nombreTipo`) VALUES
(1, 'UnidadesDecenas'),
(2, 'SopaLetras'),
(3, 'Crucigrama');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividadalumno`
--
ALTER TABLE `actividadalumno`
  ADD PRIMARY KEY (`idActividad`,`idAlumno`),
  ADD KEY `idAlumno` (`calificacion`),
  ADD KEY `secundarias_2` (`idAlumno`);

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `idMaestro` (`idMaestro`),
  ADD KEY `idArea` (`idAreaActividad`),
  ADD KEY `idTipo` (`idTipoActividad`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `areaeducacional`
--
ALTER TABLE `areaeducacional`
  ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`),
  ADD KEY `idMaestro2` (`idMaestro`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`idMaestro`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`idTipoActividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `idMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividadalumno`
--
ALTER TABLE `actividadalumno`
  ADD CONSTRAINT `secundarias` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`idActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `secundarias_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `idArea` FOREIGN KEY (`idAreaActividad`) REFERENCES `areaeducacional` (`idArea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idMaestro` FOREIGN KEY (`idMaestro`) REFERENCES `maestros` (`idMaestro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTipo` FOREIGN KEY (`idTipoActividad`) REFERENCES `tipoactividad` (`idTipoActividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `idGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `idMaestro2` FOREIGN KEY (`idMaestro`) REFERENCES `maestros` (`idMaestro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
