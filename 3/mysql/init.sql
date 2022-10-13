CREATE DATABASE OF NOT EXISTS bookstore;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON bookstore;
FLUSH PRIVELEGES;

USE bookstore;
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    surname VARCHAR(128) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY(ID)
);

INSERT INTO auth (login, password) VALUES ('login', 'password');

INSERT INTO users (name, surname)
VALUES
    ('John', 'Smith'),
    ('Jane', 'Doe'),
    ('Mary', 'Sue'),
    ('Saul', 'Goodman');
