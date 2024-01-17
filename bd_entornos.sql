-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 04:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_entornos`
--

-- --------------------------------------------------------

--
-- Table structure for table `atenciones`
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
-- Dumping data for table `atenciones`
--

INSERT INTO `atenciones` (`id`, `mascota_id`, `servicio_id`, `personal_id`, `fecha_hora`, `titulo`, `descripcion`) VALUES
(1, 90, 1, 1, '2024-01-15', 'asf', 'asd'),
(2, 2, 1, 1, '2024-01-11', 'Corte', ' Se realizo un corte de pelo del perro');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
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
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `email`, `ciudad`, `direccion`, `telefono`, `clave`) VALUES
(1, 'Marcos', 'Perez', 'mgodoyquattoni@gmail', 'Rosario', 'Pellegrini 1000', '123 435 5654', '1'),
(2, 'Juan', 'Lopez', 'juanlopez@gmail.com', 'Rosario', 'Cordoba 345', '123 435 2342', 'a'),
(3, 'Alberto', 'Fernandez', 'albertito@gmail.com', 'Capital', '9 de Julio 567', '123 435 5654', 'a'),
(4, 'Jose', 'Quattoni', 'jq@gmail.com', 'Mar del Plata', '13 a', '4327782', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `foto` int(11) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `fecha_de_nac` date NOT NULL,
  `fecha_muerte` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mascotas`
--

INSERT INTO `mascotas` (`id`, `cliente_id`, `nombre`, `foto`, `raza`, `color`, `fecha_de_nac`, `fecha_muerte`) VALUES
(1, 1, 'Pepe', 0, 'Perro', 'Marron', '0000-00-00', '0000-00-00'),
(2, 2, 'Bob', 0, 'Perro', 'Blanco', '0000-00-00', '2024-01-26'),
(3, 2, 'Pancho', 0, 'Perro', 'Blanco', '2018-01-14', '0000-00-00'),
(4, 1, 'Bambino', 0, 'Mestizo', 'Marron', '2021-04-14', '0000-00-00'),
(5, 2, 'Roco', 0, 'Labrador', 'Amarillo', '2024-01-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
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
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `email`, `clave`, `rol_id`, `nombre`, `apellido`) VALUES
(3, 'angel@gmail.com', 10, 2, 'Angel', 'Di Maria'),
(4, 'jgomez@mail.com', 1234, 1, 'Jonatan', 'Gomez'),
(5, 'ag@mail.com', 1234, 1, 'Alicia', 'Gonzalez');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Peluquero'),
(3, 'Veterinario');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `precio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `tipo`, `precio`) VALUES
(1, 'Corte', 'Peluqueria', '100'),
(2, 'Cirugía', 'Salud', '200'),
(5, 'Limpieza', 'Peluqueria', '100'),
(6, 'Uñas', 'Salud', '300');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`id`, `fecha_hora`, `servicio_id`, `estado`, `cliente_id`) VALUES
(1, '2024-01-16 20:51:00', 1, 'ocupado', 3),
(2, '2024-01-19 20:51:00', 1, 'ocupado', 2),
(3, '2024-01-26 22:59:00', 6, 'ocupado', 3),
(4, '2024-01-27 12:31:00', 1, 'ocupado', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atenciones`
--
ALTER TABLE `atenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atenciones`
--
ALTER TABLE `atenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
