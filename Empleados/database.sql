CREATE DATABASE supermercado;

CREATE TABLE empleados(
    
    id INT primary key AUTO_INCREMENT,
    empleado VARCHAR(50) NOT NULL, 
    celularempleado VARCHAR(50) NOT NULL,
    direccionempleado VARCHAR(50) NOT NULL,
    imagen MEDIUMBLOB
);



