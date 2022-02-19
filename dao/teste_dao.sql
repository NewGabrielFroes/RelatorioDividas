create database teste_dao;

use teste_dao;

CREATE TABLE teste_dao.usuarios (
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(45) NOT NULL,
login VARCHAR(45) NOT NULL,
senha VARCHAR(45) NOT NULL
)
