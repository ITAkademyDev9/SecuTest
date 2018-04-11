-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

-- CREATE DATABASE 'Eliot' /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Eliot`;

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id        int (11) Auto_increment  NOT NULL ,
        username  Varchar (25),
        email     Varchar (150),
        password  Varchar (255),
        firstname Varchar (100),
        lastname  Varchar (100),
        PRIMARY KEY (id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: articles
#------------------------------------------------------------

CREATE TABLE articles(
        id       int (11) Auto_increment  NOT NULL ,
        title    Varchar(100),
        thumb    Varchar(255),
        content  Text,
        created  Datetime,
        id_users Int,
        PRIMARY KEY (id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: comments
#------------------------------------------------------------

CREATE TABLE comments(
        id          int (11) Auto_increment  NOT NULL ,
        name        Varchar (100) ,
        content     Text ,
        created     Datetime ,
        id_articles Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;

ALTER TABLE articles ADD CONSTRAINT FK_articles_id_users FOREIGN KEY (id_users) REFERENCES users(id);
ALTER TABLE comments ADD CONSTRAINT FK_comments_id_articles FOREIGN KEY (id_articles) REFERENCES articles(id);

#------------------------------------------------------------
# Seeds data
#------------------------------------------------------------

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`) VALUES
(1,	'jdoe',	'moncompte@email.com', '5f4dcc3b5aa765d61d8327deb882cf99',	'John',	'Doe'),
(2,	'ppjaques', 'moncompte@email.com', '1697918c7f9551712f531143df2f8a37',	'Pierre-Paul',	'Jaques');

INSERT INTO `articles` (`id`, `title`, `thumb`, `content`, `created`, `id_users`) VALUES
(1,	'Article 1', 'http://lorempicsum.com/futurama/348/225/2', 'Ceci est un article,\r\n\r\nVous pouvez laisser des commentaires',	'2018-04-11 09:54:08',	1),
(2,	'Article 2', 'http://lorempicsum.com/futurama/348/225/1', 'Vous lisez le deuxième article du site.\r\n\r\nNous vous félicitons pour ça et nous vous invitons à écrire un commentaire ci-dessous !',	'2018-04-11 09:57:19',	2);

INSERT INTO `comments` (`id`, `name`, `content`, `created`, `id_articles`) VALUES
(1,	'truc', 'Bonjour à tous,\r\n\r\nJe trouve ce site hyper bien fait !\r\n\r\nA +',	'2018-04-11 09:54:08',	1),
(2,	'rogerDu69', 'Salut !\r\n\r\nJe voudrais féliciter les développeurs qui ont fournis un travail exemplaire quand à la sécurité du site !\r\n\r\n@+',	'2018-04-11 09:57:19',	2),
(3,	'anonymous25', 'SUper article ! Merci beaucoup !!!',	'2018-04-11 09:57:19',	2);
