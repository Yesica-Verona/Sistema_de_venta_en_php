-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3309
-- Tiempo de generación: 11-02-2026 a las 05:38:06
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
-- Base de datos: `sistema_de_ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 2, 2, '2026-02-10 23:31:09', '0000-00-00 00:00:00'),
(2, 1, 7, 1, '2026-02-10 23:31:25', '0000-00-00 00:00:00'),
(3, 1, 12, 1, '2026-02-10 23:31:42', '0000-00-00 00:00:00'),
(4, 1, 15, 2, '2026-02-10 23:32:25', '0000-00-00 00:00:00'),
(5, 2, 4, 1, '2026-02-10 23:34:39', '0000-00-00 00:00:00'),
(6, 2, 1, 5, '2026-02-10 23:35:01', '0000-00-00 00:00:00'),
(7, 2, 5, 1, '2026-02-10 23:35:19', '0000-00-00 00:00:00'),
(8, 2, 10, 1, '2026-02-10 23:35:36', '0000-00-00 00:00:00'),
(9, 3, 5, 3, '2026-02-10 23:36:24', '0000-00-00 00:00:00'),
(10, 3, 2, 1, '2026-02-10 23:36:34', '0000-00-00 00:00:00'),
(11, 3, 13, 1, '2026-02-10 23:37:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'PERROS', '2026-02-10 19:08:50', '0000-00-00 00:00:00'),
(2, 'GATOS', '2026-02-10 19:09:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `nit_di_cliente` varchar(255) NOT NULL,
  `celular_cliente` varchar(50) NOT NULL,
  `correo_cliente` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `nit_di_cliente`, `celular_cliente`, `correo_cliente`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Wilmer Jaramillo', '26083833', '3239057689', 'jaramillowilmer@gmail.com', '2026-02-10 23:10:55', '0000-00-00 00:00:00'),
(2, 'Maria Sepulveda', '11105095', '3108223894', 'mariasepulveda@gmail.com', '2026-02-10 23:11:32', '0000-00-00 00:00:00'),
(3, 'Andrés Rendón', '1067282775', '3208936642', 'andresrendon@gmail.com', '2026-02-10 23:12:47', '0000-00-00 00:00:00'),
(4, 'Carol Juliana Guerra', '1003360515', '3015452657', 'caroljguerra@gmail.com', '2026-02-10 23:14:40', '0000-00-00 00:00:00'),
(5, 'Felipe Arias Paez', '50428913', '3008462274', 'felipeariasp@gmail.com', '2026-02-10 23:16:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `numero_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_compra` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_producto`, `numero_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 4, 1, '2025-12-01', 3, 'factura-1', 10, '3960000', 110, '2026-02-10 23:19:45', '0000-00-00 00:00:00'),
(2, 1, 2, '2025-12-01', 2, 'factura-2', 10, '360000', 80, '2026-02-10 23:21:58', '0000-00-00 00:00:00'),
(3, 15, 3, '2025-12-01', 4, 'factura_3', 10, '1400000', 50, '2026-02-10 23:27:23', '0000-00-00 00:00:00'),
(4, 6, 4, '2025-12-01', 1, 'factura_4', 10, '3045000', 105, '2026-02-10 23:29:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `precio_venta` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fyh_registro` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`, `id_categoria`, `fyh_registro`, `fyh_actualizacion`) VALUES
(1, 'P-00001', 'Atún Royal Canin Gatos', 'Sabor a pollo 220 gr', 75, 10, 100, '4500', '6200', '2025-11-04', '2026-02-10-07-14-03__royal-lata.jpg', 6, 2, '2026-02-10 19:14:03', '2026-02-10 19:27:33'),
(2, 'P-00002', 'Alimento Agility Gold Perros Adultos', 'Para perros adultos 6 kg', 87, 10, 100, '27000', '33500', '2025-11-04', '2026-02-10-07-19-13__agility-1.jpg', 10, 1, '2026-02-10 19:19:13', '2026-02-10 23:22:21'),
(3, 'P-00003', 'Alimento Brocat Gatos', 'para gatos adultos 5 kg', 0, 10, 100, '23000', '27800', '2025-11-04', '2026-02-10-07-22-09__brocat-1.jpg', 10, 2, '2026-02-10 19:22:09', '2026-02-10 19:26:50'),
(4, 'P-00004', 'Alimento Max Adulto Perros', '8 kilogramos', 99, 10, 100, '36000', '45000', '2025-11-04', '2026-02-10-07-26-33__maxperros-1.jpg', 10, 1, '2026-02-10 19:26:33', '0000-00-00 00:00:00'),
(5, 'P-00005', 'Atún Choice Gatos', 'Sabor a pollo 240 gr', 36, 10, 100, '4700', '7400', '2025-11-04', '2026-02-10-07-30-26__choice-lata-1.jpg', 10, 2, '2026-02-10 19:30:26', '2026-02-10 23:24:03'),
(6, 'P-00006', 'Alimento Max Gatos ', '6 kg', 105, 10, 100, '29000', '36000', '2025-11-04', '2026-02-10-07-32-27__maxcat-1.jpg', 10, 2, '2026-02-10 19:32:27', '2026-02-10 19:39:01'),
(7, 'P-00007', 'Tabletas Nex Gard ', 'tabletas masticables con sabor a carne 66 gr', 19, 10, 100, '14000', '17600', '2025-11-04', '2026-02-10-07-34-44__nexgard-1.jpg', 10, 1, '2026-02-10 19:34:44', '2026-02-10 23:22:38'),
(8, 'P-00008', 'Royal Canin Dachshund', '6 kg', 100, 10, 100, '31000', '37300', '2025-11-04', '2026-02-10-07-36-49__dachshund-1.jpg', 10, 1, '2026-02-10 19:36:49', '2026-02-10 23:22:55'),
(9, 'P-00009', 'Royal Canin Gatos Feline ', '4.5 kg', 25, 10, 100, '25000', '28000', '2025-11-04', '2026-02-10-07-38-47__royal-feline-1.jpg', 10, 2, '2026-02-10 19:38:47', '2026-02-10 23:24:39'),
(10, 'P-00010', 'Atrapa bolas', 'de tres pisos, y cuatro colores', 14, 10, 100, '54000', '69000', '2025-11-04', '2026-02-10-10-44-03__atrapa-bolas-1.jpg', 10, 2, '2026-02-10 22:44:03', '2026-02-10 23:24:53'),
(11, 'P-00011', 'Alimento Equilibrio para gatos', '750 gr', 20, 10, 100, '13500', '17000', '2025-11-04', '2026-02-10-10-45-59__equilibrio-1.jpg', 10, 2, '2026-02-10 22:45:59', '2026-02-10 23:25:12'),
(12, 'P-00012', 'Juquete frisby', 'para diversión ', 7, 10, 100, '8400', '12000', '2025-11-04', '2026-02-10-10-47-57__frisbee.jpg', 10, 1, '2026-02-10 22:47:57', '2026-02-10 23:23:11'),
(13, 'P-00013', 'Juguete Hueso para perros', 'Medidas 30 cm de largo, 8cm de ancho', 14, 10, 100, '9300', '13400', '2025-11-04', '2026-02-10-10-50-44__hueso.jpg', 10, 1, '2026-02-10 22:50:44', '2026-02-10 23:23:29'),
(14, 'P-00014', 'Juguete de Ratones para gatos', 'Divierte tu gato', 4, 10, 100, '5700', '10800', '2025-11-04', '2026-02-10-10-52-55__juguete-raton.jpg', 10, 2, '2026-02-10 22:52:55', '2026-02-10 23:25:31'),
(15, 'P-00015', 'Alimento Chunky para cachorros', 'para los más jóvenes. 5 kg', 48, 10, 100, '28000', '32000', '2025-11-04', '2026-02-10-10-54-59__chunky.jpg', 10, 1, '2026-02-10 22:54:59', '0000-00-00 00:00:00'),
(16, 'P-00016', 'Croquetas churu', 'Croquetas sabor a jamón', 0, 10, 100, '6900', '9000', '2025-11-04', '2026-02-10-10-56-59__churu-1.jpg', 10, 2, '2026-02-10 22:56:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `celular` varchar(25) NOT NULL,
  `telefono_empresa` varchar(25) DEFAULT NULL,
  `empresa` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono_empresa`, `empresa`, `email`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'JEAN QUINTERO', '3047369002', '3115657398', 'PUPPIS', 'puppis@gmail.com', 'Bogotá D.C.', '2026-02-10 22:59:46', '0000-00-00 00:00:00'),
