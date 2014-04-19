-- MySQL dump 10.13  Distrib 5.1.49, for Win64 (unknown)
--
-- Host: 127.0.0.1    Database: whitekoat
-- ------------------------------------------------------
-- Server version	5.1.49-community

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
-- Table structure for table `alias`
--

DROP TABLE IF EXISTS `alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alias` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Original` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Alias` (`Alias`,`Original`),
  KEY `Original` (`Original`),
  KEY `IDX_E16C6B9420AD4490` (`Alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `diseasecardview`
--

DROP TABLE IF EXISTS `diseasecardview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseasecardview` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DiseaseName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IDX_964102085F316BD3` (`DiseaseName`),
  CONSTRAINT `FK_964102085F316BD3` FOREIGN KEY (`DiseaseName`) REFERENCES `libraryvalue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `diseases_causes`
--

DROP TABLE IF EXISTS `diseases_causes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseases_causes` (
  `DiseaseCause` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DiseaseCause`,`Id`),
  KEY `IDX_16A5FE336624BF1` (`DiseaseCause`),
  KEY `IDX_16A5FE332ABD43F2` (`Id`),
  CONSTRAINT `FK_16A5FE332ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_16A5FE336624BF1` FOREIGN KEY (`DiseaseCause`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `diseases_symptoms`
--

DROP TABLE IF EXISTS `diseases_symptoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseases_symptoms` (
  `DiseaseSymptom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DiseaseSymptom`,`Id`),
  KEY `IDX_8BDEF857AB8C9026` (`DiseaseSymptom`),
  KEY `IDX_8BDEF8572ABD43F2` (`Id`),
  CONSTRAINT `FK_8BDEF8572ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_8BDEF857AB8C9026` FOREIGN KEY (`DiseaseSymptom`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `diseases_treatments`
--

DROP TABLE IF EXISTS `diseases_treatments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseases_treatments` (
  `DiseaseTreatment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DiseaseTreatment`,`Id`),
  KEY `IDX_5C55F62FB86A2DEA` (`DiseaseTreatment`),
  KEY `IDX_5C55F62F2ABD43F2` (`Id`),
  CONSTRAINT `FK_5C55F62F2ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_5C55F62FB86A2DEA` FOREIGN KEY (`DiseaseTreatment`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `diseases_types`
--

DROP TABLE IF EXISTS `diseases_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseases_types` (
  `DiseaseType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DiseaseType`,`Id`),
  KEY `IDX_6FB1F0058DCC42FC` (`DiseaseType`),
  KEY `IDX_6FB1F0052ABD43F2` (`Id`),
  CONSTRAINT `FK_6FB1F0052ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_6FB1F0058DCC42FC` FOREIGN KEY (`DiseaseType`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `drugcardview`
--

DROP TABLE IF EXISTS `drugcardview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugcardview` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DrugName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DrugMechanism` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `IDX_58E931471CAAEB77` (`DrugName`),
  CONSTRAINT `FK_58E931471CAAEB77` FOREIGN KEY (`DrugName`) REFERENCES `libraryvalue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `druglibraryprop`
--

DROP TABLE IF EXISTS `druglibraryprop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `druglibraryprop` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Generic` tinyint(1) DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `drugs_brands`
--

DROP TABLE IF EXISTS `drugs_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_brands` (
  `DrugBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DrugBrand`,`Id`),
  KEY `IDX_E68F32213B123167` (`DrugBrand`),
  KEY `IDX_E68F32212ABD43F2` (`Id`),
  CONSTRAINT `FK_E68F32212ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_E68F32213B123167` FOREIGN KEY (`DrugBrand`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `drugs_classes`
--

DROP TABLE IF EXISTS `drugs_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_classes` (
  `DrugClass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DrugClass`,`Id`),
  KEY `IDX_6FA8B758CA0BD1A0` (`DrugClass`),
  KEY `IDX_6FA8B7582ABD43F2` (`Id`),
  CONSTRAINT `FK_6FA8B7582ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_6FA8B758CA0BD1A0` FOREIGN KEY (`DrugClass`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `drugs_contrainds`
--

DROP TABLE IF EXISTS `drugs_contrainds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_contrainds` (
  `DrugContraInd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DrugContraInd`,`Id`),
  KEY `IDX_40C10FA66DF3C038` (`DrugContraInd`),
  KEY `IDX_40C10FA62ABD43F2` (`Id`),
  CONSTRAINT `FK_40C10FA62ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_40C10FA66DF3C038` FOREIGN KEY (`DrugContraInd`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `drugs_sideeffects`
--

DROP TABLE IF EXISTS `drugs_sideeffects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_sideeffects` (
  `DrugSideEffect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DrugSideEffect`,`Id`),
  KEY `IDX_20F0514B9C24F6D` (`DrugSideEffect`),
  KEY `IDX_20F05142ABD43F2` (`Id`),
  CONSTRAINT `FK_20F05142ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_20F0514B9C24F6D` FOREIGN KEY (`DrugSideEffect`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `drugs_targets`
--

DROP TABLE IF EXISTS `drugs_targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_targets` (
  `DrugTarget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DrugTarget`,`Id`),
  KEY `IDX_C206D78EF02E4209` (`DrugTarget`),
  KEY `IDX_C206D78E2ABD43F2` (`Id`),
  CONSTRAINT `FK_C206D78E2ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_C206D78EF02E4209` FOREIGN KEY (`DrugTarget`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `drugs_treatments`
--

DROP TABLE IF EXISTS `drugs_treatments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drugs_treatments` (
  `DrugTreatment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DrugTreatment`,`Id`),
  KEY `IDX_A30D3CDBFA86E950` (`DrugTreatment`),
  KEY `IDX_A30D3CDB2ABD43F2` (`Id`),
  CONSTRAINT `FK_A30D3CDB2ABD43F2` FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_A30D3CDBFA86E950` FOREIGN KEY (`DrugTreatment`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OriginalFileName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `OriginalFileExt` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `imagelibraryvalue`
--

DROP TABLE IF EXISTS `imagelibraryvalue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagelibraryvalue` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ImageRef` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LibraryRef` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ImageRef` (`ImageRef`,`LibraryRef`),
  KEY `IDX_77F61B328EB0FA48` (`ImageRef`),
  KEY `IDX_77F61B32FB1BFF74` (`LibraryRef`),
  CONSTRAINT `FK_77F61B328EB0FA48` FOREIGN KEY (`ImageRef`) REFERENCES `image` (`Id`),
  CONSTRAINT `FK_77F61B32FB1BFF74` FOREIGN KEY (`LibraryRef`) REFERENCES `libraryvalue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `librarytype`
--

DROP TABLE IF EXISTS `librarytype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `librarytype` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `librarytype`
--

LOCK TABLES `librarytype` WRITE;
/*!40000 ALTER TABLE `librarytype` DISABLE KEYS */;
INSERT INTO `librarytype` VALUES (0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Drugs','5a0477ccc0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Classes','5a05d439c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Molecules','5a05d5a0c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Diseases','5a05d65fc0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'DiseaseTypes','5a05d721c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'DiseaseCauses','5a05d7e4c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'DiseaseSymptoms','5a05d8a6c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'DiseaseTreatments','5a05d96cc0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Symptoms','5a05da39c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Actions','5a05daf8c0df11e3ba8d524c84b3f6b8'),(0,1,'2014-04-10 11:38:49','2014-04-10 11:38:49','cjscript',NULL,'Aliases','5a05dbb6c0df11e3ba8d524c84b3f6b8');
/*!40000 ALTER TABLE `librarytype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libraryvalue`
--

DROP TABLE IF EXISTS `libraryvalue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libraryvalue` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Type` (`Type`,`Name`),
  KEY `IDX_E69DE2422CECF817` (`Type`),
  CONSTRAINT `FK_E69DE2422CECF817` FOREIGN KEY (`Type`) REFERENCES `librarytype` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relationship` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LeftSide` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RelatesTo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RightSide` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `IDX_200444A0B296AA56` (`LeftSide`),
  KEY `IDX_200444A0F8DF5A41` (`RelatesTo`),
  KEY `IDX_200444A0711A140A` (`RightSide`),
  CONSTRAINT `FK_200444A0711A140A` FOREIGN KEY (`RightSide`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_200444A0B296AA56` FOREIGN KEY (`LeftSide`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT `FK_200444A0F8DF5A41` FOREIGN KEY (`RelatesTo`) REFERENCES `templookup` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RoleName` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `RoleName` (`RoleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (NULL,1,'2014-04-18 16:22:16','2014-04-18 16:22:16','default',NULL,'46ae373fc75011e3949e2f1af2746ab9','SUPERADMIN'),(NULL,1,'2014-04-18 16:22:16','2014-04-18 16:22:16','default',NULL,'46ae39dac75011e3949e2f1af2746ab9','ADMIN'),(NULL,1,'2014-04-18 16:22:16','2014-04-18 16:22:16','default',NULL,'46ae3ab6c75011e3949e2f1af2746ab9','STUDENT'),(NULL,1,'2014-04-18 16:22:16','2014-04-18 16:22:16','default',NULL,'46ae3b6ac75011e3949e2f1af2746ab9','TESTER');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `templookup`
--

DROP TABLE IF EXISTS `templookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templookup` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DisplayName` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templookup`
--

LOCK TABLES `templookup` WRITE;
/*!40000 ALTER TABLE `templookup` DISABLE KEYS */;
INSERT INTO `templookup` VALUES (NULL,1,'2014-04-18 18:01:34','2014-04-18 18:01:34','default',NULL,'Drug Target','Molecule','25db7913c75e11e3949e2f1af2746ab9'),(NULL,1,'2014-04-18 18:01:34','2014-04-18 18:01:34','default',NULL,'Treatment','Indications','25dc3885c75e11e3949e2f1af2746ab9'),(NULL,1,'2014-04-18 18:01:34','2014-04-18 18:01:34','default',NULL,'Side Effect','Side Effects','25dc394bc75e11e3949e2f1af2746ab9'),(NULL,1,'2014-04-18 18:01:34','2014-04-18 18:01:34','default',NULL,'Contraindication','Contraindications','25dc39e2c75e11e3949e2f1af2746ab9');
/*!40000 ALTER TABLE `templookup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id` char(32) NOT NULL,
  `UserName` varchar(64) DEFAULT NULL,
  `Password` char(40) DEFAULT NULL,
  `FirstName` varchar(64) DEFAULT 'admin user first name',
  `LastName` varchar(64) DEFAULT 'admin user last name',
  `Inactive` tinyint(1) DEFAULT '0',
  `Version` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CreatedBy` varchar(64) NOT NULL DEFAULT 'cjscript',
  `ModifiedBy` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('7e18993bc0d811e3ba8d524c84b3f6b8','k@whitekoat.com','9bdd6a6b0e01a3aea3e06f33e349c6378db4dafb','admin user first name','admin user last name',0,1,'2014-04-10 17:49:43','0000-00-00 00:00:00','cjscript',NULL),('7e189ca8c0d811e3ba8d524c84b3f6b8','cjscript@whitekoat.com','9bdd6a6b0e01a3aea3e06f33e349c6378db4dafb','admin user first name','admin user last name',0,1,'2014-04-10 17:49:43','0000-00-00 00:00:00','cjscript',NULL),('7e189d92c0d811e3ba8d524c84b3f6b8','jeff@whitekoat.com','9bdd6a6b0e01a3aea3e06f33e349c6378db4dafb','admin user first name','admin user last name',0,1,'2014-04-10 17:49:43','0000-00-00 00:00:00','cjscript',NULL),('7e189e63c0d811e3ba8d524c84b3f6b8','student@whitekoat.com','9bdd6a6b0e01a3aea3e06f33e349c6378db4dafb','admin user first name','admin user last name',0,1,'2014-04-10 17:49:43','0000-00-00 00:00:00','cjscript',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userimage`
--

DROP TABLE IF EXISTS `userimage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userimage` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Image` longblob,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userrole` (
  `Inactive` tinyint(1) DEFAULT NULL,
  `Version` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Modified` datetime NOT NULL,
  `CreatedBy` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `ModifiedBy` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserId` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RoleId` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UserId` (`UserId`,`RoleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userrole`
--

LOCK TABLES `userrole` WRITE;
/*!40000 ALTER TABLE `userrole` DISABLE KEYS */;
INSERT INTO `userrole` VALUES (NULL,1,'2014-04-18 16:24:45','2014-04-18 16:24:45','default',NULL,'9f2ec07ac75011e3949e2f1af2746ab9',NULL,'46ae39dac75011e3949e2f1af2746ab9');

LOCK TABLES `userrole` WRITE;
/*!40000 ALTER TABLE `userrole` DISABLE KEYS */;
/*!40000 ALTER TABLE `userrole` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-18 16:03:44
