-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< Updated upstream
-- Tempo de geração: 23-Maio-2023 às 03:23
=======
-- Tempo de geração: 20-Jun-2023 às 02:21
>>>>>>> Stashed changes
-- Versão do servidor: 8.0.30
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ela`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atendente`
--

CREATE TABLE `tb_atendente` (
  `cd_atendente` int NOT NULL,
<<<<<<< Updated upstream
  `nm_atendente` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_funcao` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `cd_senha` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
=======
  `nm_atendente` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nm_funcao` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nm_email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cd_senha` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
>>>>>>> Stashed changes
  `st_atendente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_atendente`
--

INSERT INTO `tb_atendente` (`cd_atendente`, `nm_atendente`, `nm_funcao`, `nm_email`, `cd_senha`, `st_atendente`) VALUES
(1, 'Teste', 'Auxiliar', 'atendente@gmail.com', 'testestestestes', 1),
(2, '', '', '', '', 0),
(3, 'Teste', '', '', '', 1),
(4, 'testejhgfvhgjf', 'teste', 'Teste@Teste.com', 'testeATES', 0),
(5, 'Geovana', 'TI', 'Teste@Teste.COM.BR', 'TesteATES', 0),
<<<<<<< Updated upstream
(6, 'Gustavo', 'oi', 'Teste@Teste.COM.BR', 'TesteATES', 0);
=======
(6, 'Gustavo', 'oi', 'Teste@Teste.COM.BR', 'TesteATES', 0),
(8, 'asd', 'teste', 'Teste@Teste.com', 'testeATES', 1);
>>>>>>> Stashed changes

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cd_cliente` int NOT NULL,
<<<<<<< Updated upstream
  `nm_cliente` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `cd_senha` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_departamento` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `cd_telefone` char(11) COLLATE utf8mb4_general_ci NOT NULL,
=======
  `nm_cliente` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nm_email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cd_senha` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nm_departamento` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cd_telefone` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
>>>>>>> Stashed changes
  `st_cliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`cd_cliente`, `nm_cliente`, `nm_email`, `cd_senha`, `nm_departamento`, `cd_telefone`, `st_cliente`) VALUES
<<<<<<< Updated upstream
(1, 'Teste', 'teste@gmail.com', 'teste123', 'TI', '13996581756', 0),
(2, 'Gustavo', 'gustavo@gmail.com', 'testesteste', 'TI', '13996581751', 1),
(3, 'Teste inserção', 'teste@gm.com', 'testeInsercao', 'Teste inserção', '13996581756', 1);
=======
(1, 'Teste', 'teste@gmail.com', 'teste123', 'TI', '13996581756', 1),
(2, 'Gustavo', 'gustavo@gmail.com', 'testesteste', 'TI', '13996581751', 1),
(3, 'Teste inserção', 'teste@gm.com', 'testeInsercao', 'Teste inserção', '13996581756', 1),
(4, 'teste insercao', 'opa@gm.com', 'aeae', 'teste', '13999999999', 0);
>>>>>>> Stashed changes

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentario`
--

CREATE TABLE `tb_comentario` (
  `cd_comentario` int NOT NULL,
<<<<<<< Updated upstream
  `ds_comentario` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
=======
  `ds_comentario` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
>>>>>>> Stashed changes
  `cd_atendente` int NOT NULL,
  `cd_cliente` int NOT NULL,
  `dt_comentario` date NOT NULL,
  `cd_ticket` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ticket`
--

CREATE TABLE `tb_ticket` (
  `cd_ticket` int NOT NULL,
  `dt_ticket_abertura` date NOT NULL,
  `dt_ticket_fechamento` date NOT NULL,
  `dt_atend_inicio` date NOT NULL,
  `dt_atend_final` date NOT NULL,
  `qt_avaliacao` int NOT NULL,
<<<<<<< Updated upstream
  `st_ticket` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nv_criticidade` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `ds_ticket` varchar(400) COLLATE utf8mb4_general_ci NOT NULL,
  `nm_ticket` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
=======
  `st_ticket` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nv_criticidade` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ds_ticket` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nm_ticket` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
>>>>>>> Stashed changes
  `cd_atendente` int NOT NULL,
  `cd_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

<<<<<<< Updated upstream
-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_transferencia`
--

CREATE TABLE `tb_transferencia` (
  `cd_transferencia` int NOT NULL,
  `dt_atende_inicio` date NOT NULL,
  `dt_atende_final` date NOT NULL,
  `cd_ticket` int NOT NULL,
  `cd_atendente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
--
-- Extraindo dados da tabela `tb_ticket`
--

INSERT INTO `tb_ticket` (`cd_ticket`, `dt_ticket_abertura`, `dt_ticket_fechamento`, `dt_atend_inicio`, `dt_atend_final`, `qt_avaliacao`, `st_ticket`, `nv_criticidade`, `ds_ticket`, `nm_ticket`, `cd_atendente`, `cd_cliente`) VALUES
(1, '2023-06-13', '2023-06-13', '2023-06-13', '2023-06-13', 5, 'Fechado', 'testeee', 'testee', 'API ', 1, 1),
(2, '2023-06-13', '2023-06-13', '2023-06-13', '2023-06-13', 5, '0', 'teste', 'teste', 'API ', 1, 1),
(3, '2023-06-13', '2023-06-13', '2023-06-13', '2023-06-13', 5, '0', 'teste', 'teste', 'API ', 1, 1),
(4, '2023-06-13', '2023-06-13', '2023-06-13', '2023-06-13', 10, '0', 'testeee', 'testee', 'API ', 2, 1);
>>>>>>> Stashed changes

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_atendente`
--
ALTER TABLE `tb_atendente`
  ADD PRIMARY KEY (`cd_atendente`);

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Índices para tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD PRIMARY KEY (`cd_comentario`),
  ADD KEY `fk_comentario_atendente` (`cd_atendente`),
  ADD KEY `fk_comentario_ticket` (`cd_ticket`),
  ADD KEY `fk_comentario_cliente` (`cd_cliente`);

--
-- Índices para tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD PRIMARY KEY (`cd_ticket`),
  ADD KEY `fk_ticket_atendente` (`cd_atendente`),
  ADD KEY `fk_ticket_cliente` (`cd_cliente`);

--
<<<<<<< Updated upstream
-- Índices para tabela `tb_transferencia`
--
ALTER TABLE `tb_transferencia`
  ADD PRIMARY KEY (`cd_transferencia`),
  ADD KEY `fk_transferencia_ticket` (`cd_ticket`),
  ADD KEY `fk_transferencia_atendente` (`cd_atendente`);

--
=======
>>>>>>> Stashed changes
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_atendente`
--
ALTER TABLE `tb_atendente`
<<<<<<< Updated upstream
  MODIFY `cd_atendente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `cd_atendente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
>>>>>>> Stashed changes

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
<<<<<<< Updated upstream
  MODIFY `cd_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `cd_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> Stashed changes

--
-- AUTO_INCREMENT de tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
<<<<<<< Updated upstream
  MODIFY `cd_comentario` int NOT NULL AUTO_INCREMENT;
=======
  MODIFY `cd_comentario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> Stashed changes

--
-- AUTO_INCREMENT de tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
<<<<<<< Updated upstream
  MODIFY `cd_ticket` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_transferencia`
--
ALTER TABLE `tb_transferencia`
  MODIFY `cd_transferencia` int NOT NULL AUTO_INCREMENT;
=======
  MODIFY `cd_ticket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> Stashed changes

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD CONSTRAINT `fk_comentario_atendente` FOREIGN KEY (`cd_atendente`) REFERENCES `tb_atendente` (`cd_atendente`),
  ADD CONSTRAINT `fk_comentario_cliente` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`),
  ADD CONSTRAINT `fk_comentario_ticket` FOREIGN KEY (`cd_ticket`) REFERENCES `tb_ticket` (`cd_ticket`);

--
-- Limitadores para a tabela `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD CONSTRAINT `fk_ticket_atendente` FOREIGN KEY (`cd_atendente`) REFERENCES `tb_atendente` (`cd_atendente`),
  ADD CONSTRAINT `fk_ticket_cliente` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`);
<<<<<<< Updated upstream

--
-- Limitadores para a tabela `tb_transferencia`
--
ALTER TABLE `tb_transferencia`
  ADD CONSTRAINT `fk_transferencia_atendente` FOREIGN KEY (`cd_atendente`) REFERENCES `tb_atendente` (`cd_atendente`),
  ADD CONSTRAINT `fk_transferencia_ticket` FOREIGN KEY (`cd_ticket`) REFERENCES `tb_ticket` (`cd_ticket`);
=======
>>>>>>> Stashed changes
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
