-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jan-2022 às 00:12
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

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
  `id_conta` int(11) NOT NULL,
  `nome_conta` varchar(45) NOT NULL,
  `valor_conta` float NOT NULL,
  `status_conta` tinyint(1) NOT NULL,
  `data_vencimento` date NOT NULL,
  `id_gastador` int(11) NOT NULL,
  `id_pagador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estrutura da tabela `gastador`
--

CREATE TABLE `gastador` (
  `id_gastador` int(11) NOT NULL,
  `nome_Gastador` varchar(45) NOT NULL,
  `cpf_gastador` varchar(15) NOT NULL,
  `sexo_gastador` varchar(10) NOT NULL,
  `data_criacao_conta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estrutura da tabela `pagador`
--

CREATE TABLE `pagador` (
  `id_pagador` int(11) NOT NULL,
  `nome_pagador` varchar(45) NOT NULL,
  `cpf_pagador` varchar(15) NOT NULL,
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
  ADD PRIMARY KEY (`id_conta`),
  ADD KEY `conta_ibfk_1` (`id_gastador`),
  ADD KEY `conta_ibfk_2` (`id_pagador`);

--
-- Índices para tabela `gastador`
--
ALTER TABLE `gastador`
  ADD PRIMARY KEY (`id_gastador`);

--
-- Índices para tabela `pagador`
--
ALTER TABLE `pagador`
  ADD PRIMARY KEY (`id_pagador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gastador`
--
ALTER TABLE `gastador`
  MODIFY `id_gastador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagador`
--
ALTER TABLE `pagador`
  MODIFY `id_pagador` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`id_gastador`) REFERENCES `gastador` (`id_gastador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conta_ibfk_2` FOREIGN KEY (`id_pagador`) REFERENCES `pagador` (`id_pagador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
