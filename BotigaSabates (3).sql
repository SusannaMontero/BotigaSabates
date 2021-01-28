-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-01-2021 a las 13:25:45
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `BotigaSabates`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `codAdmin` int(11) NOT NULL,
  `nomAdmin` varchar(30) NOT NULL,
  `mailAdmin` varchar(30) NOT NULL,
  `pasAdmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`codAdmin`, `nomAdmin`, `mailAdmin`, `pasAdmin`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `codCli` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `pas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`codCli`, `nom`, `mail`, `pas`) VALUES
(1, 'Susanna', 'su@gmail.com', 'su123'),
(2, 'lolo', 'lo@gmail.com', 'lolo'),
(4, 'lili', 'li@gmail.com', 'lili'),
(13, 'sisi', 'si@gmail.com', 'sisi'),
(35, 'lila', 'lila@gmail.com', 'lila'),
(41, 'lala', 'la@gmail.com', 'lala'),
(42, 'Pepito', 'pepito@gmail.com', 'e04820372e7f2ebb2d76987433579219b11c2ba5'),
(43, 'lulu', 'lulu@gmail.com', '4ec844dae165816ebad5cb5ed77840e2484047d6'),
(44, 'pipi', 'pipi@gmail.com', '7afeeac0445ee96ea7b04c5365228ffe9aaa6683');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `numComanda` int(11) NOT NULL,
  `codCli` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`numComanda`, `codCli`, `data`) VALUES