(2, 'MARIA VASQUEZ', '3007374412', '3147883355', 'LAIKA', 'laika@gmail.com', 'Barranquilla, Atlántico', '2026-02-10 23:01:00', '0000-00-00 00:00:00'),
(3, 'CAROLINA REYES', '3234105932', '3150018226', 'PremieRpet', 'premierpet@gmail.com', 'Medellín, Antioquia', '2026-02-10 23:06:44', '0000-00-00 00:00:00'),
(4, 'JESUS RIVEROS', '3014789001', '3023948721', 'NutrePets', 'nutrepets@gamil.com', 'Calli, Valle del cauca', '2026-02-10 23:10:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(250) NOT NULL,
  `f_h_creacion` datetime NOT NULL,
  `f_h_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `f_h_creacion`, `f_h_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2025-09-20 00:36:53', '2025-09-20 21:43:14'),
(2, 'VENDEDOR', '2025-09-20 14:07:26', '2025-09-20 16:08:44'),
(3, 'BODEGUERO', '2025-09-20 22:53:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password_usuario` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `f_h_creacion` datetime NOT NULL,
  `f_h_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombres`, `email`, `password_usuario`, `token`, `id_rol`, `f_h_creacion`, `f_h_actualizacion`) VALUES
(6, 'VELKYS VANESA', 'vaneverona2002@gmail.com', '$2y$10$1vh66BKHxpjyuvQL6NjS1u8uwbEsyGdv02i2Djp/PTR3x6rfZ1sL6', '', 1, '2025-11-11 15:06:23', '2026-02-04 14:39:14'),
(10, 'YESICA VERONA', 'yesicaveronatejada@gmail.com', '$2y$10$5nxfBCW8dVhMaRhhLZirzeFTuD1AJoQkdze2vRGe4F5.UU9giZsdq', '', 1, '2026-02-10 19:03:22', '0000-00-00 00:00:00'),
(11, 'JUAN CARRASCAL', 'juancarrascal23@gmail.com', '$2y$10$Qj2MMQd6dzPCTtcy.AqjJO1r9OD/AenEmnZfGFf/2RGnReEwZVDRS', '', 2, '2026-02-10 19:05:28', '0000-00-00 00:00:00'),
(12, 'IVAN VERONA', 'ivanverona17@gmail.com', '$2y$10$2q5qXKonADbV.BYck3RpmOMoXYIPKXj/1IMjbkambqGsXiTjZx/um', '', 3, '2026-02-10 19:06:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `ruta_factura` text NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `nro_venta`, `id_cliente`, `id_usuario`, `valor_total`, `ruta_factura`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 1, 10, 160600, 'ventas/facturas/Factura_1.pdf', '2026-02-10 23:33:09', '0000-00-00 00:00:00'),
(2, 2, 4, 10, 152400, 'ventas/facturas/Factura_2.pdf', '2026-02-10 23:35:55', '0000-00-00 00:00:00'),
(3, 3, 5, 10, 69100, 'ventas/facturas/Factura_3.pdf', '2026-02-10 23:37:16', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_venta` (`nro_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `nro_venta` (`nro_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`nro_venta`) REFERENCES `carrito` (`nro_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
