-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Out-2018 às 23:27
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(14) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rua` varchar(65) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(65) NOT NULL,
  `cidade` varchar(65) NOT NULL,
  `estado` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `telefone`, `celular`, `email`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(2, 'Joao Pedro', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11'),
(3, 'Gabriel', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12'),
(4, 'gabriel', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12'),
(5, 'pedro', '15', '15', '15', '15', '15', '15', '15', '15', '15', '15'),
(6, 'Tico', '41924805812', '12', '18982011300', 'nettonucci@gmail.com', '19814170', 'Dionisio Dias paiao', '440', 'Vila Maria', 'Assis', 'SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `descricao` varchar(65) NOT NULL,
  `precocompra` float NOT NULL,
  `precovenda` float NOT NULL,
  `quantidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `descricao`, `precocompra`, `precovenda`, `quantidade`) VALUES
(1, 'Frontal iphone 5s preto', 30, 100, 2),
(3, 'Base de carga S9+', 110, 260, 0),
(4, 'PLACA PRINCIPAL UN32J5300', 50, 110, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `maoobra`
--

CREATE TABLE `maoobra` (
  `id` int(11) NOT NULL,
  `servico` varchar(65) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `idos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maoobra`
--

INSERT INTO `maoobra` (`id`, `servico`, `valor`, `idos`) VALUES
(1, 'TROCA DE USB', '100', 1),
(2, 'TROCA DE DISPLAY', '50', 2),
(3, 'MAO DE OBRA', '50', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `idos` int(11) NOT NULL,
  `idcliente` varchar(65) CHARACTER SET latin1 NOT NULL,
  `status` int(2) NOT NULL,
  `dataentrada` varchar(15) CHARACTER SET latin1 NOT NULL,
  `tipoeqp` varchar(65) CHARACTER SET latin1 NOT NULL,
  `modelo` varchar(65) CHARACTER SET latin1 NOT NULL,
  `serial` varchar(65) CHARACTER SET latin1 NOT NULL,
  `datasaida` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `defeito` varchar(100) CHARACTER SET latin1 NOT NULL,
  `obs` varchar(600) CHARACTER SET latin1 NOT NULL,
  `laudo` varchar(600) CHARACTER SET latin1 DEFAULT NULL,
  `idproduto` varchar(65) CHARACTER SET latin1 DEFAULT NULL,
  `qtdproduto` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `totalos` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`idos`, `idcliente`, `status`, `dataentrada`, `tipoeqp`, `modelo`, `serial`, `datasaida`, `defeito`, `obs`, `laudo`, `idproduto`, `qtdproduto`, `totalos`) VALUES
(1, '3', 1, '03/10/2018', '', '', '', '', 'Não liga', 'Netto-cliente informou que colocou para carregar e nao ligou mais', '', '', '', 0),
(2, '2', 2, '04/10/2018', '', '', '', NULL, 'NAO LIGA', 'NETTO-CLIENTE INFORMOU QUE APARELHO DESLIGOU E NAO LIGOU MAIS, VERIFICAR E PASSAR ORÇAMENTO', '05/10/2018-21:40-NETTO-SOMENTE UM TESTES DE ESPAÇO\r\n\r\nESPAÇO', NULL, NULL, 0),
(3, '3', 3, '17/10/2018', '', '', '', NULL, 'nao inicia sistema', 'netto-cliente tentou formatar e nao conseguiu', NULL, NULL, NULL, 0),
(4, '6', 4, '17/10/2018', '', '', '', NULL, 'teste', 'teste', NULL, NULL, NULL, 0),
(5, '5', 1, '17/10/2018', '', '', '', NULL, 'teste 2', 'teste 2', NULL, NULL, NULL, 0),
(6, '5', 2, '17/10/2018', 'Y235T1GH365T', '', '', NULL, 'LINHA NO PAINEL', 'NETTO-CLIENTE INFORMOU QUE DO NADA APARECEU LINHAS NO PAINEL, VERIFICAR E PASSAR ORÃ‡AMENTO', NULL, NULL, NULL, 0),
(7, '2', 3, '18/10/2018', 'TELEVISAO', 'UN32J5300AGXZD', 'Y268GF8Y12E8W1', NULL, 'LINHA NO PAIENAL', 'NETTO-CLIENTE INFORMOU QUE APARECEU LINHAS NO PAINEL, VERIFICAR E PASSAR ORÇAMENTO', NULL, NULL, NULL, 0),
(8, '2', 1, '23/10/2018', 'teste', 'teste', 'teste', NULL, 'teste', 'teste', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ospeca`
--

CREATE TABLE `ospeca` (
  `id` int(11) NOT NULL,
  `idpeca` int(11) NOT NULL,
  `quantidadeos` int(11) NOT NULL,
  `idos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ospeca`
--

INSERT INTO `ospeca` (`id`, `idpeca`, `quantidadeos`, `idos`) VALUES
(1, 1, 1, 2),
(2, 2, 1, 1),
(3, 4, 1, 7),
(4, 4, 1, 7),
(5, 1, 1, 7),
(6, 3, 1, 7),
(7, 0, 1, 7),
(8, 1, 1, 7),
(9, 4, 1, 7),
(10, 3, 1, 8),
(11, 3, 1, 8),
(12, 3, 1, 8),
(13, 4, 2, 8),
(14, 3, 3, 8),
(15, 1, 1, 7),
(16, 1, 10, 7),
(17, 3, 10, 2),
(18, 4, 1, 2),
(19, 3, 4, 2),
(20, 4, 1, 2),
(21, 4, 1, 2),
(22, 4, 1, 2),
(23, 1, 2, 2),
(24, 4, 1, 2),
(25, 3, 9, 7),
(26, 3, 10, 7),
(27, 3, 1, 4),
(28, 1, 1, 4),
(29, 3, 1, 4),
(30, 3, 1, 4),
(31, 3, 1, 6),
(32, 3, 1, 6),
(33, 3, 1, 6),
(34, 3, 1, 6),
(35, 3, 3, 6),
(36, 3, 1, 6),
(37, 3, 1, 6),
(38, 3, 1, 6),
(39, 3, 1, 5),
(40, 3, 1, 5),
(41, 3, 1, 5),
(42, 3, 1, 5),
(43, 3, 1, 5),
(44, 3, 1, 5),
(45, 3, 4, 5),
(46, 3, 2, 3),
(47, 3, 3, 3),
(48, 3, 3, 3),
(49, 3, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `descricaosta` varchar(65) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricaosta`) VALUES
(1, 'Aguardando avaliação do tecnico'),
(2, 'Diagnostico em andamento'),
(3, 'Aguardando aprovação de orçamento'),
(4, 'Aguardando peça'),
(5, 'Reparo em andamento'),
(6, 'Pronto, aguardando cliente'),
(7, 'Equipamento entregue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maoobra`
--
ALTER TABLE `maoobra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idos`);

--
-- Indexes for table `ospeca`
--
ALTER TABLE `ospeca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maoobra`
--
ALTER TABLE `maoobra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `idos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ospeca`
--
ALTER TABLE `ospeca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
