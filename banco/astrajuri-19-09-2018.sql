CREATE DATABASE  IF NOT EXISTS `astrajuri` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `astrajuri`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: astrajuri
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advogado`
--

DROP TABLE IF EXISTS `advogado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advogado` (
  `idAdvogado` int(11) NOT NULL AUTO_INCREMENT,
  `OAB` varchar(45) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idAdvogado`),
  KEY `fk_Advogado_Usuario1` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Advogado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advogado`
--

LOCK TABLES `advogado` WRITE;
/*!40000 ALTER TABLE `advogado` DISABLE KEYS */;
INSERT INTO `advogado` VALUES (1,'RJ147538 ',3);
/*!40000 ALTER TABLE `advogado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `andamento`
--

DROP TABLE IF EXISTS `andamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `andamento` (
  `idAndamento` int(11) NOT NULL AUTO_INCREMENT,
  `Data` datetime NOT NULL,
  `Texto` varchar(45) NOT NULL,
  `Processo_idProcesso` int(11) NOT NULL,
  PRIMARY KEY (`idAndamento`,`Processo_idProcesso`),
  KEY `fk_Andamento_Processo1` (`Processo_idProcesso`),
  CONSTRAINT `fk_Andamento_Processo1` FOREIGN KEY (`Processo_idProcesso`) REFERENCES `processo` (`idProcesso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `andamento`
--

