-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `orcamento` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nomeCliente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dataCadastro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `horaCadastro` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nomeVendedor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `precoOrcamento` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
