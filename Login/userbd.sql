
CREATE Table users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idUser INT NOT NULL,
    email VARCHAR (80) NOT NULL,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (60) NOT NULL,
    FOREIGN KEY (idUser) REFERENCES clientes(id)
);
