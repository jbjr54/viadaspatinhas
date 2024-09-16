-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/09/2024 às 03:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `viadaspatinhas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_adocao`
--

CREATE TABLE `tb_adocao` (
  `ID` int(10) NOT NULL,
  `FOTO_ADOCAO` varchar(50) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `ESPECIE` varchar(30) NOT NULL,
  `RACA` varchar(30) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `DTA_NASC` date NOT NULL,
  `CARACT` varchar(500) NOT NULL,
  `SAUDE` varchar(500) NOT NULL,
  `TUTOR_EMAIL` varchar(40) NOT NULL,
  `TUTOR_CELL` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_adocao`
--

INSERT INTO `tb_adocao` (`ID`, `FOTO_ADOCAO`, `NOME`, `ESPECIE`, `RACA`, `SEXO`, `DTA_NASC`, `CARACT`, `SAUDE`, `TUTOR_EMAIL`, `TUTOR_CELL`) VALUES
(14, 'gatocadastro2.webp', 'Nescau', 'Gato', 'Vira-Lata', 'Macho', '2022-03-25', 'Pelagem de cor Preta', 'Bem de saúde, com todas vacinas em dia.', 'tutordonescau@gmail.com', 2147483647),
(15, 'WhatsApp Image 2024-09-14 at 19.00.55.jpeg', 'Jerimum', 'Gato', 'Vira-Lata', 'Macho', '2022-12-17', 'Pelagem branca com manchas laranjas.', 'Bem de saúde, castrado, com todas as vacinas em dia.', 'tutordojerimum@gmail.com', 912345678),
(16, 'WhatsApp Image 2024-09-14 at 18.07.27.jpeg', 'kafuringo', 'Gato', 'Vira-Lata', 'Macho', '2019-08-02', 'Pelagem tipo frajola, branco com preto.', 'F', 'tutordokafuringo@gmail.com', 912345678),
(17, 'WhatsApp Image 2024-09-14 at 18.30.43.jpeg', 'Tina', 'Gato', 'Vira-Lata', 'Fêmea', '2018-01-01', 'Pelagem tipo frajola, branca com manchas pretas. Pelo ralo na lateral do corpo devido uma judiação.', 'Bem de saúde, castrada, sem informações a respeito da vacinação.', 'tutordatina@gmail.com', 912345678),
(18, 'WhatsApp Image 2024-09-14 at 19.20.12.jpeg', 'Kiko', 'Cachorro', 'Vira-Lata', 'Macho', '2021-04-02', 'Pelagem tipo caramelo.', 'Perdeu parte da arcada dentária, sem informações a respeito da vacinação.', 'tutordokiko@gmail.com', 912345678),
(19, 'IMG_20240718_105105466_MFNR - matheus henrique.jpg', 'Jasmim', 'Cachorro', 'Vira-Lata', 'Fêmea', '2021-07-18', 'Cor caramelo.', 'Saudável, vacinada e castrada.', 'tutordajasmim@gmail.com', 912345678),
(20, 'WhatsApp Image 2024-09-15 at 18.24.17.jpeg', 'Nina', 'Cachorro', 'Vira-Lata', 'Fêmea', '2024-01-10', 'Pelagem branca amarelada.', 'Saudável, sem informações a respeito da vacinação.', 'tutordanina@gmail.com', 912345678),
(21, 'WhatsApp Image 2024-09-15 at 18.38.44.jpeg', 'Bóris', 'Cachorro', 'Vira-Lata', 'Macho', '2023-08-12', 'Pelagem preta com marrom.', 'Sem informações.', 'tutordoboris@gmail.com', 912345678),
(22, 'gatocadastro3.webp', 'Nala', 'Gato', 'Vira-Lata', 'Fêmea', '2023-03-03', 'Pelagem tipo siamês', 'Saudável, castrada e vacinação em dia.', 'tutordanala@gmail.com', 912345678),
(23, 'cachorrocadastro1.jpg', 'Caroço', 'Cachorro', 'Vira-Lata', 'Macho', '2023-09-01', 'Pelo de tamanho médio de cor branco amarelado.', 'Saudável, castrado e vacinação em dia.', 'tutordocaroco@gmail.com', 912345678);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_encontre`
--

CREATE TABLE `tb_encontre` (
  `ID` int(10) NOT NULL,
  `FOTO_ENCONT` varchar(50) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `ESPECIE` varchar(30) NOT NULL,
  `RACA` varchar(30) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `DTA_NASC` date NOT NULL,
  `CARACT` varchar(500) NOT NULL,
  `SAUDE` varchar(500) NOT NULL,
  `DESAP` varchar(500) NOT NULL,
  `TUTOR_EMAIL` varchar(40) NOT NULL,
  `TUTOR_CELL` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_encontre`
--

INSERT INTO `tb_encontre` (`ID`, `FOTO_ENCONT`, `NOME`, `ESPECIE`, `RACA`, `SEXO`, `DTA_NASC`, `CARACT`, `SAUDE`, `DESAP`, `TUTOR_EMAIL`, `TUTOR_CELL`) VALUES
(5, 'cadcao5.webp', 'Pérola', 'Cachorro', 'Poodle', 'Fêmea', '2020-07-02', 'Pelagem branca encaracolada.', 'Saudável.', 'Vista pela última vez dia 01/09/2024, nas imediações da Escola Técnica Estadual José Joaquim da Silva Filho.', 'tutordaperola@gmail.com', 912345678),
(6, 'cadgato5.jpg', 'Cinzento', 'Gato', 'Vira-lata', 'Macho', '2021-05-12', 'Pelagem cinza.', 'Saudável.', 'Visto pela última vez dia 05/09/2024, nas imediações de Mizael Gás, bairro Nossa Sra. do Amparo.', 'tutordocinzento@gmail.com', 912345678),
(7, 'cadcao4.webp', 'Doug', 'Cachorro', 'Pitbull', 'Macho', '2018-11-03', 'Pelagem marrom com manchas brancas na barriga.', 'Saudável.', 'Visto pela última vez dia 10/09/2024, nas imediações do Privê dos Trajanos, bairro São Vicente de Paulo.', 'tutordodoug@gmail.com', 912345678),
(8, 'cadgato3.jpg', 'Aurora', 'Gato', 'Vira-lata', 'Fêmea', '2020-04-12', 'Pelagem tricolor: Branco, laranja e preto.', 'Saudável.', 'Vista pela última vez dia 20/08/2024, nas imediações da academia Demello Fit, bairro da Bela Vista.', 'tutordaaurora@gmail.com', 912345678),
(9, 'WhatsApp Image 2024-09-15 at 20.56.30.jpeg', 'Magna', 'Gato', 'Vira-lata', 'Fêmea', '2021-01-05', 'Pelagem branca com manchas pretas e laranjas nas orelhas e no cauda.', 'Grávida, saudável.', 'Vista pela última vez dia 16/09/2024, nas imediações do Tiro de Guerra 07-004.', 'tutordamagna@gmail.com', 912345678);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'ze', '$2y$10$uAJEOdv6TE9/VES8RTg2Q.C6JcaN2vvMhYUzqcZ52kHYEaJS3umTy', 'user', '2024-09-14 12:38:36');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_adocao`
--
ALTER TABLE `tb_adocao`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tb_encontre`
--
ALTER TABLE `tb_encontre`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_adocao`
--
ALTER TABLE `tb_adocao`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_encontre`
--
ALTER TABLE `tb_encontre`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
