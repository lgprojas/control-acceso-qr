-- MySQL dump 10.13  Distrib 5.5.32, for Win32 (x86)
--
-- Host: localhost    Database: covecino
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `act_extra`
--

DROP TABLE IF EXISTS `act_extra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `act_extra` (
  `Id_actext` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_actext` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_actext`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `act_extra`
--

LOCK TABLES `act_extra` WRITE;
/*!40000 ALTER TABLE `act_extra` DISABLE KEYS */;
INSERT INTO `act_extra` VALUES (1,'Visita amistad'),(2,'Visita familiar'),(3,'Trabajo particular vivienda'),(4,'Trabajador Condominio'),(5,'Proveedor Gas'),(6,'Proveedor Cable/internet'),(7,'Delivery');
/*!40000 ALTER TABLE `act_extra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `Id_act` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_act` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_act`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES (1,'Ninguna'),(2,'Trabajador condominio'),(3,'Integrante comit√©'),(4,'Proveedor externo');
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calle_block`
--

DROP TABLE IF EXISTS `calle_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calle_block` (
  `Id_cb` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_cb` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_cb`),
  KEY `Id_cond` (`Id_cond`),
  CONSTRAINT `calle_block_ibfk_1` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calle_block`
--

LOCK TABLES `calle_block` WRITE;
/*!40000 ALTER TABLE `calle_block` DISABLE KEYS */;
INSERT INTO `calle_block` VALUES (1,'Torre A',1),(2,'Torre B',1),(3,'Torre C',1),(4,'Torre D',1),(5,'Torre E',1),(6,'Torre F',1),(7,'Torre G',1),(8,'Torre H',1),(9,'Torre I',1),(10,'Bloque 1',2),(11,'Bloque 2',2);
/*!40000 ALTER TABLE `calle_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `Id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_cargo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `Id_ciu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_ciu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_ciu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'La Serena'),(2,'Coquimbo');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condominio`
--

DROP TABLE IF EXISTS `condominio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condominio` (
  `Id_cond` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_cond` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dir_cond` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_inm` int(11) NOT NULL,
  `Id_ciu` int(11) NOT NULL,
  PRIMARY KEY (`Id_cond`),
  KEY `fk_condominio_inmobiliaria1_idx` (`Id_inm`),
  KEY `fk_condominio_ciudad1_idx` (`Id_ciu`),
  CONSTRAINT `fk_condominio_ciudad1` FOREIGN KEY (`Id_ciu`) REFERENCES `ciudad` (`Id_ciu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_condominio_inmobiliaria1` FOREIGN KEY (`Id_inm`) REFERENCES `inmobiliaria` (`Id_inm`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condominio`
--

LOCK TABLES `condominio` WRITE;
/*!40000 ALTER TABLE `condominio` DISABLE KEYS */;
INSERT INTO `condominio` VALUES (1,'Aires de La Florida','Avenida Arauco 5440',1,1),(2,'Marina 1','Regimiento Arica 301',2,1);
/*!40000 ALTER TABLE `condominio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condominio_empleado`
--

DROP TABLE IF EXISTS `condominio_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condominio_empleado` (
  `Id_cond` int(11) NOT NULL,
  `Id_emp` int(11) NOT NULL,
  `Fch_ini` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`Id_cond`,`Id_emp`),
  KEY `fk_condominio_has_empleado_empleado1_idx` (`Id_emp`),
  KEY `fk_condominio_has_empleado_condominio1_idx` (`Id_cond`),
  KEY `fk_condominio_empleado_cargo1_idx` (`Id_cargo`),
  CONSTRAINT `fk_condominio_empleado_cargo1` FOREIGN KEY (`Id_cargo`) REFERENCES `cargo` (`Id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_condominio_has_empleado_condominio1` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_condominio_has_empleado_empleado1` FOREIGN KEY (`Id_emp`) REFERENCES `empleado` (`Id_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condominio_empleado`
--

LOCK TABLES `condominio_empleado` WRITE;
/*!40000 ALTER TABLE `condominio_empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `condominio_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_cond`
--

DROP TABLE IF EXISTS `config_cond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_cond` (
  `Id_cc` int(11) NOT NULL AUTO_INCREMENT,
  `Id_cond` int(11) NOT NULL,
  `Id_tv` int(11) NOT NULL,
  PRIMARY KEY (`Id_cc`),
  KEY `Id_cond` (`Id_cond`,`Id_tv`),
  KEY `Id_tv` (`Id_tv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_cond`
--

LOCK TABLES `config_cond` WRITE;
/*!40000 ALTER TABLE `config_cond` DISABLE KEYS */;
INSERT INTO `config_cond` VALUES (1,1,2),(2,2,2);
/*!40000 ALTER TABLE `config_cond` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `Id_emp` int(11) NOT NULL AUTO_INCREMENT,
  `Rut_emp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nom1_emp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nom2_emp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ape1_emp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ape2_emp` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta` (
  `Id_encu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_encu` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fchi_encu` date NOT NULL,
  `Fcht_encu` date DEFAULT NULL,
  `Id_cond` int(11) NOT NULL,
  `Id_estencu` int(11) NOT NULL,
  PRIMARY KEY (`Id_encu`),
  KEY `fk_encuesta_condominio1_idx` (`Id_cond`),
  KEY `Id_estencu` (`Id_estencu`),
  CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `encuesta_ibfk_2` FOREIGN KEY (`Id_estencu`) REFERENCES `est_encu` (`Id_estencu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
INSERT INTO `encuesta` VALUES (1,'¬øDesea cicletero?','2018-02-08','2018-02-12',1,1),(2,'¬øDesea contratar jardinero?','2018-02-08','2018-02-15',2,2),(3,'¬øDesea quincho?','2018-02-08','0000-00-00',1,1);
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `est_encu`
--

DROP TABLE IF EXISTS `est_encu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_encu` (
  `Id_estencu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_estencu` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_estencu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_encu`
--

LOCK TABLES `est_encu` WRITE;
/*!40000 ALTER TABLE `est_encu` DISABLE KEYS */;
INSERT INTO `est_encu` VALUES (1,'Activada'),(2,'Desactivada');
/*!40000 ALTER TABLE `est_encu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `est_resi`
--

DROP TABLE IF EXISTS `est_resi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_resi` (
  `Id_estre` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_estre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_estre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Residencia en el condominio';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_resi`
--

LOCK TABLES `est_resi` WRITE;
/*!40000 ALTER TABLE `est_resi` DISABLE KEYS */;
INSERT INTO `est_resi` VALUES (1,'Residente'),(2,'No residente');
/*!40000 ALTER TABLE `est_resi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `est_usu`
--

DROP TABLE IF EXISTS `est_usu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_usu` (
  `Id_estusu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_estusu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_estusu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_usu`
--

LOCK TABLES `est_usu` WRITE;
/*!40000 ALTER TABLE `est_usu` DISABLE KEYS */;
INSERT INTO `est_usu` VALUES (1,'Activado'),(2,'Desactivado');
/*!40000 ALTER TABLE `est_usu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estacionamiento`
--

DROP TABLE IF EXISTS `estacionamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estacionamiento` (
  `Id_esta` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_esta` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_esta`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estacionamiento`
--

LOCK TABLES `estacionamiento` WRITE;
/*!40000 ALTER TABLE `estacionamiento` DISABLE KEYS */;
INSERT INTO `estacionamiento` VALUES (1,'01'),(2,'02'),(3,'03'),(4,'04'),(5,'05'),(6,'06'),(7,'07'),(8,'08'),(9,'09'),(10,'10'),(11,'11'),(12,'12'),(13,'13'),(14,'14');
/*!40000 ALTER TABLE `estacionamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestor_cond`
--

DROP TABLE IF EXISTS `gestor_cond`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestor_cond` (
  `Id_acond` int(11) NOT NULL AUTO_INCREMENT,
  `Id_usu` int(11) NOT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_acond`),
  KEY `Id_usu` (`Id_usu`,`Id_cond`),
  KEY `Id_cond` (`Id_cond`),
  CONSTRAINT `gestor_cond_ibfk_1` FOREIGN KEY (`Id_usu`) REFERENCES `usuario` (`Id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `gestor_cond_ibfk_2` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestor_cond`
--

LOCK TABLES `gestor_cond` WRITE;
/*!40000 ALTER TABLE `gestor_cond` DISABLE KEYS */;
INSERT INTO `gestor_cond` VALUES (2,22,1);
/*!40000 ALTER TABLE `gestor_cond` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacion`
--

DROP TABLE IF EXISTS `informacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informacion` (
  `Id_info` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_info` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `Desc_info` text COLLATE utf8_spanish_ci NOT NULL,
  `Fch_info` date NOT NULL,
  `Fch_cinfo` date DEFAULT NULL,
  `Fch_tinfo` date DEFAULT NULL,
  `Adj_info` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_usu` int(11) NOT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion`
--

LOCK TABLES `informacion` WRITE;
/*!40000 ALTER TABLE `informacion` DISABLE KEYS */;
INSERT INTO `informacion` VALUES (1,'Se cita a reuni√≥n al condominio 20-03-20188','Estimad@s\\\\r\\\\n\\\\r\\\\nEste correo electr√≥nico tiene como objetivo informar a usted de las propuestas de cambio de administraci√≥n, las cuales fueron seleccionadas por el comit√© y se ajustan de mejor manera a los requerimientos de nuestro condominio.\\\\r\\\\n\\\\r\\\\nDentro de los criterios que se consideraron para su selecci√≥n se encuentran:\\\\r\\\\n\\\\r\\\\n    Experiencia\\\\r\\\\n    Precio\\\\r\\\\n    Capacidad de resoluci√≥n de imprevistos \\\\r\\\\n    Apoyo en la b√∫squeda de reemplazos de conserjes en caso de alg√∫n inconveniente.\\\\r\\\\n\\\\r\\\\nCabe destacar que esta informaci√≥n es enviada para que usted pueda tomar una decisi√≥n y luego firmar su elecci√≥n en el respectivo registro. Durante el presente fin de semana, se realizar√° un puerta a puerta, solicitando su votaci√≥n, donde debe presentar su carnet para hacer valida su elecci√≥n.\\\\r\\\\n\\\\r\\\\n*Las cotizaciones que se presentan, incluyen el pago del servicio de electricidad adeudado durante el a√±o 2017 dividido en 10 cuotas para los propietarios que se encuentran al d√≠a en el pago de los gastos comunes.\\\\r\\\\n* Los valores indicados, son propuestas aproximadas.\\\\r\\\\n\\\\r\\\\n\\\\r\\\\nIMPORTANTE:\\\\r\\\\n\\\\r\\\\n¬øQui√©nes podr√°n votar?\\\\r\\\\n\\\\r\\\\nEstar√°n habilitadas para votar exclusivamente las personas que se encuentren al d√≠a en el pago de los gastos comunes hasta el d√≠a 18 de Marzo, 2018.\\\\r\\\\n\\\\r\\\\nEn caso de no encontrarse el propietario, podr√° dejar un poder simple con la copia del carnet  autorizando a la persona.','2018-03-15','2018-03-17','2018-03-31',NULL,1,2),(2,'Da√±√≥ motor port√≥n acceso condominio','Estimad@ \\\\r\\\\n\\\\r\\\\nEste correo electr√≥nico tiene como objetivo informar a usted de las propuestas de cambio de administraci√≥n, las cuales fueron seleccionadas por el comit√© y se ajustan de mejor manera a los requerimientos de nuestro condominio.\\\\r\\\\n\\\\r\\\\nDentro de los criterios que se consideraron para su selecci√≥n se encuentran:','2018-03-15','2018-03-15','2018-03-30',NULL,13,1),(4,'Informativo','Descripci√≥n','2018-03-17','2018-03-17','2018-03-31','info_Validar-StartUML_20180318060423.pdf',13,2),(5,'Ejemplo1','hola\r\ndesde\r\n\r\nun ejemplo','2018-04-10','2018-04-10','2018-04-18',NULL,12,1),(6,'Primer informativo','Se solicita a reuni√≥n a los copropietarios para el d√≠a 28 de Mayo del presente a√±o 2018. Favor confirmar asistencia.','2018-05-16','2018-05-16','2018-05-28',NULL,22,1);
/*!40000 ALTER TABLE `informacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inmobiliaria`
--

DROP TABLE IF EXISTS `inmobiliaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inmobiliaria` (
  `Id_inm` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_inm` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nom_inm` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_inm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inmobiliaria`
--

LOCK TABLES `inmobiliaria` WRITE;
/*!40000 ALTER TABLE `inmobiliaria` DISABLE KEYS */;
INSERT INTO `inmobiliaria` VALUES (1,'C0001','Habita'),(2,'C0002','Santa Beatriz');
/*!40000 ALTER TABLE `inmobiliaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_encuesta`
--

DROP TABLE IF EXISTS `item_encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_encuesta` (
  `Id_iencu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_iencu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Adj_iencu` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_encu` int(11) NOT NULL,
  PRIMARY KEY (`Id_iencu`),
  KEY `fk_item_encuesta_encuesta1_idx` (`Id_encu`),
  CONSTRAINT `fk_item_encuesta_encuesta1` FOREIGN KEY (`Id_encu`) REFERENCES `encuesta` (`Id_encu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_encuesta`
--

LOCK TABLES `item_encuesta` WRITE;
/*!40000 ALTER TABLE `item_encuesta` DISABLE KEYS */;
INSERT INTO `item_encuesta` VALUES (2,'No',NULL,1),(3,'S√≠',NULL,1),(4,'S√≠','ejemplo-examen.pdf',2),(5,'No','ejemplo.pdf',2),(7,'Ninguno',NULL,1);
/*!40000 ALTER TABLE `item_encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_reunion`
--

DROP TABLE IF EXISTS `item_reunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_reunion` (
  `Id_ireu` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_ireu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_reu` int(11) NOT NULL,
  PRIMARY KEY (`Id_ireu`),
  KEY `fk_item_reunion_reunion1_idx` (`Id_reu`),
  CONSTRAINT `fk_item_reunion_reunion1` FOREIGN KEY (`Id_reu`) REFERENCES `reunion` (`Id_reu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_reunion`
--

LOCK TABLES `item_reunion` WRITE;
/*!40000 ALTER TABLE `item_reunion` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_reunion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `Id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_marca` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (2,'AGRALE'),(3,'ALFA ROMEO'),(4,'AUDI'),(5,'BMW'),(6,'CHERY'),(7,'CHEVROLET'),(8,'CHRYSLER'),(9,'CITROEN'),(10,'DACIA'),(11,'DAEWO'),(12,'DAIHATSU'),(13,'DODGE'),(14,'FERRARI'),(15,'FIAT'),(16,'FORD'),(17,'GALLOPER'),(18,'HEIBAO'),(19,'HONDA'),(20,'HYUNDAI'),(21,'ISUZU'),(22,'JAGUAR'),(23,'JEEP'),(24,'KIA'),(25,'LADA'),(26,'LAND ROVER'),(27,'LEXUS'),(28,'MASERATI'),(29,'MAZDA'),(30,'MERCEDES BENZ'),(31,'MG'),(32,'MINI'),(33,'MITSUBISHI'),(34,'NISSAN'),(35,'PEUGEOT'),(36,'PORSCHE'),(37,'RAM'),(38,'RENAULT'),(39,'ROVER'),(40,'SAAB'),(41,'SEAT'),(42,'SMART'),(43,'SSANGYONG'),(44,'SUBARU'),(45,'SUZUKI'),(46,'TATA'),(47,'TOYOTA'),(48,'VOLKSWAGEN'),(49,'VOLVO');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `Id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_modelo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Id_marca` int(11) NOT NULL,
  PRIMARY KEY (`Id_modelo`),
  KEY `Id_marca` (`Id_marca`),
  KEY `Id_marca_2` (`Id_marca`),
  CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`Id_marca`) REFERENCES `marca` (`Id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=400 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (2,'MARRUA',2),(3,'147',3),(4,'156',3),(5,'159',3),(6,'166',3),(7,'BRERA',3),(8,'GIULIETTA',3),(9,'GT',3),(10,'GTV',3),(11,'MITO',3),(12,'SPIDER',3),(13,'A1',4),(14,'A3',4),(15,'A4',4),(16,'A5',4),(17,'A6',4),(18,'A7',4),(19,'A8',4),(20,'ALLROAD',4),(21,'Q3',4),(22,'Q5',4),(23,'Q7',4),(24,'R8',4),(25,'TT',4),(26,'SERIE1',5),(27,'SERIE3',5),(28,'SERIE5',5),(29,'SERIE6',5),(30,'SERIE7',5),(31,'X1',5),(32,'X3',5),(33,'X5',5),(34,'X6',5),(35,'Z3',5),(36,'Z4',5),(37,'FACE',6),(38,'FULWIN',6),(39,'QQ',6),(40,'SKIN',6),(41,'TIGGO',6),(42,'AGILE',7),(43,'ASTRA',7),(44,'ASTRA II',7),(45,'AVALANCHE',7),(46,'AVEO',7),(47,'BLAZER',7),(48,'CAMARO',7),(49,'CAPTIVA',7),(50,'CELTA',7),(51,'CLASSIC',7),(52,'COBALT',7),(53,'CORSA',7),(54,'CORSA CLASSIC',7),(55,'CORSA II',7),(56,'CORVETTE',7),(57,'CRUZE',7),(58,'MERIVA',7),(59,'MONTANA',7),(60,'ONIX',7),(61,'PRISMA',7),(62,'VECTRA',7),(63,'S-10',7),(64,'SILVERADO',7),(65,'SONIC',7),(66,'SPARK',7),(67,'SPIN',7),(68,'TRACKER',7),(69,'TRAILBLAZER',7),(70,'ZAFIRA',7),(71,'300',8),(72,'CARAVAN',8),(73,'TOWN & COUNTRY',8),(74,'GRAND CARAVAN',8),(75,'CROSSFIRE',8),(76,'NEON',8),(77,'PT CRUISER',8),(78,'SEBRIG',8),(79,'BERLINGO',9),(80,'C3',9),(81,'C3 AIRCROSS',9),(82,'C3 PICASSO',9),(83,'C4 AIRCROSS',9),(84,'C4 LOUNGE',9),(85,'C4 PICASSO',9),(86,'C4 GRAND PICASSO',9),(87,'C5',9),(88,'C6',9),(89,'DS3',9),(90,'DS4',9),(91,'C15',9),(92,'JUMPER',9),(93,'SAXO',9),(94,'XSARA',9),(95,'XSARA PICASSO',9),(96,'PICK-UP',10),(97,'LANOS',11),(98,'LEGANZA',11),(99,'NUBIRA',11),(100,'MATIZ',11),(101,'TACUMA',11),(102,'DAMAS',11),(103,'LABO',11),(104,'MOVE',12),(105,'ROCKY',12),(106,'SIRION',12),(107,'TERIOS',12),(108,'MIRA',12),(109,'JOURNEY',13),(110,'RAM',13),(111,'360',14),(112,'430',14),(113,'456',14),(114,'575',14),(115,'599',14),(116,'612',14),(117,'CALIFORNIA',14),(118,'SUPERAMERICA',14),(119,'500',15),(120,'BRAVA',15),(121,'BRAVO',15),(122,'DOBLO',15),(123,'DUCATO',15),(124,'FIORINO',15),(125,'FIORINO QUBO',15),(126,'IDEA',15),(127,'LINEA',15),(128,'MAREA',15),(129,'PALIO',15),(130,'PALIO ADVENTURE',15),(131,'PUNTO',15),(132,'QUBO',15),(133,'SIENA',15),(134,'GRAND SIENA',15),(135,'STILO',15),(136,'STRADA',15),(137,'UNO',15),(138,'UNO EVO',15),(139,'COURIER',16),(140,'ECOSPORT',16),(141,'ECOSPORT KD',16),(142,'ESCAPE',16),(143,'F100',16),(144,'FIESTA KD',16),(145,'FIESTA',16),(146,'FOCUS',16),(147,'FOCUS III',16),(148,'KA',16),(149,'KUGA',16),(150,'MONDEO',16),(151,'RANGER',16),(152,'S-MAX',16),(153,'TRANSIT',16),(154,'EXCEED',17),(155,'HB',18),(156,'ACCORD',19),(157,'CITY',19),(158,'CIVIC',19),(159,'CRV',19),(160,'FIT',19),(161,'HRV',19),(162,'LEGEND',19),(163,'PILOT',19),(164,'STREAM',19),(165,'ACCENT',20),(166,'ATOS PRIME',20),(167,'COUPE',20),(168,'ELANTRA',20),(169,'I 10',20),(170,'I 30',20),(171,'MATRIX',20),(172,'SANTA FE',20),(173,'SONATA',20),(174,'TERRACAN',20),(175,'TRAJET',20),(176,'TUCSON',20),(177,'VELOSTER',20),(178,'VERACRUZ',20),(179,'AMIGO',21),(180,'PICK-UP CABIAN SIMPLE',21),(181,'PICK-UP SPACE CAB',21),(182,'PICK-UP CABINA DOBLE',21),(183,'TROOPER',21),(184,'X-TYPE',22),(185,'XF',22),(186,'F-TYPE',22),(187,'S-TYPE',22),(188,'XJ',22),(189,'XK',22),(190,'CHEROKEE',23),(191,'COMPASS',23),(192,'GRAND CHEROKEE',23),(193,'PATRIOT',23),(194,'WRANGLER',23),(195,'CARENS',24),(196,'CARNIVAL',24),(197,'CERATO',24),(198,'MAGENTIS',24),(199,'MOHAVE',24),(200,'OPIRUS',24),(201,'PICANTO',24),(202,'RIO',24),(203,'RONDO',24),(204,'SPORTAGE',24),(205,'GRAND SPORTAGE',24),(206,'SORENTO',24),(207,'SOUL',24),(208,'PREGIO',24),(209,'AFALINA',25),(210,'SAMARA',25),(211,'DEFENDER',26),(212,'DISCOVERY',26),(213,'FREELANDER',26),(214,'RANGE ROVER',26),(215,'LS',27),(216,'GS',27),(217,'IS',27),(218,'QUATTROPORTE',28),(219,'COUPE',28),(220,'GRAND TURISMO',28),(221,'SPYDER',28),(222,'323',29),(223,'626',29),(224,'MPV',29),(225,'B 2500',29),(226,'B 2900',29),(227,'AMG',30),(228,'CLASE A',30),(229,'CLASE B',30),(230,'CLASE C',30),(231,'CLASE CL',30),(232,'CLASE CLA',30),(233,'CLASE CLC',30),(234,'CLASE CLK',30),(235,'CLASE CLS',30),(236,'CLASE E',30),(237,'CLASE G',30),(238,'CLASE GL',30),(239,'CLASE ML',30),(240,'CLASE S',30),(241,'CLASE SL',30),(242,'CLASE SLK',30),(243,'VIANO',30),(244,'MGF',31),(245,'COOPER',32),(246,'CANTER',33),(247,'L-200',33),(248,'LANCER',33),(249,'MONTERO',33),(250,'NATIVA',33),(251,'OUTLANDER',33),(252,'350',34),(253,'370Z',34),(254,'PATHFINDER',34),(255,'FRONTIER',34),(256,'MARCH',34),(257,'MURANO',34),(258,'NP300',34),(259,'PICK-UP',34),(260,'SENTRA',34),(261,'TEANA',34),(262,'TERRANO II',34),(263,'TIIDA',34),(264,'VERSA',34),(265,'X-TERRA',34),(266,'X-TRAIL',34),(267,'106',35),(268,'206',35),(269,'207',35),(270,'208',35),(271,'306',35),(272,'307',35),(273,'308',35),(274,'3008',35),(275,'405',35),(276,'406',35),(277,'407',35),(278,'408',35),(279,'4008',35),(280,'508',35),(281,'5008',35),(282,'607',35),(283,'806',35),(284,'807',35),(285,'RCZ',35),(286,'EXPERT',35),(287,'HOGGAR',35),(288,'PARTNER',35),(289,'BOXER',35),(290,'911',36),(291,'BOXSTER',36),(292,'CAYENNE',36),(293,'CAYMAN',36),(294,'PANAMERA',36),(295,'1500',37),(296,'2500',37),(297,'CLIO MIO',38),(298,'CLIO L/NUEVA',38),(299,'CLIO 2',38),(300,'DUSTER',38),(301,'FLUENCE',38),(302,'KANGOO',38),(303,'KANGOO FURGON',38),(304,'KOLEOS',38),(305,'LAGUNA',38),(306,'LATITUDE',38),(307,'LOGAN',38),(308,'MEGANE',38),(309,'MEGANE II',38),(310,'MEGANE III',38),(311,'SANDERO',38),(312,'SANDERO STEPWAY',38),(313,'SCENIC',38),(314,'SYMBOL',38),(315,'TWINGO',38),(316,'TRAFIC',38),(317,'MASTER',38),(318,'LINEA 25',39),(319,'LINEA 45',39),(320,'LINEA 75',39),(321,'LINEA 9.3',39),(322,'LINEA 9.5',39),(323,'ALHAMBRA',40),(324,'ALTEA',40),(325,'CORDOBA',40),(326,'IBIZA',40),(327,'INCA FURGON',40),(328,'LEON',40),(329,'TOLEDO',40),(330,'FORTWO',41),(331,'ACTYON',42),(332,'KORANDO',42),(333,'KYRON',42),(334,'ISTANA',42),(335,'MUSSO',42),(336,'REXTON',42),(337,'STAVIC',42),(338,'IMPREZA',43),(339,'LEGACY',43),(340,'OUTBACK',43),(341,'TRIBECA',43),(342,'XV',43),(343,'FORESTER',43),(344,'FUN',44),(345,'GRAND VITARA',44),(346,'SWIFT',44),(347,'JIMNY',44),(348,'207 TELCOLINE',45),(349,'SUMO',46),(350,'86',47),(351,'AVENSIS',47),(352,'CAMRY',47),(353,'COROLLA',47),(354,'CORONA',47),(355,'ETIOS',47),(356,'ETIOS CROSS',47),(357,'HILUX',47),(358,'LAND CRUISER',47),(359,'PRIUS',47),(360,'RAV 4',47),(361,'AMAROK',48),(362,'BORA',48),(363,'CADDY',48),(364,'CROSSFOX',48),(365,'FOX',48),(366,'GOL',48),(367,'GOL TREND',48),(368,'GOLF',48),(369,'MULTIVAN',48),(370,'THE BEETLE',48),(371,'NEW BEETLE',48),(372,'PASSAT',48),(373,'CC',48),(374,'POLO',48),(375,'SANTANA',48),(376,'SAVEIRO',48),(377,'SCIROCCO',48),(378,'SHARAN',48),(379,'SURAN',48),(380,'TIGUAN',48),(381,'TOUAREG',48),(382,'TRANSPORTER',48),(383,'UP',48),(384,'VENTO',48),(385,'VOYAGE',48),(386,'C30',49),(387,'C70',49),(388,'S40',49),(389,'S60',49),(390,'S80',49),(391,'V40',49),(392,'V50',49),(393,'V60',49),(394,'V70',49),(395,'XC60',49),(396,'XC70',49),(397,'XC90',49),(398,'SPARK GT',7),(399,'YARIS',47);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso` (
  `Id_perm` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_perm` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Key_perm` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_perm`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso`
--

LOCK TABLES `permiso` WRITE;
/*!40000 ALTER TABLE `permiso` DISABLE KEYS */;
INSERT INTO `permiso` VALUES (1,'1 Ver lista usuarios','ver_usu'),(2,'1 Crear usuario','crear_usu'),(3,'1 Editar usuario','editar_usu'),(4,'1 Editar permisos usuario','editar_perm_usu'),(5,'2 Ver lista permisos','ver_perm'),(6,'2 Crear permiso','crear_perm'),(7,'2 Editar permiso','editar_perm'),(8,'3 Ver lista roles','ver_roles'),(9,'3 Crear role','crear_role'),(10,'3 Editar role','editar_role'),(11,'3 Editar permisos role','editar_perm_role'),(12,'400 Ver lista inmobiliarias','ver_inm'),(13,'400 Crear inmobiliaria','crear_inm'),(14,'400 Editar inmobiliaria','editar_inm'),(15,'400 Eliminar inmobiliaria','elim_inm'),(16,'401 Ver lista condominios','ver_cond'),(17,'401 Crear condominio','crear_cond'),(18,'401 Editar condominio','editar_cond'),(19,'401 Eliminar condominio','elim_cond'),(20,'402 Ver lista calle/block','ver_cb'),(21,'402 Crear calle/block','crear_cb'),(22,'402 Editar calle/block','editar_cb'),(23,'402 Eliminar calle/block','elim_cb'),(24,'403 Ver lista marcas','ver_marca'),(25,'403 Crear marca','crear_marca'),(26,'403 Editar marca','editar_marca'),(27,'403 Eliminar marca','elim_marca'),(28,'404 Ver lista modelos','ver_modelo'),(29,'404 Crear modelo','crear_modelo'),(30,'404 Editar modelo','editar_modelo'),(31,'404 Eliminar modelo','elim_modelo'),(32,'500 Ver lista personas','ver_per'),(33,'500 Crear persona','crear_per'),(34,'500 Editar persona','editar_per'),(35,'500 Eliminar persona','elim_per'),(36,'501 Ver lista viviendas','ver_viv'),(37,'501 Crear vivienda','crear_viv'),(38,'501 Editar vivienda','editar_viv'),(39,'501 Eliminar vivienda','elim_viv'),(40,'502 Ver lista veh√≠culos','ver_vehi'),(41,'502 Crear veh√≠culo','crear_vehi'),(42,'502 Editar veh√≠culo','editar_vehi'),(43,'502 Eliminar veh√≠culo','elim_vehi'),(44,'600 Buscar por Patente','bus_pat'),(45,'601 Buscar RUN','bus_run'),(46,'602 Buscar vivienda','bus_viv'),(47,'503 Ver lista encuestas','ver_encu'),(48,'503 Crear encuesta','crear_encu'),(49,'503 Editar encuesta','editar_encu'),(50,'503 Eliminar encuesta','elim_encu'),(51,'503 Editar estado encuesta','edit_est_encu'),(52,'503 Ver votos encuesta','ver_votos_encu'),(53,'503 Ver lista √≠tems encuesta','ver_items'),(54,'503 Crear √≠tem encuesta','crear_item'),(55,'503 Editar √≠tem','editar_item'),(56,'503 Eliminar √≠tem','elim_item'),(57,'700 Ver lista info','ver_infos'),(58,'700 Crear informativo','crear_info'),(59,'700 Editar informativo','editar_info'),(60,'700 Eliminar informativo','elim_info'),(61,'700 Ver informativo','ver_info'),(62,'701 Ver lista encuestas mc','ver_encu_mc'),(63,'701 Votar encuesta mc','votar_encu_mc'),(64,'401 Editar Config Condominio','editar_conf_cond'),(65,'500 Asociar viv a persona','asoc_viv_per'),(66,'500 Asociar vehi a persona','asoc_vehi_per'),(67,'800 Ver historial visita','hist_ver_visita'),(68,'1 Eliminar Usuario','elim_usu'),(69,'603 Buscar Avanzado','bus_avanz');
/*!40000 ALTER TABLE `permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `Id_per` int(11) NOT NULL AUTO_INCREMENT,
  `Rut_per` blob,
  `Nom1_per` blob,
  `Nom2_per` blob,
  `Ape1_per` blob,
  `Ape2_per` blob,
  `Fono_per` blob,
  `Fch_per` date DEFAULT NULL,
  `Id_estre` int(11) NOT NULL,
  `Id_cond` int(11) DEFAULT NULL,
  `Id_act` int(11) NOT NULL,
  PRIMARY KEY (`Id_per`),
  KEY `fk_persona_tipo_per1_idx` (`Id_estre`),
  KEY `Id_cond` (`Id_cond`),
  KEY `Id_act` (`Id_act`),
  KEY `Id_act_2` (`Id_act`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`Id_act`) REFERENCES `actividad` (`Id_act`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`Id_estre`) REFERENCES `est_resi` (`Id_estre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'ÂNøÔd.Ûº£ÿÏ†ìR Ü','ê?ü,À ¢íh>–∞ö\r','˝ﬁ€~©VMˇÿ€@µˆ','/\n≥iﬁiÃÕ˘oâı=ˆî','ÊÒ^˝˜Îˆ\Z¸∏çK(C',' ßÃ[¢ﬁÃIÌEÅ∑A','2017-10-10',1,1,1),(3,'5¸|ï°+ëæAM§q','•ì‘óyóÔ©î.‡ÚH¸ ','zÿsè∂Èä‘û=◊\\P\\¢R','F:ÿµ BY8qtI®Õê','‹Es|±c≈¥†ÎA/ªF~:','éz^4ÁJ3(ˆÀ	\ZE‘«$','2017-10-17',1,1,2),(10,'|Æ\"ÏmJ‘∫ïU‘Œ€\r','2≤1≥¬’§`ò4îﬁ•','qìq˙∆ﬁcˆÖO˛≈xÈÙ∂','€V\"nê¥‹8(`ªD\0π','˜ƒ‰⁄uÓ\r7éŒão.≥','∆\nöÊwPΩI<ª˙“VØ','2017-11-09',1,1,1),(11,' G¡1∏Q•	*cZ…6;÷','1wRy‡hj!zF˘gmÌ)=','õKÿ_ìÛ†VÔ_Bù≥]','tXqõ`Â˜á8Ä\"*tgL','ÊÒ^˝˜Îˆ\Z¸∏çK(C','6wı˛˘[=TN+%b◊„Å','2017-11-22',1,1,1),(12,'Â#u®åô=Ô^I˜∞','çhÚ·÷}Ö\Z‰èàﬁ;Æó','Gê+[Øe±suoõ™sÊ¥','p2\Zô∫!ŒZÕ†Ã@œ¡œ','ÊÒ^˝˜Îˆ\Z¸∏çK(C','K1/w ﬂıY@P','2017-12-10',1,2,1),(13,'ûM˚f∫wóÊh´¨0','&1∑€1’ÈKtdÉò@fôO','ò∑	˜\0ÒÃr\rsûL','∑¡∑–ößì$v˘˜æ^ µ‘','˜ƒ‰⁄uÓ\r7éŒão.≥','z£≈\Z\0Î€÷´S{ UÊë','2018-03-18',1,1,3),(14,'x	z≤Fe¡”®ä‘','|ù@Ì„Âü∆‰_†.¿','®ÎãTÄÅãG±í∫9∫','ÊÒ^˝˜Îˆ\Z¸∏çK(C','Ü√/“Y>´Ú1”∏úii','d‰\n…é“œ6¨-X‰\r‡','2018-03-19',1,2,3),(15,'iO4^u ∂@wÜc¿õ˚','˙5ı\'iˇµEPb≈\'só','\råL=çqîøw“–>Cd','p2\Zô∫!ŒZÕ†Ã@œ¡œ','ÊÒ^˝˜Îˆ\Z¸∏çK(C','—âd[,⁄aÀtÿ2à«Á…','2018-03-21',1,1,2),(16,'\0Y,¢<Êg¡Á[X¿≈∆&','˘Ï7⁄√ÔsÖDD^$˜É¨ô','’s\Z›ù‰\'◊Î#xRmj2Æ','±ÜπD72#Pjâ?û_ˆ—','ºπíÙ·_©í`©ÔªÂD_','c˜ˆAÛª8QE«<Óó4','2018-03-21',2,1,2),(17,'Úÿ/-nÏ:ª˝∏gNC','v¢≥r ÎçãNt§L:ï⁄','vÈø™Î◊< ˇ•\"Í>ÎZ@','p2\Zô∫!ŒZÕ†Ã@œ¡œ','ÊÒ^˝˜Îˆ\Z¸∏çK(C','F\\,Æõ6˚ì§K-Ô‰-','2018-03-28',1,1,2),(18,'Lﬂ._·ù—Ø!Ë£Mö','ÕS’)€HH˙NT^ÚÊ¥ü','O∂d¥*œ/–^“tÙ“vq','fÃ\ncS«¬∂õâ§_™Y','bŸ%√ÇIK—Ç›§Y±‡„é',' ÒPV@b—;¨À¸Ö5','2018-04-02',1,1,2),(19,'=œãáÖD«}ø–MÀ“ ¡','Pày˛±Åﬂz˙to`y+∏','G#‹„W‰±†PS°≠/','$Y…Ém\0ú%oÕˆ“P','ÆÙŒ‘õå?yoKfëå-%≥','‰~◊§∏òï%\n:3‘ôò÷j','2018-05-13',2,NULL,2);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_backup`
--

DROP TABLE IF EXISTS `reg_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_backup` (
  `Id_rb` int(11) NOT NULL AUTO_INCREMENT,
  `Fch_rb` datetime NOT NULL,
  `Nomfile_rb` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_rb` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Id_usu` int(11) NOT NULL,
  PRIMARY KEY (`Id_rb`),
  KEY `Id_usu` (`Id_usu`),
  CONSTRAINT `reg_backup_ibfk_1` FOREIGN KEY (`Id_usu`) REFERENCES `usuario` (`Id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_backup`
--

LOCK TABLES `reg_backup` WRITE;
/*!40000 ALTER TABLE `reg_backup` DISABLE KEYS */;
/*!40000 ALTER TABLE `reg_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_visita`
--

DROP TABLE IF EXISTS `reg_visita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_visita` (
  `Id_regv` int(11) NOT NULL AUTO_INCREMENT,
  `Fch_regv` datetime NOT NULL,
  `Id_per` int(11) NOT NULL,
  `Id_viv` int(11) DEFAULT NULL,
  `Id_actext` int(11) DEFAULT NULL,
  `Id_usu` int(11) NOT NULL,
  `Cod_vehi` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Est_prop` int(11) DEFAULT NULL,
  `Est_visita` int(11) DEFAULT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_regv`),
  KEY `Id_per` (`Id_per`,`Id_viv`,`Id_cond`),
  KEY `Id_viv` (`Id_viv`),
  KEY `Id_cond` (`Id_cond`),
  KEY `Id_usu` (`Id_usu`),
  KEY `Id_actext` (`Id_actext`),
  CONSTRAINT `reg_visita_ibfk_1` FOREIGN KEY (`Id_per`) REFERENCES `persona` (`Id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reg_visita_ibfk_2` FOREIGN KEY (`Id_viv`) REFERENCES `vivienda` (`Id_viv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reg_visita_ibfk_3` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reg_visita_ibfk_4` FOREIGN KEY (`Id_usu`) REFERENCES `usuario` (`Id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reg_visita_ibfk_5` FOREIGN KEY (`Id_actext`) REFERENCES `act_extra` (`Id_actext`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_visita`
--

LOCK TABLES `reg_visita` WRITE;
/*!40000 ALTER TABLE `reg_visita` DISABLE KEYS */;
INSERT INTO `reg_visita` VALUES (1,'2018-04-11 15:18:25',16,NULL,NULL,20,NULL,NULL,NULL,1),(2,'2018-04-16 01:32:51',10,2,NULL,20,NULL,1,NULL,1),(4,'2018-04-16 01:34:27',10,NULL,NULL,20,NULL,NULL,NULL,1),(5,'2018-04-16 01:34:59',10,1,NULL,20,NULL,NULL,1,1),(6,'2018-04-16 01:35:34',10,NULL,NULL,20,NULL,NULL,NULL,1),(7,'2018-04-16 01:36:01',10,1,NULL,20,NULL,NULL,1,1),(8,'2018-04-16 12:09:08',10,1,NULL,20,NULL,NULL,1,1),(9,'2018-04-16 12:31:16',10,2,NULL,20,NULL,1,NULL,1),(10,'2018-04-16 12:33:21',10,NULL,NULL,20,NULL,NULL,NULL,1),(11,'2018-04-16 12:35:27',10,2,NULL,20,NULL,1,NULL,1),(12,'2018-04-16 12:49:53',10,2,NULL,20,NULL,1,NULL,1),(13,'2018-04-16 12:52:06',10,2,NULL,20,NULL,1,NULL,1),(14,'2018-04-16 12:54:50',10,NULL,NULL,20,NULL,NULL,NULL,1),(15,'2018-04-16 12:55:12',10,NULL,NULL,20,NULL,NULL,NULL,1),(16,'2018-04-16 12:59:15',10,NULL,NULL,20,NULL,NULL,NULL,1),(17,'2018-04-16 13:06:38',10,NULL,NULL,20,NULL,NULL,NULL,1),(18,'2018-04-16 13:07:12',10,2,NULL,20,NULL,1,NULL,1),(19,'2018-04-16 13:08:44',10,2,NULL,20,NULL,1,NULL,1),(20,'2018-04-16 13:11:08',10,2,NULL,20,NULL,1,NULL,1),(21,'2018-04-16 13:12:56',10,2,NULL,20,NULL,1,NULL,1),(22,'2018-04-16 13:13:29',10,2,NULL,20,NULL,1,NULL,1),(23,'2018-04-16 13:15:17',10,2,NULL,20,NULL,1,NULL,1),(24,'2018-04-16 13:15:51',10,1,NULL,20,NULL,1,NULL,1),(25,'2018-04-16 13:18:06',10,2,NULL,20,NULL,1,NULL,1),(26,'2018-04-16 13:19:17',10,2,NULL,20,NULL,1,NULL,1),(27,'2018-04-25 15:16:16',10,2,NULL,20,NULL,1,NULL,1),(28,'2018-04-27 16:34:59',10,2,3,20,NULL,1,NULL,1),(29,'2018-04-27 16:36:43',10,2,3,20,NULL,1,NULL,1),(30,'2018-04-27 16:38:47',10,2,3,20,NULL,1,NULL,1),(31,'2018-04-27 16:40:20',10,2,3,20,NULL,1,NULL,1),(32,'2018-04-27 16:41:58',10,2,3,20,'RSDR09',1,NULL,1),(33,'2018-04-27 16:44:25',10,2,2,20,'RSDR09',1,NULL,1),(34,'2018-04-27 16:45:10',10,2,2,20,'RSDR09',1,NULL,1),(35,'2018-04-27 17:17:52',10,3,2,20,'RSDR09',1,NULL,1),(36,'2018-04-27 17:21:34',10,3,2,20,'RSDR09',1,NULL,1),(37,'2018-04-27 17:22:06',10,2,2,20,'RSDR09',1,NULL,1),(38,'2018-04-27 17:24:26',10,2,2,20,'RSDR09',1,NULL,1),(39,'2018-04-27 17:24:50',3,2,2,20,'RSDR09',1,NULL,1),(40,'2018-04-27 17:25:24',3,2,3,20,'RSDR09',1,NULL,1),(41,'2018-04-27 17:26:10',10,3,3,20,'RSDR09',1,NULL,1),(42,'2018-04-27 17:26:39',10,3,3,20,'RSDR09',1,NULL,1),(43,'2018-04-27 17:28:27',3,1,2,20,'RSDR09',NULL,1,1),(44,'2018-04-30 22:51:34',3,2,2,20,'RSDR09',1,NULL,1),(45,'2018-04-30 22:58:49',3,2,1,20,'RSDR09',1,NULL,1),(46,'2018-05-01 00:06:32',3,3,1,20,'RSDR09',1,NULL,1),(47,'2018-05-01 00:21:24',3,6,3,20,'RSDR09',NULL,NULL,1),(48,'2018-05-01 00:25:19',3,2,2,20,'RSDR09',NULL,NULL,1),(49,'2018-05-07 13:36:06',16,1,1,12,'undefined',NULL,1,1),(50,'2018-05-07 13:50:15',16,1,2,12,'undefined',NULL,1,1),(51,'2018-05-07 13:58:12',16,1,2,12,'undefined',NULL,1,1),(52,'2018-05-07 13:58:41',16,1,3,12,'undefined',NULL,1,1),(53,'2018-05-07 14:12:41',16,1,3,12,'WRDS34',NULL,1,1),(54,'2018-05-07 14:14:21',16,1,3,12,'WRDS34',1,NULL,1),(55,'2018-05-08 02:01:05',11,1,7,12,'FWDR34',1,NULL,1),(56,'2018-05-09 12:47:50',3,1,1,12,'RSDR09',1,NULL,1),(57,'2018-05-09 12:49:30',3,2,2,12,'RSDR09',1,NULL,1),(58,'2018-05-09 12:55:24',3,3,2,12,'RSDR09',1,NULL,1),(59,'2018-05-09 12:59:48',3,3,1,12,'RSDR09',1,NULL,1),(60,'2018-05-09 13:03:06',3,3,2,12,'RSDR09',1,NULL,1),(61,'2018-05-09 13:05:51',3,6,4,12,'RSDR09',1,NULL,1),(62,'2018-05-09 16:51:36',3,3,2,12,'RSDR09',1,NULL,1),(63,'2018-05-09 16:59:31',3,1,1,12,'RSDR09',1,NULL,1),(64,'2018-05-09 17:05:19',3,2,2,12,'RSDR09',1,NULL,1),(65,'2018-05-09 17:12:45',3,2,5,12,'RSDR09',1,NULL,1),(66,'2018-05-09 17:14:56',3,3,5,12,'RSDR09',1,NULL,1),(67,'2018-05-09 17:16:25',3,2,5,12,'RSDR09',1,NULL,1),(68,'2018-05-09 17:18:57',3,2,5,12,'RSDR09',1,NULL,1),(69,'2018-05-09 17:24:03',3,2,5,12,'RSDR09',1,NULL,1),(70,'2018-05-09 17:34:17',3,2,1,12,'RSDR09',1,NULL,1),(71,'2018-05-09 17:43:30',3,2,3,12,'RSDR09',1,NULL,1),(72,'2018-05-09 17:48:20',3,2,2,12,'RSDR09',1,NULL,1),(73,'2018-05-09 17:50:45',3,2,1,12,'RSDR09',1,NULL,1),(74,'2018-05-09 17:52:06',3,2,3,12,'RSDR09',1,NULL,1),(75,'2018-05-09 17:57:13',3,2,1,12,'RSDR09',1,NULL,1),(76,'2018-05-09 18:00:20',3,3,2,12,'RSDR09',1,NULL,1),(77,'2018-05-09 18:01:06',3,2,5,12,'RSDR09',1,NULL,1),(78,'2018-05-09 18:03:49',3,2,5,12,'RSDR09',1,NULL,1),(79,'2018-05-09 18:04:46',3,6,1,12,'RSDR09',1,NULL,1),(80,'2018-05-09 18:12:23',3,3,2,12,'RSDR09',1,NULL,1),(81,'2018-05-09 18:14:47',3,2,1,12,'RSDR09',1,NULL,1),(82,'2018-05-09 18:15:30',3,1,1,12,'RSDR09',1,NULL,1),(83,'2018-05-09 18:16:08',3,2,2,12,'RSDR09',1,NULL,1),(84,'2018-05-09 18:16:36',3,2,2,12,'RSDR09',1,NULL,1),(85,'2018-05-09 18:19:22',3,2,1,12,'RSDR09',1,NULL,1),(86,'2018-05-09 18:23:38',3,1,5,12,'RSDR09',1,NULL,1),(87,'2018-05-09 18:24:09',3,2,4,12,'RSDR09',1,NULL,1),(88,'2018-05-09 18:24:39',3,1,5,12,'RSDR09',1,NULL,1),(89,'2018-05-09 18:25:08',3,2,5,12,'RSDR09',1,NULL,1),(90,'2018-05-09 18:25:47',3,2,7,12,'RSDR09',NULL,1,1),(91,'2018-05-09 18:26:17',3,2,7,12,'RSDR09',NULL,1,1),(92,'2018-05-09 18:28:39',3,1,5,12,'RSDR09',1,NULL,1),(93,'2018-05-09 18:29:34',3,2,5,12,'RSDR09',1,NULL,1),(94,'2018-05-09 18:36:07',3,2,5,12,'RSDR09',1,NULL,1),(95,'2018-05-09 18:36:36',3,2,3,12,'RSDR09',NULL,1,1),(96,'2018-05-09 18:39:28',3,2,5,12,'RSDR09',1,NULL,1),(97,'2018-05-09 18:40:47',3,1,5,12,'RSDR09',1,NULL,1),(98,'2018-05-09 18:41:26',3,2,7,12,'RSDR09',1,NULL,1),(99,'2018-05-09 19:11:06',3,6,5,12,'RSDR09',NULL,1,1),(101,'2018-05-09 19:19:16',3,3,2,12,'RSDR09',1,NULL,1);
/*!40000 ALTER TABLE `reg_visita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reunion`
--

DROP TABLE IF EXISTS `reunion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reunion` (
  `Id_reu` int(11) NOT NULL AUTO_INCREMENT,
  `Asunto_reu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fch_reu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Desc_reu` text COLLATE utf8_spanish_ci,
  `condominio_Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_reu`),
  KEY `fk_reunion_condominio1_idx` (`condominio_Id_cond`),
  CONSTRAINT `fk_reunion_condominio1` FOREIGN KEY (`condominio_Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reunion`
--

LOCK TABLES `reunion` WRITE;
/*!40000 ALTER TABLE `reunion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reunion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `Id_role` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Super Administrador'),(2,'Gestor'),(3,'Administrador'),(4,'Conserje'),(5,'Presidente'),(6,'Comitiva'),(7,'Propietario'),(8,'Arrendatario titular'),(9,'Otro titular');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permiso`
--

DROP TABLE IF EXISTS `role_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permiso` (
  `Id_role` int(11) NOT NULL,
  `Id_perm` int(11) NOT NULL,
  `Valor_perm_role` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id_role`,`Id_perm`),
  KEY `Id_perm` (`Id_perm`),
  CONSTRAINT `role_permiso_ibfk_1` FOREIGN KEY (`Id_role`) REFERENCES `role` (`Id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `role_permiso_ibfk_2` FOREIGN KEY (`Id_perm`) REFERENCES `permiso` (`Id_perm`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permiso`
--

LOCK TABLES `role_permiso` WRITE;
/*!40000 ALTER TABLE `role_permiso` DISABLE KEYS */;
INSERT INTO `role_permiso` VALUES (1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(1,11,1),(1,12,1),(1,13,1),(1,14,1),(1,15,1),(1,16,1),(1,17,1),(1,18,1),(1,19,1),(1,20,1),(1,21,1),(1,22,1),(1,23,1),(1,24,1),(1,25,1),(1,26,1),(1,27,1),(1,28,1),(1,29,1),(1,30,1),(1,31,1),(1,32,1),(1,33,1),(1,34,1),(1,35,1),(1,36,1),(1,37,1),(1,38,1),(1,39,1),(1,40,1),(1,41,1),(1,42,1),(1,43,1),(1,44,1),(1,45,1),(1,46,1),(1,47,1),(1,48,1),(1,49,1),(1,50,1),(1,51,1),(1,52,1),(1,53,1),(1,54,1),(1,55,1),(1,56,1),(1,57,1),(1,58,1),(1,59,1),(1,60,1),(1,61,1),(1,62,1),(1,63,1),(1,64,1),(1,65,1),(1,66,1),(1,67,1),(1,68,1),(1,69,1),(2,1,1),(2,2,1),(2,3,1),(2,4,0),(2,12,0),(2,13,0),(2,14,0),(2,15,0),(2,16,0),(2,17,0),(2,18,0),(2,19,0),(2,20,1),(2,21,1),(2,22,1),(2,23,1),(2,24,1),(2,25,1),(2,26,1),(2,27,1),(2,28,1),(2,29,1),(2,30,1),(2,31,1),(2,32,1),(2,33,1),(2,34,1),(2,35,1),(2,36,1),(2,37,1),(2,38,1),(2,39,1),(2,40,1),(2,41,1),(2,42,1),(2,43,1),(2,44,1),(2,45,1),(2,46,1),(2,47,1),(2,48,1),(2,49,1),(2,50,1),(2,53,1),(2,57,1),(2,58,1),(2,59,1),(2,60,1),(2,61,1),(2,64,0),(2,65,1),(2,66,1),(2,67,1),(2,68,1),(2,69,1),(3,20,1),(3,21,1),(3,22,1),(3,23,1),(3,24,1),(3,25,0),(3,26,0),(3,27,0),(3,28,1),(3,29,0),(3,30,0),(3,31,0),(3,32,1),(3,33,1),(3,34,1),(3,35,1),(3,36,1),(3,37,1),(3,38,1),(3,39,1),(3,40,1),(3,41,1),(3,42,1),(3,43,1),(3,44,1),(3,45,1),(3,46,1),(3,57,1),(3,58,1),(3,59,1),(3,61,1),(3,65,1),(3,66,1),(3,67,1),(4,20,1),(4,24,1),(4,25,1),(4,26,1),(4,27,1),(4,28,1),(4,29,1),(4,30,1),(4,31,1),(4,32,1),(4,33,1),(4,34,1),(4,35,1),(4,36,1),(4,37,1),(4,38,1),(4,39,1),(4,40,1),(4,41,1),(4,42,1),(4,43,1),(4,44,1),(4,45,1),(4,46,1),(4,57,1),(4,61,1),(4,62,1),(4,65,1),(4,66,1),(4,67,1),(4,69,1),(5,20,1),(5,21,1),(5,22,1),(5,23,0),(5,24,0),(5,25,0),(5,26,0),(5,27,0),(5,28,0),(5,29,0),(5,30,0),(5,31,0),(5,32,1),(5,33,1),(5,34,1),(5,35,1),(5,36,1),(5,37,1),(5,38,1),(5,39,1),(5,40,1),(5,41,1),(5,42,1),(5,43,1),(5,44,1),(5,45,1),(5,46,1),(5,47,1),(5,48,1),(5,49,1),(5,50,1),(5,51,1),(5,52,1),(5,53,1),(5,54,1),(5,55,1),(5,56,1),(5,57,1),(5,58,1),(5,59,1),(5,60,1),(5,61,1),(5,62,1),(5,63,1),(5,65,1),(5,66,1),(6,20,1),(6,21,1),(6,22,1),(6,23,0),(6,24,1),(6,25,1),(6,26,1),(6,27,0),(6,28,1),(6,29,1),(6,30,1),(6,31,0),(6,32,1),(6,33,1),(6,34,1),(6,35,0),(6,36,1),(6,37,1),(6,38,1),(6,39,0),(6,40,1),(6,41,1),(6,42,1),(6,43,0),(6,44,1),(6,45,1),(6,46,1),(6,47,1),(6,53,1),(6,57,1),(6,61,1),(6,65,1),(6,66,1),(7,57,1),(7,61,1),(7,62,1),(7,63,1);
/*!40000 ALTER TABLE `role_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_rel`
--

DROP TABLE IF EXISTS `tipo_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_rel` (
  `Id_trel` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_trel` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_trel`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_rel`
--

LOCK TABLES `tipo_rel` WRITE;
/*!40000 ALTER TABLE `tipo_rel` DISABLE KEYS */;
INSERT INTO `tipo_rel` VALUES (1,'Propietario'),(2,'Conviviente propietario'),(3,'Arrendatario titular'),(4,'Conviviente arrendatario'),(5,'Cuidador titular'),(6,'Conviviente cuidador'),(7,'Visita familiar'),(8,'Visita amistad'),(9,'Visita otro'),(10,'Prohibido el acceso');
/*!40000 ALTER TABLE `tipo_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_relvehi`
--

DROP TABLE IF EXISTS `tipo_relvehi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_relvehi` (
  `Id_trelv` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_trelv` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_trelv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_relvehi`
--

LOCK TABLES `tipo_relvehi` WRITE;
/*!40000 ALTER TABLE `tipo_relvehi` DISABLE KEYS */;
INSERT INTO `tipo_relvehi` VALUES (1,'Propietario'),(2,'No propietario');
/*!40000 ALTER TABLE `tipo_relvehi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_vot`
--

DROP TABLE IF EXISTS `tipo_vot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_vot` (
  `Id_tv` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_tv` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_tv`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_vot`
--

LOCK TABLES `tipo_vot` WRITE;
/*!40000 ALTER TABLE `tipo_vot` DISABLE KEYS */;
INSERT INTO `tipo_vot` VALUES (1,'Propietario'),(2,'Propietario y Arrend. Tit.'),(3,'Propietario, Arrend. Tit. y Cuidador Tit');
/*!40000 ALTER TABLE `tipo_vot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `Rut_usu` blob NOT NULL,
  `Nom_usu` blob,
  `Usu_usu` blob NOT NULL,
  `Pass_usu` varchar(40) CHARACTER SET utf8 NOT NULL,
  `Email_usu` blob NOT NULL,
  `Id_role` int(11) NOT NULL,
  `Id_estusu` int(11) NOT NULL,
  `Fch_usu` datetime NOT NULL,
  `Cod_usu` int(10) NOT NULL,
  `Id_per` int(11) NOT NULL,
  `Id_cond` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_usu`),
  KEY `Id_role` (`Id_role`,`Id_estusu`),
  KEY `Id_eusu` (`Id_estusu`),
  KEY `Id_per` (`Id_per`),
  KEY `Id_cond` (`Id_cond`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_role`) REFERENCES `role` (`Id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`Id_per`) REFERENCES `persona` (`Id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`Id_estusu`) REFERENCES `est_usu` (`Id_estusu`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (12,'ÂNøÔd.Ûº£ÿÏ†ìR Ü','π’kˆjµ[\0x÷*®Ä–ÑÚ∏πÁ⁄‹¨$qüsë¯Ñ6ô','ÂNøÔd.Ûº£ÿÏ†ìR Ü','b30a5e4378704ddb5172af982b5d1e00a801e3dc','ÿYó|Ù\nãã£ë≤∞<¬⁄¡…Â˜“ªã¶ÏÁM˙',1,1,'2017-10-10 01:47:41',1624660626,1,1),(13,'|Æ\"ÏmJ‘∫ïU‘Œ€\r','\nèÎh∂Ùì2ø%/r/O','|Æ\"ÏmJ‘∫ïU‘Œ€\r','551950400ac0cfc637545841fbc1626b25f5eb36','^OÑ©ß¸/º∑q4p‡¢ÍÜ',8,1,'2017-12-08 00:18:33',1648927720,10,1),(14,' G¡1∏Q•	*cZ…6;÷','Ï\Z@•Òyè∆|¿«∫',' G¡1∏Q•	*cZ…6;÷','551950400ac0cfc637545841fbc1626b25f5eb36','¯´≠íö@¶˛tn√jÍ≤',3,1,'2017-12-09 16:24:14',1645303190,11,1),(15,'5¸|ï°+ëæAM§q','ﬁ˘4˙}JŒBO›>Çf⁄Õ','5¸|ï°+ëæAM§q','551950400ac0cfc637545841fbc1626b25f5eb36','p∫±6ˆC‘¯~Õ∑“æ%¡',7,1,'2017-12-09 17:42:23',1746122669,3,1),(16,'ûM˚f∫wóÊh´¨0','[…ÏT†èóÎ`®∆Ye¥\Z◊˜ƒ‰⁄uÓ\r7éŒão.≥','ûM˚f∫wóÊh´¨0','551950400ac0cfc637545841fbc1626b25f5eb36','Rä[¶3m˘Rr”ÑÜÈª=',5,1,'2018-03-18 20:12:21',1649618107,13,1),(17,'x	z≤Fe¡”®ä‘','\rNcj#ÌŒWÃ‚°ò3˙íú“1ƒ“Ö@ßÛ\\<û≥\'¥','x	z≤Fe¡”®ä‘','551950400ac0cfc637545841fbc1626b25f5eb36','Rä[¶3m˘Rr”ÑÜÈª=',5,1,'2018-03-19 22:55:49',1764843657,14,2),(18,'Â#u®åô=Ô^I˜∞','Ø˛£“‹óÅ.ÃÓ)V‚hß‡öQ.á·îƒ¢±ﬁ˙','Â#u®åô=Ô^I˜∞','551950400ac0cfc637545841fbc1626b25f5eb36','w⁄4ˆ≈@D,)8™∆ÊÑ`\0',6,1,'2018-03-21 00:36:47',1537476285,12,2),(19,'iO4^u ∂@wÜc¿õ˚','ñ≠√ë~á˛≈zê\rMg∑H‹q«èÒ1{–ıå˚Aå√','iO4^u ∂@wÜc¿õ˚','551950400ac0cfc637545841fbc1626b25f5eb36','N$¶j/Í=W£c≠cØ˝≠',4,1,'2018-03-21 01:33:57',1716861777,15,1),(20,'\0Y,¢<Êg¡Á[X¿≈∆&','7‚Ô¿Çﬂ#œ¥˘™ì≈»\\ºπíÙ·_©í`©ÔªÂD_','\0Y,¢<Êg¡Á[X¿≈∆&','551950400ac0cfc637545841fbc1626b25f5eb36','–¯ÕÖœ<ÅîM¥ÀÄÚ',4,1,'2018-03-21 15:44:03',1434965358,16,1),(21,'Úÿ/-nÏ:ª˝∏gNC','ﬁEë˜\"Î≤/¡4øb%‹q«èÒ1{–ıå˚Aå√','Úÿ/-nÏ:ª˝∏gNC','551950400ac0cfc637545841fbc1626b25f5eb36','æ3·Ç≈2gïQBˆÿÚıL',8,1,'2018-03-28 19:27:03',1447426839,17,1),(22,'=œãáÖD«}ø–MÀ“ ¡','⁄µ\0ﬁåêÀDü»	H¸Ë∏πÁ⁄‹¨$qüsë¯Ñ6ô','=œãáÖD«}ø–MÀ“ ¡','551950400ac0cfc637545841fbc1626b25f5eb36','v}ÄM.ŸgGÁ$˝q™\Z˛4]Ç~„ØNH{Øæ*',2,1,'2018-05-13 12:05:01',1587966569,19,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_permiso` (
  `Id_usu` int(11) NOT NULL,
  `Id_perm` int(11) NOT NULL,
  `Valor_perm_usu` tinyint(4) NOT NULL,
  UNIQUE KEY `Id_usu` (`Id_usu`,`Id_perm`),
  KEY `Id_perm` (`Id_perm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_permiso`
--

LOCK TABLES `usuario_permiso` WRITE;
/*!40000 ALTER TABLE `usuario_permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `Id_vehi` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_vehi` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Desc_vehi` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_modelo` int(11) NOT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_vehi`),
  KEY `Id_modelo` (`Id_modelo`),
  KEY `Id_cond` (`Id_cond`),
  KEY `Id_modelo_2` (`Id_modelo`),
  CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`Id_modelo`) REFERENCES `modelo` (`Id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'FWDR34','Verde',7,1),(3,'WRDS34','Amarillo 2017',2,1),(4,'UYTR45','Rojo claro',3,2),(5,'RSDR09','Amarillo',7,1),(6,'RSDR09','Verde claro',2,2),(7,'YTRE32','Blanco Sedan',399,1);
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo_persona`
--

DROP TABLE IF EXISTS `vehiculo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo_persona` (
  `Id_vehiper` int(11) NOT NULL AUTO_INCREMENT,
  `Id_vehi` int(11) NOT NULL,
  `Id_per` int(11) NOT NULL,
  `Id_trelv` int(11) NOT NULL,
  PRIMARY KEY (`Id_vehiper`),
  KEY `Id_vehi` (`Id_vehi`,`Id_per`,`Id_trelv`),
  KEY `Id_per` (`Id_per`),
  KEY `Id_trelv` (`Id_trelv`),
  CONSTRAINT `vehiculo_persona_ibfk_1` FOREIGN KEY (`Id_vehi`) REFERENCES `vehiculo` (`Id_vehi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vehiculo_persona_ibfk_2` FOREIGN KEY (`Id_per`) REFERENCES `persona` (`Id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vehiculo_persona_ibfk_3` FOREIGN KEY (`Id_trelv`) REFERENCES `tipo_relvehi` (`Id_trelv`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo_persona`
--

LOCK TABLES `vehiculo_persona` WRITE;
/*!40000 ALTER TABLE `vehiculo_persona` DISABLE KEYS */;
INSERT INTO `vehiculo_persona` VALUES (15,1,16,2),(4,3,3,2),(14,3,11,2),(12,3,16,1),(13,3,16,2),(10,5,3,2),(8,5,10,2),(9,5,11,2),(3,5,12,1),(7,5,13,1),(16,5,16,2),(11,7,3,2);
/*!40000 ALTER TABLE `vehiculo_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vivienda`
--

DROP TABLE IF EXISTS `vivienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vivienda` (
  `Id_viv` int(11) NOT NULL AUTO_INCREMENT,
  `Num_viv` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Id_cb` int(11) NOT NULL,
  `Id_esta` int(11) DEFAULT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_viv`),
  KEY `fk_vivienda_condominio1_idx` (`Id_cond`),
  KEY `Id_cb` (`Id_cb`),
  CONSTRAINT `fk_vivienda_condominio1` FOREIGN KEY (`Id_cond`) REFERENCES `condominio` (`Id_cond`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vivienda_ibfk_1` FOREIGN KEY (`Id_cb`) REFERENCES `calle_block` (`Id_cb`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vivienda`
--

LOCK TABLES `vivienda` WRITE;
/*!40000 ALTER TABLE `vivienda` DISABLE KEYS */;
INSERT INTO `vivienda` VALUES (1,'101',1,1,1),(2,'102',1,2,1),(3,'103',1,3,1),(4,'101',10,1,2),(5,'102',10,2,2),(6,'104',1,4,1),(7,'101',2,12,1);
/*!40000 ALTER TABLE `vivienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vivienda_persona`
--

DROP TABLE IF EXISTS `vivienda_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vivienda_persona` (
  `Id_vper` int(11) NOT NULL AUTO_INCREMENT,
  `Id_viv` int(11) NOT NULL,
  `Id_per` int(11) NOT NULL,
  `Id_trel` int(11) NOT NULL,
  PRIMARY KEY (`Id_vper`),
  KEY `fk_vivienda_persona_vivienda1_idx` (`Id_viv`),
  KEY `fk_vivienda_persona_persona1_idx` (`Id_per`),
  KEY `fk_vivienda_persona_est_usu1_idx` (`Id_trel`),
  CONSTRAINT `fk_vivienda_persona_persona1` FOREIGN KEY (`Id_per`) REFERENCES `persona` (`Id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vivienda_persona_vivienda1` FOREIGN KEY (`Id_viv`) REFERENCES `vivienda` (`Id_viv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vivienda_persona_ibfk_1` FOREIGN KEY (`Id_trel`) REFERENCES `tipo_rel` (`Id_trel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vivienda_persona`
--

LOCK TABLES `vivienda_persona` WRITE;
/*!40000 ALTER TABLE `vivienda_persona` DISABLE KEYS */;
INSERT INTO `vivienda_persona` VALUES (1,2,11,5),(2,2,10,3),(3,4,12,1),(4,1,3,1),(6,5,14,1),(7,6,15,3),(10,3,13,1),(12,1,13,5),(13,1,1,8),(14,2,1,7),(16,2,3,8),(17,3,3,8),(18,6,3,9),(19,1,16,2),(21,3,16,1),(22,2,16,8),(23,3,11,2);
/*!40000 ALTER TABLE `vivienda_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votacion_encuesta`
--

DROP TABLE IF EXISTS `votacion_encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votacion_encuesta` (
  `Id_ve` int(11) NOT NULL AUTO_INCREMENT,
  `Fch_ve` datetime NOT NULL,
  `Id_usu` int(11) NOT NULL,
  `Id_encu` int(11) NOT NULL,
  `Id_iencu` int(11) NOT NULL,
  `Id_cond` int(11) NOT NULL,
  PRIMARY KEY (`Id_ve`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votacion_encuesta`
--

LOCK TABLES `votacion_encuesta` WRITE;
/*!40000 ALTER TABLE `votacion_encuesta` DISABLE KEYS */;
INSERT INTO `votacion_encuesta` VALUES (1,'2018-02-22 01:17:33',12,2,4,2),(2,'2018-02-22 01:43:08',13,1,7,1),(3,'2018-02-22 13:53:04',15,2,5,2);
/*!40000 ALTER TABLE `votacion_encuesta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-18  1:57:45
