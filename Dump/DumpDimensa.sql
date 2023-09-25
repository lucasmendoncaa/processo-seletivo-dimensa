CREATE DATABASE  IF NOT EXISTS `clientes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `clientes`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: clientes
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `dadosclientes`
--

DROP TABLE IF EXISTS `dadosclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dadosclientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `estadoCivil` varchar(20) NOT NULL,
  `email` varchar(90) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `contatos` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dadosclientes`
--

LOCK TABLES `dadosclientes` WRITE;
/*!40000 ALTER TABLE `dadosclientes` DISABLE KEYS */;
INSERT INTO `dadosclientes` VALUES (1,'01125444455','Tereza Almeida Lopez','1990-07-10','F','Casado','terezinha_al@gmail.com','Cataguases','Avenida Paulista',789,'Jardim Colorado','14444444444,     19876543210,     15551234567'),(3,'77785423458','Pedro Paulo Moreira','1988-03-06','M','solteiro','','Leopoldina','Avenida Atlântica',456,'Centro',''),(4,'77845699825','Lucio Rodrigues Lopez','1984-10-27','','solteiro','lucio@gmail.com','Vila Velha','Cataguases',6,'Jardim Colorado','14444444444, 19876543210, 15551234567'),(5,'77745865241','Lucas Silveira','1998-05-04','M','solteiro','lucas@gmail.com','Belo Horizonte','Rua da Bahia',789,'Savassi','14444444444, 19876543210, 15551234567'),(6,'12248755568','Eduarda Medeiros de Souza','1999-10-15','F','solteiro','duda@gmail.com','Leopoldina','Rua Padre Chagas',34,'Moinhos de Vento','14444444444, 19876543210, 15551234567'),(9,'14785236985','José da Manga','1948-01-24','M','divorciado','zezemanga@gmail.com','Mangueira','Rua das Mangas',2424,'Manga','24924247070');
/*!40000 ALTER TABLE `dadosclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CPF` varchar(15) NOT NULL,
  `DataPedido` date NOT NULL,
  `ValorTotal` decimal(10,2) NOT NULL,
  `Pedido` varchar(100) NOT NULL,
  `clientespedidos` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `clientespedidos` (`clientespedidos`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`clientespedidos`) REFERENCES `dadosclientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (9,'77845699825','2023-01-15',1150.00,'Refinanciamento',4),(10,'12248755568','2023-02-20',2500.00,'Refinanciamento',6),(11,'77785423458','2023-03-10',1080.00,'Consignado',3),(12,'01125444455','2023-04-05',3500.00,'Consignado',1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-25 15:06:03
