CREATE DATABASE `piplay` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `media` (
  `MediaID` int(11) NOT NULL AUTO_INCREMENT,
  `PathID` int(11) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Extension` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`MediaID`),
  KEY `PathID_idx` (`PathID`),
  KEY `PathID_media_idx` (`PathID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='This Table contains complete information about all local stored media.';

CREATE TABLE `paths` (
  `PathID` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PathID`),
  UNIQUE KEY `Path_UNIQUE` (`Path`),
  CONSTRAINT `PathID` FOREIGN KEY (`PathID`) REFERENCES `media` (`MediaID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='This contains information about the included paths in PiPlay.';

CREATE TABLE `playlists` (
  `PlaylistID` int(11) NOT NULL AUTO_INCREMENT,
  `MediaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PlaylistID`),
  KEY `MediaID_idx` (`MediaID`),
  CONSTRAINT `MediaID` FOREIGN KEY (`MediaID`) REFERENCES `media` (`MediaID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table contains media in playlists';

CREATE TABLE `playlist_info` (
  `PlaylistID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(127) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PlaylistID`),
  CONSTRAINT `PlaylistID` FOREIGN KEY (`PlaylistID`) REFERENCES `playlists` (`PlaylistID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This contains information about the playlist';
