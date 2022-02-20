-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/02/2022 às 15:25
-- Versão do servidor: 10.4.22-MariaDB
-- Versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlador_contas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cobrador`
--

CREATE TABLE `cobrador` (
  `idCobrador` int(11) NOT NULL,
  `nomeCobrador` varchar(45) NOT NULL,
  `cpfCobrador` varchar(15) NOT NULL,
  `sexoCobrador` varchar(10) NOT NULL,
  `dataPagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `idConta` int(11) NOT NULL,
  `nomeConta` varchar(45) NOT NULL,
  `valorConta` float NOT NULL,
  `statusConta` tinyint(1) NOT NULL,
  `dataVencimento` date NOT NULL,
  `idDevedor` int(11) NOT NULL,
  `idCobrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `devedor`
--

CREATE TABLE `devedor` (
  `idDevedor` int(11) NOT NULL,
  `nomeDevedor` varchar(45) NOT NULL,
  `cpfDevedor` varchar(15) NOT NULL,
  `sexoDevedor` varchar(10) NOT NULL,
  `dataCriacaoConta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cobrador`
--
ALTER TABLE `cobrador`
  ADD PRIMARY KEY (`idCobrador`);

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`idConta`),
  ADD KEY `conta_ibfk_1` (`idDevedor`),
  ADD KEY `conta_ibfk_2` (`idCobrador`);

--
-- Índices de tabela `devedor`
--
ALTER TABLE `devedor`
  ADD PRIMARY KEY (`idDevedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cobrador`
--
ALTER TABLE `cobrador`
  MODIFY `idCobrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `idConta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `devedor`
--
ALTER TABLE `devedor`
  MODIFY `idDevedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`idDevedor`) REFERENCES `devedor` (`idDevedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conta_ibfk_2` FOREIGN KEY (`idCobrador`) REFERENCES `cobrador` (`idCobrador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
