-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2024 a las 20:43:21
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vitalclinic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id_account`, `id_empleado`, `username`, `password`, `role_id`) VALUES
(1, 1, 'mvblanco', '26532066', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `art` bigint(20) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`) VALUES
(1, 'Manuel', 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_existencia_lotes_productos`
--

CREATE TABLE `entrada_existencia_lotes_productos` (
  `id` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_accounts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fallas`
--

CREATE TABLE `fallas` (
  `id` bigint(20) NOT NULL,
  `numero_pedido` varchar(100) NOT NULL,
  `despachador` int(11) NOT NULL,
  `rechequeador` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id` int(11) NOT NULL,
  `descripcion_lote` text NOT NULL,
  `art` bigint(20) NOT NULL,
  `fecha_venc` date NOT NULL,
  `existencia_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_fallas`
--

CREATE TABLE `motivo_fallas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` bigint(20) NOT NULL,
  `numero_pedido` varchar(100) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `despachador` int(11) NOT NULL,
  `rechequeador` int(11) DEFAULT NULL,
  `embalador` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `cantidad_unidades` int(11) NOT NULL,
  `distribuidor_pedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `accion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `accion`) VALUES
(5, 'consultar_pedido'),
(12, 'eliminar_fallas_pedido'),
(4, 'eliminar_pedido'),
(13, 'enlazar_pedido_como_rechequeador'),
(3, 'modificar_pedido'),
(18, 'pedidos_por_despachador'),
(17, 'pedidos_por_fecha'),
(7, 'registar_lote'),
(15, 'registar_ruta'),
(6, 'registrar_articulo'),
(14, 'registrar_cuenta_sistema'),
(2, 'registrar_empleado'),
(8, 'registrar_entrada_articulo'),
(11, 'registrar_fallas_pedido'),
(1, 'registrar_pedido'),
(9, 'registrar_salida_articulo'),
(10, 'registrar_salida_excepcional_articulos'),
(16, 'visualizar_estadisticas'),
(19, 'visualizar_estadisticas_fallas_despachador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'super'),
(2, 'supervisor_almacen'),
(3, 'supervisor_inventario'),
(4, 'rechequeador'),
(5, 'inventario'),
(6, 'entrega_pedidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_privilegios`
--

CREATE TABLE `roles_privilegios` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles_privilegios`
--

INSERT INTO `roles_privilegios` (`id`, `id_role`, `id_privilegio`) VALUES
(1, 3, 14),
(2, 3, 9),
(3, 3, 10),
(4, 3, 7),
(5, 3, 8),
(6, 3, 6),
(7, 5, 6),
(8, 5, 7),
(9, 5, 8),
(10, 5, 9),
(11, 6, 2),
(12, 6, 1),
(13, 6, 3),
(14, 6, 4),
(15, 6, 5),
(16, 4, 13),
(17, 4, 11),
(18, 4, 12),
(19, 2, 14),
(20, 2, 15),
(21, 2, 16),
(22, 2, 17),
(25, 2, 2),
(26, 2, 18),
(27, 2, 19),
(28, 1, 1),
(29, 1, 2),
(30, 1, 3),
(31, 1, 4),
(32, 1, 5),
(33, 1, 6),
(34, 1, 7),
(35, 1, 8),
(36, 1, 9),
(37, 1, 10),
(38, 1, 11),
(39, 1, 12),
(40, 1, 13),
(41, 1, 14),
(42, 1, 15),
(43, 1, 17),
(44, 1, 18),
(45, 1, 19),
(46, 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_excepcional_articulos`
--

CREATE TABLE `salida_excepcional_articulos` (
  `id` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `id_accounts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_existencia_lotes_productos`
--

CREATE TABLE `salida_existencia_lotes_productos` (
  `id` int(11) NOT NULL,
  `id_lote` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_accounts` int(11) NOT NULL,
  `pasillero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`art`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entrada_existencia_lotes_productos`
--
ALTER TABLE `entrada_existencia_lotes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`),
  ADD KEY `id_accounts` (`id_accounts`);

--
-- Indices de la tabla `fallas`
--
ALTER TABLE `fallas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `despachador` (`despachador`),
  ADD KEY `recahequeador` (`rechequeador`),
  ADD KEY `motivo` (`motivo`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `art` (`art`);

--
-- Indices de la tabla `motivo_fallas`
--
ALTER TABLE `motivo_fallas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD UNIQUE KEY `numero_pedido` (`numero_pedido`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `despachador` (`despachador`),
  ADD KEY `rechequeador` (`rechequeador`),
  ADD KEY `embalador` (`embalador`),
  ADD KEY `distribuidor_pedidos` (`distribuidor_pedidos`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accion` (`accion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_privilegios`
--
ALTER TABLE `roles_privilegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_priveilegio` (`id_privilegio`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salida_excepcional_articulos`
--
ALTER TABLE `salida_excepcional_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`),
  ADD KEY `id_accounts` (`id_accounts`);

--
-- Indices de la tabla `salida_existencia_lotes_productos`
--
ALTER TABLE `salida_existencia_lotes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lote` (`id_lote`),
  ADD KEY `id_accounts` (`id_accounts`),
  ADD KEY `pasillero` (`pasillero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `art` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entrada_existencia_lotes_productos`
--
ALTER TABLE `entrada_existencia_lotes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fallas`
--
ALTER TABLE `fallas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motivo_fallas`
--
ALTER TABLE `motivo_fallas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles_privilegios`
--
ALTER TABLE `roles_privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salida_excepcional_articulos`
--
ALTER TABLE `salida_excepcional_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salida_existencia_lotes_productos`
--
ALTER TABLE `salida_existencia_lotes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `entrada_existencia_lotes_productos`
--
ALTER TABLE `entrada_existencia_lotes_productos`
  ADD CONSTRAINT `entrada_existencia_lotes_productos_ibfk_1` FOREIGN KEY (`id_accounts`) REFERENCES `accounts` (`id_account`),
  ADD CONSTRAINT `entrada_existencia_lotes_productos_ibfk_2` FOREIGN KEY (`id_lote`) REFERENCES `lotes` (`id`);

--
-- Filtros para la tabla `fallas`
--
ALTER TABLE `fallas`
  ADD CONSTRAINT `fallas_ibfk_1` FOREIGN KEY (`motivo`) REFERENCES `motivo_fallas` (`id`),
  ADD CONSTRAINT `fallas_ibfk_2` FOREIGN KEY (`rechequeador`) REFERENCES `accounts` (`id_account`),
  ADD CONSTRAINT `fallas_ibfk_3` FOREIGN KEY (`despachador`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `lotes_ibfk_1` FOREIGN KEY (`art`) REFERENCES `articulos` (`art`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `rutas` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`despachador`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`rechequeador`) REFERENCES `accounts` (`id_account`),
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`embalador`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_5` FOREIGN KEY (`distribuidor_pedidos`) REFERENCES `accounts` (`id_account`);

--
-- Filtros para la tabla `roles_privilegios`
--
ALTER TABLE `roles_privilegios`
  ADD CONSTRAINT `roles_privilegios_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `roles_privilegios_ibfk_2` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegios` (`id`);

--
-- Filtros para la tabla `salida_excepcional_articulos`
--
ALTER TABLE `salida_excepcional_articulos`
  ADD CONSTRAINT `salida_excepcional_articulos_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `lotes` (`id`);

--
-- Filtros para la tabla `salida_existencia_lotes_productos`
--
ALTER TABLE `salida_existencia_lotes_productos`
  ADD CONSTRAINT `salida_existencia_lotes_productos_ibfk_1` FOREIGN KEY (`id_accounts`) REFERENCES `accounts` (`id_account`),
  ADD CONSTRAINT `salida_existencia_lotes_productos_ibfk_2` FOREIGN KEY (`id_lote`) REFERENCES `lotes` (`id`),
  ADD CONSTRAINT `salida_existencia_lotes_productos_ibfk_3` FOREIGN KEY (`pasillero`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
