-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2020 a las 01:08:06
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas_cena`
--

CREATE TABLE `dietas_cena` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dietas_cena`
--

INSERT INTO `dietas_cena` (`ID`, `nombre`) VALUES
(1, 'ENSALADA DE ATÚN EN AGUA CON VERDURAS PERMITIDAS.'),
(2, 'TRES GALLETAS SALMAS CON QUESO PANELA O COTTAGE.'),
(3, 'PAPAYA CON YOGURT'),
(4, 'ENSALADA DE VERDURAS PERMITIDAS CON ATÚN EN AGUA'),
(5, 'ENSALADA DE ESPINACAS CON QUESO PANELA'),
(6, 'ENSALADA CON QUESO PANELA'),
(7, 'ROLLITOS DE JAMÓN DE PAVO CON AGUACATE Y PEPINO'),
(8, 'PAPAYA'),
(9, 'MELÓN'),
(10, 'FRUTA, UNA SOLA CLASE.'),
(11, 'LICUADO DE PIÑA EN AGUA'),
(12, 'FRUTA, UNA SOLA CLASE.'),
(13, 'JUGO V8 O TORONJA'),
(14, 'ENSALADA DE ATÚN EN AGUA CON VERDURAS PERMITIDAS.'),
(15, 'DOS GALLETAS HABANERAS CON QUESO PANELA O COTTAGE.'),
(16, 'ENSALADA DE VERDURAS PERMITIDAS.'),
(17, 'PAPAYA CON YOGURT DE SU PREFERENCIA'),
(18, 'LICUADO DE PIÑA EN AGUA'),
(19, 'FRUTA DE UNA SOLA CLASE CON YOGURT '),
(20, 'FRUTA, UNA SOLA CLASE CON QUESO COTAGE'),
(21, 'LICUADO DE PAPAYA EN AGUA'),
(22, 'ENSALADA DE ATÚN EN AGUA'),
(23, 'FRUTA LA MISMA DEL DESAYUNO CON YOGURT'),
(24, 'SALCHICHAS ASADAS CON ENSALADA.'),
(25, 'ENSALADA DE ATÚN EN AGUA CON 1/2 AGUACATE.'),
(26, 'CHAYOTES AL VAPOR CON TAJIN Y LIMÓN'),
(27, 'FRUTA DE UNA SOLA CLASE CON QUESO COTTAGE.'),
(28, 'DOS QUESADILLAS DE TORTILLA DE MAÍZ CON QUESO PANELA Y COL MORADA'),
(29, 'CALABAZAS Y ZETAS A LA PARRILLA'),
(30, 'UN FILETE GRANDE DE RES A LA PARRILLA Ó DOS BISTECES ASADOS CON ENSALADA DE LECHUGA, ACELGAS Y APIO.'),
(31, 'JAMÓN DE PAVO CON JITOMATE Y LIMÓN'),
(32, 'FAJITAS DE RES ASADAS CON ENSALADA VERDE.'),
(33, 'JAMÓN DE PAVO CON ENSALADA VERDE.'),
(34, 'LO QUE USTED DESEE, TACOS, QUESADILLAS, SPAGUETTI, ETC'),
(35, 'DOS FLAUTAS DE POLLO Ó RES CON ENSALADA.'),
(36, 'GELATINA LIGHT (SUGAR FREE JELL-O, GLORIA, CLIGHT)'),
(37, 'DOS GALLETAS DE AVENA ( NABISCO )'),
(38, 'SANDWICH DE PAN INTEGRAL CON JAMÓN DE PAVO, JUGO Ó CAFÉ.'),
(39, 'YOGHURT ACTIVIA DE CUALQUIER SABOR'),
(40, 'SOPA DE VERDURAS PERMITIDAS CON QUESO PANELA'),
(41, 'CEREAL ALL BRAN Ó BRAN FLACKES CON LECHE LIGHT'),
(42, 'UN PAN INTEGRAL TOSTADO CON MERMELADA DE CUALQUIER SABOR'),
(43, 'QUESO PANELA ASADO CON SALSA DE JITOMATE FRESCO'),
(44, 'ENSALADA DE NOPALES CON QUESO COTIJA'),
(45, 'DOS TOSTADAS DE TINGA DE POLLO'),
(46, 'PAPAYA CON YOGURT LIGHT DE CUALQUIER SABOR'),
(47, 'DOS QUESADILLA DE QUESO PANELA CON TORTILLA DE MAÍZ.'),
(48, 'ROLLITOS DE JAMÓN DE PAVO, UNA REBANADA DE PAN INTEGRAL TOSTADO  Y ENSALADA DE VERDURAS PERMITIDAS.'),
(49, 'MANZANAS VERDES Y QUESO PANELA '),
(50, 'PAPAYA Y YOGURT'),
(51, 'PAPAYA CON QUESO COTAGE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas_comida`
--

CREATE TABLE `dietas_comida` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dietas_comida`
--

INSERT INTO `dietas_comida` (`ID`, `nombre`) VALUES
(1, 'POLLO A LA PLANCHA CON VERDURAS PERMITIDAS.'),
(2, 'PESCADO ASADO CON ENSALADA.'),
(3, 'SOPA DE VERDURAS POLLO ASADO CON VERDURAS PERMITIDAS'),
(4, 'POLLO ASADO CON VERDURAS PERMITIDAS.'),
(5, 'PESCADO ASADO CON VERDURAS PERMITIDAS.'),
(6, 'SOPA DE VERDURAS CARNE ASADA CON VERDURAS PERMITIDAS'),
(7, 'LIBRE'),
(8, 'ENSALADA DE JAMÓN DE PAVO CON VERDURAS PERMITIDAS.'),
(9, 'ENSALADA DE VERDURAS PERMITIDAS CON PESCADO ASADO '),
(10, 'CARNE ASADA CON ESPINACAS Y BROCOLI'),
(11, 'POLLO CON ENSALADA                                   ( LECHUGA Y JITOMATE ).'),
(12, 'POLLO O PESCADO CON ENSALADA DE VERDURAS PERMITIDAS.'),
(13, 'ENSALADA DE ATÚN EN AGUA.'),
(14, 'POLLO O PESCADO CON ENSALADA DE VERDURAS PERMITIDAS.'),
(15, 'MELÓN'),
(16, 'POLLO CON VERDURAS PERMITIDAS.'),
(17, 'SI SE SIENTE DÉBIL PUEDE AGREGAR POLLO ASADO Ó ATÙN EN AGUA A LA HORA DE LA COMIDA.'),
(18, 'ENSALADA DE CARNE DESHEBRADA CON VERDURAS PERMITIDAS.'),
(19, 'ENSALADA DE VERDURAS PERMITIDAS CON PESCADO ASADO '),
(20, 'POLLO CON ENSALADA                                   ( LECHUGA Y JITOMATE ).'),
(21, 'ENSALADA DE ATÚN EN AGUA CON VERDURAS PERMITIDAS.'),
(22, 'ENSALADA DE CAMARONES CON VERDURAS PERMITIDAS.'),
(23, 'POLLO CON ENSALADA DE LECHUGA Y JITOMATE'),
(24, 'CARNE ASADA CON ENSALADA MIXTA Y GUACAMOLE'),
(25, 'SOPA DE VERDURAS Y CARNE ASADA CON ENSALADA VERDE, LIMÓN Y VINAGRE.'),
(26, 'CREMA DE ESPINACAS Y POLLO ASADO CON BROCOLI.'),
(27, 'HIGADO O CARNE DE RES ENCEBOLLADO Y  ENSALADA VERDE CON LIMÓN Y VINAGRE.'),
(28, 'ARROZ AL VAPOR, PESCADO ASADO Y  ENSALADA VERDE CON LIMÓN Y VINAGRE.'),
(29, 'SOPA DE PESCADO, CAMARONES A LA PLANCHA Y 1/2 AGUACATE.'),
(30, 'PESCADO ASADO CON LECHUGA, JITOMATE, CEBOLLA Y LIMÓN.'),
(31, 'BISTECES ASADOS Y ESPINACAS HERVIDAS CON POCA SAL.'),
(32, 'PESCADO ASADO CON JITOMATE Y LIMÓN'),
(33, 'ATÚN EN AGUA CON JITOMATE Y LIMÓN.'),
(34, 'CAMARONES FRITOS CON MANTEQUILLA Y ENSALADA VERDE.'),
(35, 'POLLO FRITO O ROSTIZADO CON ENSALADA VERDE.'),
(36, 'POLLO ASADO CON NOPALES Y LIMÓN.'),
(37, 'BISTECK A LA PARRILLA CON ESPINACAS Y LIMÓN, FRUTA UNA SOLA CLASE.'),
(38, 'SPAGUETTI CON JITOMATE FRESCO Y QUESO PANELA.'),
(39, 'FAJITAS DE RES Ó POLLO CON LECHUGA, JITOMATE Y LIMÓN.'),
(40, 'CHULETA DE PUERCO Ó RES CON BROCOLÍ Ó PEPINO.'),
(41, 'PECHUGA DE POLLO FRITO CON BROCOLÍ Y LIMÓN.'),
(42, 'SOPA DE VERDURAS PERMITIDAS Y UNA REBANADA DE PIZZA'),
(43, 'CARNE DE HAMBURGUESA CON 1/2 AGUACATE'),
(44, 'CARNE DE HAMBURGUESA CON LECHUGA , JITOMATE Y COLIFLOR.'),
(45, 'SOPA DE VERDURAS Y JAMÓN DE PECHUGA DE PAVO ASADO CON BROCOLÍ'),
(46, 'ALBÓNDIGAS DE RES CON ARROZ BLANCO'),
(47, 'SOPA DE VERDURAS PERMITIDAS Y PECHUGA DE POLLO A LA PLANCHA'),
(48, 'FAJITAS DE RES Ó DE POLLO CON LECHUGA Y JITOMATE.'),
(49, 'SOPA DE VERDURAS Y CARNE DE HAMBURGUESA CON ENSALADA DE PEPINO'),
(50, 'POLLO ASADO Y ENSALADA DE LECHUGA ADEREZADA CON ACEITE DE OLIVA'),
(51, 'SOPA DE VERDURAS PERMITIDAS Y UNA CHULETA DE RES.'),
(52, 'CHULETA DE PUERCO Ó RES CON BROCOLÍ Ó PEPINOS'),
(53, 'PECHUGA DE POLLO ASADO CON NOPALES'),
(54, 'PAPAYA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas_desayuno`
--

CREATE TABLE `dietas_desayuno` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dietas_desayuno`
--

INSERT INTO `dietas_desayuno` (`ID`, `nombre`) VALUES
(1, 'CAFÉ O TEA, PAPAYA Y DOS HUEVOS REVUELTOS CON JAMON DE PAVO'),
(2, 'CAFÉ O TEA, MELÓN Y QUESO PANELA ASADO CON NOPAL'),
(3, 'CAFÉ O TEA, PAPAYA Y SALCHICHICHAS DE PAVO A LA MEXICANA'),
(4, 'CAFÉ O TEA, MELÓN Y UN OMELETE DE ESPINACAS CON QUESO PANELA'),
(5, 'CAFÉ O TEA, PAPAYA Y CHILAQUILES CON POLLO'),
(6, 'CAFÉ O TEA, MELÓN Y HUEVOS A LA MEXICANA'),
(7, 'CAFÉ O TEA, PAPAYA CON YOGURT DE SU PREFERENCIA, NO TIENE QUE SER LIGHT'),
(8, 'UN HUEVO TIBIO, COCIDO O REVUELTO Y JAMON DE PAVO'),
(9, 'JUGO DE NARANJA CON APIO Y REBANADAS DE JAMON DE PAVO'),
(10, 'PAPAYA '),
(12, 'JUGO DE TORONJA CON APIO, DOS HUEVOS A LA MEXICANA'),
(13, 'CEREAL ALL BRAN Ó BRAN FLAKES CON LECHE LIGHT.'),
(14, ' JUGO DE TORONJA CON APIO'),
(15, 'JUGO DE TORONJA CON APIO DOS HUEVOS CON JAMÓN DE PAVO Ó QUESO PANELA.'),
(16, 'CEREAL ALL BRAN Ó BRAN FLAKES CON LECHE LIGHT.'),
(17, 'JUGO DE NARANJA CON APIO, DOS GALLETAS DE SALVADO'),
(18, 'FRUTA, UNA SOLA CLASE.'),
(19, 'UN HUEVO TIBIO, COCIDO O REVUELTO Y JAMON DE PAVO'),
(20, 'PAPAYA Y DOS HUEVOS REVUELTOS CON JAMON DE PAVO'),
(21, 'MELÓN Y QUESO PANELA ASADO CON NOPAL'),
(22, 'PAPAYA Y SALCHICHAS DE PAVO A LA MEXICANA'),
(23, 'MELÓN Y UN OMELETE DE ESPINACAS CON QUESO PANELA'),
(24, 'PAPAYA Y CHILAQUILES CON POLLO'),
(25, 'PAPAYA CON YOGURT DE SU PREFERENCIA, NO TIENE QUE SER LIGHT'),
(26, 'MELÓN Y HUEVOS A LA MEXICANA'),
(27, 'CAFÉ O TEA, JUGO DE TORONJA CON APIO Y  DOS HUEVOS A LA MEXICANA'),
(28, 'CAFÉ O TEA Y CEREAL ALL BRAN Ó BRAN FLAKES CON LECHE LIGHT.'),
(29, 'CAFÉ O TEA,  JUGO DE TORONJA CON APIO Y NOPAL CON QUESO PANELA'),
(30, 'CAFÉ O TEA, JUGO DE TORONJA CON APIO Y  DOS HUEVOS CON JAMÓN DE PAVO Ó QUESO PANELA.'),
(31, 'CAFÉ O TEA Y CEREAL ALL BRAN Ó BRAN FLAKES CON LECHE LIGHT.'),
(32, 'CAFÉ O TEA, JUGO DE NARANJA CON APIO Y  DOS GALLETAS DE SALVADO'),
(33, 'CAFÉ O TEA, FRUTA DE UNA SOLA CLASE Y DOS HUEVOS CON QUESO PANELA'),
(34, 'CAFÉ O TEA Y DOS HUEVOS CON JAMÓN DE PAVO.'),
(35, 'CAFÉ O TEA, SALCHICHAS DE PAVO ASADAS CON JITOMATE, PEPINO, CEBOLLA Y LIMÓN.'),
(36, 'CAFÉ O TEA, JUGO DE NARANJA NATURAL Y  DOS HUEVOS CON QUESO PANELA.'),
(37, 'TODO EL CAFÉ QUE DESEE SIN AZUCAR (USAR SPLENDA) Y DOS HUEVOS CON JAMÓN DE PAVO.'),
(38, 'JUGO DE TORONJA NATURAL Y JAMÓN DE PAVO CON JITOMATE Y LIMÓN.'),
(39, 'TODO EL CAFÉ QUE DESEE SIN AZUCAR (USAR SPLENDA) Y TODA LA PAPAYA QUE DESEE CON LIMÓN.'),
(40, 'UN PLATO DE MENUDO Ó JAMON DE PAVO'),
(41, 'DOS HUEVOS CON TOCINO Ó CHORIZO'),
(42, 'DOS HUEVOS CON QUESO PANELA.'),
(43, 'TODO EL TÉ QUE DESEE CON LIMÓN.'),
(44, 'JUGO DE NARANJA'),
(45, 'DURAZNOS Y CAFÉ.'),
(46, 'LICUADO DE PAPAYA EN AGUA.'),
(47, 'PLÁTANOS Y CAFÉ.'),
(48, 'FRUTA, UNA SOLA CLASE.'),
(49, 'NARANJAS O TORONJAS A GAJOS Y JAMON DE PAVO A LA MEXICANA'),
(50, 'AGUA DE PAPAYA Y HUEVOS REVUELTOS A LA MEXICANA'),
(51, 'UN SANDWICH DE PAN INTEGRAL CON JAMÓN DE PAVO, UN CAFÉ CON LECHE LIGHT.'),
(52, 'UN SANDWICH DE PAN INTEGRAL CON JAMÓN DE PAVO, UN CAFÉ CON LECHE LIGHT.'),
(53, 'DOS HUEVOS REVUELTOS CON JAMÓN DE PAVO.'),
(54, 'CAFÉ O TEA Y SALCHICHAS DE PAVO CON PICO DE GALLO'),
(55, 'CAFÉ O TEA Y PAPAYA CON GRANOLA'),
(56, 'CAFÉ O TEA, JUGO DE NARANJA NATURAL Y UN OMELETE DE CHAMPIÑONES'),
(57, 'CAFÉ O TEA, LICUADO DE PAPAYA EN AGUA Y DOS GALLETAS DE AVENA.'),
(58, 'CAFÉ O TEA, JUGO DE TORONJA CON APIO Y DOS HUEVOS CON JAMON DE PAVO'),
(59, 'CAFÉ O TEA Y FRUTA DE  UNA SOLA CLASE CON QUESO COTTAGE'),
(60, 'JAMÓN DE PAVO CON JITOMATE Y CEBOLLA.'),
(61, 'CAFÉ CON LECHE LIGHT, PLATANOS'),
(62, 'UN PAN INTEGRAL TOSTADO, CAFÉ CON LECHE LIGHT (PUEDE UTILIZAR MIEL DE ABEJA).'),
(63, 'LIBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas_entrecomidas`
--

CREATE TABLE `dietas_entrecomidas` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dietas_entrecomidas`
--

INSERT INTO `dietas_entrecomidas` (`ID`, `nombre`) VALUES
(1, 'MANZANA VERDE'),
(2, 'PAPAYA'),
(3, 'MELÓN'),
(4, 'LIBRE'),
(5, 'JAMÓN DE PAVO'),
(6, 'APIO'),
(7, 'JICAMA'),
(8, 'GELATINA LIGHT'),
(9, 'PEPINO'),
(10, 'QUESO PANELA'),
(11, 'TORONJA'),
(12, 'PAPAYA'),
(13, 'SALCHICHA ASADA'),
(14, 'UVAS VERDES'),
(15, 'EDAMAMES'),
(16, 'ALMENDRAS'),
(17, 'PIÑA'),
(18, 'SURIMI'),
(19, 'CHAYOTES'),
(20, 'NOPALES ASADOS'),
(21, 'ARANDANOS'),
(22, 'CHAMPIÑONES'),
(23, 'NARANJAS'),
(24, 'CALABAZAS ASADAS'),
(25, 'JAMÓN DE PAVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dietas_usuarios`
--

CREATE TABLE `dietas_usuarios` (
  `id` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `dia_semana` varchar(1000) NOT NULL,
  `desayuno` int(11) NOT NULL,
  `entre_comidas` int(11) NOT NULL,
  `comida` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dietas_usuarios`
--

INSERT INTO `dietas_usuarios` (`id`, `id_usuario`, `dia_semana`, `desayuno`, `entre_comidas`, `comida`, `cena`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 3, 'lunes', 29, 25, 40, 5, '2020-07-01', '2020-07-08'),
(2, 3, 'martes', 32, 24, 37, 5, '2020-07-01', '2020-07-08'),
(3, 3, 'miercoles', 36, 19, 21, 1, '2020-07-01', '2020-07-08'),
(4, 3, 'jueves', 56, 15, 34, 14, '2020-07-01', '2020-07-08'),
(5, 3, 'viernes', 4, 3, 40, 47, '2020-07-01', '2020-07-08'),
(11, 7, 'lunes', 23, 1, 53, 13, '0000-00-00', '0000-00-00'),
(12, 7, 'martes', 52, 16, 10, 17, '0000-00-00', '0000-00-00'),
(13, 7, 'miercoles', 3, 9, 12, 31, '0000-00-00', '0000-00-00'),
(14, 7, 'jueves', 3, 2, 42, 1, '0000-00-00', '0000-00-00'),
(15, 7, 'viernes', 61, 8, 45, 12, '0000-00-00', '0000-00-00'),
(16, 10, 'lunes', 52, 14, 26, 40, '0000-00-00', '0000-00-00'),
(17, 10, 'martes', 32, 12, 1, 39, '0000-00-00', '0000-00-00'),
(18, 10, 'miercoles', 44, 21, 46, 18, '0000-00-00', '0000-00-00'),
(19, 10, 'jueves', 28, 12, 44, 31, '0000-00-00', '0000-00-00'),
(20, 10, 'viernes', 30, 16, 29, 14, '0000-00-00', '0000-00-00'),
(21, 12, 'lunes', 33, 7, 1, 13, '0000-00-00', '0000-00-00'),
(22, 12, 'martes', 15, 9, 5, 19, '0000-00-00', '0000-00-00'),
(23, 12, 'miercoles', 30, 21, 34, 17, '0000-00-00', '0000-00-00'),
(24, 12, 'jueves', 12, 17, 51, 9, '0000-00-00', '0000-00-00'),
(25, 12, 'viernes', 21, 7, 21, 25, '0000-00-00', '0000-00-00'),
(26, 13, 'lunes', 18, 22, 16, 24, '0000-00-00', '0000-00-00'),
(27, 13, 'martes', 12, 10, 51, 14, '0000-00-00', '0000-00-00'),
(28, 13, 'miercoles', 8, 11, 37, 17, '0000-00-00', '0000-00-00'),
(29, 13, 'jueves', 27, 13, 42, 37, '0000-00-00', '0000-00-00'),
(30, 13, 'viernes', 45, 13, 11, 38, '0000-00-00', '0000-00-00'),
(31, 11, 'lunes', 13, 5, 54, 6, '0000-00-00', '0000-00-00'),
(32, 11, 'martes', 14, 12, 51, 39, '0000-00-00', '0000-00-00'),
(33, 11, 'miercoles', 27, 21, 5, 40, '0000-00-00', '0000-00-00'),
(34, 11, 'jueves', 57, 1, 51, 45, '0000-00-00', '0000-00-00'),
(35, 11, 'viernes', 9, 2, 8, 46, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id`, `userId`, `token`) VALUES
(89, 5, 'ZjE5YmZjNDk1OTA0N2IzZGIxZjU5MDBlMzU0MWQ0YWU3ZmEwMDJhY2FkYjNlNTE2MTU5NjA4ODgwNg=='),
(92, 3, 'Njg3ZDE5MWI0NzY1MDI2OWI4ODI0YzM1MjJmNzZhYzBkYTYzYzg4Y2RhODVjMjM1MTU5NjE3OTYzMQ=='),
(93, 3, 'OWYxZjBmNmY4ZDk2Zjc2ZDdjYjEyMjQ1NTQ0YzVhNjViOWMyYTFiZWI2YjE1ZmFhMTU5NjE4NDY4MQ=='),
(94, 3, 'NjMxZTE5ZWJkYjFlOGEyNzFmMWFkYTA3ODQ3ZWM4NGFkNTc0YWVkYzYyNTE4YjA4MTU5NjE4NjU4Nw=='),
(95, 3, 'MjBmN2ViNzM5YzQ5OTQwNmRjNzVkNTg3NGJkMTFlNzYwZGI3ZWVmMzk4MzdmMDgwMTU5NjE4Njc3MA=='),
(96, 3, 'M2QyNmViYjNlMGQxMzUzNzYzM2EwNzA3MDAyZmFkN2M1MmMyYzE4ZGQ3MmQyYTlhMTU5NjE4NzIyNA=='),
(97, 3, 'YzRhYTUzOTc0OTQxNzZhYTU5YmE5ZjgzNmEzMGE2N2M3NDRhOTA3ZDZhODJlZDhlMTU5NjE4NzYyNw=='),
(98, 3, 'NThhMzRhYmNkZjMzYmJlZDAxOWNhODYyYmQyMjU0MzAyZDRkNzk0OWYzOTcxZjViMTU5NjE4ODAyOA=='),
(99, 3, 'ZWFjZDJhODliYjQwOGIyOGI5YjEzYmFjMWQxNGMwZjJkNTQ3M2RmMDFlNTg3YzRmMTU5NjE4ODEwNA=='),
(100, 3, 'NzNkM2FkMTQ2MGJhNGU3ZTg3OWMyZjYxMDg4MGE3ZjAwNGQyZTVmMmNlMjYyNTU4MTU5NjE4ODI1NA=='),
(101, 3, 'OTA5ZmQxNDVhOTNmODVlNWE0OWUwOGJmNTc1ZDgxMTA5Njc5ZGExYTMwNDA2MjYxMTU5NjE4ODc1OA=='),
(102, 3, 'YTEzMTc0ZjBjMTkzMGYwMWYyNjI3NTUxYzM2ZTU1NzQ3OWQ5YzIwODc4MGIwM2EwMTU5NjE4ODg3Mw=='),
(103, 3, 'YTI5MTg0NGE4ZjhkY2Q1MTU3NzUxYmQ3MGQzMWY3YTg4ZjE5MzU3ZjRhZTM5NWJjMTU5NjE4OTE4Mg=='),
(104, 3, 'ZWNlY2EwOWJkNTY3MzFjMzViMDkyMzdjNzk5MzViNzkyMTgwZWQ3NjBiNzBjMDI5MTU5NjE4OTIzMQ=='),
(105, 3, 'YTgxNjQzODFlZTVhNWMzNWY1MjU2NjEyNWU3Y2RkYzBjNjkxYjc4YjRiOGE3NzAzMTU5NjE4OTQwNg=='),
(107, 5, 'YTRjYjAxNWMzZGE0NDI2NDk4ZGYyOTFmOTYxYWNmNzliYjMyM2VhYzc4MjU0ZGY3MTU5NjIwNDA0OA=='),
(108, 3, 'NmM5YjE0ZTQ0N2EzYzViZmRhNWQyZjFhMTBiYWE2ODZiZDg0ZDQzYTY4MTMyMzAyMTU5NjIwNDc2MA=='),
(109, 7, 'MjRkODM5NGE3ZTA3YTVhMGIzZWNjOWE4MTBiNGM5MzlkOGY4YWM1Yjc2MTljZjEzMTU5NjIwNDgzNg=='),
(111, 10, 'OTQ0ODZlZGQwZmUzMjE1MzBjYWU1YmVjZDRlMzA5OWM5MTQxOWJkNjk4ZmUxNzY2MTU5NjIxMTA4Ng=='),
(113, 5, 'ZGQ2Y2M0MTc1ZGEwZjExZjExNjdkMmEyNmE2MDViOWNmYTc3Mjk0MGJiNjExNjVhMTU5NjIxMTQzMw=='),
(119, 12, 'MTIzYmRkYTM0Y2RjYzA3M2NiNGQ3MDBmZTZiZTdiYzUzOTA1ZjgwMDAxOWJhMDM0MTU5NjIxMjAyMA=='),
(121, 13, 'YTU1YTIxOGYxOWE0NjgzZjg3NGM5YjFiOTc5ZjM4NTc2NDMxODMwNDkyY2ZjZGQzMTU5NjIxMjQ3OA=='),
(122, 5, 'YmZhOTAyMDRkOGI0N2U0OWFlNjk4MzQwOTQwYWFjZjIxZDYzYjU3YTI2ODJlMzc5MTU5NjIxMjU3MA=='),
(124, 11, 'MGZiMjMxNzNiZmZiZGU1MjRkNWQ1ZDkxYzYzYmIzZmQ4ZDMzMTNjM2NjZDQxNDBlMTU5NjIxMjc3OQ==');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `accestoken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `completada` enum('Y','N') NOT NULL DEFAULT 'N',
  `userid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `apellido` varchar(500) NOT NULL,
  `edad` varchar(500) NOT NULL,
  `peso` varchar(500) NOT NULL,
  `estatura` varchar(500) NOT NULL,
  `movil` varchar(500) NOT NULL,
  `correo` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `tipo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `edad`, `peso`, `estatura`, `movil`, `correo`, `password`, `tipo`) VALUES
(3, 'David Jacobo', 'Sanchez Ferman', '25', '65', '1.70', '65758595', 'david.sf03@gmail.com', '$2y$10$NSp65Z.FvsIF8kUlRsg2y.PDiar.UWcZuCkBL/M63BG6zrKtZiihq', 'cliente'),
(5, 'Hernesto Franco', 'Gonzales', '25', '65', '1.50', '65758595', 'franco@gmail.com', '$2y$10$qWxj9fDZj7vMKTkmu7azz.84Fy3BwB/zYe.zMt/qV50xxhkdtW3qu', 'nutriologo'),
(6, 'Alonso', 'Perez', '34', '80', '1.90', '3648449494', 'ddhd@gmail.com', '79834984398', 'cliente'),
(7, 'Hernesto Franco2', 'Gonzales2', '25', '65', '1.85', '65758595', 'francos@gmail.com', '$2y$10$5ww5OKVYAlfrxLFsMffLlOiBoAa2R02z7syD6FEpjGx1xiBL7Qfr2', 'cliente'),
(8, 'Hernesto Franco2', 'Gonzales2', '25', '65', '1.70', '65758595', 'francos89@gmail.com', '$2y$10$/sRjI7pZPMHd6MJlcHowK.rQglg7/MU608ru1a7CnyA43ulky29FC', 'cliente'),
(10, 'Alexis', 'Ferman', '27', '57', '1.90', '57632819', 'alexisfer@gmail.com', '$2y$10$IlnKejufyGwd0Fg1mTRDte4lpdiLiUQ55po5Nh3p2S71696Wq0W2u', 'cliente'),
(11, 'Elexis', 'carrasco', '23', '76', '1.80', '57342818', 'carrasco23@gmail.com', '$2y$10$fBrZgW1bJEIWlpoJ6ui4WOYDS9ANy7XreDpEbkT8Z6XTVkKkGHPyS', 'cliente'),
(12, 'Fabian', 'fabi', '23', '50', '1.90', '54637383', 'fabian123@gmail.com', '$2y$10$/XwZv.pBP7O3vz9qr30/5ebacgqYQmM42EzTKd4GY0VuTScKCJF/q', 'cliente'),
(13, 'Esteban', 'Ramirez', '34', '60', '1.80', '547484484', 'esteban123@gmail.com', '$2y$10$0W1327bgn2caCmx6hFrWEuAmkV6uALUw8eAkmKUBbuukM1ixnixCy', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `useractive` enum('N','Y') NOT NULL DEFAULT 'Y',
  `loginintentos` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `fullname`, `username`, `password`, `useractive`, `loginintentos`) VALUES
(4, 'prueba', 'prueba', '$2y$10$Lt7cwNbI8/RziTUVBA.8oODMMVr0GUaDIghkSHQhQq2MTZHdVfwlW', 'Y', 0),
(5, 'ejemplo', 'ejemplo', '$2y$10$gYdiMhOUezqA6J97xpPUfeJUiOHSOItYsO/12H6/gVzSjmQKilO8S', 'Y', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_test`
--

CREATE TABLE `usuario_test` (
  `id_test` int(11) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `actividad_fisica` varchar(500) NOT NULL,
  `evacuacion` varchar(500) NOT NULL,
  `padecimientos` varchar(500) NOT NULL,
  `medicacion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_test`
--

INSERT INTO `usuario_test` (`id_test`, `id_usuario`, `actividad_fisica`, `evacuacion`, `padecimientos`, `medicacion`) VALUES
(1, 8, 'futbol', 'buena', 'tos', 'ninguna'),
(3, 10, 'Ejercicio', '', '', 'Aspirinas'),
(4, 11, 'corro', '', '', 'aspirina'),
(5, 12, 'ejercicio', '', '', 'aspirina'),
(6, 13, 'nada', '', '', 'aspirina');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dietas_cena`
--
ALTER TABLE `dietas_cena`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dietas_comida`
--
ALTER TABLE `dietas_comida`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dietas_desayuno`
--
ALTER TABLE `dietas_desayuno`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dietas_entrecomidas`
--
ALTER TABLE `dietas_entrecomidas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `dietas_usuarios`
--
ALTER TABLE `dietas_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `desayuno` (`desayuno`),
  ADD KEY `entre_comidas` (`entre_comidas`),
  ADD KEY `comida` (`comida`),
  ADD KEY `cena` (`cena`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accestoken` (`accestoken`),
  ADD KEY `sessionuserid_fk` (`userid`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taskuserid_fk` (`userid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_test`
--
ALTER TABLE `usuario_test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dietas_cena`
--
ALTER TABLE `dietas_cena`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `dietas_comida`
--
ALTER TABLE `dietas_comida`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `dietas_desayuno`
--
ALTER TABLE `dietas_desayuno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `dietas_entrecomidas`
--
ALTER TABLE `dietas_entrecomidas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `dietas_usuarios`
--
ALTER TABLE `dietas_usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_test`
--
ALTER TABLE `usuario_test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dietas_usuarios`
--
ALTER TABLE `dietas_usuarios`
  ADD CONSTRAINT `dietas_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `dietas_usuarios_ibfk_2` FOREIGN KEY (`desayuno`) REFERENCES `dietas_desayuno` (`ID`),
  ADD CONSTRAINT `dietas_usuarios_ibfk_3` FOREIGN KEY (`entre_comidas`) REFERENCES `dietas_entrecomidas` (`ID`),
  ADD CONSTRAINT `dietas_usuarios_ibfk_4` FOREIGN KEY (`comida`) REFERENCES `dietas_comida` (`ID`),
  ADD CONSTRAINT `dietas_usuarios_ibfk_5` FOREIGN KEY (`cena`) REFERENCES `dietas_cena` (`ID`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `sesion_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sessionuserid_fk` FOREIGN KEY (`userid`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `taskuserid_fk` FOREIGN KEY (`userid`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuario_test`
--
ALTER TABLE `usuario_test`
  ADD CONSTRAINT `usuario_test_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
