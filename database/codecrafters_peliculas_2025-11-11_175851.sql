-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: codecrafters
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peliculas` (
  `PeliculaId` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Director` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Duracion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Genero` varchar(75) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `FechaLanzamiento` date NOT NULL,
  `ClasificacionId` int NOT NULL,
  PRIMARY KEY (`PeliculaId`),
  KEY `FK_Peliculas_Clasificaciones_idx` (`ClasificacionId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peliculas`
--

/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES (1,'EL CONJURO 2','SABE','180 MIN','ACCION','2025-09-11',3),(2,'DEMON SLAYER','AKIRA','180 MIN','ACCION ANIME','2025-09-11',1),(3,'JASON POTTER','ALFONSO CUARON','120 MIN','TERROR PSICOLOGICO','2025-10-02',1),(4,'JASON POTTER','ALFONSO CUARON','120 MIN','TERROR PSICOLOGICO','2025-10-02',1),(5,'Inception','Christopher Nolan','148 min','Ciencia ficción','2010-07-16',2);
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-11 17:58:54
