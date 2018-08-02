-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 01, 2018 at 11:56 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 5.6.37-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crfpcso`
--

-- --------------------------------------------------------

--
-- Table structure for table `Capacitacion`
--

CREATE TABLE `Capacitacion` (
  `num_capacitacion_pk` int(11) NOT NULL,
  `txt_nombre` varchar(45) NOT NULL,
  `txt_descripcion` varchar(45) NOT NULL,
  `txt_tutor` varchar(45) NOT NULL,
  `num_depto_fk` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `txt_centro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Capacitacion`
--

INSERT INTO `Capacitacion` (`num_capacitacion_pk`, `txt_nombre`, `txt_descripcion`, `txt_tutor`, `num_depto_fk`, `fecha_inicio`, `fecha_fin`, `txt_centro`) VALUES
(1, 'Capacitacion 1', 'capacitacion 1', 'Lic. Prueba Flow', 8, '2018-07-23', '2018-07-31', 'CRFPCSO'),
(2, 'Capacitacion 2', 'capacitacion 2', 'Lic. Prueba Flow 2', 8, '2018-07-24', '2018-07-30', 'CRFPCSO'),
(3, 'CAPACITACION 3', 'CAPCITACION 3', 'yo', 3, '2018-07-03', '2018-07-30', 'TU'),
(4, 'CAPACITANCIOCITA', 'PORQUE SI', 'PORQUESI TUTOS', 1, '2018-08-17', '2018-08-30', 'LA WEA'),
(5, 'CAPACITANCIOCITA', 'PORQUE SI', 'PORQUESI TUTOS', 1, '2018-08-17', '2018-08-30', 'LA WEA');

-- --------------------------------------------------------

--
-- Table structure for table `Capacitacion_X_Maestro`
--

CREATE TABLE `Capacitacion_X_Maestro` (
  `num_cap_maestro_pk` int(11) NOT NULL,
  `num_maestro_fk` int(11) NOT NULL,
  `num_capacitacion_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Capacitacion_X_Maestro`
--

INSERT INTO `Capacitacion_X_Maestro` (`num_cap_maestro_pk`, `num_maestro_fk`, `num_capacitacion_fk`) VALUES
(1, 1, 1),
(2, 10, 2),
(3, 5, 2),
(4, 11, 1),
(5, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Cargo`
--

