-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jan-2022 às 02:39
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

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
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `nome_conta` varchar(45) NOT NULL,
  `valor_conta` float NOT NULL,
  `status_conta` tinyint(1) NOT NULL,
  `data_vencimento` date NOT NULL,
  `nome_gastador` varchar(45) NOT NULL,
  `nome_pagador` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastador`
--

CREATE TABLE `gastador` (
  `nome_Gastador` varchar(45) NOT NULL,
  `cpf_gastador` double NOT NULL,
  `sexo_gastador` varchar(10) NOT NULL,
  `data_criacao_conta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagador`
--

CREATE TABLE `pagador` (
  `nome_pagador` varchar(45) NOT NULL,
  `cpf_pagador` double NOT NULL,
  `sexo_pagador` varchar(10) NOT NULL,
  `data_pagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`nome_conta`),
  ADD KEY `conta_ibfk_1` (`nome_gastador`),
  ADD KEY `conta_ibfk_2` (`nome_pagador`);

--
-- Índices para tabela `gastador`
--
ALTER TABLE `gastador`
  ADD PRIMARY KEY (`nome_Gastador`);

--
-- Índices para tabela `pagador`
--
ALTER TABLE `pagador`
  ADD PRIMARY KEY (`nome_pagador`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`nome_gastador`) REFERENCES `gastador` (`nome_Gastador`) ON DELETE CASCADE,
  ADD CONSTRAINT `conta_ibfk_2` FOREIGN KEY (`nome_pagador`) REFERENCES `pagador` (`nome_pagador`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
