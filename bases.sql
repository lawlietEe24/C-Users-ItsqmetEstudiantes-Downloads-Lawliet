CREATE DATABASE IF NOT EXISTS bases;
USE bases;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255),
    apellidos VARCHAR(255),
    correo VARCHAR(255),
    contrasena VARCHAR(255)
		
);	
SELECT * FROM usuarios;