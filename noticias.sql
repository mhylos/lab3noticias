-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2022 a las 14:20:21
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_noticia`
--

CREATE TABLE `tabla_noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `resumen` varchar(1000) NOT NULL,
  `noticia` varchar(4000) NOT NULL,
  `fecha` date NOT NULL,
  `categoria` varchar(50) NOT NULL DEFAULT 'Otra Categoría'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla_noticia`
--

INSERT INTO `tabla_noticia` (`id`, `titulo`, `imagen`, `resumen`, `noticia`, `fecha`, `categoria`) VALUES
(1, 'Do anim proident officia in ex sunt consectetur proident et pariatur fugiat do qui.', 'avion__Latam_accidente_peru.PNG', 'Labore laboris officia exercitation deserunt reprehenderit elit velit culpa eu enim veniam commodo.', 'Sunt qui ipsum est aliquip do cillum nostrud. Ea cillum laboris ullamco anim irure laboris. Consectetur commodo sunt sit fugiat irure ipsum. Mollit nisi minim nulla aute veniam proident fugiat magna consectetur nostrud.', '2022-10-23', 'Accidentes'),
(2, 'Exercitation et occaecat magna deserunt enim veniam voluptate ad adipisicing nostrud ex deserunt fug', 'casado_con_hijos.webp', 'Culpa sint pariatur ipsum non labore dolor et ut fugiat enim ex.', 'Non ea consectetur pariatur consequat labore tempor mollit ex elit. Culpa voluptate id consequat mollit. Ea qui deserunt laboris quis amet exercitation est Lorem pariatur nulla tempor esse anim.', '2022-11-19', 'Otra Categoria'),
(4, 'In consectetur occaecat nisi dolor occaecat pariatur adipisicing anim reprehenderit.', 'pirata_caeluche.jpg', 'Aute eiusmod incididunt laborum consectetur ex dolore minim.', 'Amet minim in cupidatat excepteur mollit voluptate id do labore Lorem consequat laboris proident deserunt. Nulla sit officia enim do deserunt sint fugiat id veniam duis. Cillum nulla minim enim incididunt voluptate voluptate laboris elit qui labore consectetur anim veniam. Aliqua nisi nisi aliqua eu pariatur enim nisi duis ullamco laborum voluptate eu eu voluptate.', '2022-11-09', 'Cientifico'),
(5, 'Ad adipisicing enim fugiat consequat esse enim.', 'social-xi-jinping-invita-boric-visita-china-1200x633.jpg', 'Ex exercitation anim irure aliqua.', 'Non voluptate dolor aliqua veniam occaecat sint id. Cupidatat in commodo qui sint. Aute minim exercitation esse culpa consequat. Aute dolore sit minim cillum qui id reprehenderit. Elit sunt irure exercitation occaecat aliqua magna cupidatat ullamco commodo nisi ex ullamco labore enim. Do consequat minim ipsum dolore tempor velit laboris duis. Occaecat in elit tempor ea in eiusmod proident officia id est fugiat ullamco non eu.', '2022-11-20', 'Politica'),
(25, 'Do irure do laboris labore laboris.', 'argentina_senegal_lesiones_dias_debut_qatar_2022.jpg', 'Dolore do in exercitation in nostrud ullamco do.', 'Minim consequat commodo excepteur duis ut esse officia culpa pariatur commodo velit ad commodo. Irure nostrud eu minim fugiat non aliquip id ipsum consequat ad labore. Sit occaecat esse est velit occaecat eiusmod deserunt. Eiusmod eiusmod do laboris eiusmod magna ad sint id dolore exercitation ut ea fugiat ipsum. Labore cupidatat anim ullamco aute. Minim aute veniam mollit laboris non. Sunt sunt voluptate minim eu eu consequat duis ea dolore reprehenderit laboris.', '2022-11-09', 'Deportes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_noticia`
--
ALTER TABLE `tabla_noticia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_noticia`
--
ALTER TABLE `tabla_noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
