-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Mar-2023 às 21:12
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
-- Estrutura da tabela `cnpj`
--

CREATE TABLE `cnpj` (
  `id` int(11) NOT NULL,
  `nomeEmpresa` varchar(255) NOT NULL,
  `cnpj` int(14) NOT NULL,
  `cep` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `criado` date DEFAULT NULL,
  `modificado` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cnpj`
--

INSERT INTO `cnpj` (`id`, `nomeEmpresa`, `cnpj`, `cep`, `numero`, `criado`, `modificado`) VALUES
(1, 'senai', 0, 0, '29', NULL, NULL),
(2, 'senai', 2147483647, 0, '21', '2023-03-14', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cnpj`
--
ALTER TABLE `cnpj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cnpj`
--
ALTER TABLE `cnpj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
