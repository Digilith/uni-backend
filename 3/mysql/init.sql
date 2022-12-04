CREATE DATABASE IF NOT EXISTS bookstore;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password'; -- user -> root ?
GRANT SELECT,UPDATE,INSERT ON bookstore.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE bookstore;
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    surname VARCHAR(200) NOT NULL,
    PRIMARY KEY (ID)
    );

CREATE TABLE IF NOT EXISTS genre (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    PRIMARY KEY(ID)
    );

INSERT INTO auth (login, password) VALUES ('login', '$apr1$WqkBof40$gl5P3fZIVdCs7797PsDK10');
INSERT INTO auth (login, password) VALUES ('admin', '$apr1$E2rpVoev$uzASa1TYn7N8aZ10PDVXc/');

INSERT INTO genre (name)
VALUES
    ('Horror'),
    ('Poetry'),
    ('Other');

INSERT INTO users (name, surname)
VALUES
    ('John', 'Smith'),
    ('Jane', 'Doe'),
    ('Mary', 'Sue'),
    ('Saul', 'Goodman');
