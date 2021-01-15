-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2021 a las 14:25:43
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
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `codCli` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `pas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`codCli`, `nom`, `mail`, `pas`) VALUES
(1, 'Susanna', 'su@gmail.com', 'su123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `numComanda` int(11) NOT NULL,
  `codCli` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallcomanda`
--

CREATE TABLE `detallcomanda` (
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
  `imatge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`codPro`, `descripcio`, `preu`, `stock`, `estat`, `detall`, `imatge`) VALUES
(1, 'Campera Fosca', '200.00', 5, 'Normal', 'Bota Campera marro fosc amb detall brodat', 'camperaFosca.jpg'),
(2, 'Campera Clara', '200.00', 5, 'Normal', 'Bota Campera marro clar amb detall brodat en color turquesa', 'camperaClara.jpg'),
(3, 'Campera Fashion', '200.00', 5, 'Normal', 'Boti Camper marro classic amb detall brodat en color turquesa', 'botiCamper.jpg'),
(4, 'Bota motorista', '100.00', 5, 'Oferta', 'Bota baixa negra amb sivella estil motorista', 'botaBaixa.jpg'),
(5, 'Bota alta mitjo', '50.00', 5, 'Destacat', 'Bota alta negra estil mitjo amb cordills', 'botaAlta.jpg'),
(6, 'Esportiu vermell', '60.00', 5, 'Normal', 'Sabata esportiva Skechers de color vermell', 'esportiuVermell.jpg');

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
  MODIFY `codCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `numComanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `codPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallcomanda`
--
ALTER TABLE `detallcomanda`
  ADD CONSTRAINT `detallcomanda_ibfk_1` FOREIGN KEY (`numComanda`) REFERENCES `comanda` (`numComanda`),
  ADD CONSTRAINT `detallcomanda_ibfk_2` FOREIGN KEY (`codPro`) REFERENCES `productes` (`codPro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
