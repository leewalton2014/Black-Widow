DROP TABLE IF EXISTS `aa_admins`;
CREATE TABLE IF NOT EXISTS `aa_admins` (
  `adminID` int(10) NOT NULL auto_increment,
  `username` varchar(255) default NULL,
  `passwordHash` varchar(255) default NULL,
  `forename` varchar(225) default NULL,
  `surname` varchar(225) default NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=100;

DROP TABLE IF EXISTS `aa_customers`;
CREATE TABLE IF NOT EXISTS `aa_customers` (
  `custID` int(10) NOT NULL auto_increment,
  `custForename` varchar(255) default NULL,
  `custSurname` varchar(255) default NULL,
  `custEmail` varchar(255) default NULL,
  `custUsername` varchar(30) default NULL,
  `custPasswordHash` varchar(255) default NULL,
  PRIMARY KEY (`custID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=979;

DROP TABLE IF EXISTS `aa_sales`;
CREATE TABLE IF NOT EXISTS `aa_sales` (
  `saleID` int(10) NOT NULL auto_increment,
  `custID` varchar(10) default NULL,
  `eventID` varchar(10) default NULL,
  `saleQuantity` int(6) default NULL,
  `orderNumber` varchar(255) default NULL,
  PRIMARY KEY (`saleID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=979;