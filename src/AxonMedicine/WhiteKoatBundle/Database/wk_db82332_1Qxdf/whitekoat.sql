drop database if exists `whitekoat`;

create database `whitekoat`;

use `whitekoat`;

CREATE FUNCTION GETID() RETURNS CHAR(32)
		RETURN REPLACE(UUID(),'-','');

CREATE TABLE `User` (
    `Id` char(32) primary key not null,
    `UserName` varchar(64),
    `Password` char(40),
    `FirstName` varchar(64) default 'admin user first name',
    `LastName` varchar(64) default 'admin user last name',
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique index (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `User` (`Id`, `UserName`,`Password`, `Version`,`Created`) values
	  (GETID(), 'k@whitekoat.com', sha1('doctor135790'), 1, now()),
	  (GETID(), 'cjscript@whitekoat.com', sha1('doctor135790'), 1, now()),
	  (GETID(), 'ryan@whitekoat.com', sha1('doctor135790'), 1, now()),
	  (GETID(), 'steven@whitekoat.com', sha1('doctor135790'), 1, now()),
	  (GETID(), 'student@whitekoat.com', sha1('doctor135790'), 1, now());

	-- not currently used.  Placeholder for user images.  Images should be saved externally.
CREATE TABLE `UserImage` (
    `Id` char(32) primary key not null,
    `Image` blob,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `Role` (
    `Id` char(32) primary key not null,
    `RoleName` varchar(64),
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique index (`RoleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `Role` (`Id`,`RoleName`,`Version`,`Created`) values
	  (GETID(), 'SUPERADMIN', 1, now()),
	  (GETID(), 'ADMIN', 1, now()),
	  (GETID(), 'STUDENT', 1, now()),
	  (GETID(), 'TESTER', 1, now());


CREATE TABLE `UserRole` (
    `Id` char(32) primary key not null,
    `UserId` varchar(32),
    `RoleId` varchar(32),
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique index (`UserId` , `RoleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	-- create user roles
INSERT INTO `UserRole` (`Id`, `UserId`,`RoleId`, `Version`,`Created`) values
	  ((GETID()), (select Id from `User` where `UserName`='keisuke'), (select Id from `Role` where `RoleName`='ADMIN'), 1, now());


CREATE TABLE `LibraryType` (
    `Id` char(32) primary key not null,
    `Name` char(255) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique index (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `LibraryType` (`Id`,`Name`,`Version`,`Created`) values
	  (GETID(), 'Actions', 1, now()),
	  (GETID(), 'Aliases', 1, now()),
	  (GETID(), 'Classes', 1, now()),
	  (GETID(), 'Diseases', 1, now()),
	  (GETID(), 'DiseaseTypes', 1, now()),
	  (GETID(), 'Drugs', 1, now()),
	  (GETID(), 'Molecules', 1, now()),
	  (GETID(), 'Symptoms', 1, now());

CREATE TABLE `LibraryValue` (
    `Id` char(32) primary key not null,
    `Type` char(32) not null,
    `Name` varchar(255) not null,
    `Description` varchar(255) null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    constraint foreign key (`Type`)
        references `LibraryType` (`Id`),
    unique index (`Type` , `Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

	-- defines the aliases and related parents
CREATE TABLE `Alias` (
    `Id` char(32) primary key not null,
    `Original` char(255) not null,
    `Alias` char(255) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    index (`Alias`),
    index (`Original`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `DrugLibraryProp` (
    `Id` char(32) primary key not null,
    `Generic` tinyint(1) default null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    constraint foreign key (`Id`)
        references `LibraryValue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `TempLookup` (
    `Id` char(32) primary key not null,
    `Name` char(255) not null,
    `DisplayName` char(255) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    index (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `TempLookup` (`Id`,`Name`,`DisplayName`,`Version`,`Created`) values
	  (GETID(), 'Drug Target', 'Molecule', 1, now()),
	  (GETID(), 'Treatment', 'Indications', 1, now()),
	  (GETID(), 'Side Effect', 'Side Effects', 1, now()),
	  (GETID(), 'Contraindication', 'Contraindications', 1, now());



-- The relationship table maintains relationships between:
-- drugs and disease they treat
-- drugs and classes they belong to
-- drugs and molecules
-- drugs and symtpoms
--    AND
-- diseases and types
-- diseases and causes
-- diseases and symptoms
-- diseases and treatments
CREATE TABLE `Relationship` (
    `Id` char(32) primary key not null,
    `LeftSide` char(32) not null,
    `RelatesTo` char(32) null,
    `RightSide` char(32) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    constraint foreign key (`LeftSide`)
        references `LibraryValue` (`Id`),
    constraint foreign key (`RelatesTo`)
        references `TempLookup` (`Id`),
    constraint foreign key (`RightSide`)
        references `LibraryValue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `DrugCardView` (
    `Id` char(32) primary key not null,
    `DrugName` varchar(255) not null,
    `DrugBrand` varchar(1024) not null,
    `DrugClass` varchar(1024) not null,
    `DrugTarget` varchar(1024) not null,
    `DrugMechanism` varchar(4192) null,
    `DrugTreatment` varchar(1024) not null,
    `DrugSideEffect` varchar(1024) not null,
    `DrugContraInd` varchar(1024) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `DiseaseCardView` (
    `Id` char(32) primary key not null,
    `DiseaseName` varchar(255) not null,
    `DiseaseType` varchar(1024) not null,
    `DiseaseCause` varchar(1024) not null,
    `DiseaseSymptom` varchar(1024) not null,
    `DiseaseTreatment` varchar(1024) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- maps drop down items to library types.
CREATE TABLE `TypeQuestionMapping` (
    `Id` char(32) primary key not null,
    `Display` varchar(1024) not null,
    `DiseaseType` varchar(1024) not null,
    `DiseaseCause` varchar(1024) not null,
    `DiseaseSymptom` varchar(1024) not null,
    `DiseaseTreatment` varchar(1024) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- select * from image;

CREATE TABLE `Image` (
    `Id` char(32) primary key not null,
    `OriginalFileName` varchar(255) not null,
    `OriginalFileExt` char(4) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- library values and images
CREATE TABLE `ImageLibraryValue` (
    `Id` char(32) primary key not null,
    `ImageRef` char(32) not null,
    `LibraryRef` char(32) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique (`ImageRef` , `LibraryRef`),
    constraint foreign key (`ImageRef`)
        references `Image` (`Id`),
    constraint foreign key (`LibraryRef`)
        references `LibraryValue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


	/**
	-- a drug card can have multiple drug name items
CREATE TABLE `DrugCardName`
	(
	  `DrugCardId` mediumint not null,
	  `DrugLibId` mediumint not null,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),
	primary key (`DrugCardId`, `DrugLibId`),
	constraint foreign key (`DrugCardId`) references `DrugCard`(`Id`),
	constraint foreign key (`DrugLibId`) references `LibraryValue`(`Id`)
	);

CREATE TABLE `DrugCardContraInd`
	(
	  `DrugCardId` mediumint not null,
	  `GenericLibId` mediumint not null,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),
	primary key (`DrugCardId`, `GenericLibId`),
	constraint foreign key (`DrugCardId`) references `DrugCard`(`Id`),
	constraint foreign key (`GenericLibId`) references `LibraryValue`(`Id`)
	);

latin1_swedish_ci
	*/


/**
 * Defines the actions each drug can have on a receiver.
 * Example: Abciximab prevents Percutaneous.
 *   Drug is 'Abciximab'
 *   Action is 'prevents'
 *   Receiver is Percutaneous
 */
DROP TABLE IF EXISTS `drugs_actions`;
CREATE TABLE `drugs_actions` (
  `Id` char(32) NOT NULL,
  `Drug` char(32) NOT NULL,
  `Action` char(32) NOT NULL,
  `Receiver` char(32) NOT NULL,
  `Inactive` tinyint(1) default 0,
  `Version` int(11) not null,
  `Created` timestamp not null default current_timestamp,
  `Modified` timestamp,
  `CreatedBy` varchar(64) not null default 'cjscript',
  `ModifiedBy` varchar(64), 
  PRIMARY KEY (`Id`),
  UNIQUE(`Drug`,`Action`, `Receiver`),
  CONSTRAINT FOREIGN KEY (`Drug`) REFERENCES `LibraryValue` (`Id`),
  CONSTRAINT FOREIGN KEY (`Action`) REFERENCES `LibraryValue` (`Id`),
  CONSTRAINT FOREIGN KEY (`Receiver`) REFERENCES `LibraryValue` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



/** TABLES BELOW should be checked */

CREATE TABLE `diseases_causes` (
  `Id` char(32) NOT NULL,
  `DiseaseCause` char(32) NOT NULL,
  PRIMARY KEY (`DiseaseCause`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `LibraryValue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DiseaseCause`) REFERENCES `DiseaseCardView` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `diseases_symptoms`
--
CREATE TABLE `diseases_symptoms` (
  `Id` char(32) NOT NULL,
  `DiseaseSymptom` char(32) NOT NULL,
  PRIMARY KEY (`DiseaseSymptom`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DiseaseSymptom`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




--
-- Table structure for table `diseases_treatments`
--
CREATE TABLE `diseases_treatments` (
  `DiseaseTreatment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DiseaseTreatment`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DiseaseTreatment`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `diseases_types`
--

CREATE TABLE `diseases_types` (
  `DiseaseType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`DiseaseType`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DiseaseType`) REFERENCES `diseasecardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `drugs_brands`
--

DROP TABLE IF EXISTS `drugs_brands`;
CREATE TABLE `drugs_brands` (
  `DrugBrand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` char(32) NOT NULL,
  PRIMARY KEY (`DrugBrand`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DrugBrand`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `drugs_classes`
--

DROP TABLE IF EXISTS `drugs_classes`;
CREATE TABLE `drugs_classes` (
  `DrugClass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` char(32) NOT NULL,
  PRIMARY KEY (`DrugClass`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DrugClass`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Table structure for table `drugs_contrainds`
--

DROP TABLE IF EXISTS `drugs_contrainds`;
CREATE TABLE `drugs_contrainds` (
  `DrugContraInd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` varchar(32) NOT NULL,
  PRIMARY KEY (`DrugContraInd`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DrugContraInd`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `drugs_sideeffects`
--

DROP TABLE IF EXISTS `drugs_sideeffects`;
CREATE TABLE `drugs_sideeffects` (
  `DrugSideEffect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` char(32) NOT NULL,
  PRIMARY KEY (`DrugSideEffect`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DrugSideEffect`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Table structure for table `drugs_targets`
--

DROP TABLE IF EXISTS `drugs_targets`;
CREATE TABLE `drugs_targets` (
  `DrugTarget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` char(32) NOT NULL,
  PRIMARY KEY (`DrugTarget`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DrugTarget`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Table structure for table `drugs_treatments`
--

DROP TABLE IF EXISTS `drugs_treatments`;
CREATE TABLE `drugs_treatments` (
  `DrugTreatment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Id` char(32) NOT NULL,
  PRIMARY KEY (`DrugTreatment`,`Id`),
  CONSTRAINT FOREIGN KEY (`Id`) REFERENCES `libraryvalue` (`Id`),
  CONSTRAINT FOREIGN KEY (`DrugTreatment`) REFERENCES `drugcardview` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
