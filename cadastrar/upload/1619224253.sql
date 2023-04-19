-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2021 às 22:24
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
  `pdf` varchar(100) NOT NULL,
  `id_despacho` int(11) DEFAULT NULL,
  `nome_empresa` varchar(250) NOT NULL,
  `cnpj` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_atas`
--

INSERT INTO `tb_atas` (`id_ata`, `ata`, `vigencia`, `uasg`, `pdf`, `id_despacho`, `nome_empresa`, `cnpj`) VALUES
(42, '64/2020', '2022-02-08', 80020, '1618153722.pdf', 59, 'HCC- PROJETOS ELÉTRICOS LTDA', '07.261.798/0001-74'),
(43, '31/2020', '2021-02-02', 135025, '1618156135.pdf', 60, 'Empresa Brasileira de Pesquisa Agropecuária - Embrapa,', '00.348.003/0105-07'),
(47, '52/2020', '2021-10-27', 762200, '1618920462.pdf', 70, 'MULTFLEX DO BRASIL', '11.858.330/0001-39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_despacho`
--

CREATE TABLE `tb_despacho` (
  `id_despacho` int(11) NOT NULL,
  `irp` int(11) NOT NULL,
  `pdf_despacho` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_despacho`
--

INSERT INTO `tb_despacho` (`id_despacho`, `irp`, `pdf_despacho`) VALUES
(59, 262020, '1618964663.pdf'),
(60, 102020, '1618965778.pdf'),
(70, 212020, '1619056292.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `id_item` int(11) NOT NULL,
  `id_ata` int(11) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `preco_unitario` double(7,2) DEFAULT NULL,
  `preco_total` double(7,2) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `item` int(200) NOT NULL,
  `id_despacho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_itens`
--

INSERT INTO `tb_itens` (`id_item`, `id_ata`, `descricao`, `qtd`, `preco_unitario`, `preco_total`, `uf`, `item`, `id_despacho`) VALUES
(57, 42, 'Contratação de sistemas de energia solar fotovoltaica conectados a rede (on-grid)', 400, 31300.00, 10.00, 'Kwp', 1, 59),
(58, 43, 'Ar condicionado split INVERTER, frio, 220V, 12000 BTUs.\r\nELGIN - HVF', 10, 100000.00, 22.78, 'UNID', 1, NULL),
(59, 43, 'Ar condicionado split INVERTER, frio, 220V, 18000 BTUs\r\nELGIN - HVF', 20, 100000.00, 58.60, 'UNID', 2, NULL),
(60, 43, 'Ar condicionado split INVERTER, frio, 220V, 24000 BTUs\r\nELGIN - HVF', 30, 100000.00, 109.80, 'UNID', 3, NULL),
(61, 43, 'Ar condicionado split INVERTER, frio, 220V, 36000 BTUs\r\nELGIN - HPV', 5, 100000.00, 40.85, 'UNID', 5, NULL),
(62, 43, 'Ar condicionado split INVERTER, frio, 220V, 36000 BTUs\r\nELGIN - HPV', 55, 44.00, 888.00, 'UNID', 6, 60),
(63, 43, 'Ar condicionado split INVERTER, frio, 220V, 36000 BTUs\r\nELGIN - HPV', 55, 55.00, 55555.00, 'UNID', 7, 60),
(64, 43, 'Ar condicionado split INVERTER, frio, 220V, 36000 BTUs\r\nELGIN - HPV', 66, 8987.00, 456.00, 'UNID', 8, 60),
(65, 43, 'Ar condicionado split INVERTER, frio, 220V, 36000 BTUs\r\nELGIN - HPV', 55, 1000.00, 95147.00, 'UNID', 10, 60),
(84, 47, 'COLCHÃO DE ESPUMA USO HOSPITALAR 100% POLIURETANO, REVESTIDO COM CAPA DE COURVIM COR AZUL REAL SELADO HERMETICAMENTE COM ILHOS DE RESPIRO  DENSIDADE DE D-33 MEDIDAS DE 1,90X0,80 14 GARANTIA DE 12 MESES', 496, 158.00, 4108.00, 'UN', 1, 70),
(85, 47, 'COLCHÃO DE ESPUMA USO HOSPITALAR 100% POLIURETANO, REVESTIDO COM CAPA DE COURVIM COR AZUL REAL SELADO HERMETICAMENTE COM ILHOS DE RESPIRO  DENSIDADE DE D-33 MEDIDAS DE 1,90X0,80 14 GARANTIA DE 12 MESES', 156, 158.00, 10.00, 'UN', 3, 70);

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
  ADD PRIMARY KEY (`id_ata`),
  ADD KEY `id_despacho` (`id_despacho`);

--
-- Índices para tabela `tb_despacho`
--
ALTER TABLE `tb_despacho`
  ADD PRIMARY KEY (`id_despacho`);

--
-- Índices para tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_ata` (`id_ata`),
  ADD KEY `id_despacho` (`id_despacho`);

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
  MODIFY `id_ata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `tb_despacho`
--
ALTER TABLE `tb_despacho`
  MODIFY `id_despacho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
-- Limitadores para a tabela `tb_atas`
--
ALTER TABLE `tb_atas`
  ADD CONSTRAINT `tb_atas_ibfk_1` FOREIGN KEY (`id_despacho`) REFERENCES `tb_despacho` (`id_despacho`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD CONSTRAINT `tb_itens_ibfk_1` FOREIGN KEY (`id_ata`) REFERENCES `tb_atas` (`id_ata`),
  ADD CONSTRAINT `tb_itens_ibfk_2` FOREIGN KEY (`id_despacho`) REFERENCES `tb_despacho` (`id_despacho`);

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`niveis_acesso_id`) REFERENCES `tb_niveis_acesso` (`id_nivel_acesso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
