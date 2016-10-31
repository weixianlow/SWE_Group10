DROP SCHEMA IF EXISTS database;
CREATE SCHEMA database;
USE database;

CREATE TABLE database.manifest(
	manifest_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	standardsVersion varchar(16) NOT NULL,
	creator varchar(32) NOT NULL
	dateCreated timestamp NOT NULL,
	comment varchar(128),
	researchObject_id integer NOT NULL,
	FOREIGN KEY(researchObject_id) REFERENCES database.researchObject(researchObject_id)
)ENGINE = INNODB;

CREATE TABLE database.researchObject(
	researchObject_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	abstract varchar(255) NOT NULL,
	title varchar(128) NOT NULL,
	provenance varchar(255),
	manifest_id integer NOT NULL,
	FOREIGN KEY(manifest_id) REFERENCES database.manifest(manifest_id)
)ENGINE = INNODB;

CREATE TABLE database.file(
	file_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name varchar(32),
	format varchar(32),
	abstract varchar(255),
	size varchar(16),
	uri varchar(255),
	checksum varchar(255),
	permission varchar(255),
	researchObject_id integer NOT NULL,
	FOREIGN KEY(researchObject_id) REFERENCES database.researchObject(researchObject_id)
)ENGINE = INNODB;

CREATE TABLE database.researchObjectDate(
	rdate_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	datasetTimeInterval timestamp,
	dateRetrievedTimeInterval timestamp,
	dateCreated timestamp,	
	researchObject_id integer NOT NULL,
	FOREIGN KEY(researchObject_id) REFERENCES database.researchObject(researchObject_id)
)ENGINE = INNODB;

CREATE TABLE database.fileDate(
	fdate_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,	
	dateRetrievedTimeInterval timestamp,
	dateCreated timestamp,
	fileTimeInterval timestamp,
	file_id integer NOT NULL,
	FOREIGN KEY(file_id) REFERENCES dabatase.file(file_id)
)ENGINE = INNODB;

CREATE TABLE database.distribution(
	distribution_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	uri varchar(255) NOT NULL,
	researchObject_id integer NOT NULL,
	FOREIGN KEY(researchObject_id) REFERENCES database.researchObject(researchObject_id)
)ENGINE = INNODB;

CREATE TABLE database.bibliographicCitation(
	citation_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	content varchar(255) NOT NULL,
	researchObject_id integer NOT NULL,
	FOREIGN KEY(researchObject_id) REFERENCES database.researchObject(researchObject_id)
)ENGINE = INNODB;

CREATE TABLE database.user(
	user_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username varchar(16) NOT NULL,
	hashed_password varchar(16) NOT NULL,
	salt varchar(16) NOT NULL,
	permission_level integer NOT NULL
)ENGINE = INNODB;

CREATE TABLE database.creator(
	creator_id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name varchar(64) NOT NULL,
	email varchar(64) NOT NULL,
	user_id integer NOT NULL,
	FOREIGN KEY(user_id) REFERENCES database.user(user_id)
)ENGINE = INNODB;

CREATE TABLE database.researchObject_creators(
	researchObject_id integer REFERENCES researchObject,
	creator_id integer REFERENCES creator,
	PRIMARY KEY(researchObject_id,creator_id)
)ENGINE = INNODB;
