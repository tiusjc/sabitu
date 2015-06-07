-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Fev 27, 2015 as 02:02 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `candidato_id`) VALUES
(2, 1),
(5, 7),
(6, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `campos`
--

CREATE TABLE IF NOT EXISTS `campos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(155) DEFAULT NULL,
  `label` varchar(150) DEFAULT NULL,
  `rules` varchar(145) DEFAULT NULL,
  `grid` set('S','N') NOT NULL DEFAULT 'S',
  `add_edit` set('S','N') NOT NULL DEFAULT 'S',
  `processo_seletivo_id` int(11) NOT NULL,
  `ordem` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`,`processo_seletivo_id`),
  KEY `fk_campos_processo_seletivo1_idx` (`processo_seletivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `campos`
--

INSERT INTO `campos` (`id`, `field`, `label`, `rules`, `grid`, `add_edit`, `processo_seletivo_id`, `ordem`) VALUES
(8, 'dedicacao', 'Dedicação', 'required', 'S', 'S', 3, 1),
(9, 'orientador', 'Orientador', NULL, 'S', 'S', 3, 2),
(10, 'anoPoscomp', 'ano Pos comp', 'required|integer', 'S', 'S', 3, 3),
(11, 'inscricaoPoscomp', 'Inscrição Poscomp', NULL, 'S', 'S', 3, 4),
(13, 'notaPoscomp', 'Nota Poscomp', 'required', 'S', 'S', 3, 5),
(14, 'dataInscricao', 'Data da Inscrição', NULL, '', 'S', 3, 6),
(17, 'anexohistorico', 'Anexo Histórico (.DOC, .PDF, .JPG, tamanho máximo 8MB)', NULL, 'S', 'S', 3, 7),
(18, 'anexocurriculo', 'Anexo Currículo (.DOC, .PDF, .JPG, tamanho máximo 8MB)', NULL, 'S', 'S', 3, 8);

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
  `email` varchar(150) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `rne` varchar(50) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` enum('AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `estadoCivil` enum('CASADO','SOLTEIRO','DIVORCIADO','VIÚVO') DEFAULT NULL,
  `foneFixo` varchar(19) DEFAULT NULL,
  `foneCel` varchar(19) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `candidato`
--

INSERT INTO `candidato` (`id`, `nome`, `sexo`, `cpf`, `rg`, `email`, `senha`, `rne`, `endereco`, `bairro`, `cidade`, `uf`, `cep`, `estadoCivil`, `foneFixo`, `foneCel`, `dataCadastro`) VALUES
(1, 'Francismar Nascimento da Silva', 'M', '203.831.932-49', '46464646', 'francislibra@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'Rua Bogotá, 134', 'Vista Verde', 'São José dos Campos', 'SP', '14.010-222', 'CASADO', '+55 (12) 3443-4444', '+55 (12) 98182-9068', '2015-02-27 13:58:46'),
(7, 'NOME', 'M', '888.888.888-88', '88888888888888', 'walcarvalho@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'E', 'E', 'E', 'SP', '12.121-212', 'SOLTEIRO', '+55 (12) 3123-1231', '+55 (12) 31231-2312', '2015-02-25 13:08:29'),
(10, 'sss', 'M', '203.831.932-49', '222', 'francislibra2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 's', 's', 's', 'SP', '14.245-464', 'CASADO', '+55 (12) 4646-4798', '+55 (16) 47878-7895', '2015-02-27 13:53:47'),
(11, 's\\aa', 'F', '203.831.932-49', '1111111111111111', 'mariana.s1204@gmail.com', 'd217b49a725604883ebf4aade961ae4a', '11111111111111', '111111111111', '1111111111111', '1111111111111', 'AP', '14.546-477', 'CASADO', '+55 (12) 3455-4578', '+55 (16) 45464-7979', '2015-02-27 13:56:16'),
(12, 'mariana de souza', 'F', '203.831.932-49', '1111111111111', 'mariana.souza08@hotmail.com', 'd217b49a725604883ebf4aade961ae4a', NULL, 'dasdasda', '11111111', 'sadasda', 'SP', '12.222-222', 'SOLTEIRO', '+55 (13) 1546-4646', '+55 (46) 46464-6445', '2015-02-27 13:56:59'),
(13, 'ANA LUCIA DA SILVA BERALDO', 'F', '203.831.932-49', '321.654.321', 'ana.beraldo@gmail.com', '7db690730ec617084108f40100730643', NULL, 'RUA IBATÉ', 'JD INDUSTRIAS', 'SAO JOSE DOS CAMPOS', 'SP', '14.212-454', 'CASADO', '+55 (12) 3309-9899', '+55 (46) 46464-6464', '2015-02-27 13:57:40'),
(14, NULL, NULL, NULL, NULL, 'francisney.unifesp@gmail.com', '4f0b1dfbb8b08de89c15a1d382d77098', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE IF NOT EXISTS `inscricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidato_id` int(11) NOT NULL,
  `processo_seletivo_id` int(11) NOT NULL,
  `dedicacao` enum('EXCLUSIVA','PARCIAL') DEFAULT NULL COMMENT 'tempo integral ou parcial',
  `orientador` varchar(45) DEFAULT NULL,
  `anoPoscomp` int(4) DEFAULT NULL,
  `inscricaoPoscomp` varchar(15) DEFAULT NULL,
  `notaPoscomp` decimal(4,1) DEFAULT NULL,
  `dataInscricao` datetime DEFAULT NULL,
  `anexohistorico` varchar(100) DEFAULT NULL,
  `anexocurriculo` varchar(100) DEFAULT NULL,
  `teste` varchar(10) NOT NULL,
  `campobiotecnologia1` varchar(100) NOT NULL,
  `campobiotecnologia2` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`candidato_id`,`processo_seletivo_id`),
  KEY `fk_inscricao_candidato1_idx` (`candidato_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`id`, `candidato_id`, `processo_seletivo_id`, `dedicacao`, `orientador`, `anoPoscomp`, `inscricaoPoscomp`, `notaPoscomp`, `dataInscricao`, `anexohistorico`, `anexocurriculo`, `teste`, `campobiotecnologia1`, `campobiotecnologia2`) VALUES
(12, 1, 3, 'EXCLUSIVA', '22', 2222, 'uuu', '8.5', '2015-02-27 13:59:32', '2296a-espaco-de-trabalho-1_010.png', '6dc4b-menu_009.png', '', '', ''),
(31, 10, 3, '', 's', NULL, 's', '0.0', '2015-02-24 12:22:09', NULL, NULL, '', '', ''),
(32, 7, 3, '', 'adf', 0, 'asdf', '0.0', NULL, NULL, NULL, '', '', ''),
(33, 13, 3, '', 'Zeze', 2010, '102101', '9.0', '2015-02-24 16:46:02', 'e191e-14---google-android-crie-aplicacoes-para-celulares-e-tablets.pdf', '7cb8b-mx511-198.pdf', '', '', '');

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
(12, 4),
(31, 4),
(32, 4),
(33, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhadepesquisa`
--

CREATE TABLE IF NOT EXISTS `linhadepesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `processo_seletivo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_seletivo_id`),
  KEY `fk_linhadepesquisa_processo_seletivo1_idx` (`processo_seletivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `linhadepesquisa`
--

INSERT INTO `linhadepesquisa` (`id`, `descricao`, `status`, `processo_seletivo_id`) VALUES
(1, 'Linha de Pesquisa 1 - Biotecnologia', 1, 1),
(2, 'Linha de Pesquisa 2 - Biotecnologia', 1, 1),
(3, 'Linha de Pesquisa 1 - Engenharia em Ciências em Materiais', 1, 4),
(4, 'Linha de Pesquisa 1 - Ciência da Computação', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_seletivo`
--

CREATE TABLE IF NOT EXISTS `processo_seletivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomedoprograma` varchar(100) NOT NULL,
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
(1, 'Programa de Pós-Graduação em biotecnologia', 'PPGB', NULL, NULL, 1, '<div>\n	<div>\n		<div>\n			<strong>D&uacute;vidas e informa&ccedil;&otilde;es:</strong></div>\n		<div>\n			sobre o processo seletivo: pos.sjc@unifesp.br</div>\n		<div>\n			sobre uso do sistema: suporte.sjc@unifesp.br</div>\n	</div>\n</div>\n<p>\n	&nbsp;</p>\n'),
(2, 'Programa de Pós-Graduação em Matemática Apicada', NULL, NULL, NULL, 1, '<div>\n	<strong>D&uacute;vidas e informa&ccedil;&otilde;es:</strong></div>\n<div>\n	sobre o processo seletivo: pos.sjc@unifesp.br</div>\n<div>\n	sobre uso do sistema: suporte.sjc@unifesp.br</div>\n'),
(3, 'Programa de Pós-Graduação em Ciência da Computação', NULL, NULL, NULL, 1, ' '),
(4, 'Programa de Pós-Graduação em Engenharia em Ciência de Materiais', NULL, NULL, NULL, 0, NULL);

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
