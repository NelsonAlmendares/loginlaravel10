CREATE DATABASE LoginPersona;
USE LoginPersona;

CREATE TABLE Usernames (
	ID_Login INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR (40) NOT NULL,
    Password_ VARCHAR (200) NOT NULL,
	Persona_ID INT NOT NULL -- Unión de las tablas
);
SELECT * FROM Usernames;

CREATE TABLE Personas (
	ID_Persona INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR (50) NOT NULL,
    Edad INT,
    Email VARCHAR (100)
);
SELECT * FROM Personas;

SELECT @@activate_all_roles_on_login;
SELECT @@hostname AS nombre_servidor, @@version AS version_servidor;

USE mysql;
SELECT host, user FROM user WHERE user = 'root';

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY 'NelsonAlmendares';
FLUSH PRIVILEGES;

SHOW GRANTS FOR 'root'@'localhost';
SELECT * FROM loginpersona.users;
-- TRUNCATE TABLE loginpersona.users; 