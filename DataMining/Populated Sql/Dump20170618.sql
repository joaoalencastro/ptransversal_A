-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: sistemareservadodb
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `fluxo_de_dados_sala`
--

DROP TABLE IF EXISTS `fluxo_de_dados_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fluxo_de_dados_sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_sala` enum('disponivel','indisponivel','pendente') NOT NULL,
  `data` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fluxo_de_dados_sala`
--

LOCK TABLES `fluxo_de_dados_sala` WRITE;
/*!40000 ALTER TABLE `fluxo_de_dados_sala` DISABLE KEYS */;
/*!40000 ALTER TABLE `fluxo_de_dados_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fluxo_de_dados_usuario`
--

DROP TABLE IF EXISTS `fluxo_de_dados_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fluxo_de_dados_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `historico_salas` text NOT NULL,
  `salas_em_uso` text NOT NULL,
  `solicitacoes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fluxo_de_dados_usuario`
--

LOCK TABLES `fluxo_de_dados_usuario` WRITE;
/*!40000 ALTER TABLE `fluxo_de_dados_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `fluxo_de_dados_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `rg` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionarios`
--

LOCK TABLES `funcionarios` WRITE;
/*!40000 ALTER TABLE `funcionarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materias` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `professor` varchar(15) NOT NULL,
  `turma` varchar(5) DEFAULT NULL,
  `horario` varchar(20) DEFAULT NULL,
  `vagas` varchar(10) DEFAULT NULL,
  `local` text,
  `dias` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (1,'Introd à Engenharia Elétrica','163872','Bermudez','A','10:00-11:50','40','BT-34/15','sexta'),(2,'Introdução Circuitos Elétricos','114197','Abdalla','A','10:00-11:50','40','BT-25/15','sexta'),(3,'Circuitos Elétricos','111830','Franklin','A','8:00-9:50','60','Aud-SG11','segunda/quarta'),(4,'Circuitos Elétricos','111830','Abdalla','B','16:00-17:50','60','Auditório','segunda/quarta'),(5,'Lab Circuitos Elétricos','111848','Alex','A','10:00-11:50','20','Lab 2','terça'),(6,'Lab Circuitos Elétricos','111848','Alex','B','8:00-9:50','20','Lab 2','terça'),(7,'Lab Circuitos Elétricos','111848','João Luiz','C','10:00-11:50','20','Lab 2','sexta'),(8,'Lab Circuitos Elétricos','111848','Leonardo','D','10:00-11:50','20','Lab 2','segunda'),(9,'Lab Circuitos Elétricos','111848','João Luiz','E','8:00-9:50','20','Lab 2','sexta'),(10,'Circuitos Elétricos 2','111791','Assis','A','14:00-15:50','60','Auditório','segunda/quarta'),(11,'Circuitos Elétricos 2','111791','Abdalla/Leonard','B','10:00-11:50','60','Auditório','terça/quinta'),(12,'Circuitos Elétricos 2','111791','Alex','C','16:00-17:50','50','BT-43/15','segunda/quarta'),(13,'Lab Circuitos Elétricos 2','111805','Leonardo','A','14:00-15:50','20','Lab 2','terça'),(14,'Lab Circuitos Elétricos 2','111805','Vargas','B','14:00-15:50','20','Lab 2','sexta'),(15,'Lab Circuitos Elétricos 2','111805','Judson','C','14:00-15:50','20','Lab 2','quinta'),(16,'Lab Circuitos Elétricos 2','111805','Leonardo','D','8:00-9:50','20','Lab 2','quinta'),(17,'Lab Circuitos Elétricos 2','111805','Vargas','E','16:00-17:50','20','Lab 2','quinta'),(18,'Lab Circuitos Elétricos 2','111805','Lustosa','F','16:00-17:50','20','Lab 2','quarta'),(19,'Lab Circuitos Elétricos 2','111805','Lustosa','G','16:00-17:50','20','Lab 2','terça'),(20,'Lab Circuitos Elétricos 2','111805','Judson','H','16:00-17:50','20','Lab 2','quinta'),(21,'Sinais e Sistemas em TC','114367','João Luiz','A','10:00-11:50','40','Aud-SG11','terça/quinta'),(22,'Sinais e Sistemas em TD','114375','Eduardo Peixoto','A','16:00-17:50','39','BT-16/15','terça/quinta'),(23,'Análise Dinâmica Linear','111775','Renato','A','8:00-9:50','50','BT-25/15','quarta/sexta'),(24,'Análise Dinâmica Linear','111775','Egito','B','16:00-17:50','50','Aud-SG11','segunda/quarta'),(25,'Lab Análise Dinâmica Linear','111783','Henrique','A','8:00-9:50','18','Lab Controle','segunda'),(26,'Lab Análise Dinâmica Linear','111783','Henrique','B','14:00-15:50','18','Lab Controle','quata'),(27,'Lab Análise Dinâmica Linear','111783','Renato','C','10:00-11:50','18','Lab Controle','sexta'),(28,'Lab Análise Dinâmica Linear','111783','Renato','D','10:00-11:50','18','Lab Controle','quarta'),(29,'Lab Análise Dinâmica Linear','111783','Henrique/Renato','E','14:00-15:50','18','Lab Controle','segunda'),(30,'Controle Dinâmico','111911','Ishihara','A','10:00-11:50','40','BT-43/15','quarta/sexta'),(31,'Controle Dinâmico','111911','Adolfo','B','16:00-17:50','40','BT-34/15','segunda/quarta'),(32,'Lab Controle Dinâmico','111929','Egito','A','10:00-11:50','18','Lab Controle','quinta'),(33,'Lab Controle Dinâmico','111929','Egito','B','14:00-15:50','18','Lab Controle','terça'),(34,'Lab Controle Dinâmico','111929','Adolfo','C','14:00-15:50','18','Lab Controle','quinta'),(35,'Lab Controle Dinâmico','111929','Adolfo','D','16:00-17:50','18','Lab Controle','quinta'),(36,'Controle para Automação','167657','Padilha','A','10:00-11:50','40','BT-52/15','quarta/sexta'),(37,'Controle de Processos','107484','Eduardo Stockle','A','8:00-9:50','40','BT-34/15','segunda/quarta'),(38,'Controle Digital','164887','Henrique','A','8:00-9:50','50','BT-25/15','terça/quinta'),(39,'Disposit e Circuitos Eletrônicos','111724','Geovany','A','14:00-15:50','60','Aud-SG11','segunda/quarta'),(40,'Lab Dispos e Circ Eletrônicos','111732','Flávia','A','18:00-19:50','14','Lab 1','quinta'),(41,'Lab Dispos e Circ Eletrônicos','111732','Flávia','B','16:00-17:50','14','Lab 1','quarta'),(42,'Lab Dispos e Circ Eletrônicos','111732','Flávia','C','16:00-17:50','14','Lab 1','quinta'),(43,'Lab Dispos e Circ Eletrônicos','111732','Flávia','D','8:00-9:50','14','Lab 1','quinta'),(44,'Instrumentação de Controle','167347','Lélio','A','10:00-11:50','30','BT-43/15','terça/quinta'),(45,'Instrum Controle de Processos','107492','Lélio','A','8:00-9:50','40','BT-43/15','segunda/quarta'),(46,'Lab Controle de Processos','107506','Eduardo Stockle','A','10:00-11:50','14','Lab Cont Pr Ind','segunda'),(47,'Lab Controle de Processos','107506','Eduardo Stockle','B','16:00-17:50','14','Lab Cont Pr Ind','terça'),(48,'Neuroengenharia (Pós)','309931','Padilha','A','10:00-11:50','20','CDT','terça/quinta'),(49,'Controle Não Linear (Pós)','363847','Vargas','A','08:00-09:50','15','SG-11 A1-39/12','segunda/quarta'),(50,'Estimação e Filtragem Estocástica (Pós)','367206','Geovany','A','16:00-17:50','20','CDT','segunda/quarta'),(51,'Seminários do PGEA (Pós)','311553','Ishihara','A','10:00-11:50','30','CDT','quarta'),(52,'Eletrônica','111856','Stefan','A','10:00-11:50','60','Aud-SG11','segunda/quarta'),(53,'Lab Eletrônica','111864','Adson','A','14:00-15:50','14','Lab 1','segunda'),(54,'Lab Eletrônica','111864','Adson','B','14:00-15:50','14','Lab 1','quarta'),(55,'Lab Eletrônica','111864','Adson','C','14:00-15:50','14','Lab 1','quinta'),(56,'Lab Eletrônica','111864','Adson','D','10:00-11:50','14','Lab 1','sexta'),(57,'Eletrônica 2','112313','Camargo','A','10:00-11:50','50','BT-25/15','terça/quinta'),(58,'Lab Eletrônica 2','112330','Daniel Café','A','14:00-15:50','16','Lab 2','segunda'),(59,'Lab Eletrônica 2','112330','Daniel Café','B','16:00-17:50','16','Lab 2','segunda'),(60,'Materiais Elétricos e Mag','111899','Artemis','A','10:00-11:50','72','Auditório','segunda/quarta'),(61,'Lab Materiais Elétricos e Mag','111902','Artemis','A','14:00-15:50','24','Lab Materiais','terça'),(62,'Lab Materiais Elétricos e Mag','111902','Artemis','B','16:00-17:50','24','Lab Materiais','terça'),(63,'Lab Materiais Elétricos e Mag','111902','Artemis','C','14:00-15:50','24','Lab Materiais','quinta'),(64,'Sistemas Digitais','111813','Mylène','A','16:00-17:50','50','Aud-SG11','terça/quinta'),(65,'Sistemas Digitais','111813','Mintsu','B','14:00-15:50','50','Aud-SG11','terça/quinta'),(66,'Sistemas Digitais','111813','Romariz','C','14:00-15:50','45','BT-52/15','segunda/quarta'),(67,'Lab Sistemas Digitais','111821','Molinaro','A','8:00-9:50','20','Lab 3','segunda'),(68,'Lab Sistemas Digitais','111821','Molinaro','B','10:00-11:50','20','Lab 3','sexta'),(69,'Lab Sistemas Digitais','111821','Molinaro','C','8:00-9:50','20','Lab 3','sexta'),(70,'Lab Sistemas Digitais','111821','Romariz','D','16:00-17:50','20','Lab 3','quarta'),(71,'Lab Sistemas Digitais','111821','Molinaro','E','10:00-11:50','20','Lab 3','segunda'),(72,'Lab Sistemas Digitais','111821','Eduardo Peixoto','F','10:00-11:50','20','Lab 3','quarta'),(73,'Lab Sistemas Digitais','111821','Romariz','G','10:00-11:50','20','Lab 3','terça'),(74,'Sistemas Microprocessados','111741','Daniel Café','A','8:00-9:50','49','BT-34/15','terça/quinta'),(75,'Sistemas Microprocessados','111741','Zelenovsky','B','8:00-9:50','31','Auditório','segunda/quarta'),(76,'Arquitetura de Proc Digitais','112003','(Daniel Café)','A','8:00-9:50','1','BT-34/15','terça/quinta'),(77,'Arquitetura de Proc Digitais','112003','(Zelenovsky)','B','8:00-9:50','39','Auditório','segunda/quarta'),(78,'Lab Sistemas Microprocessados','111767','Zelenovsky','A','14:00-15:50','20','Lab 3','segunda'),(79,'Lab Sistemas Microprocessados','111767','Mintsu','B','16:00-17:50','20','Lab 3','terça'),(80,'Lab Sistemas Microprocessados','111767','Eduardo Peixoto','C','14:00-15:50','20','Lab 3','quinta'),(81,'Lab Sistemas Microprocessados','111767','Mintsu','D','16:00-17:50','20','Lab 3','quinta'),(82,'Lab Sistemas Microprocessados','111767','(Zelenovsky)','E','16:00-17:50','0','Lab 3','segunda'),(83,'Lab Sistemas Microprocessados','111767','(Eduardo Peixot','F','14:00-15:50','0','Lab 3','terça'),(84,'Lab Arquitetura de Proc Digitais','112127','(Zelenovsky)','A','14:00-15:50','0','Lab 3','segunda'),(85,'Lab Arquitetura de Proc Digitais','112127','(Mintsu)','B','16:00-17:50','0','Lab 3','terça'),(86,'Lab Arquitetura de Proc Digitais','112127','(Eduardo Peixot','C','14:00-15:50','0','Lab 3','quinta'),(87,'Lab Arquitetura de Proc Digitais','112127','(Mintsu)','D','16:00-17:50','0','Lab 3','quinta'),(88,'Lab Arquitetura de Proc Digitais','112127','Zelenovsky','E','16:00-17:50','20','Lab 3','segunda'),(89,'Lab Arquitetura de Proc Digitais','112127','Eduardo Peixoto','F','14:00-15:50','20','Lab 3','terça'),(90,'Tóp Eng: Caracterização de Semicondutores (Op','169617','Stefan','B','8:00-9:50','0','BT-16/15','terça/quinta'),(91,'Processamento de Imagens (Pós)','363898','Mylène','A','14:00-15:50','20','CDT','terça/quinta'),(92,'Instrumentação Biomédica (Pós)','366471','Adson','A','16:00-19:40','15','SG11','terça'),(93,'Processamento de Sinais (Pós)','363111','Assis','A','16:00-17:50','30','BT-16/15','segunda/quarta'),(94,'Microeletrônica (Pós)','320200','(Sandro)','A','14:00-15:50','20','CDT','segunda/quarta'),(95,'Análise de Sistemas de Potência','167401','Damasceno','A','16:00-17:50','50','BT-25/15','segunda/quarta'),(96,'Circuitos Polifásicos','169081','Kleber','A','8:00-9:50','50','Auditório','terça/quinta'),(97,'Conversão de Energia','167088','Marco Aurélio','A','14:00-15:50','50','Auditório','terça/quinta'),(98,'Máquinas Elétricas','169234','Shayani','A','18:00-19:50','50','Aud-SG11','terça/quinta'),(99,'Lab Conversão de Energia','169072','Ronaldo (substi','A','14:00-17:40','0','Lab Conv','quarta'),(100,'Lab Sistemas Elétricos de Potência','-','Ronaldo (substi','A','8:00-9:50','9','Lab Conv','sexta'),(101,'Lab Sistemas Elétricos de Potência','-','Ronaldo (substi','B','10:00-11:50','9','Lab Conv','sexta'),(102,'Lab Sistemas Elétricos de Potência','-','Ronaldo (substi','C','14:00-15:50','9','Lab Conv','sexta'),(103,'Lab Sistemas Elétricos de Potência','-','Ronaldo (substi','D','16:00-17:50','9','Lab Conv','sexta'),(104,'Lab Sistemas Elétricos de Potência','-','Pablo','E','14:00-15:50','9','Lab Conv','quinta'),(105,'Lab Sistemas Elétricos de Potência','-','Pablo','F','16:00-17:50','9','Lab Conv','quinta'),(106,'Instalações Elétricas','114391','Alcides','A','14:00-15:50','20','BT-16/15','segunda/quarta'),(107,'Instalações Elétricas','114391','Alcides','B','14:00-15:50','20','BT-16/15','terça/quinta'),(108,'Lab Instalações Elétricas','114405','Mauro','A','8:00-9:50','12','Lab Instalações','sábado'),(109,'Lab Instalações Elétricas','114405','Mauro','B','10:00-11:50','12','Lab Instalações','sábado'),(110,'Lab Instalações Elétricas','114405','Mauro','C','8:00-9:50','12','Lab Instalações','terça'),(111,'Lab Instalações Elétricas','114405','Mauro','D','8:00-9:50','12','Lab Instalações','quinta'),(112,'Conversão Eletromec Energia','111872','Shayani','A','14:00-15:50','40','BT-34/15','terça/quinta'),(113,'Lab Conv Eletromec de Energia','111881','Ronaldo (substi','A','10:00-11:50','9','Lab Conv','quarta'),(114,'Lab Conv Eletromec de Energia','111881','substituto do I','B','10:00-11:50','9','Lab Conv','segunda'),(115,'Lab Conv Eletromec de Energia','111881','substituto do I','C','16:00-17:50','9','Lab Conv','segunda'),(116,'Lab Conv Eletromec de Energia','111881','Ronaldo (substi','D','16:00-17:50','9','Lab Conv','terça'),(117,'Eletricidade Básica','100986','Guillermo (subs','A','18:00-19:50','60','Auditório','terça/quinta'),(118,'Eletricidade Básica','100986','Guillermo (subs','B','8:00-9:50','50','Aud-SG11','terça/quinta'),(119,'Eletricidade Básica','100986','Felipe','C','14:00-15:50','50','BT-43/15','segunda/quarta'),(120,'Eletricidade Básica','100986','substituto do I','D','14:00-15:50','50','BT-43/15','terça/quinta'),(121,'Lab Eletricidade Básica','100994','Guillermo (subs','A','14:00-15:50','12 (14)','Lab Instalações','segunda'),(122,'Lab Eletricidade Básica','100994','Guillermo (subs','B','16:00-17:50','12 (14)','Lab Instalações','segunda'),(123,'Lab Eletricidade Básica','100994','substituto do I','C','10:00-11:50','12 (14)','Lab Instalações','terça'),(124,'Lab Eletricidade Básica','100994','Guillermo (subs','D','14:00-15:50','12 (14)','Lab Instalações','terça'),(125,'Lab Eletricidade Básica','100994','substituto do I','E','16:00-17:50','12 (14)','Lab Instalações','quarta'),(126,'Lab Eletricidade Básica','100994','substituto do I','F','12:00-13:50','12 (14)','Lab Instalações','quinta'),(127,'Lab Eletricidade Básica','100994','Guillermo (subs','G','14:00-15:50','12 (14)','Lab Instalações','quinta'),(128,'Lab Eletricidade Básica','100994','substituto do I','H','16:00-17:50','12 (14)','Lab Instalações','terça'),(129,'Transmissão de Energia Elétrica (Opt)','167771','Pablo','A','10:00-11:50','30','BT-34/15','segunda/quarta'),(130,'Tóp Sist Pot: Geração Solar Fotovoltaica (Opt','167908','Marco Aurélio','A','10:00-11:50','0','BT-16/15','terça/quinta'),(131,'Tóp Sist Pot 2 (Pós)Localização de Faltas em ','366021','Felipe','A','18:00-19:50','20','CDT','segunda/quarta'),(132,'Estabilidade de Sistemas de Potência (Pós)','363243','Damasceno','A','8:00-9:50','20','CDT','terça/quinta'),(133,'Introdução à Eng de Redes','111708','Georges','A','14:00-15:50','40','BT-52/15','sexta'),(134,'Computação para Engenharia','169676','Daniel Guerreir','A','10:00-11:50','40','LCCC','quarta/sexta'),(135,'Computação para Engenharia','169676','Cláudia','B','10:00-11:50','33','LCCC','terça/quinta'),(136,'Algoritmos e Estrutura de Dados','108561','substituto do A','A','10:00-11:50','30','LabRedes','terça/quinta'),(137,'Algoritmos e Estrutura de Dados','108561','substituto do A','B','16:00-17:50','30','LCCC','segunda/quarta'),(138,'Algoritmos e Estrutura de Dados','108561','substituto do G','C','18:00-19:50','0','-','terça/quinta'),(139,'Fundamentos de Redes 1','167959','Marcelo','A','10:00-11:50','40','BT-25/15','segunda/quarta'),(140,'Fundamentos de Redes 2','108588','Beatriz (substi','A','14:00-15:50','40','BT-25/15','segunda/quarta'),(141,'Fundamentos de Redes 2','108588','substituto do G','B','18:00-19:50','0','BT-16/15','segunda/quarta'),(142,'Projeto Transversal em Redes 1','109592','Ugo','A','14:00-15:50','20','LabRedes','segunda/quarta'),(143,'Projeto Transversal em Redes 1','109592','Flávio','B','16:00-17:50','20','LabRedes','terça/quinta'),(144,'Projeto Transversal em Redes 2','109606','Flávio','A','10:00-11:50','35','LabRedes','sexta'),(145,'Sistemas Operacionais de Redes','160121','Beatriz (substi','A','10:00-11:50','30','LabRedes','segunda/quarta'),(146,'Arquitetura Protocolos Redes','108545','Georges','A','8:00-9:50','30','LabRedes','segunda/quarta'),(147,'Lab Arquit e Prot de Redes','108553','Flávio','A','8:00-9:50','20','LabRedes','sexta'),(148,'Lab Arquit e Prot de Redes','108553','-','B','10:00-11:50','0','-','sexta'),(149,'Aval Desemp Redes e Sistemas','108600','Cláudia','A','8:00-9:50','30','LabRedes','terça/quinta'),(150,'Aval Desemp Redes e Sistemas','108600','substituto do G','B','10:00-11:50','0','Lab 1','terça/quinta'),(151,'Redes Locais','208833','Giozza','A','8:00-9:50','40','BT-16/15','quarta/sexta'),(152,'Segurança de Redes','160113','Rafael Timóteo','A','16:00-17:50','30','LabRedes','segunda/quarta'),(153,'Gerência de Redes e Sistemas','108596','Beatriz (substi','A','14:00-15:50','20','LabRedes','terça/quinta'),(154,'Metodol Desenv Software','167975','Puttini','A','8:00-9:50','33','LCCC','segunda/quarta'),(155,'Teoria da Informação','167266','Daniel Guerreir','A','14:00-15:50','40','BT-25/15','terça/quinta'),(156,'Comunicações Ópticas (Opt)','169595','Giozza','A','10:00-11:50','30','BT-16/15','quarta/sexta'),(157,'Sistemas Inform Distrib (Opt)','160091','Puttini','A','18:00-19:50','30','LabRedes','segunda/quarta'),(158,'Tóp Eng: Internet do Futuro (Opt)','169617','Rafael Timóteo','C','18:00-19:50','0','-','segunda/quarta'),(159,'Comunicações Móveis (Pós)','366129','Ugo','A','8:00-11:40','20','CDT','segunda'),(160,'Redes de Computadores (Pós)','363685','Rafael Timóteo','A','18:00-19:50','20','CDT','terça/quinta'),(161,'Top Telecomunicações 2 (Pós)','366269','Lustosa','A','12:00-13:50','20','CDT','segunda/quarta'),(162,'Processos Estocásticos (Pós)','367354','Marcelo','A','16:00-17:50','30','CDT','terça/quinta'),(163,'Eletromagnetismo 1','167037','Terada','A','16:00-17:50','50','BT-52/15','terça/quinta'),(164,'Eletromagnetismo 1','167037','Terada','B','16:00-17:50','50','BT-52/15','segunda/quarta'),(165,'Eletromagnetismo 2','111988','Leonardo','A','16:00-17:50','50','BT-25/15','terça/quinta'),(166,'Lab Eletromagnetismo 2','111996','Plínio','A','14:00-15:50','12','Lab Eletromag','segunda'),(167,'Lab Eletromagnetismo 2','111996','Plínio','B','16:00-17:50','12','Lab Eletromag','segunda'),(168,'Lab Eletromagnetismo 2','111996','Plínio','C','8:00-9:50','12','Lab Eletromag','segunda'),(169,'Lab Eletromagnetismo 2','111996','Plínio','D','16:00-17:50','12','Lab Eletromag','quarta'),(170,'Princípios de Comunicação','169188','João Paulo Leit','A','8:00-9:50','46','BT-52/15','terça/quinta'),(171,'Princípios de Comunicação','169188','Judson','B','10:00-11:50','46','BT-52/15','terça/quinta'),(172,'Lab Princípios de Comunicação','169111','Lúcio','A','8:00-9:50','12','Lab 1','segunda'),(173,'Lab Princípios de Comunicação','169111','Lúcio','B','14:00-15:50','12','Lab 1','terça'),(174,'Lab Princípios de Comunicação','169111','Lúcio','C','16:00-17:50','12','Lab 1','terça'),(175,'Lab Princípios de Comunicação','169111','Lúcio','D','8:00-9:50','12','Lab 1','quarta'),(176,'Lab Princípios de Comunicação','169111','Lúcio','E','18:00-19:50','12','Lab 1','terça'),(177,'Sistemas de Comunicações 1','167193','João Paulo Leit','A','16:00-17:50','40','BT-43/15','terça/quinta'),(178,'Comunicações Digitais','167878','André Noll','A','16:00-17:50','40','BT-34/15','terça/quinta'),(179,'Tóp Eng: Microondas (Opt)','169617','Bermudez','A','8:00-9:50','0','LabCom','terça/quinta'),(180,'Informação e Codificação (Pós)','363031','André Noll','A','8:00-9:50','20','BT-43/15','terça/quinta'),(181,'','','','','','','','');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `num_cadeiras` int(11) DEFAULT NULL,
  `projetor` tinyint(1) DEFAULT NULL,
  `ar_condicionado` tinyint(1) DEFAULT NULL,
  `lab` tinyint(1) DEFAULT NULL,
  `idfluxo` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `idfluxo` (`idfluxo`),
  CONSTRAINT `salas_ibfk_1` FOREIGN KEY (`idfluxo`) REFERENCES `fluxo_de_dados_sala` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salas`
--

LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` VALUES (1,'AT-25/15',0,43,0,0,0,NULL),(2,'AT-25/15',0,43,1,1,0,NULL);
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitacao`
--

DROP TABLE IF EXISTS `solicitacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacao` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `solicitante` varchar(45) NOT NULL,
  `horario_da_reserva` varchar(15) NOT NULL,
  `horario_solicitacao` timestamp NULL DEFAULT NULL,
  `obs` text NOT NULL,
  `horario` varchar(15) NOT NULL,
  `id_usuario` varchar(200) DEFAULT NULL,
  `motivo` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitacao`
--

LOCK TABLES `solicitacao` WRITE;
/*!40000 ALTER TABLE `solicitacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipo` enum('comum','prof') NOT NULL,
  `rg` varchar(12) NOT NULL,
  `senha` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ASTOLFO','120091212','astolfo.o@hotmail.com','comum','1212121','batata');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sistemareservadodb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-18  1:19:33
