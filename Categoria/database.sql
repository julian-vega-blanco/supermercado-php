CREATE DATABASE supermercado;

CREATE TABLE categoria(
    
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL, 
    decripcion VARCHAR(50) NOT NULL,
    imagen MEDIUMBLOB
);



