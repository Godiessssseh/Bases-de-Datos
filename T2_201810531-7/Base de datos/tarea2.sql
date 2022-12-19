-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2021 a las 06:32:30
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarea2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `IDLista` int(50) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `IDusmito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mencanta`
--

CREATE TABLE `mencanta` (
  `usuario` varchar(20) NOT NULL,
  `IDusmito` int(11) NOT NULL,
  `IDEncanta` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mencanta`
--

INSERT INTO `mencanta` (`usuario`, `IDusmito`, `IDEncanta`) VALUES
('NJ4 Darkness', 44, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reply`
--

CREATE TABLE `reply` (
  `usuario` varchar(20) NOT NULL,
  `IDusmito` int(11) NOT NULL,
  `IDReply` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reply`
--

INSERT INTO `reply` (`usuario`, `IDusmito`, `IDReply`) VALUES
('Pikachu', 46, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reusmeos`
--

CREATE TABLE `reusmeos` (
  `usuario` varchar(20) NOT NULL,
  `IDusmito` int(11) NOT NULL,
  `IDreusmeo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `IDseguir` int(50) NOT NULL,
  `sigue_a` varchar(20) NOT NULL,
  `seguidor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`IDseguir`, `sigue_a`, `seguidor`) VALUES
(1, 'Batman', 'NJ4 Darkness'),
(2, 'Godies', 'NJ4 Darkness'),
(3, 'NJ4 Darkness', 'Godies'),
(4, 'NJ4 Darkness', 'Batman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `IDTag` int(11) NOT NULL,
  `Tag` varchar(50) NOT NULL,
  `IDusmito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`IDTag`, `Tag`, `IDusmito`) VALUES
(1, 'Impactrueno', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usmers`
--

CREATE TABLE `usmers` (
  `usuario` varchar(20) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `Seguidores` int(50) NOT NULL,
  `Seguidos` int(50) NOT NULL,
  `CantidadPublicaciones` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usmers`
--

INSERT INTO `usmers` (`usuario`, `Nombre`, `Contraseña`, `Seguidores`, `Seguidos`, `CantidadPublicaciones`) VALUES
('Batman', 'Joker', 'nananananana', 1, 1, 0),
('Godies', 'Diego', 'diego', 1, 1, 0),
('NJ4 Darkness', 'ariel', 'ariel', 2, 2, 1),
('Pikachu', 'Pika', 'Impactrueno', 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usmito`
--

CREATE TABLE `usmito` (
  `IDusmito` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `publicacion` varchar(279) NOT NULL,
  `Mencanta` int(11) NOT NULL,
  `Reply` int(11) NOT NULL,
  `Reusmeos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usmito`
--

INSERT INTO `usmito` (`IDusmito`, `usuario`, `publicacion`, `Mencanta`, `Reply`, `Reusmeos`) VALUES
(44, 'NJ4 Darkness', 'Sáquenme de la Universidad y Latinoamerica', 1, 0, 0),
(45, 'Pikachu', 'pika pika', 0, 0, 0),
(46, 'Pikachu', 'pikaaaachuuuuuuuuuuuuuuuuuuuuu\r\n#Impactrueno', 0, 1, 0),
(47, 'Batman', 'Pikachu, dejaré Gotham e iré por ti', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usmwerlist`
--

CREATE TABLE `usmwerlist` (
  `IDUSMwerlist` int(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `IDLista` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`IDLista`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `IDusmito` (`IDusmito`);

--
-- Indices de la tabla `mencanta`
--
ALTER TABLE `mencanta`
  ADD PRIMARY KEY (`IDEncanta`),
  ADD KEY `IDusmito` (`IDusmito`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`IDReply`),
  ADD KEY `IDusmito` (`IDusmito`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `reusmeos`
--
ALTER TABLE `reusmeos`
  ADD PRIMARY KEY (`IDreusmeo`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `IDusmito` (`IDusmito`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`IDseguir`),
  ADD KEY `sigue_a` (`sigue_a`),
  ADD KEY `seguidor` (`seguidor`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`IDTag`,`Tag`),
  ADD KEY `IDusmito` (`IDusmito`);

--
-- Indices de la tabla `usmers`
--
ALTER TABLE `usmers`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `usmito`
--
ALTER TABLE `usmito`
  ADD PRIMARY KEY (`IDusmito`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usmwerlist`
--
ALTER TABLE `usmwerlist`
  ADD PRIMARY KEY (`IDUSMwerlist`),
  ADD KEY `IDLista` (`IDLista`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mencanta`
--
ALTER TABLE `mencanta`
  MODIFY `IDEncanta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reply`
--
ALTER TABLE `reply`
  MODIFY `IDReply` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `IDseguir` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `IDTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usmito`
--
ALTER TABLE `usmito`
  MODIFY `IDusmito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`IDusmito`) REFERENCES `usmito` (`IDusmito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mencanta`
--
ALTER TABLE `mencanta`
  ADD CONSTRAINT `mencanta_ibfk_1` FOREIGN KEY (`IDusmito`) REFERENCES `usmito` (`IDusmito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mencanta_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`IDusmito`) REFERENCES `usmito` (`IDusmito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reusmeos`
--
ALTER TABLE `reusmeos`
  ADD CONSTRAINT `reusmeos_ibfk_1` FOREIGN KEY (`IDusmito`) REFERENCES `usmito` (`IDusmito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reusmeos_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`seguidor`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguimiento_ibfk_2` FOREIGN KEY (`sigue_a`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`IDusmito`) REFERENCES `usmito` (`IDusmito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usmito`
--
ALTER TABLE `usmito`
  ADD CONSTRAINT `usmito_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usmwerlist`
--
ALTER TABLE `usmwerlist`
  ADD CONSTRAINT `usmwerlist_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usmers` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usmwerlist_ibfk_2` FOREIGN KEY (`IDLista`) REFERENCES `lista` (`IDLista`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
