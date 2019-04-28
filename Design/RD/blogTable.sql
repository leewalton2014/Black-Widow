DROP TABLE IF EXISTS `aa_blog`;
CREATE TABLE IF NOT EXISTS `aa_blog` (
  `postID` int(10) NOT NULL auto_increment,
  `postTitle` varchar(255) default NULL,
  `postBody` varchar(10000) default NULL,
  `postDate` date default NULL,
  KEY `postID` (`postID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100;
