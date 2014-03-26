	drop database if exists `whitekoat`;

	create database `whitekoat`;

	use `whitekoat`;

	CREATE FUNCTION GETID() RETURNS CHAR(32)
		RETURN REPLACE(UUID(),'-','');

	create table `User`
	(
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

	unique index(`UserName`)
	);

	insert into `User` (`Id`, `UserName`,`Password`, `Version`,`Created`) values
	  (GETID(), 'k@whitekoat.com', sha1('doctork2468'), 1, now()),
	  (GETID(), 'cjscript@whitekoat.com', sha1('doctork2468'), 1, now()),
	  (GETID(), 'student@whitekoat.com', sha1('doctork2468'), 1, now());

	create table `UserImage`
	(
	  `Id` char(32) primary key not null,
	  `Image` blob,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64)
	);

	create table `Role`
	(
	  `Id` char(32) primary key not null,
	  `RoleName` varchar(64),
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),
	unique index(`RoleName`)
	);

	insert into `Role` (`Id`,`RoleName`,`Version`,`Created`) values
	  (GETID(), 'SUPERADMIN', 1, now()),
	  (GETID(), 'ADMIN', 1, now()),
	  (GETID(), 'STUDENT', 1, now()),
	  (GETID(), 'TESTER', 1, now());


	create table `UserRole`
	(
	  `Id` char(32) primary key not null,
	  `UserId` varchar(32),
	  `RoleId` varchar(32),
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),

	unique index(`UserId`, `RoleId`)
	);

	-- create user roles
	insert into `UserRole` (`Id`, `UserId`,`RoleId`, `Version`,`Created`) values
	  ((GETID()), (select Id from `User` where `UserName`='keisuke'), (select Id from `Role` where `RoleName`='ADMIN'), 1, now());


	create table `LibraryType`
	(
	  `Id` char(32) primary key not null,
	  `Name` char(255) not null,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),

	unique index(`Name`)
	);

	insert into `LibraryType` (`Id`,`Name`,`Version`,`Created`) values
	  (GETID(), 'Drugs', 1, now()),
	  (GETID(), 'Classes', 1, now()),
	  (GETID(), 'Molecules', 1, now()),
	  (GETID(), 'Diseases', 1, now()),
	  (GETID(), 'Symptoms', 1, now()),
	  (GETID(), 'Actions', 1, now()),
	  (GETID(), 'Aliases', 1, now());

	create table `LibraryValue`
	(
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

	constraint foreign key (`Type`) references `LibraryType`(`Id`),
	unique index(`Type`,`Name`)
	);

	-- defines the aliases and related parents
	create table `Alias`
	(
	  `Id` char(32) primary key not null,
	  `Alias` char(32) not null,
	  `Original` char(32) not null,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),

	constraint foreign key (`Alias`) references `LibraryValue`(`Id`),
	constraint foreign key (`Original`) references `LibraryValue`(`Id`),
	unique index(`Alias`,`Original`)
	);


	create table `DrugLibraryProp`
	(
	  `Id` char(32) primary key not null,
	  `Generic` bool default false,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),

	constraint foreign key (`Id`) references `LibraryValue`(`Id`)
	);

	-- The relationship table maintains relationships between:
	-- From a Drug view:
	--   Generic Drug AND 
	-- 		Brand Drug OR
	-- 		Class OR
	-- 		Mechanism OR
	-- 		Treatment (Disease)
	-- 
	-- From a Disease view:
	--   Disease AND
	--      Generic Drug OR
	--      Brand Drug OR

	create table `Relationship`
	(
	  `Id` char(32) primary key not null,
	  `LeftSide` char(32) not null,
	  `RightSide` char(32) not null,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64),

	constraint foreign key (`LeftSide`) references `LibraryValue`(`Id`),
	constraint foreign key (`RightSide`) references `LibraryValue`(`Id`)
	);

	create table `DrugCardView`
	(
	  `Id` char(32) primary key not null,
	  `DrugName` varchar(1024) not null,
	  `DrugClass` varchar(1024) not null,
	  `DrugTarget` varchar(1024) not null,
	  `DrugMechanism` varchar(1024) not null,
	  `DrugTreatment` varchar(1024) not null,
	  `Inactive` tinyint(1) default 0,
	  `Version` int(11) not null,
	  `Created` timestamp not null default current_timestamp,
	  `Modified` timestamp,
	  `CreatedBy` varchar(64) not null default 'cjscript',
	  `ModifiedBy` varchar(64)
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

	*/
