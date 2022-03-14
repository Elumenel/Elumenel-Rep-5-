-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 04:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpintermedio`
--


-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `fecha_toma` date DEFAULT NULL,
  `lugar` varchar(40) DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `categorias1` varchar(20) DEFAULT NULL,
  `categorias2` varchar(20) DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `dimensiones` varchar(10) DEFAULT NULL,
  `stock` int(4) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `estado` tinyint(2) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `titulo`, `fecha_toma`, `lugar`, `pais`, `imagen`, `categorias1`, `categorias2`, `formato`, `dimensiones`, `stock`, `precio`, `estado`, `date_added`) VALUES
(1, 'Puerta al Báltico', '2012-08-01', 'Peterhof', 'Rusia', 'peterhof.jpg', 'pcult|pnat', 'mar|par', 'horizontal', '21x30', 5, 1000, 1, '2022-03-12 20:38:06'),
(2, 'Colores planos/planos de colores', '2012-08-01', 'Centre Pompidou', 'Francia', 'pompidou.jpg', 'int', ' ', 'horizontal', '21x30', 5, 1199, 1, '2022-03-12 17:59:01'),
(3, 'Luces de al-Qāhirah', '2012-06-01', 'Mezquita de Muhammad Ali Pasha', 'Egipto', 'mosque_map.jpg', 'int', ' ', 'vertical', '21x30', 5, 1199, 0, '2022-03-13 11:51:17'),
(4, 'Desfasajes temporales', '2012-06-01', 'Desierto de Giza', 'Egipto', 'giza.jpg', 'pcult|pnat', 'des', 'horizontal', '21x30', 10, 1199, 1, '2022-03-13 11:51:12'),
(5, 'Punto de fuga', '2012-08-01', 'Paris Plages', 'Francia', 'rivera_paris.jpg', 'pcult|purb', 'pla', 'horizontal', '21x30', 5, 1199, 1, '2022-03-13 11:51:14'),
(6, 'Una vez en la montaña', '2012-10-01', 'Salecchio Superiore', 'Italia', 'formazza.jpg', 'pcult|pnat|prur', 'mon', 'horizontal', '21x30', 5, 1199, 1, '2022-03-13 11:51:14'),
(9, 'Actividad de invierno', '2017-01-01', 'Earlswood Common', 'Inglaterra', 'duckylake.jpg', 'pnat', ' ', 'horizontal', '35x50', 15, 1199, 0, '2022-03-13 11:51:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
