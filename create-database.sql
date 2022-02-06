DROP DATABASE IF EXISTS filedata ;

CREATE DATABASE filedata CHARACTER SET utf8;

USE filedata;

CREATE TABLE files
(
  id INT(11) PRIMARY KEY NOT NULL ,
  name VARCHAR(100) NOT NULL,
  publisher VARCHAR(100),
  email VARCHAR(200),
  title VARCHAR(100),
  description VARCHAR(1000)
);

