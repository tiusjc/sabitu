-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2015 às 11:10
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `processo_seletivo`
--
CREATE DATABASE IF NOT EXISTS `processo_seletivo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `processo_seletivo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidato_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`candidato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `adm`
--

TRUNCATE TABLE `adm`;
--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `candidato_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `campos`
--

DROP TABLE IF EXISTS `campos`;
CREATE TABLE IF NOT EXISTS `campos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campo_nome` varchar(155) DEFAULT NULL,
  `campo_exibir` varchar(150) DEFAULT NULL,
  `requerido` set('S','N') NOT NULL DEFAULT 'S',
  `grid` set('S','N') NOT NULL DEFAULT 'S',
  `add_edit` set('S','N') NOT NULL DEFAULT 'S',
  `processo_seletivo_id` int(11) NOT NULL,
  `ordem` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`,`processo_seletivo_id`),
  KEY `fk_campos_processo_seletivo1_idx` (`processo_seletivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Truncate table before insert `campos`
--

TRUNCATE TABLE `campos`;
--
-- Extraindo dados da tabela `campos`
--

INSERT INTO `campos` (`id`, `campo_nome`, `campo_exibir`, `requerido`, `grid`, `add_edit`, `processo_seletivo_id`, `ordem`) VALUES
(6, 'candidato_id', NULL, '', '', 'S', 3, 1),
(7, 'processo_seletivo_id', NULL, '', '', 'S', 3, 2),
(8, 'dedicacao', NULL, '', 'S', 'S', 3, 3),
(9, 'orientador', NULL, '', 'S', 'S', 3, 4),
(10, 'anoPoscomp', NULL, '', 'S', 'S', 3, 5),
(11, 'inscricaoPoscomp', NULL, '', 'S', 'S', 3, 6),
(13, 'notaPoscomp', NULL, '', 'S', 'S', 3, 7),
(14, 'dataInscricao', 'Data da Inscrição', '', '', 'S', 3, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

DROP TABLE IF EXISTS `candidato`;
CREATE TABLE IF NOT EXISTS `candidato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `sexo` set('M','F') DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(45) NOT NULL,
  `rne` varchar(50) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `estadoCivil` set('CASADO(A)','SOLTEIRO(A)','DIVOCIADO(A)') DEFAULT NULL,
  `foneFixo` varchar(15) DEFAULT NULL,
  `foneCel` varchar(15) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `candidato`
--

TRUNCATE TABLE `candidato`;
--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`id`, `nome`, `sexo`, `cpf`, `rg`, `email`, `senha`, `rne`, `dataNasc`, `endereco`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `estadoCivil`, `foneFixo`, `foneCel`, `dataCadastro`) VALUES
(1, '', NULL, NULL, NULL, 'francislibra@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, 'francislibra2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

DROP TABLE IF EXISTS `inscricao`;
CREATE TABLE IF NOT EXISTS `inscricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidato_id` int(11) NOT NULL,
  `processo_seletivo_id` int(11) NOT NULL,
  `dedicacao` char(1) CHARACTER SET latin1 DEFAULT NULL COMMENT 'tempo integral ou parcial',
  `orientador` varchar(45) DEFAULT NULL,
  `anoPoscomp` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `inscricaoPoscomp` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `notaPoscomp` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `dataInscricao` datetime DEFAULT NULL,
  `anexohistorico` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `anexocurriculo` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`,`candidato_id`,`processo_seletivo_id`),
  KEY `fk_inscricao_candidato1_idx` (`candidato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `inscricao`
--

TRUNCATE TABLE `inscricao`;
--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `candidato_id`, `processo_seletivo_id`, `dedicacao`, `orientador`, `anoPoscomp`, `inscricaoPoscomp`, `notaPoscomp`, `dataInscricao`, `anexohistorico`, `anexocurriculo`) VALUES
(5, 1, 1, NULL, NULL, NULL, NULL, NULL, '2015-02-12 21:46:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao_linhas`
--

DROP TABLE IF EXISTS `inscricao_linhas`;
CREATE TABLE IF NOT EXISTS `inscricao_linhas` (
  `inscricao_id` int(11) NOT NULL,
  `linhadepesquisa_id` int(11) NOT NULL,
  PRIMARY KEY (`inscricao_id`,`linhadepesquisa_id`),
  KEY `fk_linhadepesquisa_has_inscricao_inscricao1_idx` (`inscricao_id`),
  KEY `fk_linhadepesquisa_has_inscricao_linhadepesquisa1_idx` (`linhadepesquisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `inscricao_linhas`
--

TRUNCATE TABLE `inscricao_linhas`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `linhadepesquisa`
--

DROP TABLE IF EXISTS `linhadepesquisa`;
CREATE TABLE IF NOT EXISTS `linhadepesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `processo_seletivo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_seletivo_id`),
  KEY `fk_linhadepesquisa_processo_seletivo1_idx` (`processo_seletivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `linhadepesquisa`
--

TRUNCATE TABLE `linhadepesquisa`;
--
-- Extraindo dados da tabela `linhadepesquisa`
--

INSERT INTO `linhadepesquisa` (`id`, `descricao`, `status`, `processo_seletivo_id`) VALUES
(1, 'linha 1', NULL, 1),
(2, 'linha 2', NULL, 2),
(3, 'LINHA 3', NULL, 2),
(4, 'processo 4', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_seletivo`
--

DROP TABLE IF EXISTS `processo_seletivo`;
CREATE TABLE IF NOT EXISTS `processo_seletivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomedoprograma` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sigla` varchar(45) DEFAULT NULL,
  `data_inicio_selecao` datetime DEFAULT NULL,
  `data_fim_selecao` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `rodape` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `processo_seletivo`
--

TRUNCATE TABLE `processo_seletivo`;
--
-- Extraindo dados da tabela `processo_seletivo`
--

INSERT INTO `processo_seletivo` (`id`, `nomedoprograma`, `sigla`, `data_inicio_selecao`, `data_fim_selecao`, `status`, `rodape`) VALUES
(1, 'Programa de Pós-Graduação em biotecnologia', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(2, 'Programa de Pós-Graduação em Matemática Apicada', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(3, 'Programa de Pós-Graduação em Ciência da Computação', NULL, NULL, '0000-00-00 00:00:00', 0, NULL),
(4, 'Programa de Pós-Graduação em Engenharia em Ciência de Materiais', NULL, NULL, '0000-00-00 00:00:00', 0, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `campos`
--
ALTER TABLE `campos`
  ADD CONSTRAINT `fk_campos_processo_seletivo1` FOREIGN KEY (`processo_seletivo_id`) REFERENCES `processo_seletivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `fk_inscricao_candidato1` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscricao_linhas`
--
ALTER TABLE `inscricao_linhas`
  ADD CONSTRAINT `fk_linhadepesquisa_has_inscricao_inscricao1` FOREIGN KEY (`inscricao_id`) REFERENCES `inscricao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_linhadepesquisa_has_inscricao_linhadepesquisa1` FOREIGN KEY (`linhadepesquisa_id`) REFERENCES `linhadepesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `linhadepesquisa`
--
ALTER TABLE `linhadepesquisa`
  ADD CONSTRAINT `fk_linhadepesquisa_processo_seletivo1` FOREIGN KEY (`processo_seletivo_id`) REFERENCES `processo_seletivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
