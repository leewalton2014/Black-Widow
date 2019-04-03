DROP TABLE IF EXISTS `aa_cart`;
CREATE TABLE IF NOT EXISTS `aa_cart` (
  `cartItemID` int(10) NOT NULL auto_increment,
  `custID` varchar(10) default NULL,
  `eventID` varchar(10) default NULL,
  `cartItemQuantity` varchar(6) default NULL,
  KEY `cartItemID` (`cartItemID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100;
