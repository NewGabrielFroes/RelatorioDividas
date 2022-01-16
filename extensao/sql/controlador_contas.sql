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

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id_conta`, `nome_conta`, `valor_conta`, `status_conta`, `data_vencimento`, `id_gastador`, `id_pagador`) VALUES
(10, 'conta de luz', 1234, 0, '2022-01-12', 12, 12),
(11, 'cartão de crédito', 900, 1, '2022-01-30', 13, 13),
(12, 'academia', 250, 1, '2022-01-28', 14, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gastador`
--

CREATE TABLE `gastador` (
  `id_gastador` int(11) NOT NULL,
  `nome_Gastador` varchar(45) NOT NULL,
  `cpf_gastador` double NOT NULL,
  `sexo_gastador` varchar(10) NOT NULL,
  `data_criacao_conta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `gastador`
--

INSERT INTO `gastador` (`id_gastador`, `nome_Gastador`, `cpf_gastador`, `sexo_gastador`, `data_criacao_conta`) VALUES
(12, 'Pedro', 123.456, 'Masculino', '2022-01-11'),
(13, 'Hadassa Antônia', 582.052, 'Feminino', '2022-01-11'),
(14, 'Márcio Nicolas', 194.593, 'Masculino', '2022-01-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagador`
--

CREATE TABLE `pagador` (
  `id_pagador` int(11) NOT NULL,
  `nome_pagador` varchar(45) NOT NULL,
  `cpf_pagador` double NOT NULL,
  `sexo_pagador` varchar(10) NOT NULL,
  `data_pagamento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagador`
--

INSERT INTO `pagador` (`id_pagador`, `nome_pagador`, `cpf_pagador`, `sexo_pagador`, `data_pagamento`) VALUES
(12, 'José', 132.234, 'Feminino', '2022-01-19'),
(13, 'Isabella Joana', 768.281, 'Feminino', '2022-01-28'),
(14, 'Rosângela Maitê', 903.104, 'Feminino', '2022-01-06');

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
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `gastador`
--
ALTER TABLE `gastador`
  MODIFY `id_gastador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pagador`
--
ALTER TABLE `pagador`
  MODIFY `id_pagador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
