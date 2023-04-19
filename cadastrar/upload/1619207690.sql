-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Mar-2021 às 15:52
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts_msgs`
--

DROP TABLE IF EXISTS `contacts_msgs`;
CREATE TABLE IF NOT EXISTS `contacts_msgs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `contacts_msgs`
--

INSERT INTO `contacts_msgs` (`id`, `name`, `email`, `subject`, `content`, `created`, `modified`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', 'Escrever 1', 'Escrever 1', '2021-03-18 12:30:15', NULL),
(2, 'Cesar', 'cesar2@celke.com.br', 'Escrever 2', 'Escrever 2', '2021-03-18 12:43:41', NULL),
(3, 'Cesar', 'cesar3@celke.com.br', 'Escrever 3', 'Escrever 3', '2021-03-18 12:44:52', NULL),
(4, 'Cesar', 'cesar4@celke.com.br', 'Escrever 4', 'Escrever 4', '2021-03-18 12:49:05', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
