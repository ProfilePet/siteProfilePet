-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2022 às 20:53
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
-- Estrutura da tabela `tblembreteconsulta`
--

CREATE TABLE `tblembreteconsulta` (
  `codConsulta` int(11) NOT NULL,
  `dataConsulta` date NOT NULL,
  `horaConsulta` time NOT NULL,
  `nomeClinica` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `localConsulta` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `nomeVeterinario` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `tipoConsulta` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `codDiagnostico` int(11) NOT NULL,
  `ativoLembreteConsulta` tinyint(1) NOT NULL,
  `codAnimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblembreteconsulta`
--
ALTER TABLE `tblembreteconsulta`
  ADD PRIMARY KEY (`codConsulta`),
  ADD KEY `tbLembreteConsulta_codDiagnostico_tbDiagnostico_codDiagnostico` (`codDiagnostico`),
  ADD KEY `tbLembreteConsulta_codAnimal_tbAnimal_codAnimal` (`codAnimal`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblembreteconsulta`
--
ALTER TABLE `tblembreteconsulta`
  MODIFY `codConsulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tblembreteconsulta`
--
ALTER TABLE `tblembreteconsulta`
  ADD CONSTRAINT `tbLembreteConsulta_codAnimal_tbAnimal_codAnimal` FOREIGN KEY (`codAnimal`) REFERENCES `tbanimal` (`codAnimal`),
  ADD CONSTRAINT `tbLembreteConsulta_codDiagnostico_tbDiagnostico_codDiagnostico` FOREIGN KEY (`codDiagnostico`) REFERENCES `tbdiagnostico` (`codDiagnostico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
