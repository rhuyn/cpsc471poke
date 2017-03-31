# Host: localhost  (Version 5.7.17-log)
# Date: 2017-03-30 17:56:14
# Generator: MySQL-Front 6.0  (Build 1.74)


#
# Structure for table "gym"
#

DROP TABLE IF EXISTS `gym`;
CREATE TABLE `gym` (
  `Name` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `GymLeaderID` int(11) DEFAULT NULL,
  UNIQUE KEY `Name` (`Name`),
  KEY `GymLeaderID` (`GymLeaderID`),
  KEY `Location` (`Location`),
  CONSTRAINT `GymLeaderID` FOREIGN KEY (`GymLeaderID`) REFERENCES `npcs` (`NPCID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gym_ibfk_1` FOREIGN KEY (`Location`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gym"
#

INSERT INTO `gym` VALUES ('Pewter Gym','Pewter City',3),('Cerulean Gym','Cerulean City',8);

#
# Structure for table "maps"
#

DROP TABLE IF EXISTS `maps`;
CREATE TABLE `maps` (
  `Name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "maps"
#

INSERT INTO `maps` VALUES (''),('Cerulean City'),('Pallet Town'),('Pewter City'),('Pokemon League'),('Route 1'),('Route 16'),('Route 2'),('Route 30'),('S.S. Anne'),('Saffron City'),('Silph Co'),('Vermilion City'),('Viridian City');

#
# Structure for table "npcs"
#

DROP TABLE IF EXISTS `npcs`;
CREATE TABLE `npcs` (
  `NPCID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `NumPokemon` int(11) DEFAULT NULL,
  `MapName` varchar(255) NOT NULL DEFAULT 'Unknown',
  PRIMARY KEY (`NPCID`),
  KEY `NPCMap` (`MapName`),
  CONSTRAINT `NPCMap` FOREIGN KEY (`MapName`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "npcs"
#

INSERT INTO `npcs` VALUES (1,'','','Pallet Town Research Lab',0,'Pallet Town'),(2,'','','Route 30',1,'Route 30'),(3,'','','Pewter Gym',2,'Pewter City'),(4,'','','Pokemon League',6,'Pokemon League'),(5,'','','Viridian City PokeMart',0,'Viridian City'),(6,'','','Cerulean City Bicycle Shop',0,'Cerulean City'),(7,'','','S.S. Anne',0,'Vermilion City'),(8,'','','Cerulean Gym',2,'Cerulean City'),(9,'','','Silph Co Building',0,'Saffron City');

#
# Structure for table "hm_tm"
#

DROP TABLE IF EXISTS `hm_tm`;
CREATE TABLE `hm_tm` (
  `IDName` varchar(11) NOT NULL DEFAULT '',
  `BadgeRequired` varchar(255) DEFAULT NULL,
  `PP` int(11) DEFAULT NULL,
  `Effect` varchar(255) DEFAULT NULL,
  `Damage` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `NPCID` int(11) DEFAULT NULL,
  `MapFound` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDName`),
  KEY `HMNPCID` (`NPCID`),
  KEY `MapFound` (`MapFound`),
  CONSTRAINT `HMNPCID` FOREIGN KEY (`NPCID`) REFERENCES `npcs` (`NPCID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hm_tm_ibfk_1` FOREIGN KEY (`MapFound`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "hm_tm"
#


#
# Structure for table "items"
#

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) DEFAULT NULL,
  `Effect` varchar(255) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `NPCID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `itemNPCID` (`NPCID`),
  CONSTRAINT `itemNPCID` FOREIGN KEY (`NPCID`) REFERENCES `npcs` (`NPCID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "items"
#

INSERT INTO `items` VALUES (1,'','','Item',5),(2,'','','Medicine',5),(3,'','','Key Item',6),(4,'','','Item',9);

#
# Structure for table "itemmapfound"
#

DROP TABLE IF EXISTS `itemmapfound`;
CREATE TABLE `itemmapfound` (
  `ItemID` int(11) DEFAULT NULL,
  `MapName` varchar(255) DEFAULT NULL,
  KEY `ItemID` (`ItemID`),
  KEY `MapName` (`MapName`),
  CONSTRAINT `itemmapfound_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `items` (`ItemID`),
  CONSTRAINT `itemmapfound_ibfk_2` FOREIGN KEY (`MapName`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "itemmapfound"
#

INSERT INTO `itemmapfound` VALUES (1,'Route 2'),(2,'Route 2'),(4,'Silph Co');

#
# Structure for table "trainer"
#

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `StartingTown` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TrainerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "trainer"
#

INSERT INTO `trainer` VALUES (0,'No Trainer',0,'No Location'),(1,'Red',11,'Pallet Town'),(2,'Ethan',11,'New Bark Town'),(3,'Brendan',12,'Littleroot Town'),(4,'Lucas',13,'Twinleaf Town'),(5,'Hilbert',14,'Nuvema Town'),(6,'Nate',13,'Aspertia City'),(7,'Calem',16,'Vaniville Town'),(8,'Sun',16,'Route 1');

#
# Structure for table "pokemon"
#

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
  `PokemonID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL DEFAULT 'Unknown',
  `TrainerID` int(11) DEFAULT '0',
  PRIMARY KEY (`PokemonID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `pTrainerID` (`TrainerID`),
  CONSTRAINT `pTrainerID` FOREIGN KEY (`TrainerID`) REFERENCES `trainer` (`TrainerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "pokemon"
#

INSERT INTO `pokemon` VALUES (1,'Bulbasaur',1),(2,'Ivysaur',0),(3,'Venusaur',0),(4,'Charmander',1),(5,'Charmeleon',0),(6,'Charizard',0),(7,'Squirtle',1),(8,'Wartortle',0),(9,'Blastoise',0),(10,'Caterpie',0);

#
# Structure for table "stats"
#

DROP TABLE IF EXISTS `stats`;
CREATE TABLE `stats` (
  `pID` int(11) DEFAULT NULL,
  `HP` int(11) NOT NULL DEFAULT '0',
  `Attack` int(11) NOT NULL DEFAULT '0',
  `Defence` int(11) NOT NULL DEFAULT '0',
  `SpAtk` int(11) NOT NULL DEFAULT '0',
  `SpDef` int(11) NOT NULL DEFAULT '0',
  `Speed` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `statspID` (`pID`),
  CONSTRAINT `pStatsID` FOREIGN KEY (`pID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "stats"
#

INSERT INTO `stats` VALUES (1,45,49,49,65,65,45),(2,60,62,63,80,80,60),(3,80,82,83,100,100,80),(4,39,52,43,60,50,65),(5,58,64,58,80,65,80),(6,78,84,78,109,85,100),(7,44,48,65,50,64,43),(8,59,63,80,65,80,58),(9,79,83,100,85,105,78),(10,45,30,35,20,20,45);

#
# Structure for table "ptypes"
#

DROP TABLE IF EXISTS `ptypes`;
CREATE TABLE `ptypes` (
  `pID` int(11) DEFAULT NULL,
  `FirstType` varchar(255) DEFAULT NULL,
  `SecondType` varchar(255) DEFAULT NULL,
  KEY `pID` (`pID`),
  CONSTRAINT `pID` FOREIGN KEY (`pID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "ptypes"
#

INSERT INTO `ptypes` VALUES (1,'Grass','Poison'),(2,'Grass','Poison'),(3,'Grass','Poison'),(4,'Fire','N/A'),(5,'Fire','N/A'),(6,'Fire','Flying'),(7,'Water','N/A'),(8,'Water','N/A'),(9,'Water','N/A'),(10,'Bug','N/A'),(1,'Grass','Poison'),(2,'Grass','Poison'),(3,'Grass','Poison'),(4,'Fire','N/A'),(5,'Fire','N/A'),(6,'Fire','Flying'),(7,'Water','N/A'),(8,'Water','N/A'),(9,'Water','N/A'),(10,'Bug','N/A'),(1,'Grass','Poison'),(2,'Grass','Poison'),(3,'Grass','Poison'),(4,'Fire','N/A'),(5,'Fire','N/A'),(6,'Fire','Flying'),(7,'Water','N/A'),(8,'Water','N/A'),(9,'Water','N/A'),(10,'Bug','N/A'),(1,'Grass','Poison'),(2,'Grass','Poison'),(3,'Grass','Poison'),(4,'Fire','N/A'),(5,'Fire','N/A'),(6,'Fire','Flying'),(7,'Water','N/A'),(8,'Water','N/A'),(9,'Water','N/A'),(10,'Bug','N/A'),(1,'Grass','Poison'),(2,'Grass','Poison'),(3,'Grass','Poison'),(4,'Fire','N/A'),(5,'Fire','N/A'),(6,'Fire','Flying'),(7,'Water','N/A'),(8,'Water','N/A'),(9,'Water','N/A'),(10,'Bug','N/A'),(1,'Grass','Poison'),(2,'Grass','Poison'),(3,'Grass','Poison'),(4,'Fire','N/A'),(5,'Fire','N/A'),(6,'Fire','Flying'),(7,'Water','N/A'),(8,'Water','N/A'),(9,'Water','N/A'),(10,'Bug','N/A');

#
# Structure for table "canlearn"
#

DROP TABLE IF EXISTS `canlearn`;
CREATE TABLE `canlearn` (
  `PokemonID` int(11) DEFAULT NULL,
  `HMID` varchar(11) DEFAULT NULL,
  KEY `CanLearnPID` (`PokemonID`),
  KEY `learnHM` (`HMID`),
  CONSTRAINT `CanLearnPID` FOREIGN KEY (`PokemonID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `learnHM` FOREIGN KEY (`HMID`) REFERENCES `hm_tm` (`IDName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "canlearn"
#


#
# Structure for table "moves"
#

DROP TABLE IF EXISTS `moves`;
CREATE TABLE `moves` (
  `pID` int(11) DEFAULT NULL,
  `Level` int(11) NOT NULL DEFAULT '0',
  `Move` varchar(255) DEFAULT '',
  UNIQUE KEY `Level` (`Level`,`pID`),
  KEY `pMoveID` (`pID`),
  CONSTRAINT `pMoveID` FOREIGN KEY (`pID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "moves"
#


#
# Structure for table "pmapfound"
#

DROP TABLE IF EXISTS `pmapfound`;
CREATE TABLE `pmapfound` (
  `pID` int(11) DEFAULT NULL,
  `MapName` varchar(255) DEFAULT NULL,
  KEY `pID` (`pID`),
  KEY `MapName` (`MapName`),
  CONSTRAINT `pmapfound_ibfk_1` FOREIGN KEY (`pID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pmapfound_ibfk_2` FOREIGN KEY (`MapName`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pmapfound"
#

INSERT INTO `pmapfound` VALUES (1,'Pallet Town'),(2,''),(10,'Route 2');
