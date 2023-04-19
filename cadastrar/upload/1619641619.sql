-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Abr-2021 às 02:43
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `obtencao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atas`
--

CREATE TABLE `tb_atas` (
  `id_ata` int(11) NOT NULL,
  `ata` varchar(10) NOT NULL,
  `vigencia` date DEFAULT NULL,
  `uasg` int(11) NOT NULL,
  `pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_atas`
--

INSERT INTO `tb_atas` (`id_ata`, `ata`, `vigencia`, `uasg`, `pdf`) VALUES
(33, '64/2020', '2022-02-08', 80020, '1617548109.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `id_item` int(11) NOT NULL,
  `id_ata` int(11) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `preco_unitario` float DEFAULT NULL,
  `preco_total` float DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_itens`
--

INSERT INTO `tb_itens` (`id_item`, `id_ata`, `descricao`, `qtd`, `preco_unitario`, `preco_total`, `uf`, `item`) VALUES
(43, 33, 'Contratação de sistema de geração de energia\r\nsolar fotovoltaica conectados à rede (on-grid)\r\npara o Tribunal Regional da 18ª Região.\r\nInversores: Fronius, modelo SYMO 20.0-3-M\r\nMódulos: JA Solar, modelo JAM72S09-390/PR\r\nEstruturas: Sonnen', 788, 333500, 333500, 'Kwp', '1'),
(44, 33, 'Diária', 14, 117, 117, 'unid', '2'),
(45, 33, 'Contratação de sistema de geração de\r\nenergia solar fotovoltaica conectados à rede\r\n(on-grid) para a Escola Naval da Marinha\r\ndo Brasil.\r\nInversores: Fronius, modelos SYMO 20.0-3-\r\nM e 12.5-3-M Módulos: JA Solar, modelo\r\nJAM72S09-390/PR Estruturas: Sonnen.', 300, 3130, 3130, 'Kwp', '3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_niveis_acesso`
--

CREATE TABLE `tb_niveis_acesso` (
  `id_nivel_acesso` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_niveis_acesso`
--

INSERT INTO `tb_niveis_acesso` (`id_nivel_acesso`, `nome`) VALUES
(1, 'Administrador'),
(2, 'Padrão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `niveis_acesso_id`, `nip`, `senha`) VALUES
(1, 1, '19090242', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 1, '26992779', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_atas`
--
ALTER TABLE `tb_atas`
  ADD PRIMARY KEY (`id_ata`);

--
-- Índices para tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_ata` (`id_ata`);

--
-- Índices para tabela `tb_niveis_acesso`
--
ALTER TABLE `tb_niveis_acesso`
  ADD PRIMARY KEY (`id_nivel_acesso`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `niveis_acesso_id` (`niveis_acesso_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_atas`
--
ALTER TABLE `tb_atas`
  MODIFY `id_ata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tb_niveis_acesso`
--
ALTER TABLE `tb_niveis_acesso`
  MODIFY `id_nivel_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD CONSTRAINT `tb_itens_ibfk_1` FOREIGN KEY (`id_ata`) REFERENCES `tb_atas` (`id_ata`);

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`niveis_acesso_id`) REFERENCES `tb_niveis_acesso` (`id_nivel_acesso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
