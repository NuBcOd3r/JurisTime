CREATE DATABASE  IF NOT EXISTS `dblegal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dblegal`;
-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: dblegal
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbcantones`
--

DROP TABLE IF EXISTS `tbcantones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcantones` (
  `idCanton` int NOT NULL AUTO_INCREMENT,
  `idCircuito` int NOT NULL,
  `nombreCanton` varchar(45) NOT NULL,
  PRIMARY KEY (`idCanton`),
  KEY `FK_CIRCUITO_CANTON` (`idCircuito`),
  CONSTRAINT `FK_CIRCUITO_CANTON` FOREIGN KEY (`idCircuito`) REFERENCES `tbcircuito` (`idCircuito`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcantones`
--

LOCK TABLES `tbcantones` WRITE;
/*!40000 ALTER TABLE `tbcantones` DISABLE KEYS */;
INSERT INTO `tbcantones` VALUES (1,1,'San José'),(2,1,'Puriscal'),(3,1,'Turrubares'),(4,2,'Goicoechea'),(5,2,'Vázquez de Coronado'),(6,2,'Tibás'),(7,2,'Moravia'),(8,2,'Montes de Oca'),(9,2,'Curridabat'),(10,3,'Desamparados'),(11,3,'Escazú'),(12,3,'Aserri'),(13,3,'Mora'),(14,3,'Santa Ana'),(15,3,'Alajuelita'),(16,3,'Acosta'),(17,3,'Hatillo'),(18,3,'San Sebastián'),(19,3,'Pavas'),(20,4,'Pérez Zeledón'),(21,4,'Buenos Aires'),(22,5,'Osa'),(23,5,'Golfito'),(24,5,'Coto Brus'),(25,5,'Corredores'),(26,6,'Alajuela'),(27,6,'San Mateo'),(28,6,'Atenas'),(29,6,'Poás'),(30,6,'Orotina'),(31,7,'San Carlos y Fortuna'),(32,7,'Upala'),(33,7,'Los Chiles'),(34,7,'Guatuso'),(35,8,'San Ramón'),(36,8,'Naranjo'),(37,8,'Palmares'),(38,8,'Alfaro Ruiz (Zarcero)'),(39,8,'Grecia'),(40,8,'Sarchí'),(41,9,'Cartago'),(42,9,'Oreamuno'),(43,9,'El Guarco'),(44,9,'Paraíso'),(45,9,'La Unión'),(46,9,'Jiménez'),(47,9,'Turrialba'),(48,9,'Alvarado'),(49,9,'Tarrazú, Dota'),(50,9,'León Cortés Castro (Los Santos)'),(51,10,'Heredia'),(52,10,'Barva'),(53,10,'Santo Domingo'),(54,10,'Santa Bárbara'),(55,10,'San Rafael'),(56,10,'San Isidro'),(57,10,'Belén'),(58,10,'Flores'),(59,10,'San Pablo'),(60,10,'Sarapiqui'),(61,11,'Liberia'),(62,11,'Bagaces'),(63,11,'Cañas'),(64,11,'Abangares'),(65,11,'Tilarán'),(66,11,'La Cruz'),(67,12,'Nicoya'),(68,12,'Santa Cruz'),(69,12,'Carillo'),(70,12,'Nandayure'),(71,12,'Hojancha'),(72,12,'Jicaral'),(73,13,'Puntarenas'),(74,13,'Esparza'),(75,13,'Montes de Oro'),(76,13,'Parrita y Aguirre (Quepos)'),(77,13,'Garabito'),(78,13,'Monteverde'),(79,13,'Cóbano'),(80,14,'Limón'),(81,14,'Talamanca'),(82,14,'Matina'),(83,14,'Matama'),(84,15,'Pococí'),(85,15,'Siquirres'),(86,15,'Guácimo'),(89,16,'Abrojo Montezuma'),(90,16,'Conteburica'),(91,16,'Coto Brus'),(92,16,'Osa'),(93,16,'Altos de San Antonio'),(94,17,'Matambú'),(95,18,'Bajo Chirripó'),(96,18,'Chirripó'),(97,18,'Talamanca Cabécar'),(98,18,'Nairi Awari'),(99,18,'Telire'),(100,18,'Tayni'),(101,18,'Ujarrás'),(102,18,'China Kichá'),(103,19,'Talamanca Bribrí'),(104,19,'Salitre'),(105,19,'Kekoldi'),(106,19,'Cabagra'),(107,20,'Boruca'),(108,20,'Curré'),(109,21,'Quitirrisí'),(110,21,'Zapatón'),(111,22,'Térraba'),(112,23,'Guatuso');
/*!40000 ALTER TABLE `tbcantones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcaso`
--

DROP TABLE IF EXISTS `tbcaso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcaso` (
  `idCaso` int NOT NULL AUTO_INCREMENT,
  `idAbogado` int NOT NULL,
  `numeroExpediente` varchar(255) DEFAULT NULL,
  `idTipoCliente` int NOT NULL,
  `parteActora` varchar(255) NOT NULL,
  `parteDemandada` varchar(255) NOT NULL,
  `cedulaActora` varchar(255) DEFAULT NULL,
  `cedulaDemandada` varchar(255) DEFAULT NULL,
  `idMateria` int NOT NULL,
  `tipoCaso` varchar(255) NOT NULL,
  `idCircuito` int NOT NULL,
  `ubicacionExpediente` varchar(45) NOT NULL,
  `idEstado` int NOT NULL,
  PRIMARY KEY (`idCaso`),
  KEY `FK_CLIENTE_CASO_TIPO_CLIENTE` (`idTipoCliente`),
  KEY `FK__CASO_ABOGADO` (`idAbogado`),
  CONSTRAINT `FK__CASO_ABOGADO` FOREIGN KEY (`idAbogado`) REFERENCES `tbusuario` (`idUsuario`),
  CONSTRAINT `FK_CLIENTE_CASO_TIPO_CLIENTE` FOREIGN KEY (`idTipoCliente`) REFERENCES `tbtipocliente` (`idTipoCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcaso`
--

LOCK TABLES `tbcaso` WRITE;
/*!40000 ALTER TABLE `tbcaso` DISABLE KEYS */;
INSERT INTO `tbcaso` VALUES (10,8,'D-12345',2,'MANUEL','FABIO GERARDO CORELLA DIAZ','','204470866',2,'DESPIDO INJUSTIFICADO',6,'D4',7),(11,8,'C-123456',1,'FABIO GERARDO CORELLA DIAZ','MAYRA GUZMAN','204470866','',2,'DESPIDO INJUSTIFICADO',6,'D4',10),(12,10,'e-12345',1,'FABIO GERARDO CORELLA DIAZ','MAYRA GUZMAN','204470866','',3,'VAR',6,'F5',2);
/*!40000 ALTER TABLE `tbcaso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcircuito`
--

DROP TABLE IF EXISTS `tbcircuito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcircuito` (
  `idCircuito` int NOT NULL AUTO_INCREMENT,
  `nombreCircuito` varchar(255) NOT NULL,
  PRIMARY KEY (`idCircuito`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcircuito`
--

LOCK TABLES `tbcircuito` WRITE;
/*!40000 ALTER TABLE `tbcircuito` DISABLE KEYS */;
INSERT INTO `tbcircuito` VALUES (1,'I Circuito Judicial de San José'),(2,'II Circuito Judicial de San José'),(3,'III Circuito Judicial de San José'),(4,'I Circuito Judicial de la Zona Sur'),(5,'II Circuito Judicial de la Zona Sur'),(6,'I Circuito Judicial de Alajuela'),(7,'II Circuito Judicial de Alajuela'),(8,'III Circuito Judicial de Alajuela'),(9,'Circuito Judicial de Cartago'),(10,'Circuito Judicial de Heredia'),(11,'I Circuito Judicial de Guanacaste'),(12,'II Circuito Judicial de Guanacaste'),(13,'Circuito Judicial de Puntarenas'),(14,'I Circuito Judicial de la Zona Atlántica'),(15,'II Circuito Judicial de la Zona Atlántica'),(16,'Pueblo Ngobe o Guaymi'),(17,'Pueblo Chorotega'),(18,'Pueblo Cabécar'),(19,'Pueblo Bribri'),(20,'Pueblo Brunca o Boruca'),(21,'Pueblo Huetar'),(22,'Pueblo Teribe o Térraba'),(23,'Pueblo Maleuku o Guatuso');
/*!40000 ALTER TABLE `tbcircuito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `idNacionalidad` int NOT NULL,
  `idAbogado` int NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `nombreCompleto` varchar(255) NOT NULL,
  `correoElectronico` varchar(255) DEFAULT NULL,
  `telefono` int NOT NULL,
  `telefonoExtra` int DEFAULT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idCliente`),
  KEY `FK_CLIENTE_NACIONALIDAD` (`idNacionalidad`),
  KEY `FK_CLIENTE_ABOGADO` (`idAbogado`),
  CONSTRAINT `FK_CLIENTE_ABOGADO` FOREIGN KEY (`idAbogado`) REFERENCES `tbusuario` (`idUsuario`),
  CONSTRAINT `FK_CLIENTE_NACIONALIDAD` FOREIGN KEY (`idNacionalidad`) REFERENCES `tbnacionalidad` (`idNacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` VALUES (11,1,8,'204470866','FABIO GERARDO CORELLA DIAZ','fabio@gmail.com',85906846,1,_binary '\0'),(12,1,8,'204540125','CLAUDIA GERALDINA PANIAGUA LOPEZ','claudia@gmail.com',12345678,NULL,_binary ''),(13,1,10,'205480863','GUSTAVO ADOLFO MELENDEZ NAVARRETE','gustavo@gmail.com',11221122,NULL,_binary '');
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tberror`
--

DROP TABLE IF EXISTS `tberror`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tberror` (
  `idError` int NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(8000) NOT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`idError`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tberror`
--

LOCK TABLES `tberror` WRITE;
/*!40000 ALTER TABLE `tberror` DISABLE KEYS */;
INSERT INTO `tberror` VALUES (139,'Incorrect number of arguments for PROCEDURE dblegal.ConsultarEventos; expected 1, got 0','2025-12-17 13:47:52'),(140,'Incorrect number of arguments for PROCEDURE dblegal.ConsultarEventos; expected 1, got 0','2025-12-17 13:48:30'),(141,'Incorrect number of arguments for PROCEDURE dblegal.ConsultarEventos; expected 1, got 0','2025-12-17 13:48:40'),(142,'Incorrect number of arguments for PROCEDURE dblegal.ConsultarEventosSecretaria; expected 1, got 0','2025-12-17 14:03:25'),(143,'Incorrect integer value: \'\' for column \'pIdMateria\' at row 1','2025-12-18 13:43:56'),(144,'Incorrect integer value: \'\' for column \'pIdMateria\' at row 1','2025-12-18 14:57:33'),(145,'Incorrect integer value: \'\' for column \'pIdMateria\' at row 1','2025-12-18 14:58:39'),(146,'Incorrect integer value: \'\' for column \'pIdAbogado\' at row 1','2025-12-19 13:56:35'),(147,'Incorrect number of arguments for PROCEDURE dblegal.ConsultarEstado; expected 1, got 0','2025-12-19 16:01:17'),(148,'Unknown column \'estado\' in \'where clause\'','2025-12-19 16:03:47'),(149,'Unknown column \'estado\' in \'where clause\'','2025-12-25 20:22:36'),(150,'Unknown column \'estado\' in \'where clause\'','2025-12-26 11:15:47'),(151,'Unknown column \'estado\' in \'where clause\'','2025-12-26 11:20:39'),(152,'Incorrect number of arguments for PROCEDURE dblegal.RegistrarCaso; expected 11, got 12','2025-12-30 12:51:35'),(153,'Incorrect integer value: \'DESPIDO INJUSTIFICADO\' for column \'idCaso\' at row 1','2025-12-31 12:53:03');
/*!40000 ALTER TABLE `tberror` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbestado`
--

DROP TABLE IF EXISTS `tbestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbestado` (
  `idEstado` int NOT NULL AUTO_INCREMENT,
  `nombreEstado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbestado`
--

LOCK TABLES `tbestado` WRITE;
/*!40000 ALTER TABLE `tbestado` DISABLE KEYS */;
INSERT INTO `tbestado` VALUES (1,'Iniciado'),(2,'Admitido'),(3,'En proceso'),(4,'En audiencia'),(5,'En espera de resolución'),(6,'Suspendido'),(7,'Apelación'),(8,'Archivado'),(9,'Sentenciado'),(10,'Finalizado');
/*!40000 ALTER TABLE `tbestado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbevento`
--

DROP TABLE IF EXISTS `tbevento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbevento` (
  `idEvento` int NOT NULL AUTO_INCREMENT,
  `idAbogado` int DEFAULT NULL,
  `descripcionEvento` varchar(1000) NOT NULL,
  `fechaHoraEvento` datetime NOT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbevento`
--

LOCK TABLES `tbevento` WRITE;
/*!40000 ALTER TABLE `tbevento` DISABLE KEYS */;
INSERT INTO `tbevento` VALUES (3,8,'Cena Familiar','2025-12-24 20:40:00'),(4,10,'Cena Familiar','2025-12-31 20:53:00'),(5,10,'Cena Novia','2025-12-31 20:53:00');
/*!40000 ALTER TABLE `tbevento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbmaterialegal`
--

DROP TABLE IF EXISTS `tbmaterialegal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbmaterialegal` (
  `idMateriaLegal` int NOT NULL AUTO_INCREMENT,
  `nombreMateria` varchar(255) NOT NULL,
  PRIMARY KEY (`idMateriaLegal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbmaterialegal`
--

LOCK TABLES `tbmaterialegal` WRITE;
/*!40000 ALTER TABLE `tbmaterialegal` DISABLE KEYS */;
INSERT INTO `tbmaterialegal` VALUES (1,'Derecho Civil'),(2,'Derecho Laboral'),(3,'Derecho Penal'),(4,'Derecho de Familia'),(5,'Derecho Corporativo '),(6,'Derecho Comercial'),(7,'Derecho Inmobiliario'),(8,'Derecho Notarial'),(10,'Derecho Administrativo');
/*!40000 ALTER TABLE `tbmaterialegal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbnacionalidad`
--

DROP TABLE IF EXISTS `tbnacionalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbnacionalidad` (
  `idNacionalidad` int NOT NULL AUTO_INCREMENT,
  `nombreNacionalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idNacionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbnacionalidad`
--

LOCK TABLES `tbnacionalidad` WRITE;
/*!40000 ALTER TABLE `tbnacionalidad` DISABLE KEYS */;
INSERT INTO `tbnacionalidad` VALUES (1,'Nacional'),(2,'Extranjero');
/*!40000 ALTER TABLE `tbnacionalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbrol`
--

DROP TABLE IF EXISTS `tbrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbrol` (
  `idRol` int NOT NULL AUTO_INCREMENT,
  `nombreRol` varchar(255) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbrol`
--

LOCK TABLES `tbrol` WRITE;
/*!40000 ALTER TABLE `tbrol` DISABLE KEYS */;
INSERT INTO `tbrol` VALUES (1,'Administrador'),(2,'Abogado'),(3,'Secretaria');
/*!40000 ALTER TABLE `tbrol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbtipocliente`
--

DROP TABLE IF EXISTS `tbtipocliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbtipocliente` (
  `idTipoCliente` int NOT NULL AUTO_INCREMENT,
  `nombreTipoCliente` varchar(255) NOT NULL,
  PRIMARY KEY (`idTipoCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtipocliente`
--

LOCK TABLES `tbtipocliente` WRITE;
/*!40000 ALTER TABLE `tbtipocliente` DISABLE KEYS */;
INSERT INTO `tbtipocliente` VALUES (1,'Parte Actora'),(2,'Parte Demandada');
/*!40000 ALTER TABLE `tbtipocliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `idRol` int DEFAULT '2',
  `cedula` int NOT NULL,
  `nombreCompleto` varchar(255) NOT NULL,
  `correoElectronico` varchar(255) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'1',
  `urlImagen` varchar(255) DEFAULT 'null',
  PRIMARY KEY (`idUsuario`),
  KEY `FK_USUARIO_ROL` (`idRol`),
  CONSTRAINT `FK_USUARIO_ROL` FOREIGN KEY (`idRol`) REFERENCES `tbrol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (8,2,207960874,'BRANDON JOSUE CORELLA SANCHEZ','corellabrandon@gmail.com','$2y$10$4TwfOIzf0TYIqoQ63jTVQOnM0SV8VGD/XchsbRZMzEYScb4f.Eys2',_binary '','../images/FotoPerfil.png'),(9,3,204570854,'CALDERON CAMPOS ROSA MARIA','rosa@gmail.com','$2y$10$yPy5b2pZwJabzQvN3PiHT.2nxJqxK97y4n5NZe/HQeyumTulE4BIS',_binary '','../images/seph.png'),(10,2,207920406,'KALETT JOSUE CERDA OBANDO','kalett@gmail.com','$2y$10$ih8z9FeovvsSAw7qDGAkn.ygrdM/YCGk3/diMSlcYyKVhodFU0s1S',_binary '','null');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dblegal'
--
/*!50003 DROP PROCEDURE IF EXISTS `ActivarCaso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActivarCaso`(
	pIdCaso INT
)
BEGIN
	UPDATE tbcaso
	SET idEstado = 1
    WHERE idCaso = pIdCaso;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActivarCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActivarCliente`(
	pIdCliente INT
)
BEGIN
	UPDATE tbcliente
	SET estado = 1
    WHERE idCliente = pIdCliente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarCaso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarCaso`(
	pIdCaso INT,
    pNumeroExpediente varchar(255),
	pIdMateria int, 
	pTipoCaso varchar(255), 
	pIdCircuito int, 
	pUbicacionExpediente varchar(45), 
	pIdEstado int
)
BEGIN
	UPDATE tbcaso
	SET 
		numeroExpediente = pNumeroExpediente,
		idMateria = pIdMateria, 
		tipoCaso = pTipoCaso, 
		idCircuito = pIdCircuito, 
		ubicacionExpediente = pUbicacionExpediente, 
		idEstado = pIdEstado
    WHERE idCaso = pIdCaso;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarCliente`(
	pIdCliente INT,
    pCorreoElectronico varchar(255) ,
	pTelefono int
)
BEGIN
	UPDATE tbcliente
	SET 
		correoElectronico = pCorreoElectronico,
        telefono = pTelefono
    WHERE idCliente = pIdCliente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarContrasenna` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarContrasenna`(
    pIdUsuario VARCHAR(15),
    pContrasennaGenerada VARCHAR(255)
)
BEGIN
	UPDATE tbUsuario
    SET contrasenna = pContrasennaGenerada
    WHERE idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarMateria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarMateria`(
	pIdMateria INT,
    pNombreMateria varchar(255)
)
BEGIN
	UPDATE tbmaterialegal
	SET nombreMateria = pNombreMateria
    WHERE idMateriaLegal = pIdMateria;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ActualizarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarUsuario`(
	pIdUsuario INT,
    pCorreoElectronico varchar(255) ,
	pImagen VARCHAR(255)
)
BEGIN
	UPDATE tbusuario
	SET 
		correoElectronico = pCorreoElectronico,
        urlImagen = pImagen
    WHERE idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BuscarNombreCedula` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarNombreCedula`(
	pCedula varchar(255)
)
BEGIN
	SELECT
        nombreCompleto
    from tbcliente
    WHERE cedula = pCedula;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarAbogados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarAbogados`()
BEGIN
	SELECT
		idUsuario,
        nombreCompleto
    from tbusuario
    WHERE idRol = 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCantones` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCantones`()
BEGIN
	SELECT
		C.nombreCircuito,
        nombreCanton
    from tbcantones D
    inner join tbcircuito C on D.idCircuito = C.idCircuito;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCasos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCasos`(
	pIdAbogado INT
)
BEGIN
	SELECT
		idCaso,
        numeroExpediente,
        nombreTipoCliente,
        parteActora,
        parteDemandada,
        ubicacionExpediente
    from tbcaso C
    INNER JOIN tbtipocliente T ON C.idTipoCliente = T.idTipoCliente
    WHERE idAbogado = pIdAbogado
    AND idEstado <> 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCasoSecretaria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCasoSecretaria`()
BEGIN
	SELECT
		idCaso,
        numeroExpediente,
        nombreCompleto,
        nombreTipoCliente,
        parteActora,
        parteDemandada,
        ubicacionExpediente
    from tbcaso C
    INNER JOIN tbtipocliente T ON C.idTipoCliente = T.idTipoCliente
    inner join tbusuario U on C.idAbogado = U.idUsuario
    and idEstado <> 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCasosFinalizados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCasosFinalizados`(
	pIdAbogado INT
)
BEGIN
	SELECT
		idCaso,
        numeroExpediente,
        nombreTipoCliente,
        parteActora,
        parteDemandada,
        ubicacionExpediente
    from tbcaso C
    INNER JOIN tbtipocliente T ON C.idTipoCliente = T.idTipoCliente
    WHERE idAbogado = pIdAbogado
    AND idEstado = 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCasosFinalizadosSecretaria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCasosFinalizadosSecretaria`()
BEGIN
	SELECT
		idCaso,
        numeroExpediente,
        nombreCompleto,
        nombreTipoCliente,
        parteActora,
        parteDemandada,
        ubicacionExpediente
    from tbcaso C
    INNER JOIN tbtipocliente T ON C.idTipoCliente = T.idTipoCliente
    inner join tbusuario U on C.idAbogado = U.idUsuario
    and idEstado = 10;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarCircuito` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCircuito`()
BEGIN
	SELECT
		idCircuito,
        nombreCircuito
    from tbcircuito;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarClientePorId` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarClientePorId`(
	pIdCliente INT
)
BEGIN
	SELECT
		idCliente,
        cedula,
        nombreCompleto,
        correoElectronico,
        telefono,
        telefonoExtra
    from tbcliente
    WHERE idCliente = pIdCliente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarClientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarClientes`(
	pIdAbogado INT
)
BEGIN
	SELECT
		idCliente,
        idNacionalidad,
        cedula,
        nombreCompleto,
        correoElectronico,
        telefono,
        telefonoExtra
    from tbcliente
    WHERE estado = 1
    AND idAbogado = pIdAbogado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarClientesEliminados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarClientesEliminados`()
BEGIN
	SELECT
		idCliente,
        idNacionalidad,
        cedula,
        nombreCompleto,
        correoElectronico,
        telefono,
        telefonoExtra
    from tbcliente
    WHERE estado = 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarClientesSecretaria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarClientesSecretaria`()
BEGIN
	SELECT
		C.idCliente,
        C.idNacionalidad,
        C.idAbogado,
        U.nombreCompleto as 'nombreAbogado',
        C.cedula,
        C.nombreCompleto,
        C.correoElectronico,
        C.telefono,
        C.telefonoExtra
    from tbcliente C
    inner join tbusuario U on idUsuario = idAbogado
    WHERE C.estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarEstado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEstado`()
BEGIN
	SELECT
		idEstado,
        nombreEstado
    from tbestado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarEventos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEventos`(
	pIdUsuario INT
)
BEGIN
	SELECT
		descripcionEvento,
        fechaHoraEvento
    from tbevento 
    WHERE idAbogado = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarEventosSecretaria` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEventosSecretaria`()
BEGIN
	SELECT
		U.nombreCompleto,
		descripcionEvento,
        fechaHoraEvento
    from tbevento E
    inner join tbusuario U on U.idUsuario = E.idAbogado;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarMaterias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMaterias`()
BEGIN
	SELECT
		idMateriaLegal,
        nombreMateria
    from tbmaterialegal;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarNacionalidad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarNacionalidad`()
BEGIN
	SELECT
		idNacionalidad,
        nombreNacionalidad
    from tbnacionalidad;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarTipoCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTipoCliente`()
BEGIN
	SELECT
		idTipoCliente,
        nombreTipoCliente
    from tbtipocliente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuario`(
	pIdUsuario INT
)
BEGIN
	SELECT
		idUsuario,
        cedula,
        correoElectronico,
        urlImagen
    from tbusuario
    WHERE estado = 1
    AND idUsuario = pIdUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DetalleCaso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DetalleCaso`(IN pIdCaso INT)
BEGIN
    DECLARE vTipoCliente VARCHAR(100);

    SELECT TP.nombreTipoCliente
    INTO vTipoCliente
    FROM tbcaso C
    INNER JOIN tbtipocliente TP ON C.idTipoCliente = TP.idTipoCliente
    WHERE C.idCaso = pIdCaso;

    IF vTipoCliente = 'Parte Actora' THEN

        SELECT  
            C.idCaso,
            U.nombreCompleto AS abogado,
            C.numeroExpediente,
            TP.nombreTipoCliente,
            CL.cedula,
            CL.nombreCompleto AS cliente,
            CL.correoElectronico,
            CL.telefono,
            CL.telefonoExtra,
            C.parteDemandada,
            M.nombreMateria,
            C.tipoCaso,
            CC.nombreCircuito,
            C.ubicacionExpediente,
            E.nombreEstado
        FROM tbcaso C
        INNER JOIN tbcliente CL ON C.cedulaActora = CL.cedula
        INNER JOIN tbtipocliente TP  ON C.idTipoCliente = TP.idTipoCliente
        INNER JOIN tbmaterialegal M  ON C.idMateria = M.idMateriaLegal
        INNER JOIN tbestado E  ON C.idEstado = E.idEstado
        INNER JOIN tbusuario U ON C.idAbogado = U.idUsuario
        INNER JOIN tbcircuito CC ON C.idCircuito = CC.idCircuito
        WHERE C.idCaso = pIdCaso;

    ELSEIF vTipoCliente = 'Parte Demandada' THEN

        SELECT  
            C.idCaso,
            U.nombreCompleto AS abogado,
            C.numeroExpediente,
            TP.nombreTipoCliente,
            CL.cedula,
            CL.nombreCompleto AS cliente,
            CL.correoElectronico,
            CL.telefono,
            CL.telefonoExtra,
            C.parteActora,
            M.nombreMateria,
            C.tipoCaso,
            CC.nombreCircuito,
            C.ubicacionExpediente,
            E.nombreEstado
        FROM tbcaso C
        INNER JOIN tbcliente CL  ON C.cedulaDemandada = CL.cedula
        INNER JOIN tbtipocliente TP ON C.idTipoCliente = TP.idTipoCliente
        INNER JOIN tbmaterialegal M   ON C.idMateria = M.idMateriaLegal
        INNER JOIN tbestado E  ON C.idEstado = E.idEstado
        INNER JOIN tbusuario U  ON C.idAbogado = U.idUsuario
        INNER JOIN tbcircuito CC ON C.idCircuito = CC.idCircuito
        WHERE C.idCaso = pIdCaso;

    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EliminarCaso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarCaso`(
	pIdCaso INT
)
BEGIN
	UPDATE tbcaso
	SET idEstado = 10
    WHERE idCaso = pIdCaso;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EliminarCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarCliente`(
	pIdCliente INT
)
BEGIN
	UPDATE tbcliente
	SET estado = 0
    WHERE idCliente = pIdCliente;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `IniciarSesion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `IniciarSesion`(
    IN pCorreoElectronico VARCHAR(255)
)
BEGIN
    SELECT 
        idUsuario,
        U.idRol,
        R.nombreRol,
        cedula,
        nombreCompleto,
        correoElectronico,
        contrasenna,
        estado,
        urlImagen
    FROM tbusuario U
    INNER JOIN tbRol R ON U.idRol = R.idRol
    WHERE correoElectronico = pCorreoElectronico
    LIMIT 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ObtenerContrasennaUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerContrasennaUsuario`(
     pIdUsuario INT
)
BEGIN
    SELECT contrasenna
    FROM tbusuario
    WHERE idUsuario = p_idUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCaso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCaso`(
	pIdAbogado int,
	pNumeroExpediente varchar(255) ,
	pIdTipoCliente int ,
	pParteActora varchar(255) ,
	pParteDemandada varchar(255) ,
    pCedulaActora varchar(255),
    pCedulaDemandada varchar(255),
	pIdMateria int ,
	pTipoCaso varchar(255) ,
	pIdCircuito int ,
	pUbicacionExpediente varchar(45) ,
	pIdEstado int
)
BEGIN
	INSERT INTO tbcaso (idAbogado,numeroExpediente,idTipoCliente,parteActora, parteDemandada, cedulaActora, cedulaDemandada, idMateria, tipoCaso, idCircuito, ubicacionExpediente, idEstado)
	VALUES (pIdAbogado, pNumeroExpediente, pIdTipoCliente, pParteActora, pParteDemandada, pCedulaActora, pCedulaDemandada, pIdMateria, pTipoCaso, pIdCircuito, pUbicacionExpediente, pIdEstado);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarCliente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarCliente`(
	pNacionalidad INT,
    pIdAbogado INT,
    pCedula varchar(255),
    pNombreCompleto varchar(255),
    pCorreoElectronico varchar(255),
    pTelefono INT
)
BEGIN
	DECLARE vClienteExistente INT;
    
    SELECT 	COUNT(*) INTO vClienteExistente
    FROM 	tbcliente
    WHERE 	cedula = pCedula 
       OR 	correoElectronico = pCorreoElectronico;

    IF vClienteExistente > 0 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ya existe un cliente con esa identificación o correo electrónico.';
    ELSE
	INSERT INTO tbcliente (idNacionalidad, idAbogado, cedula,nombreCompleto,correoElectronico,telefono)
	VALUES (pNacionalidad, pIdAbogado, pcedula, pNombreCompleto, pCorreoElectronico, pTelefono);
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarError` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarError`(
	pMensaje varchar(8000)
)
BEGIN

	INSERT INTO tberror (Mensaje,FechaHora)
	VALUES (pMensaje, NOW());

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarEvento`(
	pIdAbogado INT,
	pDescripcionEvento varchar(1000),
	pFechaHoraEvento datetime
)
BEGIN
	INSERT INTO tbevento (idAbogado, descripcionEvento, fechaHoraEvento)
	VALUES (pIdAbogado, pDescripcionEvento, pFechaHoraEvento);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RegistrarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuario`(
	pCedula INT(11),
    pNombreCompleto varchar(255),
    pCorreoElectronico varchar(255),
    pContrasenna varchar(255)
)
BEGIN
	DECLARE vCuentaExistente INT;
    
    SELECT 	COUNT(*) INTO vCuentaExistente
    FROM 	tbusuario
    WHERE 	cedula = pCedula 
       OR 	correoElectronico = pCorreoElectronico;

    IF vCuentaExistente > 0 THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ya existe un usuario con esa identificación o correo electrónico.';
    ELSE
	INSERT INTO tbusuario (cedula,nombreCompleto,correoElectronico,contrasenna)
	VALUES (pCedula, pNombreCompleto, pCorreoElectronico, pContrasenna);
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ValidarCorreo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarCorreo`(
    pCorreoElectronico VARCHAR(150)
)
BEGIN
    SELECT 
		idUsuario,
        idRol,
        cedula,
        nombreCompleto,
        correoElectronico,
        contrasenna      
	FROM tbUsuario
    WHERE correoElectronico = pCorreoElectronico
		AND estado = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-31 12:59:27
