-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Fev-2023 às 17:15
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
-- Estrutura da tabela `registrocandit_tb`
--

CREATE TABLE `registrocandit_tb` (
  `id` int(11) NOT NULL,
  `forward_key_user` int(11) NOT NULL,
  `forward_key_vaga` int(11) NOT NULL,
  `stage_vaga` varchar(15) NOT NULL,
  `data_regist` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'usertest', 'b434d5c737faf126c98ccd91132f6892', '7cfe4ee5675ecba21fa20b63c305bfef', '19/02/2023'),
(2, 'userCandidato', 'b434d5c737faf126c98ccd91132f6892', 'cc494e3334186f2048f6188276c49ea1', '19/02/2023');

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
(1, 1, 'Usuario Test 2sasa', 'assaa@dsdsa', '11212121121212121121', 'Recrutador', 'http://sasas', 'user.png', 'fceb33c6-d63d-4c7b-b343-1a3344e1d34c.pdf'),
(2, 2, 'User user user user', 'dsd@ddsdsad', '42342343434332', 'Candidato', 'http://asasas', 'user.png', 'fceb33c6-d63d-4c7b-b343-1a3344e1d34c.pdf');

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
-- Extraindo dados da tabela `vagas_tb`
--

INSERT INTO `vagas_tb` (`id_vaga`, `forward_key_vaga`, `cargo_vaga`, `empresa_vaga`, `local_vaga`, `turno_vaga`, `qnt_vaga`, `descricao_vaga`) VALUES
(0, 1, 'Engenheiro de Software', 'Microsoft', 'New York, EUA', 'Integral', 12, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente non facere aliquid eum impedit aperiam beatae explicabo. Fugit officia iure fugiat ea minima totam assumenda laborum, earum aperiam nihil ');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `registrocandit_tb`
--
ALTER TABLE `registrocandit_tb`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_userData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
