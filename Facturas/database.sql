CREATE DATABASE supermercado;

CREATE TABLE facturas(
    
    id INT primary key AUTO_INCREMENT,
    idfactura VARCHAR(50) NOT NULL, 
    idempleado VARCHAR(50) NOT NULL,
    idcliente VARCHAR(50) NOT NULL
);



