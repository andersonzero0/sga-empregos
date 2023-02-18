-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Fev-2023 às 21:02
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
-- Banco de dados: `sga_empregos_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_tb`
--

CREATE TABLE `users_tb` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `token_user` varchar(100) NOT NULL,
  `date_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_tb`
--

INSERT INTO `users_tb` (`id_user`, `user_name`, `password_user`, `token_user`, `date_user`) VALUES
(1, 'usertest', 'b434d5c737faf126c98ccd91132f6892', '4c59224e2fc5d8f1c9b98c3be81d9974', '17/02/2023'),
(2, 'usertest1', 'b434d5c737faf126c98ccd91132f6892', 'f26f1beccc4933abfa9036b03b3d0848', '18/02/2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_datas_tb`
--

CREATE TABLE `user_datas_tb` (
  `id_userData` int(11) NOT NULL,
  `forward_key_userData` int(11) NOT NULL,
  `full_name_userData` varchar(80) DEFAULT NULL,
  `email_address_userData` varchar(50) DEFAULT NULL,
  `phone_number_userData` varchar(20) DEFAULT NULL,
  `type_user` varchar(20) DEFAULT NULL,
  `external_link_userData` varchar(200) DEFAULT NULL,
  `link_image_profile_userData` varchar(200) NOT NULL,
  `link_curriculum_vitae_userData` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_datas_tb`
--

INSERT INTO `user_datas_tb` (`id_userData`, `forward_key_userData`, `full_name_userData`, `email_address_userData`, `phone_number_userData`, `type_user`, `external_link_userData`, `link_image_profile_userData`, `link_curriculum_vitae_userData`) VALUES
(1, 1, 'User Test User Test', 'user@test', '01010101010101010101', 'recrutador', 'http://usertest.com', 'wallhaven-j3d7y5.jpg', 'fceb33c6-d63d-4c7b-b343-1a3344e1d34c.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas_tb`
--

CREATE TABLE `vagas_tb` (
  `id_vaga` int(11) NOT NULL,
  `forward_key_vaga` int(11) NOT NULL,
  `cargo_vaga` varchar(30) NOT NULL,
  `empresa_vaga` varchar(30) NOT NULL,
  `local_vaga` varchar(100) NOT NULL,
  `turno_vaga` varchar(15) NOT NULL,
  `qnt_vaga` int(11) NOT NULL,
  `descricao_vaga` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `user_datas_tb`
--
ALTER TABLE `user_datas_tb`
  ADD PRIMARY KEY (`id_userData`);

--
-- Índices para tabela `vagas_tb`
--
ALTER TABLE `vagas_tb`
  ADD PRIMARY KEY (`id_vaga`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user_datas_tb`
--
ALTER TABLE `user_datas_tb`
  MODIFY `id_userData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
