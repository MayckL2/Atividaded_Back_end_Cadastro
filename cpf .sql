-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Mar-2023 às 21:11
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbcadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpf`
--

CREATE TABLE `cpf` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `criado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cpf`
--

INSERT INTO `cpf` (`id`, `nome`, `cpf`, `senha`, `email`, `criado`) VALUES
(2, 'guts', '48492886854', '', '', NULL),
(3, 'mike', '48492886854', '202cb962ac59075b964b07152d234b70', 'aaa@gmail.com', NULL),
(4, 'jao', '48492886854', '250cf8b51c773f3f8dc8b4be867a9a02', 'jao@gmail.com', '2023-03-14'),
(5, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2023-03-14'),
(6, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2023-03-14'),
(7, 'asdf', '48492886854', '7815696ecbf1c96e6894b779456d330e', 'aaa@gmail.com', '2023-03-14'),
(8, 'asdf', '48492886854', '7815696ecbf1c96e6894b779456d330e', 'aaa@gmail.com', '2023-03-14'),
(9, 'mike', '48492886854', '202cb962ac59075b964b07152d234b70', 'mike@gmail.com', '2023-03-14'),
(10, 'mike', '48492886854', '202cb962ac59075b964b07152d234b70', 'a@gmail.com', '2023-03-14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cpf`
--
ALTER TABLE `cpf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cpf`
--
ALTER TABLE `cpf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
