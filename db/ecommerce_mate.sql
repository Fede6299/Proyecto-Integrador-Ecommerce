-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2024 a las 17:29:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce_mate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_user`
--

CREATE TABLE `admin_user` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin_user`
--

INSERT INTO `admin_user` (`id_admin`, `nombre`, `user_name`, `apellido`, `password`, `email`, `activo`, `updated_at`, `created_at`) VALUES
(2, 'marcos', 'mbenegas', 'Benegas', '$2y$12$ijB2O2ILfTR1mAOMSaUnguhfn/Dsa02MLuqBt1mQZ29CLO247VL1.', 'correo@correo.com', NULL, '2024-12-18 04:20:24', '2024-12-18 04:20:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Mate'),
(2, 'Mates de Acero'),
(3, 'Yerbera y azucarera'),
(4, 'Bombillas de Acero'),
(5, 'Set Materos'),
(6, 'Botellas Plásticas'),
(7, 'Bombillas de Alpaca'),
(8, 'Bombillas de Acero'),
(9, 'Latas'),
(10, 'Acesorio'),
(11, 'Vaso Térmico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `id_destacados` int(11) NOT NULL,
  `id_prodDest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destacados`
--

INSERT INTO `destacados` (`id_destacados`, `id_prodDest`) VALUES
(3, 4),
(14, 5),
(11, 38),
(12, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombrelink`
--

CREATE TABLE `nombrelink` (
  `id_link` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_Link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nombrelink`
--

INSERT INTO `nombrelink` (`id_link`, `id_producto`, `nombre_Link`) VALUES
(1, 1, 'mate-acero-termico'),
(3, 3, 'mate-de-ceramica-artesanal'),
(4, 4, 'mate-de-madera-tallada-con-bombilla-incluida'),
(5, 27, 'mate-de-algarrobo'),
(6, 28, 'mate-de-ceramico'),
(7, 29, 'mate-urbano'),
(16, 38, 'set-de-latas'),
(17, 39, 'set-de-latas-con-mate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_mate` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `eliminado` tinyint(4) NOT NULL,
  `precio` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `imgUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_mate`, `cantidad`, `descripcion`, `estado`, `eliminado`, `precio`, `created_at`, `updated_at`, `imgUrl`) VALUES
(1, 3, 'Mate Acero Térmico', 1, 0, 50000, '0000-00-00 00:00:00', '2024-12-25 21:02:50', 'img/1735160570_28.png'),
(2, 1, 'Mate Acero Térmico – MATERO MARWAL XL', 1, 0, 5500, '0000-00-00 00:00:00', '2024-12-25 21:03:04', 'img/1735160584_38.jpg'),
(3, 50, 'Mate de cerámica artesanal', 1, 1, 350, '2024-12-01 00:00:00', '2024-12-23 15:26:03', 'https://ecommerce.com/img/mate-ceramica.jpg'),
(4, 30, 'Mate de madera tallada con bombilla incluida', 1, 1, 450, '2024-12-01 00:00:00', '2024-12-23 15:27:53', 'https://ecommerce.com/img/mate-madera.jpg'),
(5, 20, 'Mate de vidrio con detalles en acero inoxidable', 1, 0, 500, '2024-12-01 00:00:00', '2024-12-26 02:07:54', 'https://ecommerce.com/img/mate-vidrio.jpg'),
(6, 10, 'Set de mate premium con yerbera y bombilla', 0, 1, 1200, '2024-12-01 00:00:00', '2024-12-25 21:38:10', 'https://ecommerce.com/img/set-mate-premium.jpg'),
(7, 40, 'Mate de acero inoxidable con doble capa térmica', 0, 1, 800, '2024-12-01 00:00:00', '2024-12-23 23:08:36', 'https://ecommerce.com/img/mate-acero.jpg'),
(8, 3, 'Mate de acero', 1, 1, 20000, '2024-12-22 20:28:01', '2024-12-23 15:25:10', NULL),
(27, 20, 'Mate de algarrobo', 1, 1, 10000, '2024-12-22 21:16:38', '2024-12-23 15:25:55', NULL),
(28, 3, 'mate de ceramico', 1, 0, 10000, '2024-12-22 21:52:20', '2024-12-22 21:52:20', NULL),
(29, 20, 'mate urbano', 1, 0, 10000, '2024-12-22 21:56:16', '2024-12-22 21:56:16', NULL),
(38, 3, 'set de latas', 1, 0, 10000, '2024-12-24 00:42:36', '2024-12-24 01:14:23', 'img/1735000956_5-5-600x600.webp'),
(39, 3, 'set de latas con mate', 1, 0, 10000, '2024-12-24 17:06:05', '2024-12-25 22:08:56', 'img/1735164536_4012.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `id_categoria` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_rel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`id_categoria`, `id_producto`, `id_rel`) VALUES
(1, 1, 1),
(1, 28, 4),
(1, 29, 5),
(4, 38, 14),
(1, 39, 32),
(1, 6, 33),
(9, 6, 34),
(2, 39, 35),
(3, 39, 36),
(5, 39, 37),
(9, 39, 38),
(1, 5, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0zWmdmYyLBeyycxTwRhxerJpQpDbdbQKxhIPHOyV', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibXR0MmNDM0pqdTFxdXlEaWJ3UzZzT3JpczdxeGFzV25TSFlTWUJVYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0NjoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluaXN0cmFjaW9uL2Rhc2hib2FyZCI7fX0=', 1735188655),
('oOE7JvWudPECnWQMgs1FLBN1jugJPGHLLQsZDxaP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkFVVWdxMnFLMzhPQmgwU00wZUpON29qQU9jcGZKM2h5d21sWTZxQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jb250YWN0byI7fX0=', 1735230500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id_destacados`),
  ADD KEY `fk_id_idx` (`id_prodDest`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nombrelink`
--
ALTER TABLE `nombrelink`
  ADD PRIMARY KEY (`id_link`),
  ADD KEY `fk_link_idx` (`id_producto`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_mate`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`id_rel`),
  ADD KEY `fk_id_categoria_idx` (`id_categoria`),
  ADD KEY `fk_id_producto_idx` (`id_producto`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id_destacados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nombrelink`
--
ALTER TABLE `nombrelink`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_mate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `id_rel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id_prodDest`) REFERENCES `productos` (`id_mate`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nombrelink`
--
ALTER TABLE `nombrelink`
  ADD CONSTRAINT `fk_link` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_mate`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_mate`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
