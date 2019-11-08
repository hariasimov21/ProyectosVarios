-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2019 a las 05:08:17
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vwaiter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `billetera`
--

CREATE TABLE `billetera` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `billetera`
--

INSERT INTO `billetera` (`id`, `usuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 9),
(9, 10),
(10, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `billeteradetalle`
--

CREATE TABLE `billeteradetalle` (
  `id` int(11) NOT NULL,
  `billetera` int(11) NOT NULL,
  `numerotargeta` varchar(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `dinero` int(11) NOT NULL DEFAULT '2000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `billeteradetalle`
--

INSERT INTO `billeteradetalle` (`id`, `billetera`, `numerotargeta`, `cvv`, `dinero`) VALUES
(1, 1, '6155247490533921', 983, 23321),
(2, 2, '1887587142382050', 772, 200520),
(3, 3, '4595809639046830', 532, 2000),
(4, 4, '5475856443351234', 521, 2000),
(5, 5, '9076633115663264', 229, 2000),
(6, 7, '392313505791711', 824, 2000),
(7, 9, '8751467398659255', 773, 2000),
(8, 10, '5364816106446705', 408, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'Bebidas'),
(2, 'Platos'),
(3, 'Combos'),
(4, 'Postres'),
(5, 'Ensaladas'),
(6, 'Almuerzos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id` int(11) NOT NULL,
  `disponibilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `detalle` varchar(300) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipopago` varchar(16) NOT NULL DEFAULT 'Billetera',
  `total` int(11) NOT NULL,
  `estado` varchar(25) NOT NULL DEFAULT 'Orden en Espera',
  `revocar` tinyint(4) NOT NULL DEFAULT '0',
  `mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `usuario`, `direccion`, `detalle`, `fecha`, `tipopago`, `total`, `estado`, `revocar`, `mesa`) VALUES
(1, 2, 'Address 2', 'Sample Description 1', '2017-03-28 17:32:41', 'Wallet', 150, 'En Espera', 0, 1),
(2, 2, 'New address 2', '', '2017-03-28 17:43:05', 'Wallet', 130, 'Cancelada', 1, 1),
(3, 3, 'Address 3', 'Sample Description 2', '2017-03-28 19:49:33', 'Billetera', 130, 'Orden lista y en espera', 0, 1),
(4, 3, 'Address 3', '', '2017-03-28 19:52:01', 'Cash On Delivery', 130, 'Orden no Tomada', 1, 1),
(5, 3, 'New Address 3', '', '2017-03-28 20:47:28', 'Wallet', 285, 'Orden Cancelada', 0, 1),
(6, 3, 'New Address 3', '', '2017-03-30 00:43:31', 'Wallet', 325, 'Pagada y Entregada', 1, 1),
(7, 2, 'Address 2', 'none', '2019-03-29 15:53:33', 'En Efectivo', 0, 'Orden en Espera', 0, 1),
(8, 11, 'hhhhhh', '', '2019-03-31 13:35:08', 'En Efectivo', 2333556, 'Orden Cancelada', 0, 1),
(9, 11, 'fffffffffff', '', '2019-03-31 14:11:28', 'En Efectivo', 1555554, 'Cancelada', 1, 1),
(10, 11, 'ddddddddddd', 'd', '2019-03-31 17:56:37', 'En Efectivo', 1739, 'Orden en Espera', 0, 1),
(11, 2, 'Address 2', '11111111111111111111111111111111', '2019-03-31 19:55:55', 'Billetera', 862, 'Orden en Espera', 0, 1),
(12, 2, 'Address 2', '', '2019-03-31 20:23:33', 'En Efectivo', 4000, 'Orden en Espera', 0, 1),
(13, 2, 'Address 2', '', '2019-03-31 20:32:40', 'En Efectivo', 2000, 'Orden en Espera', 0, 1),
(14, 2, 'Address 2', '', '2019-04-01 18:20:30', 'En Efectivo', 4500, 'Orden en Espera', 0, 1),
(15, 2, 'Address 2', '', '2019-04-01 18:23:01', 'En Efectivo', 2000, 'Orden en Espera', 0, 1),
(16, 2, 'Address 2', '', '2019-04-01 18:35:35', 'En Efectivo', 2000, 'Orden en Espera', 0, 1),
(17, 2, 'Address 2', '', '2019-04-01 18:55:26', 'En Efectivo', 7000, 'Orden en Espera', 0, 1),
(18, 2, 'Address 2', '', '2019-04-01 21:43:01', 'En Efectivo', 18000, 'Orden en Espera', 0, 1),
(19, 2, 'Address 2', '', '2019-04-01 22:27:12', 'En Efectivo', 1000, 'Orden en Espera', 0, 1),
(20, 2, 'Address 2', '', '2019-04-01 23:40:03', 'En Efectivo', 30, 'Orden en Espera', 0, 1),
(21, 2, 'Address 2', '', '2019-04-01 23:45:51', 'Billetera', 10, 'Orden en Espera', 0, 1),
(22, 2, 'Address 2', '', '2019-04-02 09:20:52', 'En Efectivo', 360, 'Orden en Espera', 0, 1),
(23, 2, 'Address 2', '', '2019-04-02 10:47:17', 'En Efectivo', 200, 'Orden en Espera', 0, 1),
(24, 2, 'Address 2', '', '2019-04-02 11:01:44', 'Efectivo', 40, 'Orden en Espera', 0, 1),
(25, 2, 'Address 2', '', '2019-04-02 11:07:38', 'Efectivo', 50, 'Orden en Espera', 0, 1),
(26, 2, 'Address 2', '', '2019-04-07 09:52:59', '', 40, 'Orden en Espera', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendetalle`
--

CREATE TABLE `ordendetalle` (
  `id` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordendetalle`
--

INSERT INTO `ordendetalle` (`id`, `orden`, `producto`, `cantidad`, `precio`) VALUES
(1, 1, 2, 2, 90),
(2, 1, 3, 3, 60),
(3, 2, 2, 2, 90),
(4, 2, 3, 2, 40),
(5, 3, 2, 2, 90),
(6, 3, 3, 2, 40),
(7, 4, 2, 2, 90),
(8, 4, 3, 2, 40),
(9, 5, 2, 5, 225),
(10, 5, 3, 2, 40),
(11, 5, 5, 1, 20),
(12, 6, 2, 5, 225),
(13, 6, 3, 3, 60),
(14, 6, 5, 2, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `disponibilidad` tinyint(4) NOT NULL DEFAULT '0',
  `imagen` varchar(80) NOT NULL DEFAULT 'https://sevenpartschevrolet.com/wp-content/uploads/2019/01/sin_imagen.png',
  `descripcion` varchar(40) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `disponibilidad`, `imagen`, `descripcion`, `categoria`) VALUES
(1, 'Coca-Cola 2ltSSa', 2000, 0, 'https://www.superama.com.mx/Content/images/products/img_large/0750105530292L.jpg', 'Ideal para compartir en familia', 1),
(2, 'Fanta 600ml', 10221, 0, 'https://www.superama.com.mx/Content/images/products/img_large/0750105530377L.jpg', 'Ideal para compartir en familia', 1),
(3, 'Sprite 3lt', 30, 0, 'https://super.walmart.com.mx/images/product-images/img_large/00750105530480L.jpg', 'Esta wenazaa', 1),
(4, 'Completo palta/mayo', 1500, 0, 'http://media.biobiochile.cl/wp-content/uploads/2012/05/7216922788_33190e9a95.jpg', 'Completo,palta,mayonesa,tomate y salchic', 1),
(5, 'Hamburguesa + Papas Medianas', 30, 0, 'https://www.foodhall.cl/wp-content/uploads/2017/01/lomitochacarero.png', '', 1),
(6, 'Ensalada', 2147483647, 0, '', '', 1),
(7, 'Pastel Chocolate', 2147483647, 0, '', '', 1),
(8, '22222222222222233', 1, 0, '', '', 1),
(9, '11', 22, 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencia`
--

CREATE TABLE `sugerencia` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` varchar(3000) NOT NULL,
  `estado` varchar(8) NOT NULL DEFAULT 'Abierto',
  `tipo` varchar(30) NOT NULL DEFAULT 'Others',
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disponibilidad` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sugerencia`
--

INSERT INTO `sugerencia` (`id`, `usuario`, `asunto`, `descripcion`, `estado`, `tipo`, `fecha`, `disponibilidad`) VALUES
(1, 2, 'Subject 1', 'New Description for Subject 1', 'Cerrada', 'Reclamos', '2017-03-30 18:08:51', 1),
(2, 11, 'Solicitar Verificacion', 'Porfa', 'Cerrada', 'Solicitudes Verificacion', '2019-03-31 15:31:48', 0),
(3, 11, 'Pura mierda esta wea', 'asi nomas po', 'Abierto', 'Reclamos', '2019-03-31 15:33:07', 0),
(4, 11, 'iuuu', '8uuu', 'Abierto', 'Sugerencias', '2019-03-31 15:50:55', 0),
(5, 2, 'h', 'hhh', 'Cerrada', 'Reclamos', '2019-04-01 10:29:21', 0),
(6, 2, 'hy', 'ffhhhhhhhhhhhhhhhhhhh', 'Abierto', 'Errores Web', '2019-04-01 10:31:01', 0),
(7, 2, '111', '11', 'Cerrada', 'Reclamos', '2019-04-08 18:44:38', 0),
(8, 2, 'jjjjjjjjjjj', 'jjjjjjjjjjjj', 'Abierto', 'Reclamos', '2019-04-08 18:51:09', 0),
(9, 2, 'jjjjjjjjjj', '77777777777', 'Abierta', 'Errores Web', '2019-04-08 18:51:41', 0),
(10, 2, 'jjjj777', '878687687687687', 'Abierto', 'Solicitudes Verificacion', '2019-04-08 18:52:43', 0),
(11, 2, 'WWAAAA', 'SSSS', 'Abierta', 'Solicitudes Verificacion', '2019-04-08 21:08:31', 0),
(12, 2, 'Jaime es un miserable indeseable', 'Que no tiene nombre', 'Abierto', 'Reclamos', '2019-04-08 21:09:40', 0),
(13, 2, 'Mal hecha la wea', 'se paso', 'Abierta', 'Errores Web', '2019-04-09 12:40:25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerenciadetalle`
--

CREATE TABLE `sugerenciadetalle` (
  `id` int(11) NOT NULL,
  `sugerencia` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sugerenciadetalle`
--

INSERT INTO `sugerenciadetalle` (`id`, `sugerencia`, `usuario`, `descripcion`, `fecha`) VALUES
(1, 1, 2, 'New Description for Subject 1', '2017-03-30 18:08:51'),
(2, 1, 2, 'Reply-1 for Subject 1', '2017-03-30 19:59:09'),
(3, 1, 1, 'Reply-2 for Subject 1 from Administrator.', '2017-03-30 20:35:39'),
(4, 1, 1, 'Reply-3 for Subject 1 from Administrator.', '2017-03-30 20:49:35'),
(5, 1, 1, 'HoliUsuarioUsuarioUsuarioUsuario', '2019-03-25 16:51:00'),
(6, 2, 11, 'Porfa', '2019-03-31 15:31:48'),
(7, 3, 11, 'asi nomas po', '2019-03-31 15:33:07'),
(8, 4, 11, '8uuu', '2019-03-31 15:50:55'),
(9, 2, 11, 'ddd', '2019-03-31 17:04:44'),
(10, 5, 2, 'hhh', '2019-04-01 10:29:21'),
(11, 6, 2, 'ffhhhhhhhhhhhhhhhhhhh', '2019-04-01 10:31:01'),
(12, 1, 1, 'ddddd', '2019-04-01 12:35:40'),
(13, 1, 1, 'dddeeee', '2019-04-01 12:41:09'),
(14, 2, 1, 'ewfewf', '2019-04-01 12:48:01'),
(15, 2, 1, 'rrrrf', '2019-04-01 13:09:28'),
(16, 2, 1, 'sdasdas', '2019-04-01 13:19:41'),
(17, 2, 1, 'sdasds', '2019-04-01 13:21:09'),
(18, 2, 1, 'sadasdasd', '2019-04-01 13:21:15'),
(19, 2, 1, 'jhhhh', '2019-04-01 13:33:32'),
(20, 2, 1, 'guachos', '2019-04-01 13:33:40'),
(21, 1, 1, 'jjjjj', '2019-04-01 14:15:49'),
(22, 1, 1, 'asds', '2019-04-03 14:18:14'),
(23, 1, 1, 's', '2019-04-03 15:16:21'),
(24, 1, 1, 'HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', '2019-04-03 17:58:18'),
(25, 7, 2, '11', '2019-04-08 18:44:38'),
(26, 8, 2, 'jjjjjjjjjjjj', '2019-04-08 18:51:09'),
(27, 9, 2, '77777777777', '2019-04-08 18:51:41'),
(28, 10, 2, '878687687687687', '2019-04-08 18:52:43'),
(29, 9, 1, 'hh', '2019-04-08 19:44:01'),
(30, 5, 2, 'kkk', '2019-04-08 19:46:06'),
(31, 5, 2, 'sss', '2019-04-08 20:21:27'),
(32, 5, 1, 'ssss', '2019-04-08 20:21:44'),
(33, 5, 1, 'edede', '2019-04-08 20:22:26'),
(34, 5, 1, 'ss', '2019-04-08 20:22:44'),
(35, 7, 2, 'ss', '2019-04-08 20:26:48'),
(36, 7, 1, 'sss', '2019-04-08 20:31:10'),
(37, 7, 2, '2222', '2019-04-08 21:01:33'),
(38, 7, 2, '222', '2019-04-08 21:04:01'),
(39, 7, 1, 'wena washo', '2019-04-08 21:06:58'),
(40, 11, 2, 'SSSS', '2019-04-08 21:08:31'),
(41, 11, 2, 'wENA QLIO', '2019-04-08 21:08:42'),
(42, 12, 2, 'Que no tiene nombre', '2019-04-08 21:09:40'),
(43, 12, 1, 'Sin honor', '2019-04-08 21:37:23'),
(44, 13, 2, 'se paso', '2019-04-09 12:40:25'),
(45, 13, 2, 'jaja', '2019-04-09 12:40:35'),
(46, 11, 1, 'hola', '2019-04-09 18:53:12'),
(47, 12, 2, 'putito', '2019-04-09 20:29:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL DEFAULT 'Usuario',
  `nombre` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contrasena` varchar(16) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `direccion` varchar(300) DEFAULT NULL,
  `contacto` bigint(11) NOT NULL,
  `verificado` tinyint(1) NOT NULL DEFAULT '0',
  `estadocuenta` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `tipo`, `nombre`, `usuario`, `contrasena`, `email`, `direccion`, `contacto`, `verificado`, `estadocuenta`) VALUES
(1, 'Administrador', 'David M.', 'David', 'root', '', 'Miraflores 18', 9898000000, 0, 0),
(2, 'Usuario', 'Juancho', 'user1', 'pass1', 'mail2@example.com', 'Address 2', 9898000001, 1, 0),
(3, 'Usuario', 'Customer 2', 'user2', 'pass2', 'mail3@example.com', 'Address 3', 9898000002, 1, 0),
(4, 'Administrador', 'Customer 3', 'user3', 'pass3', '', '', 9898000003, 0, 0),
(5, 'Usuario', 'Customer 4', 'user4', 'pass4', '', '', 9898000004, 0, 1),
(6, 'Usuario', 'yyyy', 'JUAN.MANSI', 'uuuu', '6666', '5555', 555, 0, 1),
(7, 'Usuario', 'Juanito', 'Juancho', 'juanito1', NULL, NULL, 99999999, 0, 0),
(8, 'Administrador', '88888888888888', '8888888888', '8888888888888', '888888888@888.vl', '777777777', 777777777, 1, 0),
(9, 'Usuario', '7777777777777', '7777777777', '66666666666666', NULL, NULL, 666666666666, 0, 0),
(10, 'Usuario', '7777777', 'hhgy77', '777yhhg', NULL, NULL, 77777, 0, 0),
(11, 'Usuario', 'Juanito', 'Juan646', 'juan123', NULL, NULL, 2222, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `billetera`
--
ALTER TABLE `billetera`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`usuario`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `billeteradetalle`
--
ALTER TABLE `billeteradetalle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallet_id` (`billetera`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `customer_id` (`usuario`),
  ADD KEY `mesa` (`mesa`),
  ADD KEY `mesa_2` (`mesa`);

--
-- Indices de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `item_id` (`producto`),
  ADD KEY `order_id` (`orden`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`nombre`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster_id` (`usuario`);

--
-- Indices de la tabla `sugerenciadetalle`
--
ALTER TABLE `sugerenciadetalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`sugerencia`),
  ADD KEY `user_id` (`usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`usuario`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `billetera`
--
ALTER TABLE `billetera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `billeteradetalle`
--
ALTER TABLE `billeteradetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sugerenciadetalle`
--
ALTER TABLE `sugerenciadetalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `billetera`
--
ALTER TABLE `billetera`
  ADD CONSTRAINT `billetera_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `billeteradetalle`
--
ALTER TABLE `billeteradetalle`
  ADD CONSTRAINT `billeteradetalle_ibfk_1` FOREIGN KEY (`billetera`) REFERENCES `billetera` (`id`);

--
-- Filtros para la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `orden` (`mesa`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `ordendetalle_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ordendetalle_ibfk_2` FOREIGN KEY (`orden`) REFERENCES `orden` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD CONSTRAINT `sugerencia_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `sugerenciadetalle`
--
ALTER TABLE `sugerenciadetalle`
  ADD CONSTRAINT `sugerenciadetalle_ibfk_1` FOREIGN KEY (`sugerencia`) REFERENCES `sugerencia` (`id`),
  ADD CONSTRAINT `sugerenciadetalle_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
