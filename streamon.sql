-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2021 at 09:17 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Comédie'),
(4, 'Drame'),
(5, 'Fantastique'),
(6, 'Surnaturel'),
(7, 'Mystère'),
(8, 'Shonen'),
(9, 'Seinen'),
(10, 'Shoujo'),
(11, 'Josei'),
(12, 'Kodomomuke'),
(13, 'Psychologique'),
(14, 'Romance'),
(15, 'Science-fiction');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url2` varchar(255) DEFAULT NULL,
  `release_date` date NOT NULL,
  `synopsis` text NOT NULL,
  `actor` varchar(255) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `add_date` datetime NOT NULL,
  `add_by` varchar(50) NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `edit_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `title`, `url`, `url2`, `release_date`, `synopsis`, `actor`, `genre`, `add_date`, `add_by`, `edit_date`, `edit_by`) VALUES
(20, 'Le Château Ambulant', 'https://uptostream.com/iframe/v4jt2gp7u0gv', NULL, '2004-11-20', 'Une jeune fille de dix-huit ans, Sophie, qui travaille dans le magasin de son défunt père, rencontre par hasard un mystérieux sorcier nommé Hauru, lors d\'une course poursuite. Celui-ci la prend alors en sympathie. Cependant la sorcière des Landes, qui est amoureuse de Hauru, devient jalouse de l\'attention portée à Sophie par ce dernier. Pour se venger, elle décide de transformer la jeune fille en une vieille dame de quatre-vingt-dix ans. Incapable de révéler cette transformation à sa famille, elle s\'enferme chez elle, puis s\'enfuit...', 'Hayao Miyazaki', 'Fantastique', '2021-06-02 01:33:20', 'Ronflex', '2021-06-02 01:44:49', 'Ripbouboul1'),
(22, 'Demon Slayer - Le train de l\'Infini', 'https://uptostream.com/iframe/14rrczb64xiu', NULL, '2021-05-19', 'Le groupe de Tanjirô a terminé son entraînement de récupération au domaine des papillons et embarque à présent en vue de sa prochaine mission à bord du train de l\'infini, d\'où quarante personnes ont disparu en peu de temps. Tanjirô et Nezuko, accompagnés de Zen\'itsu et Inosuke, s\'allient à l\'un des plus puissants épéistes de l\'armée des pourfendeurs de démons, le Pilier de la Flamme Kyôjurô Rengoku, afin de contrer le démon qui a engagé le train de l\'Infini sur une voie funeste.', 'Haruo Sotozaki', 'Action', '2021-06-02 12:45:12', 'Ronflex', NULL, NULL),
(23, 'Attack on Titan: Chronicle', 'https://uptostream.com/iframe/c67bdadf2gpe', NULL, '2020-07-17', 'Il s\'agit d\'un film d\'animation compilant les 59 premiers épisodes (saison 1 à 3) de la série animée L\'Attaque des Titans. \r\nDans un monde ravagé par des titans mangeurs d’homme depuis plus d’un siècle, les rares survivants de l’Humanité n’ont d’autre choix pour survivre que de se barricader dans une cité-forteresse. Le jeune Eren, témoin de la mort de sa mère dévorée par un titan, n’a qu’un rêve : entrer dans le corps d’élite chargé de découvrir l’origine des titans, et les annihiler jusqu’au dernier…', 'Hajime Isayama', 'Action', '2021-06-02 13:06:37', 'Ronflex', NULL, NULL),
(24, 'Les enfants du temps', 'https://uptostream.com/iframe/tvr2uykm8y29', NULL, '2020-05-27', 'Jeune lycéen, Hodaka fuit son île pour rejoindre Tokyo. Sans argent ni emploi, il tente de survivre dans la jungle urbaine et trouve un poste dans une revue dédiée au paranormal. Un phénomène météorologique extrême touche alors le Japon, exposé à de constantes pluies. Hodaka est dépêché pour enquêter sur l\'existence de prêtresses du temps. Peu convaincu par cette légende, il change soudainement d\'avis lorsqu\'il croise la jeune Hina...', 'Makoto Shinkai', 'Drame', '2021-06-02 15:55:35', 'Ronflex', NULL, NULL),
(29, 'Your Name', 'https://uptostream.com/iframe/hioy5ejihlfo', NULL, '2017-12-07', 'Mitsuha, adolescente coincée dans une famille traditionnelle, rêve de quitter ses montagnes natales pour découvrir la vie trépidante de Tokyo. Elle est loin d’imaginer pouvoir vivre l’aventure urbaine dans la peau de… Taki, un jeune lycéen vivant à Tokyo, occupé entre son petit boulot dans un restaurant italien et ses nombreux amis. À travers ses rêves, Mitsuha se voit littéralement propulsée dans la vie du jeune garçon au point qu’elle croit vivre la réalité... Tout bascule lorsqu’elle réalise que Taki rêve également d’une vie dans les montagnes, entouré d’une famille traditionnelle… dans la peau d’une jeune fille ! Une étrange relation s’installe entre leurs deux corps qu’ils accaparent mutuellement. Quel mystère se cache derrière ces rêves étranges qui unissent deux destinées que tout oppose et qui ne se sont jamais rencontrées ?', 'Shinkai Makoto', 'Fantastique', '2021-06-02 18:47:05', 'Ronflex', '2021-06-03 00:40:52', 'Ronflex'),
(30, 'Loin De Moi, Près De Toi', 'https://uptostream.com/iframe/ond0uy463a44', NULL, '2020-07-20', 'L\'histoire prend place dans la ville de Tokoname située dans la préfecture d\'Aichi. Nous y suivons le quotidien de Miyo Sasaki, une collégienne amoureuse de son camarade de classe nommé Kento Hinode. Malgré tous les efforts de Sasaki pour se faire remarquer, Hinode ne fait pas attention à elle. Un jour, elle découvre un étrange masque lui permettant de se transformer en un chat nommé Tarō. Grâce à cet objet, elle peut se rapprocher de celui qu\'elle aime. Cependant, à force de l\'utiliser, elle pourrait bien ne plus retrouver sa forme originelle...', 'Sato Jun\'ichi', 'Romance', '2021-06-09 21:42:20', 'Ronflex', '2021-06-09 21:50:08', 'Ronflex');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
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
(18, 'ardfsfsfe', 'dazrrfs@gmzil.com', '$2y$10$Wg1zkoGcUR.Wg1a6OHCOp.rRX4sZw3YQbJt8H0foNdqsdqnHTC4bYCNMXu', NULL, '2021-05-20 00:56:44', NULL, NULL, NULL, 0, 0),

-- --------------------------------------------------------

--
-- Table structure for table `member_fav`
--

CREATE TABLE `member_fav` (
  `member_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_fav`
--

INSERT INTO `member_fav` (`member_id`, `film_id`) VALUES
(14, 22),
(14, 23),
(14, 29),
(14, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `member_fav`
--
ALTER TABLE `member_fav`
  ADD PRIMARY KEY (`member_id`,`film_id`),
  ADD KEY `film_id` (`film_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_fav`
--
ALTER TABLE `member_fav`
  ADD CONSTRAINT `film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
