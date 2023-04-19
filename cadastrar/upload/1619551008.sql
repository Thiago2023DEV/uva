-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2017 às 01:38
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2017-12-01 00:00:00', NULL),
(2, 'Financeiro', '2017-11-08 00:00:00', NULL),
(3, 'Cliente', '2017-12-07 00:00:00', NULL),
(4, 'Suporte', '2017-12-19 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes`
--

CREATE TABLE `situacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `situacoes`
--

INSERT INTO `situacoes` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2017-11-01 05:16:14', NULL),
(2, 'Inativo', '2017-11-14 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `situacao_id` int(11) NOT NULL DEFAULT '2',
  `niveis_acessos_id` int(11) NOT NULL,
  `qnt_acessos` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modifed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `situacao_id`, `niveis_acessos_id`, `qnt_acessos`, `created`, `modifed`) VALUES
(1, 'Cesar', 'cesar@th.com', 1, 1, 10, '2017-12-01 00:00:00', NULL),
(2, 'Bruno', 'bruno@tg.com', 1, 2, 15, '2017-12-20 00:00:00', NULL),
(3, 'Bruna', 'bruna@fr.com', 2, 3, 20, '2017-12-20 00:00:00', '2017-12-02 16:25:51'),
(4, 'sai', 'sai@ftm.no', 2, 3, 25, '2017-12-13 00:00:00', NULL),
(5, 'sai1', 'sai@ftm.no', 2, 2, 30, '2017-12-20 00:00:00', NULL),
(9, 'Thiago Martins', 'souzathiago35@gmail.com', 1, 2, 35, '2017-12-02 15:35:17', NULL),
(10, 'Cleia Silva', 'cleia@gmail.com', 2, 3, 0, '2017-12-03 12:28:30', NULL),
(11, 'Maria', 'maria@logi.com', 2, 3, 0, '2017-12-03 12:32:49', NULL),
(12, 'Bruna Silva', 'bruna@gmail.com', 2, 3, 0, '2017-12-03 20:33:14', NULL),
(13, 'Bruna Silva', 'bruna@gmail.com', 2, 3, 0, '2017-12-03 20:33:47', NULL),
(14, 'Elvio', 'elvio@gmail.com', 2, 3, 0, '2017-12-03 20:54:21', NULL),
(16, 'Vitoria', 'vitoria@de.com', 2, 3, 0, '2017-12-03 21:02:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situacoes`
--
ALTER TABLE `situacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `situacao_id` (`situacao_id`),
  ADD KEY `niveis_acessos_id` (`niveis_acessos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `situacoes`
--
ALTER TABLE `situacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`situacao_id`) REFERENCES `situacoes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`niveis_acessos_id`) REFERENCES `niveis_acessos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
