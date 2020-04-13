-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2020 a las 22:40:28
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'aseo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Nombre1` varchar(60) DEFAULT NULL,
  `Telefono` varchar(11) DEFAULT NULL,
  `Celular` varchar(11) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Direccion` varchar(60) NOT NULL,
  `TDocumento` varchar(5) DEFAULT NULL,
  `NDocumento` varchar(11) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT NULL,
  `NFactura` int(11) DEFAULT NULL,
  `IdZona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre1`, `Telefono`, `Celular`, `Correo`, `Direccion`, `TDocumento`, `NDocumento`, `FechaIngreso`, `NFactura`, `IdZona`) VALUES
(1, 'Cocacola', '1452', '415265', 'cocacola@maik.com', '', 'C.C', '51225625', '2020-04-12 08:47:50', 0, 2),
(2, 'pacho', '13243141', '47152', 'pacho@mail.com', '', 'C.C', '14152', '2020-04-12 09:11:26', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefacturas`
--

CREATE TABLE `detallefacturas` (
  `IdDFactura` int(11) NOT NULL,
  `IdFactura` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallefacturas`
--

INSERT INTO `detallefacturas` (`IdDFactura`, `IdFactura`, `IdProducto`, `Cantidad`) VALUES
(11, 7, 2, 3),
(22, 25, 1, 2),
(23, 25, 2, 3),
(46, 31, 1, 2),
(47, 31, 2, 5),
(48, 32, 1, 2),
(49, 33, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `IdFactura` int(11) NOT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`IdFactura`, `IdCliente`, `Fecha`, `IdUsuario`, `Total`) VALUES
(7, 1, '2020-04-12 12:53:47', 14, '202.00'),
(25, 2, NULL, 1, '7000.00'),
(31, 2, NULL, 1, '14000.00'),
(32, 1, NULL, 1, '4000.00'),
(33, 2, NULL, 1, '14000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `Nombre` varchar(40) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `PorceEmpresa` decimal(10,2) DEFAULT NULL,
  `PorceVendedor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `Nombre`, `Precio`, `Cantidad`, `IdCategoria`, `PorceEmpresa`, `PorceVendedor`) VALUES
(1, 'Papel', '2000.00', 50, 1, '15.00', '20.00'),
(2, 'jabon', '2000.00', 5, 1, '20.00', '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE `tusuarios` (
  `IdTUsuario` int(11) NOT NULL,
  `NombreTUsuario` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`IdTUsuario`, `NombreTUsuario`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre1` varchar(13) DEFAULT NULL,
  `Apellido1` varchar(13) DEFAULT NULL,
  `TDocumento` varchar(5) DEFAULT NULL,
  `NDocumento` varchar(13) DEFAULT NULL,
  `Celular` varchar(11) DEFAULT NULL,
  `Contrasena` varchar(60) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT NULL,
  `Ventas` int(11) DEFAULT NULL,
  `IdTUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre1`, `Apellido1`, `TDocumento`, `NDocumento`, `Celular`, `Contrasena`, `Correo`, `FechaIngreso`, `Ventas`, `IdTUsuario`) VALUES
(1, 'Diego', 'Cantero', 'T.I', '1001578274', '3016850540', 'ff9830c42660c1dd1942844f8069b74a', 'dacantero47@misena.edu.co', NULL, 0, 1),
(14, 'Andres', 'Caro', 'C.C', '252562626', '52551515', NULL, 'afcar@gmail.com', '2020-04-14 08:42:49', 0, 1),
(15, 'Diego', 'Cantero', 'T.I', '1001578274', '3016850540', 'b83a886a5c437ccd9ac15473fd6f1788', 'mail@mail.com', NULL, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `IdZona` int(11) NOT NULL,
  `NombreZona` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`IdZona`, `NombreZona`) VALUES
(1, 'Poblado'),
(2, 'Manrrique');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`),
  ADD KEY `fk_IdZona` (`IdZona`);

--
-- Indices de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD PRIMARY KEY (`IdDFactura`),
  ADD KEY `fk_IdFactura` (`IdFactura`),
  ADD KEY `fk_IdProducto` (`IdProducto`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`IdFactura`),
  ADD KEY `fk_IdCliente` (`IdCliente`),
  ADD KEY `fk_IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `fk_IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`IdTUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `fk_IdTUsuario` (`IdTUsuario`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`IdZona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  MODIFY `IdDFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `IdFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `IdTUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `IdZona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_IdZona` FOREIGN KEY (`IdZona`) REFERENCES `zonas` (`IdZona`);

--
-- Filtros para la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD CONSTRAINT `fk_IdFactura` FOREIGN KEY (`IdFactura`) REFERENCES `facturas` (`IdFactura`),
  ADD CONSTRAINT `fk_IdProducto` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_IdCliente` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`),
  ADD CONSTRAINT `fk_IdUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_IdCategoria` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_IdTUsuario` FOREIGN KEY (`IdTUsuario`) REFERENCES `tusuarios` (`IdTUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
