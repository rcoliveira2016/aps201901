-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2019 às 06:38
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
(1, 'p', '2019-06-20', 1),
(1, 'p', '2019-06-20', 2),
(1, 'p', '2019-06-20', 3),
(1, 'p', '2019-06-20', 4),
(1, 'p', '2019-06-20', 5),
(1, 'p', '2019-06-20', 6),
(1, 'p', '2019-06-20', 7),
(1, 'p', '2019-06-20', 8),
(66, 'p', '2019-06-26', 9),
(66, 'p', '2019-06-26', 10),
(1, 'p', '2019-06-26', 11),
(1, 'p', '2019-07-03', 12),
(39, 'p', '2019-06-27', 13),
(22, 'p', '2019-06-13', 14);

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
(0, 'ola', 'Ativo', '2019-06-26 23:06:30', '0000-00-00 00:00:00');

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
  `idmacro` varchar(20) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `idmembro` int(11) NOT NULL,
  `lider` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadmembro`
--

INSERT INTO `cadmembro` (`nome`, `rg`, `cpf`, `data`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `telefone`, `celular`, `estadocivil`, `naturalidade`, `grauinstrucao`, `profissao`, `email`, `idmacro`, `grupo`, `status`, `idmembro`, `lider`) VALUES
('Joel Selau da Silva', '0000000000', '00000000000', '1982-12-11', 'Claudino Antonio Fri', 641, 'prox. igreja santa lucia ', 'SANTA CATARINA', '95030200', '5430255338', '54981269409', 'RIO GRANDE DO SUL', 'caxias do sul', 'superior incompleto ', 'EMPR', 'joel@softautomacao.com', ' ', 'simpatizante', 'Ativo', 1, 66),
('Juliano Scapin ', '7079619131', '80338895000', '1980-05-25', 'Rua Mário de Andrade', 58, '', 'Mariland', '95057-470', '54999452595', '', 'Rio Grande do Sul', 'nova Roma do sul', 'Completo', 'Vendedor', 'juliano.scapin@hotmail.com', '', '', 'Ativo', 2, 47),
('Juliano Scapin', '', '', '0000-00-00', 'Rua Mário de Andrade', 0, '', '', '95057-470', '54999452595', '', 'Rio Grande do Sul', 'nova Roma do sul', '', '', 'juliano.scapin@hotmail.com', ' ', 'lider', 'Ativo', 3, NULL),
('Fernando ferrari111', '11111111111111', '111111', '2019-06-01', '252', 2222, '111', '111', '95088630', '111', '111', 'RS', 'Caxias do Sul', '111122', '111', 'roramon7@gmail.com', ' 123123123', 'abordado', 'Ativo', 4, NULL),
('Fernando schimitt ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 5, NULL),
('José Duarte ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 6, NULL),
('Israel Gomes ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 7, NULL),
('Gladmir Alessandrini', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 8, NULL),
('Alexandre Vailat dos Reis ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 9, NULL),
('Dionatan Carvalho ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 10, NULL),
('Rogério Freitas ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 11, NULL),
('Henrique', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 12, NULL),
('Robinson velho', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 13, NULL),
('Ivonei Bellini', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 14, NULL),
('Vanderlei', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 15, NULL),
('Sidnei Alexandre ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 16, NULL),
('Edilson', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 17, NULL),
('Fernando Rech', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 18, NULL),
('João Matielo', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 19, NULL),
('Ronaldo ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 20, NULL),
('Fernando Anchieta ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 21, NULL),
('Reginaldo Freitas ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 22, NULL),
('André susin', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 23, NULL),
('Antonio Veloso ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 24, NULL),
('Roberta Luiza Mezzoml Scapin ', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', 'lider', 'Ativo', 25, NULL),
('Dulce', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 26, NULL),
('Regiane freitas', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 27, NULL),
('Rozangela', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 28, NULL),
('Simone', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 29, NULL),
('Evelise', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 30, NULL),
('Evair', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 31, NULL),
('Rubia', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 32, NULL),
('Jane Aver', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 33, NULL),
('Roselei', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 34, NULL),
('Rita', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 35, NULL),
('Claudia velho', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 36, NULL),
('Gleice', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 37, NULL),
('Roseli godinho', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 38, NULL),
('Eliane', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 39, NULL),
('Patricia', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 40, NULL),
('Ivete susin', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 41, NULL),
('Susielen', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 42, NULL),
('Daiane', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 43, NULL),
('Romilda', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 44, NULL),
('Luis henrique', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', '', 'Ativo', 45, NULL),
('Jovensil dalposo', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', '', '', '', '', ' ', 'Abordado', 'Ativo', 46, NULL),
('Daiane Freitas', '6098017533', '01254559094', '1985-08-27', 'dr Luigui Galicchio', 671, 'casa', 'Nossa senhora de fátima', '95043-230', '32239033', '054991200258', 'casada', 'Feira de Santana- BA', 'ensino superior ', 'CABELEIREIRA', 'salaodayvieira@gmail.com', ' ', 'lider', 'Ativo', 47, NULL),
('Greiane pinto melo', '', '01557325014', '1988-03-30', 'avelino antonio de s', 269, 'casa', 'Nossa senhora de fátima', '95043700', '32239033', '992439352', 'casada', ' caxias do sul', '1 completo', 'manicure', 'jacksonmaciel202@hotmail.com', ' ', 'Comprometido', 'Ativo', 48, NULL),
('jackson maciel ', '', '', '1990-07-01', 'avelino antonio de s', 269, 'casa', 'Nossa senhora de fátima', '95043700', '32239033', '992439352', 'casada', 'caxias do sul', '2 completo', 'maceneiro', 'jacksonmaciel202@hotmail.com', ' ', 'Comprometido', 'Ativo', 49, NULL),
('ELENI PEREIRA', '7052001505', '59811650063', '1969-06-21', 'DR LUIGI GALLICHIO ', 310, '', 'NOSSA SENHORA DE FÁTIMA', '95043-230', '', '54999295248', 'CASADA', 'BOM JESUS', '', '', 'elecomjesus@yahoo.com', ' ', 'lider', 'Ativo', 50, NULL),
('MARTA DE LIMA', '6074350627', '679999026034', '1974-03-12', 'RUA SAO MATEUS', 103, '', 'CRUZEIRO', '95074325', '', '54999375993', 'CASADA', 'BOM JESUS', '', '', 'MARTALINDORCE@GMAIL.COM', ' ', 'Comprometido', 'Inativo', 51, NULL),
('PATRICIA MACIEL DE LEMOS MARTINS', '2100219481', '01283052075', '1988-09-13', 'RUA ISABEL PEZZI', 525, '', 'NOSSA SENHORA DE FÁTIMA', '95043310', '', '54991507553', 'CASADA', 'CAXIAS DO SUL', '', '', '', ' ', '', '', 52, NULL),
('JEANEFER CARDOSO VARGAS', '', '', '1994-06-19', 'ESTRADA QUINTO SLOMP', 682, 'CASA 02', 'DESVIO RIZZO ', '95115460', '', '54991750276', 'CASADA', 'SANTANA DO LIVRAMENTO', '', '', 'JEANEFERCARDOSO@GMAIL.COM', ' ', '', 'Ativo', 53, NULL),
('JENIFER PEREIRA DA SILVA', '5115231671', '03120420000', '1993-07-07', '', 0, '', '', '', '', '', '', 'CAXIAS DO SUL', '', '', '', ' ', 'Abordado', 'Ativo', 54, NULL),
('SILVIA MACIEL DE LEMOS', '3098580693', '01245967037', '1985-04-24', 'RUA HENRIQUE SANTINI', 65, '', 'JARDIM EMBAIXADOR', '95045170', '', '54991904792', 'CASADA', 'CAXIAS DO SUL', '', '', 'SILVIAMACIELCARDOSO@GMAIL.COM', ' ', 'Abordado', 'Ativo', 55, NULL),
('CLAUDIA DA SILVA PRUX', '1048710436', '56629370015', '1971-10-16', 'R. PADRE RUI BOZA', 42, '', 'NOSSA SENHORA DE FÁTIMA', '95043275', '', '54999212865', 'CASADA', 'CAXIAS DO SUL', '', '', 'CLAUDIAPRUX@GMAIL.COM', ' ', 'Abordado', 'Ativo', 56, NULL),
('JESSICA OLIVA GONÇALVES', '', '02095341090', '1992-11-22', 'R HENRIQUE FRACASSO', 635, '', 'NOSSA SENHORA DE FÁTIMA', '95115460', '', '54991413299', 'CASADA', 'SANTANA DO LIVRAMENTO', '', '', 'JEOLIVA92@GMAIL.COM', ' ', 'Abordado', 'Ativo', 57, NULL),
('IARA CRISTINA DE BONA BRAGAGNOLO BARBOSA', '2108650215', '01189749041', '1991-04-30', 'R AMADEU ROSSI', 484, 'AP 03', 'NOSSA SENHORA DE FÁTIMA', '95043040', '', '54999221212', 'CASADA', 'CAXIAS DO SUL', '', '', 'IARA-16@HOTMAIL.COM', ' ', 'Comprometido', 'Ativo', 58, NULL),
('TAMIRES SCOPEL DE MACEDO', '1102089628', '01652047026', '1989-06-14', 'R ADERICO CADORIN', 114, '', 'NOSSA SENHORA DE FÁTIMA MONTE CASTELO', '95043500', '', '54999934666', 'CASADA', '', '', '', 'TAMIRESSCOPELDEMACEDO7@GMAIL.COM', ' ', 'Simpatizante', 'Ativo', 59, NULL),
('THALISE SCOPEL', '', '', '1992-05-20', 'R BORTOLO ZANROZO', 1010, '', 'PARQUE OASIS', '95045080', '', '54991474455', 'SOLTEIRA', '', '', '', '', ' ', 'Simpatizante', 'Ativo', 60, NULL),
('KELLI CRISTINA DE GOULART BASTOS', '1071481855', '92560288087', '1977-06-28', 'RUIA LUIGI BERTELLI', 108, 'AP 203', 'PARQUE OASIS', '95045250', '', '54992688484', 'SOLTEIRA', 'DOM PEDRITO', '', '', '', ' ', 'Abordado', 'Ativo', 61, NULL),
('NATHALIA BASTOS DE OLIVEIRA', '1112372436', '03602730093', '0000-00-00', 'R BORTOLO ZANROZO', 837, '', 'PARQUE OASIS', '95045080', '', '54991298105', 'SOLTEIRA', 'DOM PEDRITO', '', '', 'NATHALIACAXIAS21@GMAIL.COM', ' ', 'Abordado', 'Ativo', 62, NULL),
('ELODI DA ROSA GOMES', '', '57665648053', '0000-00-00', 'R ADERICO CADORIN', 114, '', 'PARQUE OASIS', '95045254', '', '54999591551', 'UNIAO ESTAVEL', '', '', '', 'ELODIGOMES@YAHOO.COM.BR', ' ', 'Abordado', 'Ativo', 63, NULL),
('PAULO JUCIMAR BARBOSA', '', '00508131022', '0000-00-00', 'R AMADEU ROSSI', 484, 'AP 03', 'NOSSA SENHORA DE FÁTIMA', '95043040', '', '54999002803', 'CASADO', 'CAXIAS DO SUL', '', '', 'PJBARBOS@GMAIL.COM', ' ', 'lider', 'Ativo', 64, NULL),
('Cleonice de Oliveira rodrigues', '4061592897', '71380027004', '1976-02-09', 'Rua Dr. Henrique Fra', 495, '', 'Nossa Senhora de Fátima', '95043220', '', '54991843050', 'Casada', 'Caxias do Sul', 'Superior Imcompleto', 'Secretária', 'corodrigues2010@hotmail.com', ' ', '', 'Ativo', 65, NULL),
('Ana Paula Turatti Tonial', '1066105907', '81219296015', '1978-02-23', 'Angelo Corsetti', 1203, 'apto 2', 'Pioneiro', '95042000', '5432241974', '(54)984035494', 'Rio Grande do Sul', 'Caxias do Sul', 'Pós-graduada', 'administradora', 'paulaturatti@hotmail.com', ' ', 'lider', 'Ativo', 66, NULL),
('RAMON CARDOSO DE OLIVEIRA', '', '', '0000-00-00', '252', 0, '', '', '95088630', '', '', 'RS', 'Caxias do Sul', '', '', 'roramon7@gmail.com', ' ', 'Selecione', '', 79, NULL),
('RAMON CARDOSO DE OLIVEIRA', '', '', '0000-00-00', '252', 0, '', '', '95088630', '', '', 'RS', 'Caxias do Sul', '', '', 'roramon7@gmail.com', ' ', '', 'Ativo', 80, NULL),
('RAMON CARDOSO DE OLIVEIRA', '', '', '0000-00-00', '252', 0, '', '', '95088630', '', '', 'RS', 'Caxias do Sul', '', '', 'roramon7@gmail.com', ' ', '', '', 81, 1),
('RAMON CARDOSO DE OLIVEIRA', '', '', '2019-06-27', '252', 0, '', '', '95088630', '', '', 'RS', 'Caxias do Sul', '', '', 'roramon7@gmail.com', ' ', '', '', 82, NULL);

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
(24, 'Tatiana Rodrigues', 'tatina_rodrigues@hotmail.com', 'fe0b6c28818d72e4e7842c540084c4e0', 'Lider', '2019-02-13 18:40:35', '0000-00-00 00:00:00');

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
-- Indexes for table `cadmembro`
--
ALTER TABLE `cadmembro`
  ADD PRIMARY KEY (`idmembro`),
  ADD KEY `idmembro` (`idmembro`),
  ADD KEY `idlider` (`lider`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cadmembro`
--
ALTER TABLE `cadmembro`
  MODIFY `idmembro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `cadusuario`
--
ALTER TABLE `cadusuario`
  MODIFY `Idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
