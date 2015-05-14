-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 13, 2015 as 02:06 PM
-- Versão do Servidor: 5.1.73
-- Versão do PHP: 5.3.3-7+squeeze19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `processo_seletivo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidato_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`candidato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `candidato_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `campos`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

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
(14, 'dataInscricao', 'Data da Inscrição', '', '', 'S', 3, 10),
(15, 'anexohistorico', 'Anexo Histórico', '', 'S', 'S', 3, 8),
(16, 'anexocurriculo', 'Anexo Currículo', '', 'S', 'S', 3, 9),
(17, 'Linhas', NULL, '', 'S', 'S', 3, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidato`
--

CREATE TABLE IF NOT EXISTS `candidato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
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
  `estadoCivil` enum('CASADO','SOLTEIRO','DIVOCIADO') DEFAULT NULL,
  `foneFixo` varchar(15) DEFAULT NULL,
  `foneCel` varchar(15) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`id`, `nome`, `sexo`, `cpf`, `rg`, `email`, `senha`, `rne`, `dataNasc`, `endereco`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `estadoCivil`, `foneFixo`, `foneCel`, `dataCadastro`) VALUES
(1, 'Francismar Nascimento da Silva', 'M', '12235547898', '547889', 'francislibra@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123', '2015-02-01', 'Rua São Paulo, 130', NULL, 'Vista Verde', 'São José dos Campos', 'SP', '14010100', 'CASADO', '12 3019-8989', '12 9 3019-4015', '2015-02-13 11:49:47'),
(2, 'fns', NULL, NULL, NULL, 'francislibra2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-02-13 11:48:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `candidato_id`, `processo_seletivo_id`, `dedicacao`, `orientador`, `anoPoscomp`, `inscricaoPoscomp`, `notaPoscomp`, `dataInscricao`, `anexohistorico`, `anexocurriculo`) VALUES
(5, 1, 1, NULL, NULL, NULL, NULL, NULL, '2015-02-13 09:28:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao_linhas`
--

CREATE TABLE IF NOT EXISTS `inscricao_linhas` (
  `inscricao_id` int(11) NOT NULL,
  `linhadepesquisa_id` int(11) NOT NULL,
  PRIMARY KEY (`inscricao_id`,`linhadepesquisa_id`),
  KEY `fk_linhadepesquisa_has_inscricao_inscricao1_idx` (`inscricao_id`),
  KEY `fk_linhadepesquisa_has_inscricao_linhadepesquisa1_idx` (`linhadepesquisa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `inscricao_linhas`
--

INSERT INTO `inscricao_linhas` (`inscricao_id`, `linhadepesquisa_id`) VALUES
(5, 1),
(5, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhadepesquisa`
--

CREATE TABLE IF NOT EXISTS `linhadepesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `processo_seletivo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_seletivo_id`),
  KEY `fk_linhadepesquisa_processo_seletivo1_idx` (`processo_seletivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `linhadepesquisa`
--

INSERT INTO `linhadepesquisa` (`id`, `descricao`, `status`, `processo_seletivo_id`) VALUES
(1, 'linha 1', NULL, 1),
(2, 'linha 2', NULL, 1),
(3, 'LINHA 3', NULL, 1),
(4, 'processo 4', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_seletivo`
--

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
-- Extraindo dados da tabela `processo_seletivo`
--

INSERT INTO `processo_seletivo` (`id`, `nomedoprograma`, `sigla`, `data_inicio_selecao`, `data_fim_selecao`, `status`, `rodape`) VALUES
(1, 'Programa de Pós-Graduação em biotecnologia', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(2, 'Programa de Pós-Graduação em Matemática Apicada', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL),
(3, 'Programa de Pós-Graduação em Ciência da Computação', NULL, NULL, '0000-00-00 00:00:00', 0, NULL),
(4, 'Programa de Pós-Graduação em Engenharia em Ciência de Materiais', NULL, NULL, '0000-00-00 00:00:00', 0, NULL);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `campos`
--
ALTER TABLE `campos`
  ADD CONSTRAINT `fk_campos_processo_seletivo1` FOREIGN KEY (`processo_seletivo_id`) REFERENCES `processo_seletivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD CONSTRAINT `fk_inscricao_candidato1` FOREIGN KEY (`candidato_id`) REFERENCES `candidato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `inscricao_linhas`
--
ALTER TABLE `inscricao_linhas`
  ADD CONSTRAINT `fk_linhadepesquisa_has_inscricao_inscricao1` FOREIGN KEY (`inscricao_id`) REFERENCES `inscricao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_linhadepesquisa_has_inscricao_linhadepesquisa1` FOREIGN KEY (`linhadepesquisa_id`) REFERENCES `linhadepesquisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `linhadepesquisa`
--
ALTER TABLE `linhadepesquisa`
  ADD CONSTRAINT `fk_linhadepesquisa_processo_seletivo1` FOREIGN KEY (`processo_seletivo_id`) REFERENCES `processo_seletivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
