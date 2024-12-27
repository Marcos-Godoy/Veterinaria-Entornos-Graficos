-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2024 a las 15:39:23
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
-- Base de datos: `bd_entornos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atenciones`
--

CREATE TABLE `atenciones` (
  `id` int(11) NOT NULL,
  `mascota_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `fecha_hora` date NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atenciones`
--

INSERT INTO `atenciones` (`id`, `mascota_id`, `servicio_id`, `personal_id`, `fecha_hora`, `titulo`, `descripcion`) VALUES
(1, 1, 1, 1, '2024-01-15', 'Corte', 'ok'),
(2, 2, 1, 1, '2024-01-11', 'Corte', ' Se realizo un corte de pelo del perro'),
(3, 9, 1, 6, '2024-12-19', 'Servicio de corte de', 'ok'),
(4, 3, 1, 3, '2024-12-24', 'Chequeo general', 'Problemas en el estomago pero ok'),
(5, 3, 1, 5, '2024-12-24', 'Baño', 'Baño general'),
(6, 6, 3, 5, '2024-12-20', 'Desparasitación', 'Se le sacaron pulgas'),
(7, 6, 2, 3, '2025-11-11', 'Vacuna contra rabia', ''),
(8, 4, 5, 3, '2024-12-28', 'Dolores', ''),
(9, 7, 4, 5, '2024-12-26', 'Gripe', ''),
(10, 9, 8, 5, '2024-12-28', 'Cirugia', ''),
(11, 11, 3, 5, '2024-12-20', 'Chequeo general', 'Todo bien\r\n'),
(12, 3, 1, 5, '2024-12-27', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `email`, `ciudad`, `direccion`, `telefono`, `clave`) VALUES
(1, 'Marcos', 'Perez', 'cli@cli.com', 'Rosario', 'Pellegrini 1000', '123 435 5654', '1234'),
(2, 'Juan', 'Lopez', 'juanlopez@gmail.com', 'Rosario', 'Cordoba 345', '123 435 2342', 'a'),
(3, 'Alberto', 'Fernandez', 'albertito@gmail.com', 'Capital', '9 de Julio 567', '123 435 5654', 'a'),
(4, 'Jose', 'Rossi', 'jq@gmail.com', 'Mar del Plata', '13 a', '123 345 4543', 'a'),
(5, 'Lionel', 'Messi', 'lm@gmail.com', 'Rosario', 'Segui 3000', '3427856459', '1234'),
(6, 'Paulo', 'Dybala', 'pd@gmail.com', 'Roma', 'Tucuman 123', '3427856434', '1234'),
(7, 'Juan', 'Perez', 'jp@gmail.com', '', '', '', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `fecha_de_nac` date NOT NULL,
  `fecha_muerte` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `cliente_id`, `nombre`, `foto`, `raza`, `color`, `fecha_de_nac`, `fecha_muerte`) VALUES
(1, 1, 'Pepe', 'uploads/pastor.jpg', 'Pastor Alemán', 'Marron', '2024-12-18', '0000-00-00'),
(2, 2, 'Clio', 'uploads/pitbull.jpg', 'Pitbull', 'Marron', '2018-06-07', '0000-00-00'),
(3, 3, 'Manaos', 'uploads/persa.jpg', 'Persa', 'Blanco', '2024-12-21', '0000-00-00'),
(4, 1, 'Bambino', 'uploads/bulldog.jpg', 'Bulldog', 'Marron', '2021-04-14', '0000-00-00'),
(5, 2, 'Roco', 'uploads/foto2.jpg', 'Labrador', 'Amarillo', '2024-01-04', '2024-12-05'),
(6, 4, 'Tigre', 'uploads/ash.jpg', 'Ashera', 'Marron', '2019-10-25', '2024-12-26'),
(7, 6, 'Siber', 'uploads/siberiano.jpg', 'Siberiano', 'Gris', '2021-02-04', '0000-00-00'),
(8, 5, 'Hulk', 'uploads/vet1.jpg', 'Salchicha', 'Marron', '2022-06-24', '0000-00-00'),
(9, 4, 'Pechito', 'uploads/pel1.jpg', 'Labrador', 'Blanco', '2019-06-05', '0000-00-00'),
(10, 6, 'Admin', 'uploads/foto4.jpg', 'Loro', 'Verde', '2024-10-10', '2024-12-26'),
(11, 4, 'Gol', 'uploads/foto1.jpg', 'Siberiano', 'Marron', '2024-12-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `clave` int(20) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `email`, `clave`, `rol_id`, `nombre`, `apellido`) VALUES
(1, 'lber@gmail.com', 1234, 2, 'Lucas', 'Bernardi'),
(2, 'maxi@gmail.com', 1234, 3, 'Maximiliano', 'Rodriguez'),
(3, 'angel@gmail.com', 10, 2, 'Angel', 'Di Maria'),
(4, 'emar@gmail.com', 1234, 2, 'Emiliano', 'Martinez'),
(5, 'admin@admin.com', 1234, 1, 'Diego', 'Maradona'),
(6, 'vet@vet.com', 1234, 3, 'Nahuel', 'Guzman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Peluquero'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `precio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `tipo`, `precio`) VALUES
(1, 'Consulta General', 'Veterinaria', '20000'),
(2, 'Vacunación', 'Veterinaria', '10000'),
(3, 'Desparasitación', 'Veterinaria', '20000'),
(4, 'Tratamientos', 'Veterinaria', '15000'),
(5, 'Curaciones', 'Veterinaria', '20000'),
(6, 'Baño', 'Peluquería', '20000'),
(7, 'Corte de Uñas', 'Peluquería', '15000'),
(8, 'Cirugía', 'Veterinaria', '40000'),
(9, 'Otros', '-', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `fecha_hora`, `servicio_id`, `estado`, `cliente_id`, `personal_id`) VALUES
(1, '2024-01-16 20:51:00', 1, 'ocupado', 3, 0),
(2, '2024-01-19 20:51:00', 1, 'ocupado', 2, 0),
(3, '2024-01-26 22:59:00', 6, 'ocupado', 3, 0),
(4, '2024-01-27 12:31:00', 1, 'ocupado', 2, 0),
(5, '2024-12-19 13:47:00', 1, 'ocupado', 5, 0),
(6, '2024-12-21 13:47:00', 1, 'ocupado', 1, 0),
(7, '2024-12-20 20:26:00', 1, 'disponible', 0, 3),
(8, '2024-12-20 18:27:00', 1, 'ocupado', 1, 3),
(9, '2024-12-20 12:41:00', 1, 'ocupado', 0, 3),
(10, '2024-12-27 13:27:00', 1, 'ocupado', 1, 3),
(11, '2025-01-10 15:40:00', 1, 'disponible', 0, 3),
(12, '2025-01-10 15:45:00', 4, 'disponible', 0, 1),
(13, '2025-06-25 17:00:00', 1, 'disponible', 0, 2),
(14, '2025-06-26 12:30:00', 2, 'disponible', 0, 2),
(15, '2025-06-26 16:30:00', 1, 'disponible', 0, 1),
(16, '2025-07-28 14:30:00', 1, 'disponible', 0, 3),
(17, '2025-07-27 16:00:00', 1, 'disponible', 0, 4),
(18, '2025-05-28 16:30:00', 7, 'disponible', 0, 3),
(19, '2025-07-27 11:00:00', 5, 'disponible', 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atenciones`
--
ALTER TABLE `atenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atenciones`
--
ALTER TABLE `atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
