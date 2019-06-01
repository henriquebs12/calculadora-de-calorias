-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2019 às 22:09
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbcal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimento`
--

CREATE TABLE `alimento` (
  `idAlimento` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `valor_cal` float NOT NULL,
  `quantidade_proteina` float NOT NULL,
  `quantidade_carboidrato` float NOT NULL,
  `porcao` int(11) NOT NULL,
  `teor_limpidico` float NOT NULL,
  `teor_fibroso` float NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `TipoAlimento_idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alimento`
--

INSERT INTO `alimento` (`idAlimento`, `nome`, `valor_cal`, `quantidade_proteina`, `quantidade_carboidrato`, `porcao`, `teor_limpidico`, `teor_fibroso`, `Usuario_idUsuario`, `TipoAlimento_idCategoria`) VALUES
(1, 'Leite', 42, 3.4, 5, 100, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `email`, `senha`, `Usuario_idUsuario`) VALUES
(2, 'lucas@google.com', 'a1b2c3d4', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoalimento`
--

CREATE TABLE `tipoalimento` (
  `idCategoria` int(11) NOT NULL,
  `Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipoalimento`
--

INSERT INTO `tipoalimento` (`idCategoria`, `Categoria`) VALUES
(1, 'Alimento líquido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `altura` float NOT NULL,
  `peso` float NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `altura`, `peso`, `data_nasc`) VALUES
(1, 'Lucas', 1.8, 79, '1998-03-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`idAlimento`),
  ADD KEY `fk_Alimento_Usuario1` (`Usuario_idUsuario`),
  ADD KEY `fk_Alimento_TipoAlimento1` (`TipoAlimento_idCategoria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `tipoalimento`
--
ALTER TABLE `tipoalimento`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alimento`
--
ALTER TABLE `alimento`
  MODIFY `idAlimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoalimento`
--
ALTER TABLE `tipoalimento`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `fk_Alimento_TipoAlimento1` FOREIGN KEY (`TipoAlimento_idCategoria`) REFERENCES `tipoalimento` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Alimento_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
