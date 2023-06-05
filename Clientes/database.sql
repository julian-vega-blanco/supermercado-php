CREATE DATABASE supermercado;

CREATE TABLE clientes(
    
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL, 
    compañia VARCHAR(50) NOT NULL,
    imagen MEDIUMBLOB
);



