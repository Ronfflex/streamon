-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2021 at 11:45 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamon`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url2` varchar(255) DEFAULT NULL,
  `miniature` blob,
  `release_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `actor` varchar(255) NOT NULL,
  `add_date` datetime NOT NULL,
  `add_by` varchar(50) NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `edit_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `title`, `url`, `url2`, `miniature`, `release_date`, `synopsis`, `actor`, `add_date`, `add_by`, `edit_date`, `edit_by`) VALUES
(20, 'Le Château Ambulant', 'https://uptostream.com/iframe/v4jt2gp7u0gv', NULL, NULL, '2004-11-20', 'Une jeune fille de dix-huit ans, Sophie, qui travaille dans le magasin de son défunt père, rencontre par hasard un mystérieux sorcier nommé Hauru, lors d\'une course poursuite. Celui-ci la prend alors en sympathie. Cependant la sorcière des Landes, qui est amoureuse de Hauru, devient jalouse de l\'attention portée à Sophie par ce dernier. Pour se venger, elle décide de transformer la jeune fille en une vieille dame de quatre-vingt-dix ans. Incapable de révéler cette transformation à sa famille, elle s\'enferme chez elle, puis s\'enfuit...', 'Hayao Miyazaki', '2021-06-02 01:33:20', 'Ronflex', '2021-06-02 01:44:49', 'Ripbouboul1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `mail`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`, `status`, `is_admin`) VALUES
(14, 'Ronflex', 'aiglevisnky@gmail.com', '$2y$10$Gx7f7BNtGSv0zdQJdKY6Rutskj7G2JYIvZ942/mfCCiC.KhprDnau', NULL, '2021-04-22 22:03:27', NULL, NULL, '3LqY4kvp57ERCsKh98NpswFU45jPcqemzv9vZAUBGe9r9mgiU0sXbfHrPYelnVxlK8WPBcn50CfK2gx4WJBejtwj84fC1p7hdJqVO5XTm5KQlNdZOTlBmK6xEHsP5Vb03CTIzqHU8AMBqwTDd1R041Lp2VfS9FyJeYGI3xS3HYfufCVpPWEUMV33BDMHVhG2nNSxTYI2tSmXcf752Of3yluwK88MHJr2lW9aRQMHcLQwwdFVdwCyrI3Wsd', 0, 1),
(16, 'Ronflexxx', 'aigleviszzznky@gmail.com', '$2y$10$SGiCg6tTG2dQd.1Zw642/uGKEILLcPtSJnD./mj7gmGYDGT846Gza', NULL, '2021-04-23 02:16:00', NULL, NULL, NULL, 0, 0),
(18, 'ardfsfsfe', 'dazrrfs@gmzil.com', '$2y$10$Wg1zkoGcUR.Wg1a6OHCOp.rRX4sZw3YQbJt8H0foNnHTC4bYCNMXu', NULL, '2021-05-20 00:56:44', NULL, NULL, NULL, 0, 0),
(19, 'Azerty1234', 'Azerty1234!@dkffjkmf.com', '$2y$10$5IXI.o7s0l683URw/tm7N.WWz53y5J0l7sxeyPKukCtGNXTh.OErK', NULL, '2021-05-24 17:50:50', NULL, NULL, NULL, 0, 0),
(20, 'zrrzrz', 'Azerty123!!@gmtia.com', '$2y$10$c3PZth/jlt1lQD8Y89/P5.NeLXURkCK0Pmt4VlmSJVOzuv9uXICJW', NULL, '2021-05-21 01:10:34', NULL, NULL, NULL, 0, 0),
(21, 'Azertyu1', 'Azertyu1!!@gmail.com', '$2y$10$.h5yhBOf8Vg490IDAwFQY.d35UNPyvWurCX/YG3grHmc4mb4OnMa2', 'eGNEfOrfABDddRmDhQ0IjKHhJogroyMJjcOQFyOOjlXQn254TTGyNDaSvCUV', NULL, NULL, NULL, NULL, 0, 0),
(23, 'Identifiant15', 'Identifiant15@gmail.com', '$2y$10$KcDGL/9SG28KEVAJ53R.iOreqAUSo7y11tHgZKz4hyqG4Yik7SREy', 'ezkNq7q0bsWk4sdDcLhtRHkBe5W6WRBDzEVvA8SSydJ7s3bwPQPwBu2m5LlI', NULL, NULL, NULL, NULL, 0, 0),
(24, 'Identifiant111', 'Identifiant111!@gmail.com', '$2y$10$1Cw83Fnzzzc3yxFQqTKzJeJbFNvqr26X63dfDObYrxpbx56VGTDfq', 'BANNED', NULL, NULL, NULL, NULL, 0, 0),
(25, 'Identiaidnfkj14', 'Identiaidnfkj14@gmail.com', '$2y$10$v9CYH.h8LfMMiXBDm5zUJ.WpdygbRDyavkPDKdgsZguf.UqZ2Qa/.', NULL, '2021-05-30 18:13:11', NULL, NULL, NULL, 0, 0),
(28, 'Pseudo1234', 'Pseudo1234!@gmail.com', '$2y$10$.mq07kNWTKgc3V84GndQHO3KGGUPU323Oy2B.delzkySdPK9Kt2Ly', 'r5SpC6eGKot39k5Z9PTD10gaYVY2rkXIGdDpd1N1y0RsdBOcm6r1Mx1iq5uz', NULL, NULL, NULL, NULL, 0, 0),
(29, 'Pseudo1235', 'Pseudo1235!@gmail.com', '$2y$10$opMLGrbJoP37gh3OWMmpo.vZrwU6I7rp//uJ9T.sJ8GhiFXHcDKXe', 'eEyTmPs11YaUqLV1PXoSsVAGMoBt9aSkr8bvK1pHaNEljStSYhZdCybFQ9Vk', NULL, NULL, NULL, NULL, 0, 0),
(30, 'Ripbouboul1', 'Ripbouboul1!@gmail.com', '$2y$10$VCZl/hFTf6zqtPsiDhbGF.Mg2zeWQspHz6fKK96LJhRIvdkCImEOO', NULL, '2021-05-30 18:11:47', NULL, NULL, NULL, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
