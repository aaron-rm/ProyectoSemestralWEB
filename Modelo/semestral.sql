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

-- Datos de prueba
INSERT INTO clientes (id_cliente, nombre_cliente) VALUES
(1,  'Ana Rodriguez'),
(2,  'Luis Gonzalez'),
(3,  'Maria Perez'),
(4,  'Jose Martinez'),
(5,  'Laura Castillo'),
(6,  'Pedro Sanchez'),
(7,  'Sofia Herrera'),
(8,  'Miguel Torres'),
(9,  'Valentina Diaz'),
(10, 'Carlos Ramos');

INSERT INTO autos (placa, marca, modelo, kilometraje, id_cliente) VALUES
('ABC-123', 'Toyota',      'SEDAN',  45000,  1),
('DEF-456', 'Nissan',      'PICK-UP', 78000, 2),
('GHI-789', 'Hyundai',     'SUB',    32000,  3),
('JKL-012', 'Toyota',      'BUSITO', 95000,  4),
('MNO-345', 'Honda',       'SEDAN',  25000,  5),
('PQR-678', 'Ford',        'PICK-UP', 110000, 6),
('STU-901', 'Kia',         'SUB',    18000,  7),
('VWX-234', 'Mitsubishi',  'BUSITO', 65000,  8),
('YZA-567', 'Mazda',       'SEDAN',  52000,  9),
('HIJ-456', 'Toyota',      'SEDAN',  67000,  2),
('EFG-123', 'Suzuki',      'SUB',    12000,  1),
('KLM-789', 'Hyundai',     'BUSITO', 43000,  3),
('NOP-012', 'Nissan',      'PICK-UP', 92000, 4),
('QRS-345', 'Honda',       'SEDAN',  15000,  5),
('BCD-890', 'Chevrolet',   'PICK-UP', 87000, 10);
