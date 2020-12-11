-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 21:45:10
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientecp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `nombre` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombre`, `email`, `password`) VALUES
('Carlos', 'carlos_1@gmail.com', 'televisor'),
('fer', 'f@gmail.com', '678'),
('carlos', 'ferca@gmail.com', '1234'),
('Fernando', 'fercajomo10@gmail.com', '1234'),
('', 'fercajomo9@gmail.com', '123'),
('Manuel', 'manuel@gmail.com', 'fercadev'),
('Mateo', 'mateo1@hotmail.com', 'matein'),
('Mateo', 'mateo@gmail.com', '911');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `correo_electronico` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `telefono`, `direccion`, `provincia`, `correo_electronico`) VALUES
(1, 'Frank', 'Noguera', '6894175', 'LS', 'Mendoza', 'gm@gmail.com'),
(111, 'Fernando', 'Nagasaqui', '322', 'VR', 'Cordoba', 'sb@gmail.com'),
(222, 'Carlos ', 'Fonseca', '5345', '', 'Buenos Aires', 'gm@gmail.com'),
(333, 'Carlos ', 'Nagasaqui', '322', 'vr', 'Cordoba', 'asdf@gmail.com'),
(444, 'Juan', 'Gonzales', '3134567895', 'VR', 'Santa Fe', 'juan@gmail.com'),
(666, 'Jaimito', 'Perez', '3458964589', 'RH', 'Cordoba', 'jaimito@gmail.com'),
(1234, 'Mateo ', 'Martinez', '5345', '', 'Mendoza', 'd@gmail.com'),
(5555, 'Marcos', 'Alberto', '3123456985', 'RG', 'Buenos Aires', 'marcos@gmail.com'),
(12345, 'Pablo', 'Hernan', '3223776490', '', 'Buenos Aires', 'gm@gmail.com'),
(22222, 'Fernando', 'Contreras', '3134564534', 'VR', 'Buenos Aires', 'ooniuads@gmail.com'),
(1127350154, 'Felipe', 'Fonseca', '5651231', '', 'Cordoba', 'd@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idco` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idco`, `comentario`, `id`) VALUES
(17, 'App lista para presentar', 111),
(18, 'El libro es maravilloso', 1127350154),
(21, 'Muchas gracias, excelente atención.', 22222),
(23, 'Excelente atención.', 1127350154),
(24, 'Muy buen libro, lo recomiendo', 111),
(25, 'Excelente calidad', 333),
(26, 'Muy bueno pero puede mejorar la atención.', 12345),
(27, 'Bueno, puede mejorar.', 22222),
(28, 'Maravilloso libro y la atención en la biblioteca es excelente.', 1127350154);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(20) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `autor` varchar(20) DEFAULT 'Desconocido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`) VALUES
(1, 'Club de las 5 de la Mañana', 'Robin Sharma'),
(2, 'Inteligencia Emocional', 'Daniel Coleman'),
(114, 'Los teletubis', 'Aviador gol'),
(222, 'xxxx', 'Aviador golhhhh'),
(444, 'El  Monje que vendió su Ferrari', 'Robin Sharma'),
(555, 'El conde de monte cristo', 'Alexandre Dumas'),
(777, 'Inteligencia Artificial', 'Kaplan'),
(888, 'Las aventuras de Lancer', 'Gust Maen'),
(1230, 'Clean Code', 'Robert Cecil Martin'),
(3333, 'Inteligencia Artificial', 'Peter Norvig'),
(6767, 'El nagasaqui papa', 'Aviador golhhhh'),
(9999, 'Programacion movil', 'Luis Alberto'),
(11111, 'Programacion web', 'Mario Rubiales'),
(1127350154, 'Ideapad S340999', 'fercaVV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `nump` int(8) NOT NULL,
  `idcl` int(11) DEFAULT NULL,
  `idli` int(20) DEFAULT NULL,
  `fechap` date NOT NULL,
  `fechad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`nump`, `idcl`, `idli`, `fechap`, `fechad`) VALUES
(13, 333, 2, '3000-11-25', '3000-11-25'),
(15, 111, 6767, '2020-11-18', '2020-11-10'),
(17, 333, 6767, '2020-11-10', '2020-11-20'),
(19, 111, 114, '2020-11-17', '2020-12-05'),
(21, 12345, 114, '2020-11-21', '2020-12-12'),
(22, 1234, 1, '2020-11-10', '2020-12-12'),
(24, 222, 11111, '2020-11-16', '2020-11-27'),
(25, 22222, 1, '2020-11-16', '2020-12-12'),
(26, 111, 114, '2020-11-01', '2020-11-20'),
(27, 1127350154, 1230, '2020-05-06', '2020-11-01'),
(29, 666, 444, '2019-01-02', '2019-03-26'),
(30, 12345, 555, '2020-11-01', '2020-11-09'),
(31, 666, 3333, '2020-03-16', '2020-05-14'),
(33, 12345, 777, '2020-11-17', '2020-12-12'),
(34, 222, 888, '2020-07-13', '2020-09-26'),
(35, 1, 444, '2020-10-26', '2020-11-09'),
(36, 1127350154, 2, '2020-10-07', '2020-11-01'),
(37, 222, 9999, '2020-06-26', '2020-07-26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idco`),
  ADD KEY `comentarios_ibfk_1` (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`nump`),
  ADD KEY `idli` (`idli`),
  ADD KEY `prestamo_ibfk_1` (`idcl`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `nump` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`idcl`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`idli`) REFERENCES `libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
