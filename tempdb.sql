# Host: localhost  (Version 5.7.17-log)
# Date: 2017-03-29 13:54:47
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
  `MapNorth` varchar(255) DEFAULT NULL,
  `MapSouth` varchar(255) DEFAULT NULL,
  `MapWest` varchar(255) DEFAULT NULL,
  `MapEast` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Name`),
  KEY `North` (`MapNorth`),
  KEY `East` (`MapEast`),
  KEY `West` (`MapWest`),
  KEY `South` (`MapSouth`),
  CONSTRAINT `East` FOREIGN KEY (`MapEast`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `North` FOREIGN KEY (`MapNorth`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `South` FOREIGN KEY (`MapSouth`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `West` FOREIGN KEY (`MapWest`) REFERENCES `maps` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `itemNPCID` FOREIGN KEY (`NPCID`) REFERENCES `npcs` (`NPCID`)
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


#
# Structure for table "trainer"
#

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `StartingTown` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`TrainerID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "trainer"
#


#
# Structure for table "pokemon"
#

DROP TABLE IF EXISTS `pokemon`;
CREATE TABLE `pokemon` (
  `PokemonID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL DEFAULT 'Unknown',
  `TrainerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PokemonID`),
  UNIQUE KEY `Name` (`Name`),
  KEY `pTrainerID` (`TrainerID`),
  CONSTRAINT `pTrainerID` FOREIGN KEY (`TrainerID`) REFERENCES `trainer` (`TrainerID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "pokemon"
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

