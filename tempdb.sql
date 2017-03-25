# Host: localhost  (Version 5.7.17-log)
# Date: 2017-03-24 22:49:16
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
  KEY `Location` (`Location`),
  KEY `GymLeaderID` (`GymLeaderID`),
  CONSTRAINT `GymLeaderID` FOREIGN KEY (`GymLeaderID`) REFERENCES `npcs` (`NPCID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Location` FOREIGN KEY (`Location`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "gym"
#


#
# Structure for table "maps"
#

DROP TABLE IF EXISTS `maps`;
CREATE TABLE `maps` (
  `Name` varchar(11) NOT NULL DEFAULT '',
  `ConnectMapName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Name`),
  KEY `ConnectMapName` (`ConnectMapName`),
  CONSTRAINT `ConnectMapName` FOREIGN KEY (`ConnectMapName`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "maps"
#


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
  `MapName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NPCID`),
  KEY `NPCMapName` (`MapName`),
  CONSTRAINT `NPCMapName` FOREIGN KEY (`MapName`) REFERENCES `maps` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "npcs"
#


#
# Structure for table "hm_tm"
#

DROP TABLE IF EXISTS `hm_tm`;
CREATE TABLE `hm_tm` (
  `IDNumber` int(11) NOT NULL AUTO_INCREMENT,
  `BadgeRequired` varchar(255) DEFAULT NULL,
  `PP` int(11) DEFAULT NULL,
  `Effect` varchar(255) DEFAULT NULL,
  `Damage` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `NPCID` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDNumber`),
  KEY `HMNPCID` (`NPCID`),
  CONSTRAINT `HMNPCID` FOREIGN KEY (`NPCID`) REFERENCES `npcs` (`NPCID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "hm_tm"
#


#
# Structure for table "pokemon"
#

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
  `PokemonID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL DEFAULT 'Unknown',
  PRIMARY KEY (`PokemonID`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "pokemon"
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


#
# Structure for table "canlearn"
#

DROP TABLE IF EXISTS `canlearn`;
CREATE TABLE `canlearn` (
  `PokemonID` int(11) DEFAULT NULL,
  `HMID` int(11) DEFAULT NULL,
  KEY `CanLearnPID` (`PokemonID`),
  KEY `CanLearnHMID` (`HMID`),
  CONSTRAINT `CanLearnHMID` FOREIGN KEY (`HMID`) REFERENCES `hm_tm` (`IDNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `CanLearnPID` FOREIGN KEY (`PokemonID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE
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


#
# Structure for table "trainer"
#

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `StartingTown` varchar(255) DEFAULT NULL,
  `pID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TrainerID`),
  KEY `trainerPID` (`pID`),
  CONSTRAINT `trainerPID` FOREIGN KEY (`pID`) REFERENCES `pokemon` (`PokemonID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "trainer"
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
  `TrainerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ItemID`),
  KEY `itemNPCID` (`NPCID`),
  KEY `itemTrainerID` (`TrainerID`),
  CONSTRAINT `itemNPCID` FOREIGN KEY (`NPCID`) REFERENCES `npcs` (`NPCID`),
  CONSTRAINT `itemTrainerID` FOREIGN KEY (`TrainerID`) REFERENCES `trainer` (`TrainerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "items"
#


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
  CONSTRAINT `itemmapfound_ibfk_2` FOREIGN KEY (`MapName`) REFERENCES `maps` (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "itemmapfound"
#

