-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 00:50:55
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `0_Mdls` (
  `Rfrnc`    INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc    (English: Reference                          / Spanish: Referencia)',
  `Nms`      VARCHAR(50)  NOT NULL                COMMENT 'Nms      (English: Names                              / Spanish: Nombres)',
  `Dscrptn`  TEXT         NOT NULL                COMMENT 'Dscrptn  (English: Description                        / Spanish: Descripción)',
  `Cndtn`    INT    (2)   NOT NULL                COMMENT 'Cndtn    (English: Condition [0: Inactive, 1: Active] / Spanish: Estado    [0: Inactivo, 1: Activo])',
  `Rmvd`     INT    (2)   NOT NULL                COMMENT 'Rmvd     (English: Removed   [0: Inactive, 1: Active] / Spanish: Eliminado [0: Inactivo, 1: Activo])',
  `Lckd`     INT    (2)   NOT NULL                COMMENT 'Lckd     (English: Locked    [0: Inactive, 1: Active] / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
  `DtAdmssn` DATE             NULL                COMMENT 'DtAdmssn (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
  `ChckTm`   TIME             NULL                COMMENT 'ChckTm   (English: Check in Admission                 / Spanish: Hora de Ingreso)',   
  PRIMARY KEY (`Rfrnc`)
) ENGINE='MyISAM' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Mdls (English: 0 - Models / Spanish: 0 - Modelos)';

CREATE TABLE IF NOT EXISTS `0_Scnrs` (
  `Rfrnc`    INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc    (English: Reference                          / Spanish: Referencia)',
  `Nms`      VARCHAR(50)  NOT NULL                COMMENT 'Nms      (English: Names                              / Spanish: Nombres)',
  `Dscrptn`  TEXT         NOT NULL                COMMENT 'Dscrptn  (English: Description                        / Spanish: Descripción)',
  `Cndtn`    INT    (2)   NOT NULL                COMMENT 'Cndtn    (English: Condition [0: Inactive, 1: Active] / Spanish: Estado    [0: Inactivo, 1: Activo])',
  `Rmvd`     INT    (2)   NOT NULL                COMMENT 'Rmvd     (English: Removed   [0: Inactive, 1: Active] / Spanish: Eliminado [0: Inactivo, 1: Activo])',
  `Lckd`     INT    (2)   NOT NULL                COMMENT 'Lckd     (English: Locked    [0: Inactive, 1: Active] / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
  `DtAdmssn` DATE             NULL                COMMENT 'DtAdmssn (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
  `ChckTm`   TIME             NULL                COMMENT 'ChckTm   (English: Check in Admission                 / Spanish: Hora de Ingreso)',   
  PRIMARY KEY (`Rfrnc`)
) ENGINE='MyISAM' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Scnrs (English: 0 - Scenarios / Spanish: 0 - Escenarios)';

CREATE TABLE IF NOT EXISTS `0_Schdl` (
  `Rfrnc`         INT    (255) NOT NULL AUTO_INCREMENT COMMENT 'Rfrnc         (English: Reference                          / Spanish: Referencia)',
  `UsrRfrnc`      INT    (255) NOT NULL                COMMENT 'UsrRfrnc      (English: User Reference                     / Spanish: Referencia de Usuario)',
  `RfrncClssfctn` VARCHAR(255) NOT NULL                COMMENT 'RfrncClssfctn (English: Reference Classification           / Spanish: Referencia de Clasificación)',
  `Pntr`          INT    (255) NOT NULL                COMMENT 'Pntr          (English: Pointer                            / Spanish: Puntero)',
  `Nms`           VARCHAR(50)  NOT NULL                COMMENT 'Nms           (English: Names                              / Spanish: Nombres)',
  `Dscrptn`       TEXT         NOT NULL                COMMENT 'Dscrptn       (English: Description                        / Spanish: Descripción)',
  `Cndtn`         INT    (2)   NOT NULL                COMMENT 'Cndtn         (English: Condition [0: Inactive, 1: Active] / Spanish: Estado    [0: Inactivo, 1: Activo])',
  `Rmvd`          INT    (2)   NOT NULL                COMMENT 'Rmvd          (English: Removed   [0: Inactive, 1: Active] / Spanish: Eliminado [0: Inactivo, 1: Activo])',
  `Lckd`          INT    (2)   NOT NULL                COMMENT 'Lckd          (English: Locked    [0: Inactive, 1: Active] / Spanish: Bloqueado [0: Inactivo, 1: Activo])',
  `IntlDt`        DATE             NULL                COMMENT 'IntlDt        (English: Initial Date                       / Spanish: Fecha Inicial)',
  `FnlDt`         DATE             NULL                COMMENT 'FnlDt         (English: Final Date                         / Spanish: Fecha Final)',
  `DtAdmssn`      DATE             NULL                COMMENT 'DtAdmssn      (English: Date of Admission                  / Spanish: Fecha de Ingreso)',
  `ChckTm`        TIME             NULL                COMMENT 'ChckTm        (English: Check in Admission                 / Spanish: Hora de Ingreso)',   
  PRIMARY KEY (`Rfrnc`)
) ENGINE='MyISAM' DEFAULT CHARSET='utf8' COLLATE='utf8_bin' COMMENT='0_Schdl (English: 0 - Schedule / Spanish: 0 - Agenda)';
