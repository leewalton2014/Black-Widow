DROP TABLE IF EXISTS `aa_events`;
CREATE TABLE IF NOT EXISTS `aa_events` (
  `eventID` int(10) NOT NULL auto_increment,
  `eventTitle` varchar(255) default NULL,
  `eventDescription` varchar(400) default NULL,
  `eventDate` date default NULL,
  `eventTime` time default NULL,
  `typeID` varchar(10) default NULL,
  `stageID` varchar(10) default NULL,
  `ticketPrice` decimal(4,2) default NULL,
  `imgRef` varchar(100) default NULL,
  PRIMARY KEY (`eventID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100;

DROP TABLE IF EXISTS `aa_event_type`;
CREATE TABLE IF NOT EXISTS `aa_event_type` (
  `typeID` varchar(10) NOT NULL default ``,
  `eventType` varchar(30) default NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO 'aa_event_type' ('typeID', 'eventType') VALUES
('t1', 'Music'),
('t2', 'Film'),
('t3', 'Comedy'),
('t4', 'Exhibition'),
('t5', 'Trade Show'),
('t6', 'Conference'),
('t7', 'Other');

DROP TABLE IF EXISTS `aa_event_stage`;
CREATE TABLE IF NOT EXISTS `aa_event_stage` (
  `stageID` varchar(10) NOT NULL default ``,
  `stageNumber` varchar(7) default NULL,
  `stageCapacity` varchar(7) default NULL,
  PRIMARY KEY (`stageID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO 'aa_event_stage' ('stageID', 'stageNumber', 'stageCapacity') VALUES
('s1', '1', '11000'),
('s2', '2', '500'),
('s3', '3', '500'),
('s4', '4', '5000'),
('s5', '5', '2000');

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
  `orderDate` date default NULL,
  PRIMARY KEY (`saleID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=979;

DROP TABLE IF EXISTS `aa_cart`;
CREATE TABLE IF NOT EXISTS `aa_cart` (
  `cartItemID` int(10) NOT NULL auto_increment,
  `custID` varchar(10) default NULL,
  `eventID` varchar(10) default NULL,
  `cartItemQuantity` int(6) default NULL,
  PRIMARY KEY (`cartItemID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=100;

DROP TABLE IF EXISTS `aa_blog`;
CREATE TABLE IF NOT EXISTS `aa_blog` (
  `postID` int(10) NOT NULL auto_increment,
  `postTitle` varchar(255) default NULL,
  `postBody` varchar(10000) default NULL,
  `postDate` date default NULL,
  PRIMARY KEY (`postID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=100;

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
