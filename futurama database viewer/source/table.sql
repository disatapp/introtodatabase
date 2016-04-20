SET FOREIGN_KEY_CHECKS=0;

/* Species */
DROP TABLE IF EXISTS `species`; 
CREATE TABLE species (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `s_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_name` (`s_name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Planet: name and description */
DROP TABLE IF EXISTS `planet`;
CREATE TABLE planet (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pl_name` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `pl_name` (`pl_name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* episode: name and season */
DROP TABLE IF EXISTS `episode`;
CREATE TABLE episode (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `e_name` VARCHAR(255) NOT NULL,
  `season` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `e_name` (`e_name`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Character: Index of Names, Numbers and Species, One race per character */
DROP TABLE IF EXISTS `charname`;
CREATE TABLE charname (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  `planet` INT(11) DEFAULT NULL,
  `specie` INT(11) DEFAULT NULL,
  `f_episode` INT(11) DEFAULT NULL,
  `age` INT(11) DEFAULT NULL,
  PRIMARY KEY  (`id`),
  FOREIGN KEY (`planet`) REFERENCES `planet` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY (`specie`) REFERENCES `species` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  FOREIGN KEY (`f_episode`) REFERENCES `episode` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
  )ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* profession: */ 
DROP TABLE IF EXISTS `profession`; 
CREATE TABLE profession (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `j_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* character to job */
DROP TABLE IF EXISTS `char_prof`;
CREATE TABLE char_prof (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cid` INT(11) NOT NULL DEFAULT '0',
  `jid` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`jid`) REFERENCES `profession` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`cid`) REFERENCES `charname` (`id`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
