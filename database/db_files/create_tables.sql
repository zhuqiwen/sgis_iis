DROP TABLE IF EXISTS Cities;
CREATE TABLE Cities (
	CityId int AUTO_INCREMENT NOT NULL ,
	CountryID smallint NOT NULL ,
	RegionID smallint NOT NULL ,
	City varchar (45) NOT NULL ,
	Latitude float NOT NULL ,
	Longitude float NOT NULL ,
	TimeZone varchar (10) NOT NULL ,
	DmaId smallint NULL ,
	Code varchar (4) NULL ,
	PRIMARY KEY(CityId)
	); 

DROP TABLE IF EXISTS Regions;
CREATE TABLE Regions (
	RegionID smallint AUTO_INCREMENT NOT NULL ,
	CountryID smallint NOT NULL ,
	Region varchar (45) NOT NULL ,
	Code varchar (8) NOT NULL ,
	ADM1Code char (4) NOT NULL ,
	PRIMARY KEY(RegionID)
	);
DROP TABLE IF EXISTS Countries;
CREATE TABLE Countries (
	CountryId smallint AUTO_INCREMENT NOT NULL ,
	Country varchar (50) NOT NULL ,
	FIPS104 varchar (2) NOT NULL ,
	ISO2 varchar (2) NOT NULL ,
	ISO3 varchar (3) NOT NULL ,
	ISON varchar (4) NOT NULL ,
	Internet varchar (2) NOT NULL ,
	Capital varchar (25) NULL ,
	MapReference varchar (50) NULL ,
	NationalitySingular varchar (35) NULL ,
	NationalityPlural varchar (35) NULL ,
	Currency varchar (30) NULL ,
	CurrencyCode varchar (3) NULL ,
	Population bigint NULL ,
	Title varchar (50) NULL ,
	Comment varchar (255) NULL ,
	PRIMARY KEY(CountryId)
	);
DROP TABLE IF EXISTS Dmas;
CREATE TABLE Dmas (
	DmaId smallint NOT NULL ,
	CountryId smallint NULL ,
	DMA varchar (3) NULL ,
	Market varchar (50) NULL
	);
DROP TABLE IF EXISTS Nbc;
CREATE TABLE Nbc (
	PrimaryCityId int NOT NULL ,
	CityId int NOT NULL ,
	Distance smallint NULL 
	);

DROP TABLE IF EXISTS Version;
CREATE TABLE Version(
	Component varchar (50),
	Version varchar (50),
	Rows int
	);
