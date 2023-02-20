-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 10:46 PM
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

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`id_user`, `user_name`, `password_user`, `token_user`, `date_user`) VALUES
(1, 'candidato', 'b434d5c737faf126c98ccd91132f6892', 'c1f1756eda4fe13f5d2ac1b7e52866ee', '20/02/2023'),
(2, 'recrutador', 'b434d5c737faf126c98ccd91132f6892', '11efd1091220e0d4a90620b057b1ace7', '20/02/2023');

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

--
-- Dumping data for table `user_datas_tb`
--

INSERT INTO `user_datas_tb` (`id_userData`, `forward_key_userData`, `full_name_userData`, `email_address_userData`, `phone_number_userData`, `type_user`, `external_link_userData`, `link_image_profile_userData`, `link_curriculum_vitae_userData`) VALUES
(1, 1, 'Pedro Alvares Cabral', 'cabral@portugal', '+5585981010101', 'CANDIDATO', 'http://cabral.com', 'user.png', 'fceb33c6-d63d-4c7b-b343-1a3344e1d34c.pdf'),
(2, 2, 'Nicolas Tesla dos Santos', 'nicolas@tesla', '+5585981020202', 'RECRUTADOR', 'http://nicolastesla.com', 'user.png', 'Aprendendo-a-sintaxe.pdf');

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
-- Dumping data for table `vagas_tb`
--

INSERT INTO `vagas_tb` (`id_vaga`, `forward_key_vaga`, `cargo_vaga`, `empresa_vaga`, `local_vaga`, `turno_vaga`, `qnt_vaga`, `descricao_vaga`) VALUES
(1, 2, 'Web Design', 'Google', 'Florida, EUA', 'Noturno', 12, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various ');

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
-- AUTO_INCREMENT for table `registrocandit_tb`
--
ALTER TABLE `registrocandit_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_datas_tb`
--
ALTER TABLE `user_datas_tb`
  MODIFY `id_userData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vagas_tb`
--
ALTER TABLE `vagas_tb`
  MODIFY `id_vaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
