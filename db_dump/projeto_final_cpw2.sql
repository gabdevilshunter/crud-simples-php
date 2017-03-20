-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 20/03/2017 às 19:39
-- Versão do servidor: 5.5.44-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `projeto_final_cpw2`
--
CREATE DATABASE IF NOT EXISTS `projeto_final_cpw2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projeto_final_cpw2`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `form001_compra`
--

CREATE TABLE IF NOT EXISTS `form001_compra` (
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `plataforma` varchar(255) NOT NULL,
  `maior_idade` tinyint(1) NOT NULL,
  `pagamento` varchar(255) NOT NULL,
  `conheceu` varchar(255) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `form001_compra`
--

INSERT INTO `form001_compra` (`nome`, `email`, `logradouro`, `numero`, `telefone`, `celular`, `cpf`, `senha`, `plataforma`, `maior_idade`, `pagamento`, `conheceu`, `id`) VALUES
('Minattinho', 'gab@gab.com', 'Medianeira', 645, '(51) 3493-3748', '(51) 8449-1878', '859.893.630-87', 'exemplo', 'xbox', 0, 'boleto', 'outro', 1),
('Vanessa', 'vah@vah.com', 'Itati', 1455, '(54) 8459-8432', '(23) 2346-6284', '456.387.921-52', 'sample', 'xbox', 1, 'boleto', 'outro', 4),
('Raimundo', 'rai@rai.com', 'Av. Brasil', 235, '(55) 5612-6234', '(26) 1384-6249', '357.159.654-91', 'exemplo', 'Play', 0, 'cartao', 'amigos', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `form002_contato`
--

CREATE TABLE IF NOT EXISTS `form002_contato` (
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `mensagem` text NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `ofertas` tinyint(1) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `form002_contato`
--

INSERT INTO `form002_contato` (`nome`, `email`, `face`, `twitter`, `endereco`, `cep`, `numero`, `mensagem`, `motivo`, `ofertas`, `id`) VALUES
('Dan', 'dan@dan.com', 'Denis Adriano', '@denis', 'Andradas', '94480600', 236, 'Hoje eu tomei cafe da manha', 'reclama', 1, 1),
('test', 'test@test.com', 'fb.test', '@test', 'testando', '84848484', 484848454, 'Hoje fui mal', 'reclama', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `form003_cadastro`
--

CREATE TABLE IF NOT EXISTS `form003_cadastro` (
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Fazendo dump de dados para tabela `form003_cadastro`
--

INSERT INTO `form003_cadastro` (`nome`, `email`, `nascimento`, `senha`, `id`) VALUES
('Vanessa', 'vah@vah.com', '2003-02-02', 'exemplo1', 10),
('Robson', 'rob@rob.com', '2000-03-02', 'sample', 11),
('Vanderlei', 'van@vani.com', '1980-06-25', 'sample1', 12),
('Marcio', 'marcio@mar.com', '1982-10-03', 'umequinze', 13),
('jujubs', 'juju@juju.com', '2005-01-01', 'mimbja', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `teste`
--

CREATE TABLE IF NOT EXISTS `teste` (
  `nome` varchar(255) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `teste`
--

INSERT INTO `teste` (`nome`, `id`) VALUES
('dasas', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
