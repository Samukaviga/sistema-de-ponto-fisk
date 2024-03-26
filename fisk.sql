-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/03/2024 às 21:48
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fisk`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `banco`
--

CREATE TABLE `banco` (
  `id` int(11) NOT NULL,
  `banco` varchar(55) DEFAULT NULL,
  `conta` varchar(55) DEFAULT NULL,
  `tipo_conta` varchar(55) DEFAULT NULL,
  `agencia` varchar(55) DEFAULT NULL,
  `tipo_pix` varchar(55) DEFAULT NULL,
  `pix` varchar(55) DEFAULT NULL,
  `parentesco` varchar(55) DEFAULT NULL,
  `titular` int(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_id` int(11) DEFAULT NULL,
  `nome_titular` varchar(255) DEFAULT NULL,
  `cpf` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `banco`
--

INSERT INTO `banco` (`id`, `banco`, `conta`, `tipo_conta`, `agencia`, `tipo_pix`, `pix`, `parentesco`, `titular`, `created_at`, `updated_at`, `usuario_id`, `nome_titular`, `cpf`) VALUES
(5, 'Banco Bradesco S.A.', '2222', 'Corrente', '222', 'Salario', '666664', 'Pai/Mae', 0, '2024-03-22 16:04:30', '2024-03-26 13:57:38', 1, 'samuel', '222.343.444-44'),
(6, 'Banco C6 S.A.', '0004661464', 'Poupanca', '222', 'Poupanca', '996551225', 'Pai/Mae', 0, '2024-03-26 15:24:54', '2024-03-26 18:02:07', 6, 'Tarzan Teixeira', '666.984.221-55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `data` varchar(55) DEFAULT NULL,
  `hora_inicio` varchar(55) DEFAULT NULL,
  `hora_termino` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  `tipo` varchar(55) DEFAULT NULL,
  `observacao` varchar(55) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_id` int(11) DEFAULT NULL,
  `unidade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `registros`
--

INSERT INTO `registros` (`id`, `data`, `hora_inicio`, `hora_termino`, `status`, `tipo`, `observacao`, `created_at`, `updated_at`, `usuario_id`, `unidade_id`) VALUES
(5, '2024-03-26', '12:00', '14:00', '1', 'Presencial', '', '2024-03-26 15:43:46', '2024-03-26 19:03:46', 6, 3),
(6, '2024-03-26', '15:00', '17:00', '0', 'Presencial', '', '2024-03-26 17:49:48', '2024-03-26 17:49:48', 6, 1),
(7, '2024-03-27', '14:00', '16:00', '3', 'Online', '', '2024-03-26 18:17:06', '2024-03-26 19:03:46', 6, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome`) VALUES
(1, 'Fisk Poa'),
(2, 'Fisk Suzano'),
(3, 'Fisk Itaquaquecetuba');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `escola` int(2) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `endereco` varchar(55) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(55) DEFAULT NULL,
  `bairro` varchar(55) DEFAULT NULL,
  `cidade` varchar(55) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome` varchar(55) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `tipo`, `escola`, `cpf`, `nascimento`, `celular`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `created_at`, `updated_at`, `nome`, `valor`) VALUES
(1, 'samuel@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, NULL, '491.064.778-55', '2000-12-18', '(11) 9651-24506', '08594-060', 'Rua Barbosa Cordeiro', '22', 'perto da padaria', 'Parque Residencial Marengo', 'Itaquaquecetuba', 'SP', '2024-03-21 14:19:58', '2024-03-22 14:21:46', 'Samuel Gomes', NULL),
(5, 'taua@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-25 15:58:56', '2024-03-25 15:58:56', 'Tauan Freires', 20),
(6, 'tarzan@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, NULL, '265.489.854-64', '2000-10-12', '(11) 9644-48778', '08594-060', 'Rua Barbosa Cordeiro', '445', '', 'Parque Residencial Marengo', 'Itaquaquecetuba', 'SP', '2024-03-25 17:23:19', '2024-03-26 18:04:33', 'Tarzan', 20);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario` (`usuario_id`);

--
-- Índices de tabela `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_unidade` (`unidade_id`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banco`
--
ALTER TABLE `banco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `banco`
--
ALTER TABLE `banco`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_id_unidade` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
