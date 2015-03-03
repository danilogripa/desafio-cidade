

CREATE TABLE IF NOT EXISTS `geodata_city_result` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `suggestionID` int(11) unsigned NOT NULL,
  `suggestionName` varchar(64) NOT NULL,
  `officialID` int(11) unsigned NOT NULL,
  `officialName` varchar(64) NOT NULL,
  `officialAcronym` char(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;