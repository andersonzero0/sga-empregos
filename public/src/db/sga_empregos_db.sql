-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Fev-2023 às 19:50
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sga_empresas_db`
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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user_datas_tb`
--
ALTER TABLE `user_datas_tb`
  MODIFY `id_userData` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
