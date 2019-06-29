-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jun-2019 às 05:53
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igrejacaminhop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadcelulograma`
--

CREATE TABLE `cadcelulograma` (
  `idmembro` int(11) NOT NULL,
  `presenca` varchar(50) DEFAULT NULL,
  `datapresenca` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadcelulograma`
--

INSERT INTO `cadcelulograma` (`idmembro`, `presenca`, `datapresenca`, `id`) VALUES
(1, 'p', '2019-06-28', 15),
(3, 'f', '2019-06-28', 16),
(4, 'p', '2019-06-28', 17),
(1, 'p', '2019-06-29', 18),
(4, 'f', '2019-06-29', 19),
(4, 'p', '2019-06-29', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadmacro`
--

CREATE TABLE `cadmacro` (
  `idmacro` int(11) NOT NULL,
  `nome_macro` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `DataCadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DataAlteracao` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadmacro`
--

INSERT INTO `cadmacro` (`idmacro`, `nome_macro`, `status`, `DataCadastro`, `DataAlteracao`) VALUES
(1, 'ola', 'Ativo', '2019-06-26 23:06:30', '0000-00-00 00:00:00'),
(2, '123123123', 'Ativo', '2019-06-29 03:29:00', '0000-00-00 00:00:00'),
(3, 'ola12312', 'Ativo', '2019-06-29 03:34:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadmembro`
--

CREATE TABLE `cadmembro` (
  `nome` varchar(250) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `endereco` varchar(20) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(250) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `estadocivil` varchar(20) NOT NULL,
  `naturalidade` varchar(100) NOT NULL,
  `grauinstrucao` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idmacro` int(20) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `idmembro` int(11) NOT NULL,
  `lider` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadmembro`
--

INSERT INTO `cadmembro` (`nome`, `rg`, `cpf`, `data`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `telefone`, `celular`, `estadocivil`, `naturalidade`, `grauinstrucao`, `profissao`, `email`, `idmacro`, `grupo`, `status`, `idmembro`, `lider`) VALUES
('Joel Selau da Silva', '0000000000', '00000000000', '1982-12-11', 'Claudino Antonio Fri', 641, 'prox. igreja santa lucia ', 'SANTA CATARINA', '95030200', '5430255338', '54981269409', 'RIO GRANDE DO SUL', 'caxias do sul', 'superior incompleto ', 'EMPR', 'joel@softautomacao.com', 1, 'simpatizante', 'Ativo', 1, 3),
('Juliano ', '7079619131', '80338895000', '1980-05-25', 'Rua Mário de Andrade', 58, '', 'Mariland', '95057-470', '54999452595', '5498789451', 'Rio Grande do Sul', 'nova Roma do sul', 'Completo', 'Vendedor', 'juliano.scapin@hotmail.com', 1, 'lider', 'Ativo', 2, NULL),
('Juliano Scapin', '', '', '2019-06-11', 'Rua Mário de Andrade', 0, '', '', '95057-470', '54999452595', '5498789451', 'Rio Grande do Sul', 'nova Roma do sul', '', '', 'juliano.scapin@hotmail.com', 1, 'lider', 'Ativo', 3, NULL),
('Fernando ferrari111', '11111111111111', '111111', '2019-06-01', '252', 2222, '111', '111', '95088630', '111', '54987349488', 'RS', 'Caxias do Sul', '111122', '111', 'roramon7@gmail.com', 1, 'abordado', 'Ativo', 4, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadusuario`
--

CREATE TABLE `cadusuario` (
  `Idusuario` int(11) NOT NULL,
  `nomeCompleto` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `niveisacesso` varchar(100) DEFAULT NULL,
  `DataCadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DataAlteracao` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadusuario`
--

INSERT INTO `cadusuario` (`Idusuario`, `nomeCompleto`, `email`, `senha`, `niveisacesso`, `DataCadastro`, `DataAlteracao`) VALUES
(1, 'Administrador', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Doze', '2019-02-05 00:50:17', '0000-00-00 00:00:00'),
(4, 'teste lider', 'lider@gmail.com', '202cb962ac59075b964b07152d234b70', 'Lider', '2019-02-05 13:55:54', '0000-00-00 00:00:00'),
(5, 'comprometido', 'comprometido@gmail.com', '202cb962ac59075b964b07152d234b70', 'Comprometido', '2019-02-05 16:48:10', '0000-00-00 00:00:00'),
(6, 'Ordenir Antonio Laguna', 'ordenirlaguna@hotmail.com', 'a915b0ebdeb664dede4b8ca5faf2c871', 'Lider', '2019-02-05 22:49:13', '0000-00-00 00:00:00'),
(7, 'Daine Freitas', 'salaodayvieira@gmail.com', 'af4a57797a8428477fa9ebd4ea7397ba', 'Lider', '2019-02-05 22:51:29', '0000-00-00 00:00:00'),
(8, 'Eliseu Velho Monteiro', 'eliseukyd@hotmail.com', 'c4646d2f83c510ab1e7e553cd1e2f710', 'Lider', '2019-02-05 22:52:33', '0000-00-00 00:00:00'),
(9, 'Sabrina Rodrigues Monteiro', 'sabrynasyl@gmail.com', 'c4646d2f83c510ab1e7e553cd1e2f710', 'Lider', '2019-02-05 22:54:35', '0000-00-00 00:00:00'),
(10, 'Maria Elisabete Molina Casara', 'alexscasara@gmail.com', '2b64c2f19d868305aa8bbc2d72902cc5', 'Lider', '2019-02-05 22:55:53', '0000-00-00 00:00:00'),
(11, 'Mariana Dalmoro', 'mari.marianad@gmail.com', '285ab9448d2751ee57ece7f762c39095', 'Lider', '2019-02-05 22:56:54', '0000-00-00 00:00:00'),
(12, 'Rodrigo Aver', 'rodrigoaver12@gmail.com', 'b324d33160e79c07feebb7f34b4b53ff', 'Lider', '2019-02-05 22:57:41', '0000-00-00 00:00:00'),
(13, 'Ederson Claiton Perreira', 'edersonperreira@outlook.com', '995665640dc319973d3173a74a03860c', 'Lider', '2019-02-05 22:59:11', '0000-00-00 00:00:00'),
(14, 'MÃ¡rcio LuÃ­s bueno', 'marcioluisbueno12@gmail.com', '4862e043802951d4f22250c8a969624e', 'Lider', '2019-02-05 23:02:05', '0000-00-00 00:00:00'),
(15, 'Jose Claudemir Do Nascimento', 'joseenasciment@gmail.com', '666b602b61ce98cab8b2f35ca3f9a056', 'Lider', '2019-02-05 23:06:42', '0000-00-00 00:00:00'),
(16, 'Marcia Morais Lovat', 'confiabilita@gmail.com', '0004d0b59e19461ff126e3a08a814c33', 'Lider', '2019-02-05 23:08:41', '0000-00-00 00:00:00'),
(17, 'Daniel Vigano', 'pr.danielvigano@hotmail.com', '6c4109515fd108ddca43b048a68e6bea', 'Doze', '2019-02-05 23:13:08', '0000-00-00 00:00:00'),
(18, 'Juliano Scapin', 'juliano.scapin@hotmail.com', '3785a4f12840727f9fc71676c104ac0d', 'Lider', '2019-02-06 14:49:56', '0000-00-00 00:00:00'),
(19, 'Marisa Dalmoro', 'Marisa_dalmoro@hotmail.com', '6d52844b3f32dce532015f271b1a3534', 'Lider', '2019-02-06 13:00:12', '0000-00-00 00:00:00'),
(20, 'Eleni', 'elecomjesus@yahoo.com.br', 'b0ffd000f38ec13d2ed44a2a7f8b5a0c', 'Lider', '2019-02-06 15:23:30', '0000-00-00 00:00:00'),
(21, 'Joel Selau', 'Joel@softautomacao.com', '6de0c44a2eed0ac628d35448f9c5d11e', 'Lider', '2019-02-06 15:32:00', '0000-00-00 00:00:00'),
(22, 'Claudia Selau', 'Claudia@softautomacao.com', '6de0c44a2eed0ac628d35448f9c5d11e', 'Lider', '2019-02-06 15:32:42', '0000-00-00 00:00:00'),
(23, 'Ana Paula Turatti Tonial', 'paulaturatti@hotmail.com', '5b11872db61efb938f6ae970d1da7855', 'Lider', '2019-02-13 13:15:19', '0000-00-00 00:00:00'),
(24, 'Tatiana Rodrigues', 'tatina_rodrigues@hotmail.com', 'fe0b6c28818d72e4e7842c540084c4e0', 'Lider', '2019-02-13 18:40:35', '0000-00-00 00:00:00'),
(25, 'RAMON CARDOSO DE OLIVEIRA', 'roramon7@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Doze', '2019-06-29 02:14:40', '0000-00-00 00:00:00'),
(26, 'RAMON CARDOSO DE OLIVEIRA', 'roramon7@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Doze', '2019-06-29 03:25:53', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadcelulograma`
--
ALTER TABLE `cadcelulograma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmembro` (`idmembro`);

--
-- Indexes for table `cadmacro`
--
ALTER TABLE `cadmacro`
  ADD PRIMARY KEY (`idmacro`);

--
-- Indexes for table `cadmembro`
--
ALTER TABLE `cadmembro`
  ADD PRIMARY KEY (`idmembro`),
  ADD KEY `idmembro` (`idmembro`),
  ADD KEY `idlider` (`lider`),
  ADD KEY `idmacro` (`idmacro`);

--
-- Indexes for table `cadusuario`
--
ALTER TABLE `cadusuario`
  ADD PRIMARY KEY (`Idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadcelulograma`
--
ALTER TABLE `cadcelulograma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cadmacro`
--
ALTER TABLE `cadmacro`
  MODIFY `idmacro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cadmembro`
--
ALTER TABLE `cadmembro`
  MODIFY `idmembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `cadusuario`
--
ALTER TABLE `cadusuario`
  MODIFY `Idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadcelulograma`
--
ALTER TABLE `cadcelulograma`
  ADD CONSTRAINT `cadcelulograma_ibfk_1` FOREIGN KEY (`idmembro`) REFERENCES `cadmembro` (`idmembro`);

--
-- Limitadores para a tabela `cadmembro`
--
ALTER TABLE `cadmembro`
  ADD CONSTRAINT `cadmembro_ibfk_1` FOREIGN KEY (`lider`) REFERENCES `cadmembro` (`idmembro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
