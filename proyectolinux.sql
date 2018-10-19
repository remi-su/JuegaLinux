-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2018 a las 17:00:23
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectolinux`
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
(2, 7, 'Ejemplo', 'Ejemplo', 2, 'Esto es un ejemplo', 1, '2018-10-19', '2018-10-31', 0),
(5, 7, 'Sopa', 'Magia', 1, 'No es mas que otro ejemplo', 2, '2018-10-19', '2018-11-01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `nombreAlumno` varchar(150) NOT NULL,
  `apellidoAlumno` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `grupo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idGrupo`, `idMaestro`, `grado`, `grupo`) VALUES
(1, 7, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `idMaestro` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`idMaestro`, `usuario`, `clave`) VALUES
(7, 'admin', 'admin'),
(8, 'charlie', 'elprofe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrassopaletras`
--

CREATE TABLE `palabrassopaletras` (
  `idActividad` int(11) NOT NULL,
  `idPalabra` int(11) NOT NULL,
  `palabra` varchar(10) NOT NULL,
  `palabraDescripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `palabrassopaletras`
--

INSERT INTO `palabrassopaletras` (`idActividad`, `idPalabra`, `palabra`, `palabraDescripcion`) VALUES
(5, 1, 'Perro', 'Animal que ladra'),
(5, 2, 'Gato', 'Animal que maulla');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadesdescenascentenas`
--

CREATE TABLE `unidadesdescenascentenas` (
  `idActividad` int(11) NOT NULL,
  `numeroUnidades` int(11) NOT NULL,
  `numeroDescenas` int(11) NOT NULL,
  `numeroCentenas` int(11) NOT NULL,
  `respuestasDistractoras` varchar(50) NOT NULL,
  `textoRetro` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidadesdescenascentenas`
--

INSERT INTO `unidadesdescenascentenas` (`idActividad`, `numeroUnidades`, `numeroDescenas`, `numeroCentenas`, `respuestasDistractoras`, `textoRetro`) VALUES
(2, 2, 2, 2, '223,254,874', 'La vida es bella');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividadalumno`
--
ALTER TABLE `actividadalumno`
  ADD PRIMARY KEY (`idActividad`,`idAlumno`),
  ADD KEY `idAlumno` (`idAlumno`);

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
-- Indices de la tabla `palabrassopaletras`
--
ALTER TABLE `palabrassopaletras`
  ADD PRIMARY KEY (`idPalabra`,`idActividad`),
  ADD KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`idTipoActividad`);

--
-- Indices de la tabla `unidadesdescenascentenas`
--
ALTER TABLE `unidadesdescenascentenas`
  ADD PRIMARY KEY (`idActividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `idMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `palabrassopaletras`
--
ALTER TABLE `palabrassopaletras`
  MODIFY `idPalabra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividadalumno`
--
ALTER TABLE `actividadalumno`
  ADD CONSTRAINT `idAlumno` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `secundarias` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`idActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Filtros para la tabla `palabrassopaletras`
--
ALTER TABLE `palabrassopaletras`
  ADD CONSTRAINT `idActividad` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidadesdescenascentenas`
--
ALTER TABLE `unidadesdescenascentenas`
  ADD CONSTRAINT `idActividad2` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`idActividad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
