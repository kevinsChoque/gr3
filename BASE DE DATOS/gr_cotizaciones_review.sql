-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2023 a las 16:03:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gr_cotizaciones_review`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idCot` varchar(36) NOT NULL,
  `idUsu` varchar(36) DEFAULT NULL,
  `numeroCotizacion` varchar(50) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `unidadEjecutora` varchar(500) DEFAULT NULL,
  `documento` varchar(200) DEFAULT NULL,
  `fechaCotizacion` date DEFAULT NULL,
  `horaCotizacion` varchar(50) DEFAULT NULL,
  `fechaFinalizacion` date DEFAULT NULL,
  `horaFinalizacion` varchar(50) DEFAULT NULL,
  `concepto` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `estadoCotizacion` varchar(1) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL,
  `fa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotrecpro`
--

CREATE TABLE `cotrecpro` (
  `idCrp` varchar(36) NOT NULL,
  `idCot` varchar(36) DEFAULT NULL,
  `idRec` varchar(36) DEFAULT NULL,
  `idPro` varchar(36) DEFAULT NULL,
  `timeEntrega` varchar(50) DEFAULT NULL,
  `timeValidez` varchar(50) DEFAULT NULL,
  `dedica` varchar(1) DEFAULT NULL,
  `timeGarantia` varchar(50) DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `estadoCrp` varchar(1) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL,
  `fa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotxitm`
--

CREATE TABLE `cotxitm` (
  `idCi` varchar(36) NOT NULL,
  `idCot` varchar(36) DEFAULT NULL,
  `idItm` int(11) DEFAULT NULL,
  `idUm` int(11) DEFAULT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprocot`
--

CREATE TABLE `detalleprocot` (
  `idDpc` varchar(36) NOT NULL,
  `idCrp` varchar(36) DEFAULT NULL,
  `idItm` varchar(36) DEFAULT NULL,
  `garantia` varchar(50) DEFAULT NULL,
  `marca` varchar(500) DEFAULT NULL,
  `modelo` varchar(500) DEFAULT NULL,
  `precio` varchar(100) DEFAULT NULL,
  `archivo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `idItm` int(11) NOT NULL,
  `nombre` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `clasificador` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fr` datetime DEFAULT NULL,
  `fa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`idItm`, `nombre`, `descripcion`, `clasificador`, `estado`, `fr`, `fa`) VALUES
(1, 'compresora de aire', NULL, '456', 1, '2023-11-21 16:56:47', NULL),
(2, 'alambre de fierro galvanizado n 8', NULL, '123', 1, '2023-11-08 14:00:08', NULL),
(4, 'anclaje de fierro', NULL, '666', 1, '2023-11-08 14:06:50', NULL),
(5, 'barra de tierra para rack de comunicaciones', NULL, '999', 1, '2023-11-08 14:16:31', NULL),
(6, 'aceite multigrado 20w para motor petrolero', NULL, '369', 1, '2023-11-08 14:17:29', NULL),
(7, 'filtro de aceite', NULL, '963', 1, '2023-11-08 14:44:50', NULL),
(8, 'filtro de agua', NULL, '936', 1, '2023-11-08 14:47:30', NULL),
(13, 'SELECCIONADORA', 'OTRAS', '658', 1, '2023-11-15 15:59:29', NULL),
(14, 'cinta de acero inoxidable', NULL, '873', 1, '2023-11-16 16:00:32', NULL),
(15, 'curva con rosca de acero 1 1/2', NULL, '854', 1, '2023-11-15 16:01:04', NULL),
(16, 'curva con rosca de acero 4', NULL, '548', 1, '2023-11-14 16:01:04', NULL),
(17, 'porongo de aluminio de 20l', NULL, '748', 1, '2023-11-15 16:02:21', NULL),
(18, 'archivador de carton con palanca lomo ancho tamaño a4', NULL, '548', 1, '2023-11-20 16:09:53', NULL),
(19, 'bandeja de metal para escritorio de 3 pisos', NULL, '987', 1, '2023-11-21 16:09:53', NULL),
(20, 'binder clip', NULL, '542', 1, '2023-11-27 16:11:54', NULL),
(21, 'Kevins', 'desc', '43435', NULL, '2023-12-01 21:38:13', NULL),
(22, 'item prueba', 'desc', '24', NULL, '2023-12-01 21:38:27', NULL),
(23, 'last', 'ultimo', '666', NULL, '2023-12-18 15:35:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idPro` varchar(36) NOT NULL,
  `idUsu` varchar(36) DEFAULT NULL,
  `tipoPersona` varchar(50) DEFAULT NULL,
  `numeroDocumento` varchar(11) DEFAULT NULL,
  `razonSocial` text DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellidoPaterno` varchar(200) DEFAULT NULL,
  `apellidoMaterno` varchar(200) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `activo` varchar(1) DEFAULT NULL,
  `habido` varchar(1) DEFAULT NULL,
  `dniRep` varchar(8) DEFAULT NULL,
  `nombreRep` varchar(200) DEFAULT NULL,
  `apellidoPaternoRep` varchar(200) DEFAULT NULL,
  `apellidoMaternoRep` varchar(200) DEFAULT NULL,
  `direccionRep` varchar(200) DEFAULT NULL,
  `banco` varchar(100) DEFAULT NULL,
  `cci` varchar(20) DEFAULT NULL,
  `correo` varchar(500) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `usuario` varchar(500) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `estadoProveedor` varchar(1) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL,
  `fa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recotizacion`
--

CREATE TABLE `recotizacion` (
  `idRec` varchar(36) NOT NULL,
  `idCot` varchar(36) DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `fechaCotizacion` date DEFAULT NULL,
  `fechaFinalizacion` date DEFAULT NULL,
  `estadoRecotizacion` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suspension`
--

CREATE TABLE `suspension` (
  `idSus` varchar(36) NOT NULL,
  `idPro` varchar(36) DEFAULT NULL,
  `motivo` text DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `archivo` text DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinalizacion` date DEFAULT NULL,
  `estadoSuspension` varchar(1) DEFAULT NULL,
  `fr` date DEFAULT NULL,
  `fa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `idUm` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidadmedida`
--

INSERT INTO `unidadmedida` (`idUm`, `nombre`, `descripcion`, `estado`, `fr`) VALUES
(4, 'unidad', '1', '1', '2023-11-28 16:48:05'),
(5, 'docena', '12 unid', '1', '2023-11-15 16:48:20'),
(6, 'metro', '100cm', '1', '2023-11-21 16:48:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` varchar(36) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellidoPaterno` varchar(200) DEFAULT NULL,
  `apellidoMaterno` varchar(200) DEFAULT NULL,
  `usuario` varchar(200) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `tipo` varchar(200) DEFAULT NULL,
  `celular` varchar(9) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `fr` datetime DEFAULT NULL,
  `fa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `dni`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `usuario`, `password`, `tipo`, `celular`, `correo`, `estado`, `fr`, `fa`) VALUES
('ec746f85-69cc-471d-8dc7-0f6d313d7040', '66666666', 'mael', 'martinez', 'vizcarra', 'admin', '$2y$12$K7k47GFVwQ8hU8nP0gvZouzS0pDr2PtYKw/KSrgKrZty4lkvf.lou', 'administrador', '986854628', 'kevins.choque@gmail.com', '1', '2023-11-10 22:08:09', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCot`);

--
-- Indices de la tabla `cotrecpro`
--
ALTER TABLE `cotrecpro`
  ADD PRIMARY KEY (`idCrp`),
  ADD KEY `idCot` (`idCot`),
  ADD KEY `idRec` (`idRec`),
  ADD KEY `idPro` (`idPro`);

--
-- Indices de la tabla `cotxitm`
--
ALTER TABLE `cotxitm`
  ADD PRIMARY KEY (`idCi`),
  ADD KEY `idCot` (`idCot`),
  ADD KEY `idItm` (`idItm`);

--
-- Indices de la tabla `detalleprocot`
--
ALTER TABLE `detalleprocot`
  ADD PRIMARY KEY (`idDpc`),
  ADD KEY `idCrp` (`idCrp`),
  ADD KEY `idItm` (`idItm`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idItm`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idPro`);

--
-- Indices de la tabla `recotizacion`
--
ALTER TABLE `recotizacion`
  ADD PRIMARY KEY (`idRec`),
  ADD KEY `idCot` (`idCot`);

--
-- Indices de la tabla `suspension`
--
ALTER TABLE `suspension`
  ADD PRIMARY KEY (`idSus`),
  ADD KEY `idPro` (`idPro`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`idUm`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `idItm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `idUm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotrecpro`
--
ALTER TABLE `cotrecpro`
  ADD CONSTRAINT `cotrecpro_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `proveedor` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotrecpro_ibfk_2` FOREIGN KEY (`idCot`) REFERENCES `cotizacion` (`idCot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotrecpro_ibfk_3` FOREIGN KEY (`idRec`) REFERENCES `recotizacion` (`idRec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotxitm`
--
ALTER TABLE `cotxitm`
  ADD CONSTRAINT `cotxitm_ibfk_1` FOREIGN KEY (`idItm`) REFERENCES `item` (`idItm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cotxitm_ibfk_2` FOREIGN KEY (`idCot`) REFERENCES `cotizacion` (`idCot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleprocot`
--
ALTER TABLE `detalleprocot`
  ADD CONSTRAINT `detalleprocot_ibfk_1` FOREIGN KEY (`idCrp`) REFERENCES `cotrecpro` (`idCrp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleprocot_ibfk_2` FOREIGN KEY (`idItm`) REFERENCES `cotxitm` (`idCi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recotizacion`
--
ALTER TABLE `recotizacion`
  ADD CONSTRAINT `recotizacion_ibfk_1` FOREIGN KEY (`idCot`) REFERENCES `cotizacion` (`idCot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `suspension`
--
ALTER TABLE `suspension`
  ADD CONSTRAINT `suspension_ibfk_1` FOREIGN KEY (`idPro`) REFERENCES `proveedor` (`idPro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
