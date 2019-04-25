

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `actividadalumno` (
  `idActividad` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `calificacion` int(3) NOT NULL,
  `fechaRealizada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 4, 99, '2019-04-17'),
(12, 2, 85, '2019-04-15'),
(13, 2, 90, '2019-04-17'),
(14, 2, 50, '2019-04-12'),
(15, 2, 100, '2019-04-09');


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


INSERT INTO `actividades` (`idActividad`, `idMaestro`, `nombreActividad`, `temaActividad`, `idAreaActividad`, `descripcion`, `idTipoActividad`, `fechaCreacion`, `fechaLiberacion`, `estadoActividad`) VALUES
(5, 7, 'Sopa', 'Magia', 1, 'No es mas que otro ejemplo', 2, '2018-10-19', '2018-11-01', 1),
(6, 8, 'Sopa_2', 'Sopa_2', 1, 'Sopa_2', 2, '2019-04-08', '2019-04-08', 1),
(7, 8, 'Sopa_3', 'Sopa_3', 1, 'Sopa_3', 2, '2019-04-10', '2019-04-10', 1),
(8, 8, 'Sopa_4', 'Sopa_4', 1, 'Sopa_4', 2, '2019-04-12', '2019-04-12', 1),
(9, 8, 'Sopa_5', 'Sopa_5', 1, 'Sopa_5', 2, '2019-04-15', '2019-04-15', 1),
(10, 8, 'Sopa_6', 'Sopa_6', 1, 'Sopa_6', 2, '2019-04-17', '2019-04-17', 1),
(11, 8, 'Sopa_7', 'Sopa_7', 1, 'Sopa_7', 2, '2019-04-16', '2019-04-16', 1),
(12, 8, 'Prueba 5', 'Tema', 1, 'Prueba', 1, '2019-04-15', '2019-04-15', 1),
(13, 8, 'Prueba', 'Prueba', 1, 'Prueba', 1, '2019-04-17', '2019-04-17', 1),
(14, 8, 'Prueba', 'Prueba', 1, 'Prueba', 1, '2019-04-12', '2019-04-12', 1),
(15, 8, 'Prueba', 'Prueba', 1, 'Prueba', 1, '2019-04-09', '2019-04-09', 1);


CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `nombreAlumno` varchar(150) NOT NULL,
  `apellidoAlumno` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `alumnos` (`idAlumno`, `idGrupo`, `nombreAlumno`, `apellidoAlumno`, `estado`) VALUES
(2, 2, 'Samuel', 'Ake', 1),
(3, 2, 'Miguel', 'GCanton', 1),
(4, 2, 'Carlos', 'Poot', 1);


CREATE TABLE `areaeducacional` (
  `idArea` int(11) NOT NULL,
  `nombreArea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `areaeducacional` (`idArea`, `nombreArea`) VALUES
(1, 'Español'),
(2, 'Matematicas');


CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL,
  `idMaestro` int(11) NOT NULL,
  `grado` int(2) NOT NULL,
  `grupo` varchar(2) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `grupos` (`idGrupo`, `idMaestro`, `grado`, `grupo`, `estado`) VALUES
(1, 7, 1, 'B', 1),
(2, 7, 2, 'A', 1);


CREATE TABLE `maestros` (
  `idMaestro` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(16) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `maestros` (`idMaestro`, `usuario`, `clave`, `estado`) VALUES
(7, 'admin', 'admin', 0),
(8, 'charlie', 'elprofe', 0);


CREATE TABLE `tipoactividad` (
  `idTipoActividad` int(11) NOT NULL,
  `nombreTipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tipoactividad` (`idTipoActividad`, `nombreTipo`) VALUES
(1, 'UnidadesDecenas'),
(2, 'SopaLetras'),
(3, 'Crucigrama');


ALTER TABLE `actividadalumno`
  ADD PRIMARY KEY (`idActividad`,`idAlumno`),
  ADD KEY `idAlumno` (`calificacion`),
  ADD KEY `secundarias_2` (`idAlumno`);

ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `idMaestro` (`idMaestro`),
  ADD KEY `idArea` (`idAreaActividad`),
  ADD KEY `idTipo` (`idTipoActividad`);


ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`),
  ADD KEY `idGrupo` (`idGrupo`);


ALTER TABLE `areaeducacional`
  ADD PRIMARY KEY (`idArea`);

ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idGrupo`),
  ADD KEY `idMaestro2` (`idMaestro`);

ALTER TABLE `maestros`
  ADD PRIMARY KEY (`idMaestro`),
  ADD UNIQUE KEY `usuario` (`usuario`);

ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`idTipoActividad`);


ALTER TABLE `actividades`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `grupos`
  MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `maestros`
  MODIFY `idMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `actividadalumno`
  ADD CONSTRAINT `secundarias` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`idActividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `secundarias_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `actividades`
  ADD CONSTRAINT `idArea` FOREIGN KEY (`idAreaActividad`) REFERENCES `areaeducacional` (`idArea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idMaestro` FOREIGN KEY (`idMaestro`) REFERENCES `maestros` (`idMaestro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTipo` FOREIGN KEY (`idTipoActividad`) REFERENCES `tipoactividad` (`idTipoActividad`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `alumnos`
  ADD CONSTRAINT `idGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `grupos`
  ADD CONSTRAINT `idMaestro2` FOREIGN KEY (`idMaestro`) REFERENCES `maestros` (`idMaestro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

