-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2023 a las 18:26:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accouting`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `phone`, `type`, `status`, `date_create`, `date_edit`) VALUES
(1, 'prova', 'aixoesuna@prova.com', 123456789, 'Hotel', 0, '2023-02-25 19:19:05', '2023-02-26 13:03:08'),
(3, 'Vallirana Resort', 'vall.irana1@gmail.com', 631705041, 'Complementos', 1, '2023-02-26 01:04:55', '2023-02-26 18:14:51'),
(4, 'Pepito', 'vall.irana@gmail.com', 678452158, 'Pista', 0, '2023-02-26 01:07:08', '2023-02-26 15:10:02'),
(5, 'Pirineu', 'piren@piri.comq', 678452145, 'Pista', 1, '2023-02-26 01:16:14', '2023-02-26 01:16:14'),
(10, 'GrandValira', 'grandValira@gmail.com', 677123456, 'Hotel', 1, '2023-02-26 18:25:34', '2023-02-26 18:25:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
