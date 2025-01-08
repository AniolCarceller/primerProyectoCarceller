-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bbdd
-- ------------------------------------------------------
-- Server version	8.4.3

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
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `pedido_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ubicacion` varchar(175) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`pedido_id`),
  UNIQUE KEY `pedido_id_UNIQUE` (`pedido_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (29,1,'Martorell',22.97);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_productos`
--

DROP TABLE IF EXISTS `pedidos_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos_productos` (
  `pedido_id` int NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `producto_id` varchar(45) NOT NULL,
  `cantidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_productos`
--

LOCK TABLES `pedidos_productos` WRITE;
/*!40000 ALTER TABLE `pedidos_productos` DISABLE KEYS */;
INSERT INTO `pedidos_productos` VALUES (6,'1','6','1'),(7,'1','10','2'),(8,'1','10','2'),(8,'1','1','1'),(8,'1','4','1'),(9,'1','6','1'),(10,'1','6','1'),(11,'1','6','1'),(12,'1','6','1'),(13,'1','6','1'),(14,'1','6','1'),(16,'1','1','2'),(16,'1','8','2'),(17,'1','2','1'),(17,'1','1','1'),(18,'1','1','1'),(18,'1','2','1'),(19,'1','3','1'),(19,'1','2','1'),(20,'1','1','1'),(20,'1','2','1'),(21,'1','1','1'),(21,'1','2','1'),(21,'1','6','1'),(21,'1','8','1'),(22,'1','3','1'),(22,'1','2','1'),(22,'1','9','1'),(22,'1','8','1'),(23,'1','3','1'),(24,'1','1','1'),(25,'1','3','1'),(26,'1','3','2'),(26,'1','8','2'),(27,'1','3','1'),(28,'1','2','1'),(29,'1','12','1'),(29,'1','2','1'),(29,'1','6','1');
/*!40000 ALTER TABLE `pedidos_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `ingredientes` varchar(500) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `oferta` float DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Pizza','a','a',12.99,'/img/pizza1.png','Pizza',NULL,NULL),(2,'Pizza','a','a',12.99,'/img/pizza2.png','Pizza',NULL,NULL),(3,'Pizza','a','a',12.99,'/img/pizza3.png','Pizza',NULL,NULL),(4,'Pizza','a','a',12.99,'/img/pizza4.png','Pizza',NULL,NULL),(5,'Pizza','a','a',12.99,'/img/pizza5.png','Pizza',NULL,NULL),(6,'Pops de pollo','Bocaditos de pechuga de pollo empanado. Elige tu salsa favorita para dipear.','a',7.99,'/img/racion1.png','Racion',NULL,NULL),(7,'Cheese Bacon Fries','Nuestras patatas con bacon crispy y deliciosa salsa cheddar.','a',7.99,'/img/racion2.png','Racion',NULL,NULL),(8,'Hot Cheddar','Triángulos de queso Cheddar con un toque picante de chile rojo (5uds). Elige tu salsa favorita para dipear.','a',7.99,'/img/racion3.png','Racion',30,'2025-10-10'),(9,'Gouda Rings','Aros de queso Gouda (5 uds). Elige tu salsa favorita para dipear','a',7.99,'/img/racion4.png','Racion',30,'2024-01-01'),(10,'Patatas Grill','Crujientes patatas horneadas. Elige tu salsa preferida para dipear.','a',7.99,'/img/racion5.png','Racion',20,'2024-12-12'),(11,'Cocacola','Bebida gaseosa','a',1.99,'/img/bebida1.png','Bebida',NULL,NULL),(12,'Fanta','Bebida gaseosa','a',1.99,'/img/bebida2.png','Bebida',NULL,NULL),(13,'Agua','Agua refrescante','a',1.99,'/img/bebida3.png','Bebida',NULL,NULL),(14,'Cerveza','Cerveza refrescante','a',1.99,'/img/bebida4.png','Bebida',50,'2026-01-01'),(15,'Cerveza 0,0%','Cerveza refrescante','a',1.99,'/img/bebida5.png','Bebida',NULL,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nombre_apellidos` varchar(105) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Aniol Carceller Morón','aniolcarceller@gmail.com','$2y$10$x9Mb0yXJF14Lb027w40mzuHH2UubFRjKui97oDcVxWE2yo45e7MYm'),(2,'admin','admin@admin.com','$2y$10$x9Mb0yXJF14Lb027w40mzuHH2UubFRjKui97oDcVxWE2yo45e7MYm');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-08 23:21:19
