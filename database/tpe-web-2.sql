-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2024 a las 00:14:53
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
-- Base de datos: `tpe-web-2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `géneros`
--

CREATE TABLE `géneros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `géneros`
--

INSERT INTO `géneros` (`id`, `nombre`) VALUES
(4, 'Ciencia ficción'),
(5, 'Comedia'),
(6, 'Ficción'),
(7, 'Ficción detectivesca'),
(8, 'Historieta'),
(9, 'Humor'),
(10, 'Misterio'),
(11, 'Novela'),
(12, 'Novela gráfica'),
(13, 'Novela rosa'),
(14, 'Parodia'),
(15, 'Policial'),
(16, 'Romance'),
(17, 'Suspenso'),
(18, 'Terror'),
(19, 'Novela Psicológica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `autor` varchar(60) NOT NULL,
  `editorial` varchar(60) DEFAULT NULL,
  `genero` varchar(60) NOT NULL,
  `ID_genero` int(11) NOT NULL,
  `ID_genero2` int(11) DEFAULT NULL,
  `ID_genero3` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `autor`, `editorial`, `genero`, `ID_genero`, `ID_genero2`, `ID_genero3`, `stock`) VALUES
(1, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Herrero Hermanos Saturnino Calleja', 'Parodia,Humor,Comedia', 5, 9, 14, 15),
(2, 'La Regenta.', 'Leopoldo Arias Clarín', 'Alba Editorial', 'Ficcion', 6, NULL, NULL, 10),
(4, 'Drácula', 'Bram Stoker', 'Editorial Anto', 'Terror, Novela', 18, 11, NULL, 5),
(5, 'Cementerio de animales', 'Stephen King', 'Alfaguara', 'Terror', 18, NULL, NULL, 3),
(8, 'La conjura de los necios', 'John Kennedy Toole', 'Editorial Anagrama', ' Novela, Humor, Comedia', 11, 9, 5, 0),
(9, '50 sombras de Luisi', 'Autor: Ángel Sanchidrián', 'Minotauro', 'Humor,Comedia', 5, 9, NULL, 2),
(10, 'El proyecto esposa', 'Graeme Simsion', 'SALAMANDRA', 'Novela rosa, Romance', 13, 16, NULL, 10),
(11, 'Días de perros', 'Gilles Legardinier', 'Editorial Planeta', ' Ficcion, Humor', 6, 9, NULL, 3),
(12, 'Guía del autoestopista galáctico', 'Robbie Stamp, Douglas Adams', 'Editorial Anagrama', ' Ciencia ficcion, Novela, Humor', 4, 11, 9, 2),
(13, 'Esnob', 'Elísabet Benavent', 'SUMA', 'Novela rosa, Ficcion', 13, 6, NULL, 15),
(14, 'Forastera', 'Diana Gabaldon', 'SALAMANDRA BOLSILLO', 'Novela,Romance', 11, 16, NULL, 2),
(15, 'La Casa Neville 2. No quieras nada vil', 'Florencia Bonelli', NULL, 'Novela rosa, Ficcion', 13, 6, NULL, 2),
(16, 'Dune', 'Frank Herbert', 'LA FACTORÍA DE IDEAS', 'Novela, Ciencia ficcion', 11, 4, NULL, 3),
(17, 'Fahrenheit 451', 'Ray Bradbury', 'Minotauro', 'Novela, Ciencia ficcion', 11, 4, NULL, 2),
(18, 'El marciano', 'Andy Weir', 'B de Books (Ediciones B)', ' Ciencia ficcion, Novela', 4, 11, NULL, 1),
(20, 'El eternauta', 'H.G.Oesterheld, Solano López', 'Planeta Cómic Argentina', 'Historieta, Novela grafica', 8, 12, NULL, 5),
(21, 'Asesinato en el Orient Express', 'Agatha Christie', 'Grupo Planeta - Argentina', 'Novela, Ficcion detectivesca, Misterio', 11, 7, 10, 2),
(23, 'Holly (Edición en español)', 'Stephen King', 'PLAZA & JANÉS', 'Terror, Misterio, Suspenso', 18, 10, 17, 2),
(24, 'El Psicoanalista', 'John Katzenbach', 'Penguin Random House Grupo Editorial España', 'Suspenso, Novela psicologica', 17, 19, NULL, 0),
(25, 'El visitante', 'Stephen King', 'DEBOLS!LLO', 'Novela, Terror', 11, 18, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `ID_libro` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `estado`, `password`, `admin`) VALUES
(8, 'Valentin', 'Perez Larrieste', 47060233, 2147483647, 'papa@gmail.com', 'no deudor', '$2y$10$aoYD4.SYmJE.FDFlVJczvu4bXJHhUb5pCUK4mC1t61edFPGNUv2u.', ''),
(11, 'Web', 'Web', 11111111, 1111111111, 'webadmin@gmail.com', 'no deudor', '$2y$10$xjqC0mcJZCFF1FdNzv1DuuUZfn9dqo7ZFft84FE4elUdD58HmHOvS', 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `géneros`
--
ALTER TABLE `géneros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Genero` (`ID_genero`),
  ADD KEY `ID_genero2` (`ID_genero2`),
  ADD KEY `ID_genero3` (`ID_genero3`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_libro` (`ID_libro`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `géneros`
--
ALTER TABLE `géneros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`ID_genero`) REFERENCES `géneros` (`id`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`ID_genero`) REFERENCES `géneros` (`id`),
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`ID_genero2`) REFERENCES `géneros` (`id`),
  ADD CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`ID_genero3`) REFERENCES `géneros` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`ID_libro`) REFERENCES `libro` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