CREATE TABLE `Cargo` (
  `num_cargo_pk` int(11) NOT NULL,
  `txt_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cargo`
--

INSERT INTO `Cargo` (`num_cargo_pk`, `txt_nombre`) VALUES
(1, 'Maestro Auxiliar');

-- --------------------------------------------------------

--
-- Table structure for table `centro_educativo`
--

CREATE TABLE `centro_educativo` (
  `id_centro` int(11) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `primaria` int(11) NOT NULL DEFAULT '0',
  `secundaria` int(11) NOT NULL DEFAULT '0',
  `diversificado` int(11) NOT NULL DEFAULT '0',
  `universitaria` int(11) NOT NULL DEFAULT '0',
  `ubicacion` varchar(250) NOT NULL,
  `jornada` int(11) NOT NULL DEFAULT '1',
  `cantidad_docentes` int(11) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `director` varchar(250) DEFAULT NULL,
  `municipio` varchar(25) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Departamento`
--

CREATE TABLE `Departamento` (
  `num_depto_pk` int(11) NOT NULL,
  `txt_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Departamento`
--

INSERT INTO `Departamento` (`num_depto_pk`, `txt_nombre`) VALUES
(1, 'Atlantida'),
(2, 'Choluteca'),
(3, 'Colon'),
(4, 'Comayagua'),
(5, 'Copan'),
(6, 'Cortes'),
(7, 'El Paraiso'),
(8, 'Francisco Morazan'),
(9, 'Gracias a Dios'),
(10, 'Intibuca'),
(11, 'Islas de la Bahia'),
(12, 'La Paz'),
(13, 'Lempira'),
(14, 'Ocotepeque'),
(15, 'Olancho'),
(16, 'Santa Barbara'),
(17, 'Valle'),
(18, 'Yoro');

-- --------------------------------------------------------

--
-- Table structure for table `Maestro`
--

CREATE TABLE `Maestro` (
  `num_maestro_pk` int(11) NOT NULL,
  `txt_nombre` varchar(50) NOT NULL,
  `txt_apellido` varchar(50) NOT NULL,
  `txt_identidad` varchar(15) NOT NULL,
  `txt_genero` varchar(1) NOT NULL,
  `txt_email` varchar(100) NOT NULL,
  `txt_telefono` varchar(10) NOT NULL,
  `num_depto_fk` int(11) NOT NULL,
  `num_nivel_fk` int(11) NOT NULL,
  `num_cargo_fk` int(11) NOT NULL,
  `txt_centro_educativo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Maestro`
--

INSERT INTO `Maestro` (`num_maestro_pk`, `txt_nombre`, `txt_apellido`, `txt_identidad`, `txt_genero`, `txt_email`, `txt_telefono`, `num_depto_fk`, `num_nivel_fk`, `num_cargo_fk`, `txt_centro_educativo`) VALUES
(1, 'Prueba', 'Fina', '0801-1990-16785', 'M', 'prueba@prueba.com', '0000-0000', 8, 2, 1, 'ICVC'),
(2, 'asd', 'asd', '45', 'M', 'losdequeu@gmail.com', '45', 8, 2, 1, 'iagz'),
(4, 'prueba', '2', '46', 'M', 'prueba@prueba.com', '46', 15, 2, 1, 'asaber'),
(5, 'Maria', 'Del Carmen', '0801-1984-14596', 'F', 'maria@email.com', '2246-7823', 2, 3, 1, 'ni idea'),
(9, 'prueba', '3', '78', 'F', 'losdequeu@gmail.com', '78', 18, 4, 1, 'ni idea 2'),
(10, 'prueba', 'capacitacion', '48', 'M', 'prueba@example.com', '36', 11, 2, 1, 'la ranfla'),
(11, 'SDASD', 'ASDASDA', '0120383102', 'M', 'ASDADASA1312311231311231', '131231231', 1, 1, 1, 'CEAS'),
(12, 'ADASDAASDAS', 'QEQWEQ', '0120312', 'M', 'ASDASDA@ASDAS', 'ZADASDA', 1, 1, 1, 'ASDAS');

-- --------------------------------------------------------

--
-- Table structure for table `Nivel`
--

CREATE TABLE `Nivel` (
  `num_nivel_pk` int(11) NOT NULL,
  `txt_nombre` varchar(45) NOT NULL,
  `txt_observacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Nivel`
--

INSERT INTO `Nivel` (`num_nivel_pk`, `txt_nombre`, `txt_observacion`) VALUES
(1, 'Educacion Media', NULL),
(2, 'Licenciatura', NULL),
(3, 'Maestria', NULL),
(4, 'Doctorado', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `TipoUsuario`
--

CREATE TABLE `TipoUsuario` (
  `num_tipo_usuario_pk` int(11) NOT NULL,
  `txt_nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TipoUsuario`
--

INSERT INTO `TipoUsuario` (`num_tipo_usuario_pk`, `txt_nombre`) VALUES
(1, 'Administrador'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `num_usuario_pk` int(11) NOT NULL,
  `txt_nombre` varchar(45) NOT NULL,
  `txt_apellido` varchar(45) NOT NULL,
  `txt_email` varchar(100) NOT NULL,
  `txt_password` varchar(45) NOT NULL,
  `num_tipo_usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`num_usuario_pk`, `txt_nombre`, `txt_apellido`, `txt_email`, `txt_password`, `num_tipo_usuario_fk`) VALUES
(1, 'Flow', 'Factory', 'flow@factory.com', '9199dca71197ad38ae1e7408c311458575c02cea', 1),
(3, 'antony', 'brenes', 'antony.c@gmail.com', 'dee7439fa1f124c0e719cfe636a8442c192ded98', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Capacitacion`
--
ALTER TABLE `Capacitacion`
  ADD PRIMARY KEY (`num_capacitacion_pk`),
  ADD KEY `fk_Capacitacion_Departamento1_idx` (`num_depto_fk`);

--
-- Indexes for table `Capacitacion_X_Maestro`
--
ALTER TABLE `Capacitacion_X_Maestro`
  ADD PRIMARY KEY (`num_cap_maestro_pk`),
  ADD KEY `fk_Maestro_has_Capacitacion_Capacitacion1_idx` (`num_capacitacion_fk`),
  ADD KEY `fk_Maestro_has_Capacitacion_Maestro1_idx` (`num_maestro_fk`);

--
-- Indexes for table `Cargo`
--
ALTER TABLE `Cargo`
  ADD PRIMARY KEY (`num_cargo_pk`);

--
-- Indexes for table `centro_educativo`
--
ALTER TABLE `centro_educativo`
  ADD PRIMARY KEY (`id_centro`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indexes for table `Departamento`
--
ALTER TABLE `Departamento`
  ADD PRIMARY KEY (`num_depto_pk`);

--
-- Indexes for table `Maestro`
--
ALTER TABLE `Maestro`
  ADD PRIMARY KEY (`num_maestro_pk`),
  ADD KEY `fk_Maestro_Departamento1_idx` (`num_depto_fk`),
  ADD KEY `fk_Maestro_NIvel1_idx` (`num_nivel_fk`),
  ADD KEY `fk_Maestro_Cargo1_idx` (`num_cargo_fk`);

--
-- Indexes for table `Nivel`
--
ALTER TABLE `Nivel`
  ADD PRIMARY KEY (`num_nivel_pk`);

--
-- Indexes for table `TipoUsuario`
--
ALTER TABLE `TipoUsuario`
  ADD PRIMARY KEY (`num_tipo_usuario_pk`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`num_usuario_pk`),
  ADD KEY `fk_Usuario_TipoUsuario_idx` (`num_tipo_usuario_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Capacitacion`
--
ALTER TABLE `Capacitacion`
  MODIFY `num_capacitacion_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Capacitacion_X_Maestro`
--
ALTER TABLE `Capacitacion_X_Maestro`
  MODIFY `num_cap_maestro_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Cargo`
--
ALTER TABLE `Cargo`
  MODIFY `num_cargo_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Departamento`
--
ALTER TABLE `Departamento`
  MODIFY `num_depto_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `Maestro`
--
ALTER TABLE `Maestro`
  MODIFY `num_maestro_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Nivel`
--
ALTER TABLE `Nivel`
  MODIFY `num_nivel_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `TipoUsuario`
--
ALTER TABLE `TipoUsuario`
  MODIFY `num_tipo_usuario_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `num_usuario_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Capacitacion`
--
ALTER TABLE `Capacitacion`
  ADD CONSTRAINT `fk_Capacitacion_Departamento1` FOREIGN KEY (`num_depto_fk`) REFERENCES `Departamento` (`num_depto_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Capacitacion_X_Maestro`
--
ALTER TABLE `Capacitacion_X_Maestro`
  ADD CONSTRAINT `fk_Maestro_has_Capacitacion_Capacitacion1` FOREIGN KEY (`num_capacitacion_fk`) REFERENCES `Capacitacion` (`num_capacitacion_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Maestro_has_Capacitacion_Maestro1` FOREIGN KEY (`num_maestro_fk`) REFERENCES `Maestro` (`num_maestro_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `centro_educativo`
--
ALTER TABLE `centro_educativo`
  ADD CONSTRAINT `departamento_id` FOREIGN KEY (`departamento_id`) REFERENCES `Departamento` (`num_depto_pk`);

--
-- Constraints for table `Maestro`
--
ALTER TABLE `Maestro`
  ADD CONSTRAINT `fk_Maestro_Cargo1` FOREIGN KEY (`num_cargo_fk`) REFERENCES `Cargo` (`num_cargo_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Maestro_Departamento1` FOREIGN KEY (`num_depto_fk`) REFERENCES `Departamento` (`num_depto_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Maestro_NIvel1` FOREIGN KEY (`num_nivel_fk`) REFERENCES `Nivel` (`num_nivel_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_TipoUsuario` FOREIGN KEY (`num_tipo_usuario_fk`) REFERENCES `TipoUsuario` (`num_tipo_usuario_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
