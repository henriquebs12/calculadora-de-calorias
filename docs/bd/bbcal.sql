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

-- Estrutura da tabela `alimento`
--

CREATE DATABASE bbcal;
USE bbcal;

CREATE TABLE IF NOT EXISTS `Alimento` (
  `idAlimento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `valor_cal` FLOAT NOT NULL,
  `quantidade_proteina` FLOAT NOT NULL,
  `quantidade_carboidrato` FLOAT NOT NULL,
  `porcao` INT NOT NULL,
  `teor_limpidico` FLOAT NOT NULL,
  `teor_fibroso` FLOAT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  `TipoAlimento_idCategoria` INT NOT NULL,
  PRIMARY KEY (`idAlimento`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `Login`(
  `idLogin` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idLogin`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `TipoAlimento` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `Categoria` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `altura` FLOAT NOT NULL,
  `peso` FLOAT NOT NULL,
  `data_nasc` DATE NOT NULL,
  `genero` VARCHAR(1),
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


ALTER TABLE `Login`
	ADD CONSTRAINT `fk_Login_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `Alimento`
	ADD CONSTRAINT `fk_Alimento_TipoAlimento1`
    FOREIGN KEY (`TipoAlimento_idCategoria`)
    REFERENCES `TipoAlimento` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;
    

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




