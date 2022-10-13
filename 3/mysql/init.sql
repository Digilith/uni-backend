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

CREATE TABLE IF NOT EXISTS auth (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY(ID)
    );

INSERT INTO auth (login, password) VALUES ('login', 'pwd');

INSERT INTO users (name, surname)
VALUES
    ('John', 'Smith'),
    ('Jane', 'Doe'),
    ('Mary', 'Sue'),
    ('Saul', 'Goodman');
