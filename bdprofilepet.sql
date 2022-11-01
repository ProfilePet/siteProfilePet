-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2022 às 21:08
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdprofilepet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `codAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(50) NOT NULL,
  `imagemAnimal` varchar(100) NOT NULL,
  `nascimentoAnimal` date DEFAULT NULL,
  `ativoAnimal` tinyint(1) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `codRacaAnimal` int(11) NOT NULL,
  `codTemperamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`codAnimal`),
  ADD KEY `tbAnimal_codTemperamento_tbTemperamento_codTemperamentoAnimal` (`codTemperamento`),
  ADD KEY `tbAnimal_codRacaAnimal_tbRaca_codRacaAnimal` (`codRacaAnimal`),
  ADD KEY `tbAnimal_codUsuario_tbUsuario_codUsuario` (`codUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `codAnimal` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbAnimal_codRacaAnimal_tbRaca_codRacaAnimal` FOREIGN KEY (`codRacaAnimal`) REFERENCES `tbraca` (`codRacaAnimal`),
  ADD CONSTRAINT `tbAnimal_codTemperamento_tbTemperamento_codTemperamentoAnimal` FOREIGN KEY (`codTemperamento`) REFERENCES `tbtemperamento` (`codTemperamento`),
  ADD CONSTRAINT `tbAnimal_codUsuario_tbUsuario_codUsuario` FOREIGN KEY (`codUsuario`) REFERENCES `tbusuario` (`codUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
