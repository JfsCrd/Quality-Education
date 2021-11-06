-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id17821103_qualityeducation`
--
CREATE DATABASE IF NOT EXISTS `id17821103_qualityeducation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `id17821103_qualityeducation`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bootcamp`
--

CREATE TABLE `bootcamp` (
  `idBootcamp` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bootcamp_has_course`
--

CREATE TABLE `bootcamp_has_course` (
  `Bootcamp_idBootcamp` int(11) NOT NULL,
  `Course_idCourse` int(11) NOT NULL,
  `Registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificate`
--

CREATE TABLE `certificate` (
  `idCertificate` int(11) NOT NULL,
  `Certificate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `course`
--

CREATE TABLE `course` (
  `idCourse` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Link` varchar(45) NOT NULL,
  `Details` text NOT NULL,
  `SupportingCompany_idSupportingCompany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `supportingcompany`
--

CREATE TABLE `supportingcompany` (
  `idSupportingCompany` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Telephone` varchar(13) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Rank` int(11) NOT NULL,
  `Birth` date NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `Bootcamp_idBootcamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_has_certificate`
--

CREATE TABLE `user_has_certificate` (
  `User_idUser` int(11) NOT NULL,
  `Certificate_idCertificate` int(11) NOT NULL,
  `Issue DATE` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_has_course`
--

CREATE TABLE `user_has_course` (
  `User_idUser` int(11) NOT NULL,
  `Course_idCourse` int(11) NOT NULL,
  `Registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bootcamp`
--
ALTER TABLE `bootcamp`
  ADD PRIMARY KEY (`idBootcamp`);

--
-- Índices de tabela `bootcamp_has_course`
--
ALTER TABLE `bootcamp_has_course`
  ADD PRIMARY KEY (`Bootcamp_idBootcamp`,`Course_idCourse`),
  ADD KEY `fk_Bootcamp_has_Course_Course1_idx` (`Course_idCourse`),
  ADD KEY `fk_Bootcamp_has_Course_Bootcamp1_idx` (`Bootcamp_idBootcamp`);

--
-- Índices de tabela `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`idCertificate`);

--
-- Índices de tabela `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idCourse`),
  ADD KEY `fk_Course_SupportingCompany1_idx` (`SupportingCompany_idSupportingCompany`);

--
-- Índices de tabela `supportingcompany`
--
ALTER TABLE `supportingcompany`
  ADD PRIMARY KEY (`idSupportingCompany`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_User_Bootcamp1_idx` (`Bootcamp_idBootcamp`);

--
-- Índices de tabela `user_has_certificate`
--
ALTER TABLE `user_has_certificate`
  ADD PRIMARY KEY (`User_idUser`,`Certificate_idCertificate`),
  ADD KEY `fk_User_has_Certificate_Certificate1_idx` (`Certificate_idCertificate`),
  ADD KEY `fk_User_has_Certificate_User1_idx` (`User_idUser`);

--
-- Índices de tabela `user_has_course`
--
ALTER TABLE `user_has_course`
  ADD KEY `fk_User_has_Course_Course1_idx` (`Course_idCourse`),
  ADD KEY `fk_User_has_Course_User1_idx` (`User_idUser`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `bootcamp_has_course`
--
ALTER TABLE `bootcamp_has_course`
  ADD CONSTRAINT `fk_Bootcamp_has_Course_Bootcamp1` FOREIGN KEY (`Bootcamp_idBootcamp`) REFERENCES `bootcamp` (`idBootcamp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Bootcamp_has_Course_Course1` FOREIGN KEY (`Course_idCourse`) REFERENCES `course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_Course_SupportingCompany1` FOREIGN KEY (`SupportingCompany_idSupportingCompany`) REFERENCES `supportingcompany` (`idSupportingCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Bootcamp1` FOREIGN KEY (`Bootcamp_idBootcamp`) REFERENCES `bootcamp` (`idBootcamp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `user_has_certificate`
--
ALTER TABLE `user_has_certificate`
  ADD CONSTRAINT `fk_User_has_Certificate_Certificate1` FOREIGN KEY (`Certificate_idCertificate`) REFERENCES `certificate` (`idCertificate`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Certificate_User1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `user_has_course`
--
ALTER TABLE `user_has_course`
  ADD CONSTRAINT `fk_User_has_Course_Course1` FOREIGN KEY (`Course_idCourse`) REFERENCES `course` (`idCourse`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_User_has_Course_User1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
