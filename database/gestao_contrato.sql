SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Banco de dados: `gestao_contrato`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contrato`
--

CREATE TABLE `contrato` (
  `id` int NOT NULL,
  `fk_contratante` int NOT NULL,
  `fk_contratado` int NOT NULL,
  `carencia` date NOT NULL,
  `vigencia` date NOT NULL,
  `valor` double NOT NULL,
  `prazo` date NOT NULL,
  `fk_status` int NOT NULL,
  `fk_objeto` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `contrato`
--

INSERT INTO `contrato` (`id`, `fk_contratante`, `fk_contratado`, `carencia`, `vigencia`, `valor`, `prazo`, `fk_status`, `fk_objeto`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-02-28', '2021-03-31', 123555, '2021-06-30', 1, 4, '2021-03-01 07:14:39', '2021-03-01 07:14:39'),
(2, 3, 4, '2021-03-31', '2021-04-01', 100000, '2021-07-31', 2, 3, '2021-03-01 07:16:34', '2021-03-01 07:21:34'),
(3, 3, 2, '2021-02-11', '2021-03-01', 1000000, '2021-06-04', 3, 2, '2021-03-01 07:17:23', '2021-03-01 07:18:26'),
(4, 3, 2, '2021-02-01', '2021-03-01', 123122, '2021-05-01', 1, 2, '2021-03-01 07:18:14', '2021-03-01 07:18:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int NOT NULL,
  `razao_social` varchar(45) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `fk_endereco` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id`, `razao_social`, `cnpj`, `telefone`, `fk_endereco`, `created_at`, `updated_at`) VALUES
(1, 'Empresa Ltda', '11111111111111', '69984176303', 1, '2021-03-01 07:13:39', '2021-03-01 07:13:39'),
(2, 'Fornecedor PVH', '22222222222222', '69999999999', 2, '2021-03-01 07:14:09', '2021-03-01 07:14:09'),
(3, 'Empresa Ltda 2', '84988989895623', '6932132121', 3, '2021-03-01 07:15:21', '2021-03-01 07:15:21'),
(4, 'Empresa Porto Ltda', '33333333333333', '69999999999', 4, '2021-03-01 07:16:02', '2021-03-01 07:16:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int NOT NULL,
  `cep` varchar(40) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `logradouro`, `bairro`, `numero`, `estado`, `cidade`, `created_at`, `updated_at`) VALUES
(1, '76825130', 'Rua Antônio Gomides', 'Esperança da Comunidade', '4446', 'RO', 'Porto Velho', '2021-03-01 07:13:39', '2021-03-01 07:13:39'),
(2, '76825135', 'Rua Sheila Regina', 'Esperança da Comunidade', '4446', 'RO', 'Porto Velho', '2021-03-01 07:14:09', '2021-03-01 07:14:09'),
(3, '76825-135', 'Rua Sheila Regina', 'Esperança da Comunidade', '121212', 'RO', 'Porto Velho', '2021-03-01 07:15:21', '2021-03-01 07:15:21'),
(4, '76.804-102', 'Avenida Sete de Setembro', 'KM 1', '5000', 'RO', 'Porto Velho', '2021-03-01 07:16:02', '2021-03-01 07:16:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `objeto`
--

CREATE TABLE `objeto` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `objeto`
--

INSERT INTO `objeto` (`id`, `nome`, `created_at`) VALUES
(1, 'Empréstimos', '2021-02-22 17:43:35'),
(2, 'Seguro', '2021-03-01 01:58:59'),
(3, 'Locação de Serviços', '2021-03-01 01:58:59'),
(4, 'Equipamentos', '2021-03-01 01:58:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status_contrato`
--

CREATE TABLE `status_contrato` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `status_contrato`
--

INSERT INTO `status_contrato` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Em edição', '2021-02-22 19:14:55', '2021-02-22 19:14:55'),
(2, 'Ativo', '2021-02-22 19:14:55', '2021-02-22 19:14:55'),
(3, 'Cancelado', '2021-02-22 19:14:55', '2021-02-22 19:14:55');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contrato_empresa_idx` (`fk_contratante`),
  ADD KEY `fk_contrato_empresa1_idx` (`fk_contratado`),
  ADD KEY `fk_contrato_status_contrato1_idx` (`fk_status`),
  ADD KEY `fk_contrato_objeto1_idx` (`fk_objeto`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa_endereco1_idx` (`fk_endereco`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `status_contrato`
--
ALTER TABLE `status_contrato`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `status_contrato`
--
ALTER TABLE `status_contrato`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_contrato_empresa` FOREIGN KEY (`fk_contratante`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `fk_contrato_empresa1` FOREIGN KEY (`fk_contratado`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `fk_contrato_objeto1` FOREIGN KEY (`fk_objeto`) REFERENCES `objeto` (`id`),
  ADD CONSTRAINT `fk_contrato_status_contrato1` FOREIGN KEY (`fk_status`) REFERENCES `status_contrato` (`id`);

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_empresa_endereco1` FOREIGN KEY (`fk_endereco`) REFERENCES `endereco` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
