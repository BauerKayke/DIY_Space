# DIY_Space


##SQLQUERY


CREATE schema diySpace;

use diySpace;

CREATE TABLE IF NOT EXISTS users (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    pais VARCHAR(255),
    estado VARCHAR(255),
    cidade VARCHAR(255),
    endereco VARCHAR(255),
    numeroResidencia INTEGER,
    restricaoAcesso BIT NOT NULL
);