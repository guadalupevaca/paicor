-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 21:19:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasantias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `fideos` varchar(100) NOT NULL,
  `aceite` varchar(100) NOT NULL,
  `fideos_largos` varchar(100) NOT NULL,
  `polenta` varchar(100) NOT NULL,
  `arroz` varchar(100) NOT NULL,
  `leche` varchar(100) NOT NULL,
  `huevos` varchar(100) NOT NULL,
  `arbejas` varchar(100) NOT NULL,
  `lentejas` varchar(100) NOT NULL,
  `pure_de_tomate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `fideos`, `aceite`, `fideos_largos`, `polenta`, `arroz`, `leche`, `huevos`, `arbejas`, `lentejas`, `pure_de_tomate`) VALUES
(1, '', '', '', 'g', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE `colegio` (
  `id_colegio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`id_colegio`, `nombre`, `clave`) VALUES
(1, 'Margarita vazquez Ludueña de Lazo', 123),
(2, 'Maestro Domingo Nogal', 456),
(3, '25 de Mayo', 789),
(4, 'IPET N363', 100),
(5, 'IPEMyT N30', 234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `carne_molida` varchar(100) NOT NULL,
  `carne_picada` varchar(100) NOT NULL,
  `costeletas` varchar(100) NOT NULL,
  `agujas` varchar(100) NOT NULL,
  `bifes` varchar(100) NOT NULL,
  `pechuga_pollo` varchar(100) NOT NULL,
  `alita_pollo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `carne_molida`, `carne_picada`, `costeletas`, `agujas`, `bifes`, `pechuga_pollo`, `alita_pollo`) VALUES
(1, 'ccc', '', '', '', '', '', 'dd'),
(2, '10kg', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', ''),
(4, '10kg', '5kg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_limpieza`
--

CREATE TABLE `pedidos_limpieza` (
  `id` int(11) NOT NULL,
  `escoba` varchar(100) DEFAULT NULL,
  `balde` varchar(100) DEFAULT NULL,
  `trapo_de_piso` varchar(100) DEFAULT NULL,
  `ciff` varchar(100) DEFAULT NULL,
  `detergente` varchar(100) DEFAULT NULL,
  `lavandina` varchar(100) DEFAULT NULL,
  `perfumina` varchar(100) DEFAULT NULL,
  `guantes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos_limpieza`
--

INSERT INTO `pedidos_limpieza` (`id`, `escoba`, `balde`, `trapo_de_piso`, `ciff`, `detergente`, `lavandina`, `perfumina`, `guantes`) VALUES
(1, '', 'h', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_verduras`
--

CREATE TABLE `pedidos_verduras` (
  `id` int(11) NOT NULL,
  `papas` text NOT NULL,
  `tomate` text NOT NULL,
  `cebolla` text NOT NULL,
  `zanahoria` text NOT NULL,
  `choclo` text NOT NULL,
  `zapallitos` text NOT NULL,
  `calabacin` text NOT NULL,
  `lechuga` text NOT NULL,
  `acelga` text NOT NULL,
  `berenjena` text NOT NULL,
  `espinaca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos_verduras`
--

INSERT INTO `pedidos_verduras` (`id`, `papas`, `tomate`, `cebolla`, `zanahoria`, `choclo`, `zapallitos`, `calabacin`, `lechuga`, `acelga`, `berenjena`, `espinaca`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', ''),
(2, '10 kg', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colegio`
--
ALTER TABLE `colegio`
  ADD PRIMARY KEY (`id_colegio`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_limpieza`
--
ALTER TABLE `pedidos_limpieza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos_verduras`
--
ALTER TABLE `pedidos_verduras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colegio`
--
ALTER TABLE `colegio`
  MODIFY `id_colegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos_limpieza`
--
ALTER TABLE `pedidos_limpieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidos_verduras`
--
ALTER TABLE `pedidos_verduras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
