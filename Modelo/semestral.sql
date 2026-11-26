CREATE DATABASE IF NOT EXISTS semestral;
USE semestral;

CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT PRIMARY KEY,
    nombre_cliente VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS autos (
    placa VARCHAR(20) PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo ENUM('SEDAN', 'PICK-UP', 'SUB', 'BUSITO') NOT NULL,
    kilometraje INT NOT NULL,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);
