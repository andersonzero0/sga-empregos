-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 12:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sga_empregos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrocandit_tb`
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
-- Table structure for table `users_tb`
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
-- Table structure for table `user_datas_tb`
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

-- --------------------------------------------------------

--
-- Table structure for table `vagas_tb`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `registrocandit_tb`
--
ALTER TABLE `registrocandit_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_datas_tb`
--
ALTER TABLE `user_datas_tb`
  ADD PRIMARY KEY (`id_userData`);

--
-- Indexes for table `vagas_tb`
--
ALTER TABLE `vagas_tb`
  ADD PRIMARY KEY (`id_vaga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_datas_tb`
--
ALTER TABLE `user_datas_tb`
  MODIFY `id_userData` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
