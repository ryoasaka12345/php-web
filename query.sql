CREATE DATABASE /*!32312 IF NOT EXISTS*/ `php_web` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `php_web`;

CREATE TABLE `users` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL DEFAULT '',
    `password` varchar(100) NOT NULL DEFAULT '',
    `fullname` varchar(255) NOT NULL DEFAULT '',
    `email` varchar(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
