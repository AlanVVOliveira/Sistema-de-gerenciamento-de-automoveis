-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/02/2024 às 18:42
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
-- Banco de dados: `loja_automotiva`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `versao` varchar(100) NOT NULL,
  `combustivel` varchar(50) NOT NULL,
  `motorizacao` decimal(2,1) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `valorCompra` decimal(8,2) NOT NULL,
  `valorVenda` decimal(8,2) NOT NULL,
  `margemLucro` decimal(8,2) NOT NULL,
  `situacao` enum('ativo','inativo') DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `fabricante`, `modelo`, `ano`, `versao`, `combustivel`, `motorizacao`, `placa`, `valorCompra`, `valorVenda`, `margemLucro`, `situacao`, `data_cadastro`) VALUES
(1, 'fiat', 'uno', 2015, 'fire', 'flex', 1.0, 'AAA1A11', 15000.00, 18500.00, 3500.00, 'ativo', '2024-02-21 13:28:29'),
(2, 'fiat', 'strada', 2015, 'volcano', 'flex', 1.4, 'AAA1A12', 80000.00, 85000.00, 5000.00, 'ativo', '2024-02-21 13:31:28'),
(3, 'volkswagen', 'golf', 2012, 'gt sportiline', 'flex', 1.6, 'AAA1A13', 47500.00, 51300.00, 3800.00, 'ativo', '2024-02-21 13:32:32'),
(4, 'volkswagen', 'polo', 2012, 'highline', 'flex', 1.0, 'AAA1A14', 70000.00, 72800.00, 2800.00, 'ativo', '2024-02-21 13:33:17'),
(5, 'chevrolet', 'vectra', 2008, 'gt', 'flex', 2.0, 'AAA1A15', 28000.00, 31200.00, 3200.00, 'ativo', '2024-02-21 13:33:54'),
(6, 'chevrolet', 'astra', 2008, 'executive aut', 'flex', 2.0, 'AAA1A16', 29750.00, 32000.00, 2250.00, 'ativo', '2024-02-21 13:34:44'),
(7, 'toyota', 'corolla', 2020, 'altis', 'hibrido', 2.0, 'AAA1A17', 180000.00, 191350.00, 11350.00, 'ativo', '2024-02-21 16:45:15'),
(8, 'toyota', 'hilux', 2024, 'STD Power', 'diesel', 2.0, 'AAA1A18', 242500.00, 249750.00, 7250.00, 'ativo', '2024-02-21 17:21:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
