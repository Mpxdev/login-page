CREATE DATABASE IF NOT EXISTS `login-page`;

USE `login-page`;

CREATE TABLE IF NOT EXISTS `logins` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `logins` (usuario, senha) 
VALUES ('usuario_teste', 'senha_teste');

SELECT * FROM `logins`;