(1, '', '2021-01-25'),
(2, '', '2021-01-25'),
(3, '', '2021-01-25'),
(4, '', '2021-01-25'),
(5, '', '2021-01-25'),
(6, '', '2021-01-27'),
(7, '', '2021-01-27'),
(8, '', '2021-01-27'),
(9, '', '2021-01-27'),
(10, '', '2021-01-27'),
(11, '', '2021-01-27'),
(12, '', '2021-01-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallcomanda`
--

CREATE TABLE `detallcomanda` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallcomanda`
--

INSERT INTO `detallcomanda` (`numComanda`, `codPro`, `can`) VALUES
(5, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lala`
--

CREATE TABLE `lala` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lila`
--

CREATE TABLE `lila` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loli`
--

CREATE TABLE `loli` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lulu`
--

CREATE TABLE `lulu` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pepito`
--

CREATE TABLE `Pepito` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pipi`
--

CREATE TABLE `pipi` (
  `numComanda` int(11) NOT NULL,
  `codPro` int(11) NOT NULL,
  `can` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `codPro` int(11) NOT NULL,
  `descripcio` varchar(100) NOT NULL,
  `preu` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `estat` varchar(30) NOT NULL,
  `detall` varchar(1000) NOT NULL,
  `imatge` varchar(50) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`codPro`, `descripcio`, `preu`, `stock`, `estat`, `detall`, `imatge`, `categoria`) VALUES
(1, 'Campera Fosca', '200.00', 5, 'Normal', 'Bota Campera marro fosc amb detall brodat', 'camperaFosca.jpg', 'dona'),
(2, 'Campera Clara', '200.00', 5, 'Normal', 'Bota Campera marro clar amb detall brodat en color turquesa', 'camperaClara.jpg', 'dona'),
(3, 'Campera Fashion', '200.00', 5, 'Normal', 'Boti Camper marro classic amb detall brodat en color turquesa', 'botiCamper.jpg', 'dona'),
(4, 'Bota motorista', '100.00', 5, 'Oferta', 'Bota baixa negra amb sivella estil motorista', 'botaBaixa.jpg', 'dona'),
(5, 'Bota alta mitjo', '50.00', 5, 'Destacat', 'Bota alta negra estil mitjo amb cordills', 'botaAlta.jpg', 'dona'),
(6, 'Esportiu vermell', '60.00', 5, 'Normal', 'Sabata esportiva Skechers de color vermell', 'esportiuVermell.jpg', 'dona'),
(7, 'Bota de Treball Home', '300.00', 5, 'Oferta', 'Bota de treball amb puntera reforçada en acabat marró', 'botaWorkHomeMarro.jpg', 'home'),
(8, 'Bota de Treball Home Campera', '350.00', 5, 'Normal', 'Bota de treball amb puntera reforçada, estil campera cowboy', 'botaWorkHomeCampera.jpg', 'home'),
(9, 'Sabata Casual Home Blava', '100.00', 5, 'Oferta', 'Sabata estil Casual per home de color blau', 'casualHomeBlau.jpg', 'home'),
(10, 'Sabata Casual Home Taronja', '150.00', 5, 'Normal', 'Sabata estil Casual per home amb la sola de color taronja', 'casualHomeTaronja.jpg', 'home'),
(11, 'Bota Campera Home Negra', '300.00', 5, 'Normal', 'Bota campera de pell tall clàssic de color negre', 'camperaHomeNegra.jpg', 'home'),
(12, 'Sabata Casual Dona Cactus', '150.00', 5, 'Normal', 'Sabata estil Casual per dona, amb estampat de cactus', 'casualDonaCactus.jpg', 'dona'),
(13, 'Bota de Treball Home Waterproof', '250.00', 5, 'Normal', 'Bota de treball per home hidrófuga', 'botaWorkHomeWaterproof.jpg', 'home'),
(14, 'Bota de Treball Dona Verda', '200.00', 5, 'Normal', 'Bota de treball per dona amb reforç a la puntera de color verd', 'botaWorkDonaVerd.jpg', 'dona'),
(21, 'Bota de Treball Dona estil Campera', '300.00', 5, 'Especial', 'Bota de treball per dona amb reforç a la puntera estil cowgirl', 'botaWorkDonaCampera.jpg', 'dona'),
(27, 'Bota de Treball Dona Verda', '200.00', 5, 'Normal', 'Bota de treball per dona amb reforç a la puntera de color verd', 'botaWorkDonaVerd.jpg', 'dona'),
(28, 'Bota de Treball Dona estil Campera', '300.00', 5, 'Especial', 'Bota de treball per dona amb reforç a la puntera estil cowgirl', 'botaWorkDonaCampera.jpg', 'dona'),
(29, 'Bota Campera Home Bicolor', '400.00', 5, 'Especial', 'Bota Campera de pell bicolor, marró i negre', 'camperaHomeBicolor.jpg', 'home');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`codCli`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`numComanda`);

--
-- Indices de la tabla `detallcomanda`
--
ALTER TABLE `detallcomanda`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `lala`
--
ALTER TABLE `lala`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `lila`
--
ALTER TABLE `lila`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `loli`
--
ALTER TABLE `loli`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `lulu`
--
ALTER TABLE `lulu`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `Pepito`
--
ALTER TABLE `Pepito`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `pipi`
--
ALTER TABLE `pipi`
  ADD KEY `numComanda` (`numComanda`),
  ADD KEY `codPro` (`codPro`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`codPro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `codCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `numComanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `codPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallcomanda`
--
ALTER TABLE `detallcomanda`
  ADD CONSTRAINT `detallcomanda_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `detallcomanda_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);

--
-- Filtros para la tabla `lala`
--
ALTER TABLE `lala`
  ADD CONSTRAINT `lala_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `lala_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);

--
-- Filtros para la tabla `lila`
--
ALTER TABLE `lila`
  ADD CONSTRAINT `lila_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `lila_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);

--
-- Filtros para la tabla `loli`
--
ALTER TABLE `loli`
  ADD CONSTRAINT `loli_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `loli_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);

--
-- Filtros para la tabla `lulu`
--
ALTER TABLE `lulu`
  ADD CONSTRAINT `lulu_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `lulu_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);

--
-- Filtros para la tabla `Pepito`
--
ALTER TABLE `Pepito`
  ADD CONSTRAINT `pepito_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `pepito_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);

--
-- Filtros para la tabla `pipi`
--
ALTER TABLE `pipi`
  ADD CONSTRAINT `pipi_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `pipi_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
