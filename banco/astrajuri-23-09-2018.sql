-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Set-2018 às 02:36
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astrajuri`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogado`
--

CREATE TABLE `advogado` (
  `idAdvogado` int(11) NOT NULL,
  `OAB` varchar(45) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `advogado`
--

INSERT INTO `advogado` (`idAdvogado`, `OAB`, `Usuario_idUsuario`) VALUES
(1, 'RJ147538 ', 3),
(2, 'RJ137748 ', 4),
(3, 'RJ131545', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `andamento`
--

CREATE TABLE `andamento` (
  `idAndamento` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `Texto` varchar(45) NOT NULL,
  `Processo_idProcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `idArquivo` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Arquivo` varchar(45) NOT NULL,
  `Descricao` varchar(45) DEFAULT NULL,
  `idProcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comarca`
--

CREATE TABLE `comarca` (
  `idComarca` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Endereco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comarca`
--

INSERT INTO `comarca` (`idComarca`, `Nome`, `Endereco`) VALUES
(1, 'Niterói', 'Visconde de Sepetiba 519 9º andar, Niterói '),
(3, 'Regional de Campo Grande', 'R. Carlos da Silva Costa, 141 - Campo Grande');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compromisso`
--

CREATE TABLE `compromisso` (
  `idCompromisso` int(11) NOT NULL,
  `Compromisso` varchar(45) NOT NULL,
  `DataInicio` datetime NOT NULL,
  `DataFinal` datetime NOT NULL,
  `Cor` varchar(45) NOT NULL,
  `Texto` varchar(220) DEFAULT NULL,
  `idUsuario_usu` int(11) DEFAULT NULL,
  `idAdv` int(11) DEFAULT NULL,
  `idContato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `compromisso`
--

INSERT INTO `compromisso` (`idCompromisso`, `Compromisso`, `DataInicio`, `DataFinal`, `Cor`, `Texto`, `idUsuario_usu`, `idAdv`, `idContato`) VALUES
(1, 'Novo Compromisso', '2018-09-04 01:00:00', '2018-09-05 02:00:00', '#FF0000', 'algo a fazer', 1, 1, 23),
(2, 'teste', '2018-09-05 01:00:00', '2018-09-06 02:00:00', '#FF0000', NULL, 1, NULL, NULL),
(3, 'Teste novo', '2018-08-29 01:00:00', '2018-08-30 02:00:00', '#FFD700', NULL, 1, NULL, 6),
(4, 'Novo Compromisso', '2018-08-29 01:00:00', '2018-08-30 02:00:00', '#FFD700', NULL, 1, 1, 24),
(5, 'aprensentar TCC2', '2018-08-30 18:00:00', '2018-08-31 19:00:00', '#436EEE', 'para o acassio na segunda', 1, 1, 24),
(6, 'Prova', '2018-09-11 18:00:00', '2018-09-13 20:00:00', '#436EEE', 'nada a declarar', 1, 1, 3),
(7, 'Trabalho', '2018-09-11 14:00:00', '2018-09-12 15:00:00', '#FFD700', 'novo', 1, 1, NULL),
(8, 'Julgamento', '2018-09-05 12:00:00', '2018-09-05 16:00:00', '#FF4500', 'decisão', 1, 1, NULL),
(9, 'testetal', '2018-08-29 00:00:00', '2018-08-30 01:00:00', '#436EEE', '123', 1, 1, NULL),
(10, 'ultimo', '2018-09-04 00:00:00', '2018-09-05 01:00:00', '#FF4500', '123', 1, 1, 6),
(11, 'finalmente2', '2018-09-18 12:00:00', '2018-09-21 16:00:00', '#8B0000', 'nada para nada', 1, 1, 6),
(12, 'Teste', '2018-08-28 10:00:00', '2018-08-29 11:00:00', '#436EEE', '123', 3, 1, 6),
(13, 'Teste', '2018-08-28 01:00:00', '2018-08-29 03:00:00', '#FFD700', '123456', 1, 3, 6),
(14, 'testeNovo1', '2018-08-27 00:00:00', '2018-08-28 00:00:00', '#FF4500', 'teste', 1, 3, 6),
(15, 'teste23', '2018-08-27 12:00:00', '2018-08-28 14:00:00', '#FFD700', 'teste', 1, 3, 6),
(20, 'novo', '2018-09-02 00:00:00', '2018-09-03 00:00:00', '#FF4500', 'novo teste', 1, 3, 3),
(21, 'Lula', '2018-09-09 00:00:00', '2018-09-10 00:00:00', '#FF4500', '123', 1, 3, 6),
(22, 'Teste Normal2', '2018-09-23 01:00:00', '2018-09-24 03:00:00', '#436EEE', '12345', 1, 3, 3),
(23, 'teste com lula2', '2018-09-26 00:00:00', '2018-09-27 00:00:00', '#FFD700', 'teste2', 1, 3, 6),
(24, 'TesteAqui', '2018-09-06 01:00:00', '2018-09-07 04:00:00', '#FFD700', '123', 1, 3, 6),
(25, 'TesteAqui2', '2018-09-06 02:00:00', '2018-09-08 06:00:00', '#FF4500', 'teste real', 1, 3, 6),
(26, 'teste adv levi', '2018-08-29 00:00:00', '2018-08-30 00:00:00', '#FF4500', 'teste', 4, 2, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conclusao`
--

CREATE TABLE `conclusao` (
  `idConclusao` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conclusao`
--

INSERT INTO `conclusao` (`idConclusao`, `Nome`) VALUES
(1, 'Causa Ganha'),
(2, 'Causa Perdida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idContato` int(11) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `idEndereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idContato`, `Email`, `idEndereco`) VALUES
(2, 'admin@mail.com', 1),
(3, 'carlos@gmail.com2', 2),
(5, 'walter@gmail.com', 6),
(6, 'tribunal@mail.com', 7),
(7, 'eduardo@gmail.com', 8),
(8, 'supremo@mail.com', 9),
(9, 'baixada@mail.com', 10),
(10, 'carlos2@gmail.com', 11),
(11, 'juridico2@mail.com', 12),
(12, 'teste2@gmail.com', 16),
(13, 'marcelokaiquemigueldasneves_@alkbrasil.com.br', 17),
(14, 'reginaldo@gmail.com', 18),
(15, 'kaue@teste.com', 19),
(16, 'arthurcalebeaugustomoreira-79@adherminer.com.br', 20),
(17, 'enricofabiodavimonteiro__enricofabiodavimonteiro@deltaturismo.com.br', 21),
(18, 'ggaelgustavonicolassales@psq.med.br', 22),
(19, 'ccalebdavirenanfreitas@contjulioroberto.com.br', 23),
(20, 'ccaueyagonelsondasneves@ciaimoveissjc.com', 24),
(21, 'manuelgiovannirenanmoraes@itatiaia.net', 25),
(22, '', 26),
(23, 'yagomarcosviniciusnascimento@nacirembalagens.com.br', 27),
(24, 'levierickhenrymoreira@ovale.com.br', 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `idDespesas` int(11) NOT NULL,
  `Valor` float NOT NULL,
  `Descricao` varchar(45) NOT NULL,
  `Data` date NOT NULL,
  `idUsua_desp` int(11) NOT NULL,
  `idTipo_Despesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` varchar(45) DEFAULT NULL,
  `Logradouro` varchar(45) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  `Bairro` varchar(45) DEFAULT NULL,
  `Complemento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `UF`, `CEP`, `Logradouro`, `Numero`, `Cidade`, `Bairro`, `Complemento`) VALUES
(1, 'RJ', '23123123', 'Rua Admin', 2, 'Rio de Janeiro', 'Realengo', 'Rua'),
(2, 'RJ', '26129986', 'rua tal tal', 179, 'Rio de Janeiro', 'Realengo', 'Fundo'),
(4, 'RJ', '26180-290', 'Rua Avenida', 90, 'Rio de Janeiro', 'Deodoro', 'Qd 22'),
(5, 'RJ', '12345-123', 'Rua 123', 123, 'Rio de Janeiro', 'Deodoro', 'Esquina'),
(6, 'RJ', '15189120', 'Rua Do Ipiranga', 998, 'Rio de Janeiro', 'Madureira', 'Morro Brabo'),
(7, 'RJ', '26456789', 'Rua do Tribunal', 45, 'Rio de Janeiro', 'Centro', 'Zero'),
(8, 'RJ', '23678195', 'Rua do Edu', 0, 'São João de Meriti', 'Bairro da Paz', 'Qd 22'),
(9, 'RJ', '37458456', 'Rua do Supremo', 7, 'Rio de Janeiro', 'Bairro da Justiça', ''),
(10, 'RJ', '26154231', 'Rua Baixada', 12, 'Nova Iguaçu', 'Baixada', 'Baixada'),
(11, 'RJ', '54352', '354352', 12, 'carlos2', 'carlos2', 'carlos2'),
(12, 'RJ', '12843552', 'juridico2', 12332, 'juridico2', 'juridico2', 'juridico2'),
(15, 'RJ', '123', 'juiz', 123, 'juiz', 'juiz', 'juiz'),
(16, 'RJ', '26150150', 'Rua Dona Marlene', 22, 'Belford Roxo', 'Shangri-lá', 'Qd 22'),
(17, 'MS', '68911155', 'Passagem Dona Márcia', 22, 'Campo Grande', 'Jardim Sumatra', 'Casa'),
(18, 'SP', '23060710', 'Rua Nova Lima', 22, 'Campo Grande', 'Lar São Paulo', 'Casa'),
(19, 'RJ', '69313122', 'Rua Luiz Orlandi', 409, 'Tubarão', 'Lar São Paulo', 'Casa'),
(20, 'DF', '71100078', 'EPTG QE 2 Bloco B-13', 450, 'Brasília', 'Quadras Econômicas Lúcio Costa (Guará)', 'Sem Complemento'),
(21, 'RN', '59052410', 'Vila Oliveira', 128, 'Natal', 'Dix-Sept Rosado', 'S Complemtento'),
(22, 'AC', '69911164', 'Travessa São Paulo', 396, 'Rio Branco', 'Pista', 'Casa'),
(23, 'MG', '38038050', 'Rodovia BR-050', 563, 'Uberaba', 'Jardim Santa Clara', 'Casa'),
(24, 'RS', '94110300', 'Rua Costa e Silva', 22, 'Gravataí', 'Parque Ipiranga', 'Casa'),
(25, 'AP', '68909167', 'Rua Abelardo Barbosa', 22, 'Macapá', 'Boné Azul', 'casa'),
(26, '', '', '', 0, '', '', ''),
(27, 'CE', '60192010', 'Rua Vilebaldo Aguiar', 759, 'Fortaleza', 'Cocó', 'Casa'),
(28, 'MS', '79006741', 'Avenida Constantino', 735, 'Campo Grande', 'Vila Bandeirante', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Reuniao', '#0071c5', '2017-11-23 09:00:00', '2017-11-23 11:00:00'),
(2, 'Palestra', '#40e0d0', '2017-11-13 14:00:00', '2017-11-13 17:00:00'),
(3, 'Reuniao 1', '#FFD700', '2017-11-23 08:00:00', '2017-11-23 09:00:00'),
(4, 'Reuniao 3', '#40e0d0', '2017-11-23 10:00:00', '2017-11-23 11:00:00'),
(5, 'Reuniao 4', '#0071c5', '2017-11-23 11:00:00', '2017-11-13 12:00:00'),
(6, 'Reuniao 5', '#FFD700', '2017-11-23 13:00:00', '2017-11-23 14:00:00'),
(7, 'Reuniao 6', '#0071c5', '2017-11-23 14:00:00', '2017-11-23 15:00:00'),
(8, 'Reuniao 7', '#FFD700', '2017-11-23 16:00:00', '2017-11-23 17:00:00'),
(9, 'teste', '#FF4500', '2018-09-04 00:00:00', '2018-09-05 00:00:00'),
(10, 'teste2', '#0071c5', '2018-09-04 01:00:00', '2018-09-05 02:00:00'),
(11, 'Novo Compromisso', '#FF4500', '2018-08-29 12:00:00', NULL),
(12, 'Teste', '#FFD700', '2018-08-29 02:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instancia`
--

CREATE TABLE `instancia` (
  `idInstancia` int(11) NOT NULL,
  `Nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instancia`
--

INSERT INTO `instancia` (`idInstancia`, `Nome`) VALUES
(1, '1ª Instância '),
(2, '2ª Instância');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `Nome_Perfil` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `Nome_Perfil`) VALUES
(1, 'Recepcionista'),
(2, 'Advogado'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

CREATE TABLE `pessoa_fisica` (
  `idPessoa_Fisica` int(11) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Nome` varchar(200) DEFAULT NULL,
  `Data_Nasc` date DEFAULT NULL,
  `CNH` varchar(20) DEFAULT NULL,
  `Titulo_de_Eleitor` varchar(20) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `Contato_idContato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`idPessoa_Fisica`, `CPF`, `Nome`, `Data_Nasc`, `CNH`, `Titulo_de_Eleitor`, `RG`, `Contato_idContato`) VALUES
(2, '11122233344', 'Admin', '2018-08-14', NULL, NULL, '121234562', 2),
(3, '69674436073', 'Carlos Eduardo2', '2018-08-15', '125', '123', '129086731', 3),
(4, '57586381020', 'Teste2', '1991-01-01', '7987922', '87987922', '123389722', 12),
(5, '52712708237', 'Marcelo Kaique Miguel das Neves', '0000-00-00', '98332185890', '583317420116', '197354245', 13),
(6, '83652306074', 'reginaldo', '1999-03-23', '122', '1223', '129156395', 14),
(7, '45211379705', 'Kauê João Carvalho', '1991-03-02', '35726478247', '654138330183', '109466639', 15),
(8, '04181394824', 'Arthur Calebe Augusto Moreira', '1996-08-01', '56404573786', '353326730191', '168696137', 16),
(9, '94486391128', 'Enrico Fábio Davi Monteiro', '1996-07-20', '73759261410', '031435230183', '147881717', 17),
(10, '20598577084', 'Gael Gustavo Nicolas Sales', '1991-02-02', '324', '345', '505018895', 18),
(11, '67319749947', 'Caleb Davi Renan Freitas', '1987-07-06', '1134000', '7273000', '340602624', 19),
(12, '21543664300', 'Cauê Yago Nelson das Neves', '1997-08-10', '662', '755', '132135851', 20),
(13, '46354925836', 'Manuel Giovanni Renan Moraes', '2001-09-07', '026', '227', '463549258', 21),
(14, '46354925836', '', '0000-00-00', '', '', '', 22),
(15, '64373682763', 'Yago Marcos Vinicius Nascimento', '1991-03-09', '31432025193', '354426830140', '179655346', 23),
(16, '27687079027', 'Levi Erick Henry Moreira', '1996-08-11', '', '', '267537451', 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

CREATE TABLE `pessoa_juridica` (
  `idPessoa_Juridica` int(11) NOT NULL,
  `Nome_Fantasia` varchar(45) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `Insc_Estadual` bigint(20) DEFAULT NULL,
  `Insc_Municipal` bigint(20) DEFAULT NULL,
  `Contato_idContato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa_juridica`
--

INSERT INTO `pessoa_juridica` (`idPessoa_Juridica`, `Nome_Fantasia`, `CNPJ`, `Insc_Estadual`, `Insc_Municipal`, `Contato_idContato`) VALUES
(1, 'TRIBUNAL do Lula', '27471810000182', 45691551, 12345, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicao`
--

CREATE TABLE `posicao` (
  `idPosicao` int(11) NOT NULL,
  `Posicao` varchar(45) NOT NULL,
  `idInstancia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posicao`
--

INSERT INTO `posicao` (`idPosicao`, `Posicao`, `idInstancia`) VALUES
(1, 'Réu', 1),
(2, 'Autor', 1),
(3, 'Requerente', 2),
(4, 'Requerido', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `idProcesso` int(11) NOT NULL,
  `NumeroProcesso` varchar(45) NOT NULL,
  `Juiz` varchar(45) NOT NULL,
  `advogado2` varchar(45) DEFAULT NULL,
  `pessoa2` varchar(45) DEFAULT NULL,
  `idPosicao` int(11) NOT NULL,
  `idContato` int(11) NOT NULL,
  `idDespesas` int(11) DEFAULT NULL,
  `idStatus_Processo` int(11) NOT NULL,
  `idVara` int(11) NOT NULL,
  `idAdvogado` int(11) NOT NULL,
  `Conclusao_idConclusao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`idProcesso`, `NumeroProcesso`, `Juiz`, `advogado2`, `pessoa2`, `idPosicao`, `idContato`, `idDespesas`, `idStatus_Processo`, `idVara`, `idAdvogado`, `Conclusao_idConclusao`) VALUES
(7, '13151848438438434844', '1', 'Dirceu', '1', 1, 6, NULL, 2, 3, 1, NULL),
(8, '12513513543484383844', 'Cicrano', 'Fulano', 'Braz de Pinha', 1, 6, NULL, 2, 1, 1, NULL),
(10, '31351385438438643846', 'Juiz teste', 'Advogado teste', 'Teste', 1, 22, NULL, 2, 1, 1, NULL),
(11, '5213513513543843', 'Juiz novo teste', 'Advoagdo Novo teste', 'Teste Novo', 1, 22, NULL, 2, 3, 1, NULL),
(13, '70770909809887987907', 'juiz do 2', 'advogado do 2', 'testador 2', 3, 3, NULL, 7, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_processo`
--

CREATE TABLE `status_processo` (
  `idStatus` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_processo`
--

INSERT INTO `status_processo` (`idStatus`, `Status`) VALUES
(2, 'conhecimento'),
(3, 'recurso'),
(4, 'execução'),
(5, 'sentença'),
(6, 'arquivado'),
(7, 'encerrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `idTelefone` int(11) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  `Residencial` varchar(45) NOT NULL,
  `Comercial` varchar(45) DEFAULT NULL,
  `Contato_idContato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`idTelefone`, `Celular`, `Residencial`, `Comercial`, `Contato_idContato`) VALUES
(2, '', '2127282829', NULL, 3),
(6, '21988784512', '2137458945', NULL, 6),
(8, '', '2137351245', NULL, 8),
(9, '21879878722', '2178979222', NULL, 12),
(10, '96994092911', '9635331149', NULL, 13),
(11, '2323232323', '2323232323', NULL, 14),
(12, '2323232323', '1243541542', NULL, 15),
(13, '61981898293', '6138361838', NULL, 16),
(14, '84997973685', '8429307884', NULL, 17),
(15, '68982473365', '6827464161', NULL, 18),
(16, '34995107925', '3435262091', NULL, 19),
(17, '51983710693', '5137751046', NULL, 20),
(18, '96991684637', '9628471319', NULL, 21),
(19, '', '', NULL, 22),
(20, '85982365739', '8537937063', NULL, 23),
(21, '67992187803', '6725963965', NULL, 24);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_despesas`
--

CREATE TABLE `tipo_despesas` (
  `idTipo_Despesas` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_despesas`
--

INSERT INTO `tipo_despesas` (`idTipo_Despesas`, `Tipo`) VALUES
(1, 'Valor_Custas'),
(2, 'Valor_Causa'),
(3, 'Sucumbencias'),
(4, 'Contratuais'),
(5, 'Despesa_Fixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `Pessoa_Fisica_idPessoa_Fisica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Login`, `Senha`, `idPerfil`, `Pessoa_Fisica_idPessoa_Fisica`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 3, 2),
(2, 'recepcionista', '202cb962ac59075b964b07152d234b70', 1, 15),
(3, 'advogado', '202cb962ac59075b964b07152d234b70', 2, 11),
(4, 'levi', '202cb962ac59075b964b07152d234b70', 2, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vara`
--

CREATE TABLE `vara` (
  `idVara` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `Comarca_idComarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vara`
--

INSERT INTO `vara` (`idVara`, `Nome`, `Comarca_idComarca`) VALUES
(1, '8ª Vara Civel', 1),
(2, '9ª vara', 1),
(3, '10ª Vara', 1),
(4, '12º vara', 1),
(6, '13ª Vara', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advogado`
--
ALTER TABLE `advogado`
  ADD PRIMARY KEY (`idAdvogado`),
  ADD KEY `fk_Advogado_Usuario1` (`Usuario_idUsuario`);

--
-- Indexes for table `andamento`
--
ALTER TABLE `andamento`
  ADD PRIMARY KEY (`idAndamento`,`Processo_idProcesso`),
  ADD KEY `fk_Andamento_Processo1` (`Processo_idProcesso`);

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`idArquivo`),
  ADD KEY `Processo` (`idProcesso`);

--
-- Indexes for table `comarca`
--
ALTER TABLE `comarca`
  ADD PRIMARY KEY (`idComarca`);

--
-- Indexes for table `compromisso`
--
ALTER TABLE `compromisso`
  ADD PRIMARY KEY (`idCompromisso`),
  ADD KEY `idUsuario_usu` (`idUsuario_usu`),
  ADD KEY `idAdvogado` (`idAdv`),
  ADD KEY `idContato` (`idContato`);

--
-- Indexes for table `conclusao`
--
ALTER TABLE `conclusao`
  ADD PRIMARY KEY (`idConclusao`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idContato`),
  ADD KEY `fk_Endereco` (`idEndereco`);

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`idDespesas`),
  ADD KEY `idUsua_desp` (`idUsua_desp`),
  ADD KEY `idTipoDespesa` (`idTipo_Despesa`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instancia`
--
ALTER TABLE `instancia`
  ADD PRIMARY KEY (`idInstancia`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indexes for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD PRIMARY KEY (`idPessoa_Fisica`),
  ADD KEY `fk_Pessoa_Fisica_Contato1` (`Contato_idContato`);

--
-- Indexes for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD PRIMARY KEY (`idPessoa_Juridica`),
  ADD KEY `fk_Pessoa_Juridica_Contato1` (`Contato_idContato`);

--
-- Indexes for table `posicao`
--
ALTER TABLE `posicao`
  ADD PRIMARY KEY (`idPosicao`),
  ADD KEY `idInstancia` (`idInstancia`);

--
-- Indexes for table `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`idProcesso`),
  ADD KEY `Posicao` (`idPosicao`),
  ADD KEY `Despesas` (`idDespesas`),
  ADD KEY `CStatus` (`idStatus_Processo`),
  ADD KEY `CVara` (`idVara`),
  ADD KEY `Cadvogado` (`idAdvogado`),
  ADD KEY `CidContato` (`idContato`),
  ADD KEY `Cfk_Processo_Conclusao` (`Conclusao_idConclusao`);

--
-- Indexes for table `status_processo`
--
ALTER TABLE `status_processo`
  ADD PRIMARY KEY (`idStatus`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`idTelefone`),
  ADD KEY `fk_Telefone_Contato1` (`Contato_idContato`);

--
-- Indexes for table `tipo_despesas`
--
ALTER TABLE `tipo_despesas`
  ADD PRIMARY KEY (`idTipo_Despesas`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `fk_Usuario_Pessoa_Fisica1` (`Pessoa_Fisica_idPessoa_Fisica`);

--
-- Indexes for table `vara`
--
ALTER TABLE `vara`
  ADD PRIMARY KEY (`idVara`),
  ADD KEY `fk_Vara_Comarca1` (`Comarca_idComarca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advogado`
--
ALTER TABLE `advogado`
  MODIFY `idAdvogado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `andamento`
--
ALTER TABLE `andamento`
  MODIFY `idAndamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `idArquivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comarca`
--
ALTER TABLE `comarca`
  MODIFY `idComarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `compromisso`
--
ALTER TABLE `compromisso`
  MODIFY `idCompromisso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `conclusao`
--
ALTER TABLE `conclusao`
  MODIFY `idConclusao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `idDespesas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `instancia`
--
ALTER TABLE `instancia`
  MODIFY `idInstancia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  MODIFY `idPessoa_Fisica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  MODIFY `idPessoa_Juridica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posicao`
--
ALTER TABLE `posicao`
  MODIFY `idPosicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `idProcesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status_processo`
--
ALTER TABLE `status_processo`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `idTelefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tipo_despesas`
--
ALTER TABLE `tipo_despesas`
  MODIFY `idTipo_Despesas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vara`
--
ALTER TABLE `vara`
  MODIFY `idVara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `advogado`
--
ALTER TABLE `advogado`
  ADD CONSTRAINT `fk_Advogado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `andamento`
--
ALTER TABLE `andamento`
  ADD CONSTRAINT `fk_Andamento_Processo1` FOREIGN KEY (`Processo_idProcesso`) REFERENCES `processo` (`idProcesso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `Processo` FOREIGN KEY (`idProcesso`) REFERENCES `processo` (`idProcesso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `compromisso`
--
ALTER TABLE `compromisso`
  ADD CONSTRAINT `idAdvogado` FOREIGN KEY (`idAdv`) REFERENCES `advogado` (`idAdvogado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idContato` FOREIGN KEY (`idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuario_usu` FOREIGN KEY (`idUsuario_usu`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_Endereco` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `idTipoDespesa` FOREIGN KEY (`idTipo_Despesa`) REFERENCES `tipo_despesas` (`idTipo_Despesas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsua_desp` FOREIGN KEY (`idUsua_desp`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD CONSTRAINT `fk_Pessoa_Fisica_Contato1` FOREIGN KEY (`Contato_idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `fk_Pessoa_Juridica_Contato1` FOREIGN KEY (`Contato_idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posicao`
--
ALTER TABLE `posicao`
  ADD CONSTRAINT `idInstancia` FOREIGN KEY (`idInstancia`) REFERENCES `instancia` (`idInstancia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `CStatus` FOREIGN KEY (`idStatus_Processo`) REFERENCES `status_processo` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Cadvogado` FOREIGN KEY (`idAdvogado`) REFERENCES `advogado` (`idAdvogado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Cfk_Processo_Conclusao` FOREIGN KEY (`Conclusao_idConclusao`) REFERENCES `conclusao` (`idConclusao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CidContato` FOREIGN KEY (`idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Despesas` FOREIGN KEY (`idDespesas`) REFERENCES `despesas` (`idDespesas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Posicao` FOREIGN KEY (`idPosicao`) REFERENCES `posicao` (`idPosicao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_Telefone_Contato1` FOREIGN KEY (`Contato_idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Pessoa_Fisica1` FOREIGN KEY (`Pessoa_Fisica_idPessoa_Fisica`) REFERENCES `pessoa_fisica` (`idPessoa_Fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPerfil` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vara`
--
ALTER TABLE `vara`
  ADD CONSTRAINT `fk_Vara_Comarca1` FOREIGN KEY (`Comarca_idComarca`) REFERENCES `comarca` (`idComarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