LOCK TABLES `andamento` WRITE;
/*!40000 ALTER TABLE `andamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `andamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivo` (
  `idArquivo` int(11) NOT NULL AUTO_INCREMENT,
  `Data` date NOT NULL,
  `Arquivo` varchar(45) NOT NULL,
  `Descricao` varchar(45) DEFAULT NULL,
  `idProcesso` int(11) NOT NULL,
  PRIMARY KEY (`idArquivo`),
  KEY `Processo` (`idProcesso`),
  CONSTRAINT `Processo` FOREIGN KEY (`idProcesso`) REFERENCES `processo` (`idProcesso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivo`
--

LOCK TABLES `arquivo` WRITE;
/*!40000 ALTER TABLE `arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comarca`
--

DROP TABLE IF EXISTS `comarca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comarca` (
  `idComarca` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Endereco` varchar(45) NOT NULL,
  PRIMARY KEY (`idComarca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comarca`
--

LOCK TABLES `comarca` WRITE;
/*!40000 ALTER TABLE `comarca` DISABLE KEYS */;
INSERT INTO `comarca` VALUES (1,'Niterói','Visconde de Sepetiba 519 9º andar, Niterói '),(3,'Regional de Campo Grande','R. Carlos da Silva Costa, 141 - Campo Grande');
/*!40000 ALTER TABLE `comarca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compromisso`
--

DROP TABLE IF EXISTS `compromisso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compromisso` (
  `idCompromisso` int(11) NOT NULL AUTO_INCREMENT,
  `Compromisso` varchar(45) NOT NULL,
  `Data inicio` date NOT NULL,
  `Data Final` date NOT NULL,
  `Cor` int(11) NOT NULL,
  `Texto` varchar(220) DEFAULT NULL,
  `idUsuario_usu` int(11) NOT NULL,
  `idAdv` int(11) DEFAULT NULL,
  `idContato` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCompromisso`),
  KEY `idUsuario_usu` (`idUsuario_usu`),
  KEY `idAdvogado` (`idAdv`),
  KEY `idContato` (`idContato`),
  CONSTRAINT `idAdvogado` FOREIGN KEY (`idAdv`) REFERENCES `advogado` (`idAdvogado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idContato` FOREIGN KEY (`idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idUsuario_usu` FOREIGN KEY (`idUsuario_usu`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compromisso`
--

LOCK TABLES `compromisso` WRITE;
/*!40000 ALTER TABLE `compromisso` DISABLE KEYS */;
/*!40000 ALTER TABLE `compromisso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conclusao`
--

DROP TABLE IF EXISTS `conclusao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conclusao` (
  `idConclusao` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idConclusao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conclusao`
--

LOCK TABLES `conclusao` WRITE;
/*!40000 ALTER TABLE `conclusao` DISABLE KEYS */;
INSERT INTO `conclusao` VALUES (1,'Causa Ganha'),(2,'Causa Perdida');
/*!40000 ALTER TABLE `conclusao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `idContato` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(200) DEFAULT NULL,
  `idEndereco` int(11) NOT NULL,
  PRIMARY KEY (`idContato`),
  KEY `fk_Endereco` (`idEndereco`),
  CONSTRAINT `fk_Endereco` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (2,'admin@mail.com',1),(3,'carlos@gmail.com2',2),(5,'walter@gmail.com',6),(6,'tribunal@mail.com',7),(7,'eduardo@gmail.com',8),(8,'supremo@mail.com',9),(9,'baixada@mail.com',10),(10,'carlos2@gmail.com',11),(11,'juridico2@mail.com',12),(12,'teste2@gmail.com',16),(13,'marcelokaiquemigueldasneves_@alkbrasil.com.br',17),(14,'reginaldo@gmail.com',18),(15,'kaue@teste.com',19),(16,'arthurcalebeaugustomoreira-79@adherminer.com.br',20),(17,'enricofabiodavimonteiro__enricofabiodavimonteiro@deltaturismo.com.br',21),(18,'ggaelgustavonicolassales@psq.med.br',22),(19,'ccalebdavirenanfreitas@contjulioroberto.com.br',23),(20,'ccaueyagonelsondasneves@ciaimoveissjc.com',24),(21,'manuelgiovannirenanmoraes@itatiaia.net',25),(22,'',26),(23,'yagomarcosviniciusnascimento@nacirembalagens.com.br',27),(24,'levierickhenrymoreira@ovale.com.br',28);
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despesas`
--

DROP TABLE IF EXISTS `despesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesas` (
  `idDespesas` int(11) NOT NULL AUTO_INCREMENT,
  `Valor` float NOT NULL,
  `Descricao` varchar(45) NOT NULL,
  `Data` date NOT NULL,
  `idUsua_desp` int(11) NOT NULL,
  `idTipo_Despesa` int(11) NOT NULL,
  PRIMARY KEY (`idDespesas`),
  KEY `idUsua_desp` (`idUsua_desp`),
  KEY `idTipoDespesa` (`idTipo_Despesa`),
  CONSTRAINT `idTipoDespesa` FOREIGN KEY (`idTipo_Despesa`) REFERENCES `tipo_despesas` (`idTipo_Despesas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idUsua_desp` FOREIGN KEY (`idUsua_desp`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despesas`
--

LOCK TABLES `despesas` WRITE;
/*!40000 ALTER TABLE `despesas` DISABLE KEYS */;
/*!40000 ALTER TABLE `despesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` varchar(45) DEFAULT NULL,
  `Logradouro` varchar(45) DEFAULT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Cidade` varchar(45) DEFAULT NULL,
  `Bairro` varchar(45) DEFAULT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'RJ','23123123','Rua Admin',2,'Rio de Janeiro','Realengo','Rua'),(2,'RJ','26129986','rua tal tal',179,'Rio de Janeiro','Realengo','Fundo'),(4,'RJ','26180-290','Rua Avenida',90,'Rio de Janeiro','Deodoro','Qd 22'),(5,'RJ','12345-123','Rua 123',123,'Rio de Janeiro','Deodoro','Esquina'),(6,'RJ','15189120','Rua Do Ipiranga',998,'Rio de Janeiro','Madureira','Morro Brabo'),(7,'RJ','26456789','Rua do Tribunal',45,'Rio de Janeiro','Centro','Zero'),(8,'RJ','23678195','Rua do Edu',0,'São João de Meriti','Bairro da Paz','Qd 22'),(9,'RJ','37458456','Rua do Supremo',7,'Rio de Janeiro','Bairro da Justiça',''),(10,'RJ','26154231','Rua Baixada',12,'Nova Iguaçu','Baixada','Baixada'),(11,'RJ','54352','354352',12,'carlos2','carlos2','carlos2'),(12,'RJ','12843552','juridico2',12332,'juridico2','juridico2','juridico2'),(15,'RJ','123','juiz',123,'juiz','juiz','juiz'),(16,'RJ','26150150','Rua Dona Marlene',22,'Belford Roxo','Shangri-lá','Qd 22'),(17,'MS','68911155','Passagem Dona Márcia',22,'Campo Grande','Jardim Sumatra','Casa'),(18,'SP','23060710','Rua Nova Lima',22,'Campo Grande','Lar São Paulo','Casa'),(19,'RJ','69313122','Rua Luiz Orlandi',409,'Tubarão','Lar São Paulo','Casa'),(20,'DF','71100078','EPTG QE 2 Bloco B-13',450,'Brasília','Quadras Econômicas Lúcio Costa (Guará)','Sem Complemento'),(21,'RN','59052410','Vila Oliveira',128,'Natal','Dix-Sept Rosado','S Complemtento'),(22,'AC','69911164','Travessa São Paulo',396,'Rio Branco','Pista','Casa'),(23,'MG','38038050','Rodovia BR-050',563,'Uberaba','Jardim Santa Clara','Casa'),(24,'RS','94110300','Rua Costa e Silva',22,'Gravataí','Parque Ipiranga','Casa'),(25,'AP','68909167','Rua Abelardo Barbosa',22,'Macapá','Boné Azul','casa'),(26,'','','',0,'','',''),(27,'CE','60192010','Rua Vilebaldo Aguiar',759,'Fortaleza','Cocó','Casa'),(28,'MS','79006741','Avenida Constantino',735,'Campo Grande','Vila Bandeirante','');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instancia`
--

DROP TABLE IF EXISTS `instancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instancia` (
  `idInstancia` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idInstancia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instancia`
--

LOCK TABLES `instancia` WRITE;
/*!40000 ALTER TABLE `instancia` DISABLE KEYS */;
INSERT INTO `instancia` VALUES (1,'1ª Instância '),(2,'2ª Instância');
/*!40000 ALTER TABLE `instancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Recepcionista'),(2,'Advogado'),(3,'Administrador');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_fisica` (
  `idPessoa_Fisica` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(11) NOT NULL,
  `Nome` varchar(200) DEFAULT NULL,
  `Data_Nasc` date DEFAULT NULL,
  `CNH` varchar(20) DEFAULT NULL,
  `Titulo_de_Eleitor` varchar(20) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `Contato_idContato` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa_Fisica`),
  KEY `fk_Pessoa_Fisica_Contato1` (`Contato_idContato`),
  CONSTRAINT `fk_Pessoa_Fisica_Contato1` FOREIGN KEY (`Contato_idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_fisica`
--

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` VALUES (2,'11122233344','Admin','2018-08-14',NULL,NULL,'121234562',2),(3,'69674436073','Carlos Eduardo2','2018-08-15','125','123','129086731',3),(4,'57586381020','Teste2','1991-01-01','7987922','87987922','123389722',12),(5,'52712708237','Marcelo Kaique Miguel das Neves','0000-00-00','98332185890','583317420116','197354245',13),(6,'83652306074','reginaldo','1999-03-23','122','1223','129156395',14),(7,'45211379705','Kauê João Carvalho','1991-03-02','35726478247','654138330183','109466639',15),(8,'04181394824','Arthur Calebe Augusto Moreira','1996-08-01','56404573786','353326730191','168696137',16),(9,'94486391128','Enrico Fábio Davi Monteiro','1996-07-20','73759261410','031435230183','147881717',17),(10,'20598577084','Gael Gustavo Nicolas Sales','1991-02-02','324','345','505018895',18),(11,'67319749947','Caleb Davi Renan Freitas','1987-07-06','1134000','7273000','340602624',19),(12,'21543664300','Cauê Yago Nelson das Neves','1997-08-10','662','755','132135851',20),(13,'46354925836','Manuel Giovanni Renan Moraes','2001-09-07','026','227','463549258',21),(14,'46354925836','','0000-00-00','','','',22),(15,'64373682763','Yago Marcos Vinicius Nascimento','1991-03-09','31432025193','354426830140','179655346',23),(16,'27687079027','Levi Erick Henry Moreira','1996-08-11','','','267537451',24);
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_juridica`
--

DROP TABLE IF EXISTS `pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_juridica` (
  `idPessoa_Juridica` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Fantasia` varchar(45) DEFAULT NULL,
  `CNPJ` varchar(14) DEFAULT NULL,
  `Insc_Estadual` bigint(20) DEFAULT NULL,
  `Insc_Municipal` bigint(20) DEFAULT NULL,
  `Contato_idContato` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa_Juridica`),
  KEY `fk_Pessoa_Juridica_Contato1` (`Contato_idContato`),
  CONSTRAINT `fk_Pessoa_Juridica_Contato1` FOREIGN KEY (`Contato_idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_juridica`
--

LOCK TABLES `pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` VALUES (1,'TRIBUNAL do Lula','27471810000182',45691551,12345,6);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posicao`
--

DROP TABLE IF EXISTS `posicao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posicao` (
  `idPosicao` int(11) NOT NULL AUTO_INCREMENT,
  `Posicao` varchar(45) NOT NULL,
  `idInstancia` int(11) NOT NULL,
  PRIMARY KEY (`idPosicao`),
  KEY `idInstancia` (`idInstancia`),
  CONSTRAINT `idInstancia` FOREIGN KEY (`idInstancia`) REFERENCES `instancia` (`idInstancia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posicao`
--

LOCK TABLES `posicao` WRITE;
/*!40000 ALTER TABLE `posicao` DISABLE KEYS */;
INSERT INTO `posicao` VALUES (1,'Réu',1),(2,'Autor',1),(3,'Requerente',2),(4,'Requerido',2);
/*!40000 ALTER TABLE `posicao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processo`
--

DROP TABLE IF EXISTS `processo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processo` (
  `idProcesso` int(11) NOT NULL AUTO_INCREMENT,
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
  `Conclusao_idConclusao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProcesso`),
  KEY `Posicao` (`idPosicao`),
  KEY `Despesas` (`idDespesas`),
  KEY `CStatus` (`idStatus_Processo`),
  KEY `CVara` (`idVara`),
  KEY `Cadvogado` (`idAdvogado`),
  KEY `CidContato` (`idContato`),
  KEY `Cfk_Processo_Conclusao` (`Conclusao_idConclusao`),
  CONSTRAINT `CStatus` FOREIGN KEY (`idStatus_Processo`) REFERENCES `status_processo` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cadvogado` FOREIGN KEY (`idAdvogado`) REFERENCES `advogado` (`idAdvogado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Cfk_Processo_Conclusao` FOREIGN KEY (`Conclusao_idConclusao`) REFERENCES `conclusao` (`idConclusao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CidContato` FOREIGN KEY (`idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Despesas` FOREIGN KEY (`idDespesas`) REFERENCES `despesas` (`idDespesas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Posicao` FOREIGN KEY (`idPosicao`) REFERENCES `posicao` (`idPosicao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processo`
--

LOCK TABLES `processo` WRITE;
/*!40000 ALTER TABLE `processo` DISABLE KEYS */;
INSERT INTO `processo` VALUES (7,'13151848438438434844','1','Dirceu','1',1,6,NULL,2,3,1,NULL),(8,'12513513543484383844','Cicrano','Fulano','Braz de Pinha',1,6,NULL,2,1,1,NULL),(10,'31351385438438643846','Juiz teste','Advogado teste','Teste',1,22,NULL,2,1,1,NULL),(11,'5213513513543843','Juiz novo teste','Advoagdo Novo teste','Teste Novo',1,22,NULL,2,3,1,NULL),(13,'70770909809887987907','juiz do 2','advogado do 2','testador 2',3,3,NULL,7,3,1,1);
/*!40000 ALTER TABLE `processo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_processo`
--

DROP TABLE IF EXISTS `status_processo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_processo` (
  `idStatus` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(45) NOT NULL,
  PRIMARY KEY (`idStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_processo`
--

LOCK TABLES `status_processo` WRITE;
/*!40000 ALTER TABLE `status_processo` DISABLE KEYS */;
INSERT INTO `status_processo` VALUES (2,'conhecimento'),(3,'recurso'),(4,'execução'),(5,'sentença'),(6,'arquivado'),(7,'encerrado');
/*!40000 ALTER TABLE `status_processo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `idTelefone` int(11) NOT NULL AUTO_INCREMENT,
  `Celular` varchar(45) NOT NULL,
  `Residencial` varchar(45) NOT NULL,
  `Comercial` varchar(45) DEFAULT NULL,
  `Contato_idContato` int(11) NOT NULL,
  PRIMARY KEY (`idTelefone`),
  KEY `fk_Telefone_Contato1` (`Contato_idContato`),
  CONSTRAINT `fk_Telefone_Contato1` FOREIGN KEY (`Contato_idContato`) REFERENCES `contato` (`idContato`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (2,'','2127282829',NULL,3),(6,'21988784512','2137458945',NULL,6),(8,'','2137351245',NULL,8),(9,'21879878722','2178979222',NULL,12),(10,'96994092911','9635331149',NULL,13),(11,'2323232323','2323232323',NULL,14),(12,'2323232323','1243541542',NULL,15),(13,'61981898293','6138361838',NULL,16),(14,'84997973685','8429307884',NULL,17),(15,'68982473365','6827464161',NULL,18),(16,'34995107925','3435262091',NULL,19),(17,'51983710693','5137751046',NULL,20),(18,'96991684637','9628471319',NULL,21),(19,'','',NULL,22),(20,'85982365739','8537937063',NULL,23),(21,'67992187803','6725963965',NULL,24);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_despesas`
--

DROP TABLE IF EXISTS `tipo_despesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_despesas` (
  `idTipo_Despesas` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipo_Despesas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_despesas`
--

LOCK TABLES `tipo_despesas` WRITE;
/*!40000 ALTER TABLE `tipo_despesas` DISABLE KEYS */;
INSERT INTO `tipo_despesas` VALUES (1,'Valor_Custas'),(2,'Valor_Causa'),(3,'Sucumbencias'),(4,'Contratuais'),(5,'Despesa_Fixa');
/*!40000 ALTER TABLE `tipo_despesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(45) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `Pessoa_Fisica_idPessoa_Fisica` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idPerfil` (`idPerfil`),
  KEY `fk_Usuario_Pessoa_Fisica1` (`Pessoa_Fisica_idPessoa_Fisica`),
  CONSTRAINT `fk_Usuario_Pessoa_Fisica1` FOREIGN KEY (`Pessoa_Fisica_idPessoa_Fisica`) REFERENCES `pessoa_fisica` (`idPessoa_Fisica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idPerfil` FOREIGN KEY (`idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','202cb962ac59075b964b07152d234b70',3,2),(2,'recepcionista','202cb962ac59075b964b07152d234b70',1,15),(3,'advogado','202cb962ac59075b964b07152d234b70',2,11),(4,'levi','202cb962ac59075b964b07152d234b70',1,16);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vara`
--

DROP TABLE IF EXISTS `vara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vara` (
  `idVara` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  `Comarca_idComarca` int(11) NOT NULL,
  PRIMARY KEY (`idVara`),
  KEY `fk_Vara_Comarca1` (`Comarca_idComarca`),
  CONSTRAINT `fk_Vara_Comarca1` FOREIGN KEY (`Comarca_idComarca`) REFERENCES `comarca` (`idComarca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vara`
--

LOCK TABLES `vara` WRITE;
/*!40000 ALTER TABLE `vara` DISABLE KEYS */;
INSERT INTO `vara` VALUES (1,'8ª Vara Civel',1),(2,'9ª vara',1),(3,'10ª Vara',1),(4,'12º vara',1),(6,'13ª Vara',3);
/*!40000 ALTER TABLE `vara` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-19 21:16:27
