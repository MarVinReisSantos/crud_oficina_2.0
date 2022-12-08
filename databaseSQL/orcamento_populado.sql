-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2022 às 14:35
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `orcamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `id` int(11) UNSIGNED NOT NULL,
  `nomeCliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dataCadastro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `horaCadastro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nomeVendedor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `precoOrcamento` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `orcamento`
--

INSERT INTO `orcamento` (`id`, `nomeCliente`, `dataCadastro`, `horaCadastro`, `nomeVendedor`, `telefone`, `descricao`, `precoOrcamento`) VALUES
(1, 'marcos vinicius', '2022-12-08', '09:53', 'joao victor', '35954967', 'troca de oleo do fiat palio 2015 motor 1.0\r\n4 - litros de oleo                            ', '120.00'),
(2, 'vilma maria', '2022-12-08', '09:58', 'joao victor', '5478412565', 'troca dos amortecedores do fiat uno 2010 motor 1.0\r\n2 - amortecedor dianteiro - R$ 120,00\r\n2 - amortecedor traseiro - R$ 100,00\r\nserviço - R$ 150,00                            ', '370.00'),
(3, 'marcos vinicius', '2022-12-08', '10:02', 'caio silva', '3135954053', 'alinhamento e balanceamento fiat siena 2012 motor 1.6\r\n4 - balanceamento R$ 80,00\r\n1 - alinhamento R$ 120,00', '200.00'),
(4, 'diego monteiro', '2022-12-08', '10:05', 'joao victor', '32501142', 'troca de oleo do ford ka 2015 motor 1.0 \r\n4 - litros de oleo', '80.00'),
(5, 'henrique reis', '2022-12-08', '10:08', 'caio silva', '99562320', 'troca dos amortecedores do ford ka 2020 motor 1.0 \r\n2 - amortecedor dianteiro - R$ 220,00 \r\n2 - amortecedor traseiro - R$ 130,00 \r\nserviço - R$ 200,00', '550.00'),
(6, 'diego monteiro', '2022-12-08', '10:10', 'caio silva', '9984213', 'alinhamento e balanceamento for ka 2015 motor 1.0 \r\n4 - balanceamento R$ 80,00 \r\n1 - alinhamento R$ 120,00', '200.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
