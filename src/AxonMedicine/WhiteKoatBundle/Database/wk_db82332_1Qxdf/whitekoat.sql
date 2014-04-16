create tabledrop database if exists `whitekoat`;

create database `whitekoat`;

use `whitekoat`;

CREATE FUNCTION GETID() RETURNS CHAR(32)
		RETURN REPLACE(UUID(),'-','');

create table `User` (
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
);

insert into `User` (`Id`, `UserName`,`Password`, `Version`,`Created`) values
	  (GETID(), 'k@whitekoat.com', sha1('doctork'), 1, now()),
	  (GETID(), 'cjscript@whitekoat.com', sha1('doctork'), 1, now()),
	  (GETID(), 'jeff@whitekoat.com', sha1('doctork'), 1, now()),
	  (GETID(), 'student@whitekoat.com', sha1('doctork'), 1, now());

	-- not currently used.  Placeholder for user images.  Images should be saved externally.
create table `UserImage` (
    `Id` char(32) primary key not null,
    `Image` blob,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
);

create table `Role` (
    `Id` char(32) primary key not null,
    `RoleName` varchar(64),
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique index (`RoleName`)
);

insert into `Role` (`Id`,`RoleName`,`Version`,`Created`) values
	  (GETID(), 'SUPERADMIN', 1, now()),
	  (GETID(), 'ADMIN', 1, now()),
	  (GETID(), 'STUDENT', 1, now()),
	  (GETID(), 'TESTER', 1, now());


create table `UserRole` (
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
);

	-- create user roles
insert into `UserRole` (`Id`, `UserId`,`RoleId`, `Version`,`Created`) values
	  ((GETID()), (select Id from `User` where `UserName`='keisuke'), (select Id from `Role` where `RoleName`='ADMIN'), 1, now());


create table `LibraryType` (
    `Id` char(32) primary key not null,
    `Name` char(255) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    unique index (`Name`)
);

insert into `LibraryType` (`Id`,`Name`,`Version`,`Created`) values
	  (GETID(), 'Drugs', 1, now()),
	  (GETID(), 'Classes', 1, now()),
	  (GETID(), 'Molecules', 1, now()),
	  (GETID(), 'Diseases', 1, now()),
	  (GETID(), 'DiseaseTypes', 1, now()),
	  (GETID(), 'DiseaseCauses', 1, now()),
	  (GETID(), 'DiseaseSymptoms', 1, now()),
	  (GETID(), 'DiseaseTreatments', 1, now()),
	  (GETID(), 'Symptoms', 1, now()),
	  (GETID(), 'Actions', 1, now()),
	  (GETID(), 'Aliases', 1, now());

create table `LibraryValue` (
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
);

	-- defines the aliases and related parents
create table `Alias` (
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
);


create table `DrugLibraryProp` (
    `Id` char(32) primary key not null,
    `Generic` bool default false,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64),
    constraint foreign key (`Id`)
        references `LibraryValue` (`Id`)
);

create table `TempLookup` (
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
);

insert into `TempLookup` (`Id`,`Name`,`DisplayName`,`Version`,`Created`) values
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
create table `Relationship` (
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
);

create table `DrugCardView` (
    `Id` char(32) primary key not null,
    `DrugName` varchar(1024) not null,
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
);

create table `DiseaseCardView` (
    `Id` char(32) primary key not null,
    `DiseaseName` varchar(1024) not null,
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
);

-- maps drop down items to library types.
create table `TypeQuestionMapping` (
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
);

-- select * from image;

create table `Image` (
    `Id` char(32) primary key not null,
    `OriginalFileName` varchar(255) not null,
    `OriginalFileExt` char(4) not null,
    `Inactive` tinyint(1) default 0,
    `Version` int(11) not null,
    `Created` timestamp not null default current_timestamp,
    `Modified` timestamp,
    `CreatedBy` varchar(64) not null default 'cjscript',
    `ModifiedBy` varchar(64)
);

-- library values and images
create table `ImageLibraryValue` (
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
);


	/**
	-- a drug card can have multiple drug name items
create table `DrugCardName`
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

create table `DrugCardContraInd`
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
