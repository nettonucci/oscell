-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2018 às 00:02
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
(1, 'netto', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10'),
(2, 'joao', '11', '11', '11', '11', '11', '11', '11', '11', '11', '11'),
(3, 'gabriel', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12'),
(4, 'gabriel', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12'),
(5, 'pedro', '15', '15', '15', '15', '15', '15', '15', '15', '15', '15'),
(6, 'Tico', '41924805812', '12', '18982011300', 'nettonucci@gmail.com', '19814170', 'Dionisio Dias paiao', '440', 'Vila Maria', 'Assis', 'SP'),
(7, 'Joao Pedro', '111', '111', '111', '111', '111', '111', '111', '111', '111', '111');

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
(1, 'Frontal iphone 5s preto', 30, 90, 2);

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
(1, 'TROCA DE USB', '100,00', 1),
(2, 'TROCA DE DISPLAY', '50,00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `os`
--

CREATE TABLE `os` (
  `id` int(11) NOT NULL,
  `idcliente` varchar(65) NOT NULL,
  `status` varchar(65) NOT NULL,
  `dataentrada` varchar(15) NOT NULL,
  `datasaida` varchar(15) DEFAULT NULL,
  `equipamento` varchar(100) NOT NULL,
  `defeito` varchar(100) NOT NULL,
  `obs` varchar(600) NOT NULL,
  `laudo` varchar(600) DEFAULT NULL,
  `idproduto` varchar(65) DEFAULT NULL,
  `qtdproduto` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `os`
--

INSERT INTO `os` (`id`, `idcliente`, `status`, `dataentrada`, `datasaida`, `equipamento`, `defeito`, `obs`, `laudo`, `idproduto`, `qtdproduto`) VALUES
(1, '1', 'Aguardando verificação do tecnico', '03/10/2018', '', 'Samsung s9+', 'Não liga', 'Netto-cliente informou que colocou para carregar e nao ligou mais', '', '', ''),
(2, '2', 'Aberto', '04/10/2018', NULL, 'SMARTPHONE SAMSUNG S9+', 'NAO LIGA', 'NETTO-CLIENTE INFORMOU QUE APARELHO DESLIGOU E NAO LIGOU MAIS, VERIFICAR E PASSAR ORÇAMENTO', '05/10/2018-21:40-NETTO-SOMENTE UM TESTES DE ESPAÇO\r\n\r\nESPAÇO', NULL, NULL);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maoobra`
--
ALTER TABLE `maoobra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
