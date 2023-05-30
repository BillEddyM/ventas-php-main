CREATE DATABASE ventas_php;

USE ventas_php;

CREATE TABLE productos(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    marca VARCHAR(255) NOT NULL,
    talla VARCHAR(255) NOT NULL,
    compra DECIMAL(8,2) NOT NULL,
    venta DECIMAL(8,2) NOT NULL,
    existencia INT NOT NULL
);

CREATE TABLE clientes(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    telefono VARCHAR(25) NOT NULL,
    direccion VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    telefono VARCHAR(25) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, nombre, telefono, direccion, password) VALUES ("paco", "PacoHunter", "6667771234", "Nowhere", "$2y$10$6zeiv5cq4/HCjWBH5X/Fd.yxKfDaWa5sJaYfW302n./awI/lQcH0i");

CREATE TABLE ventas(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha DATETIME NOT NULL,
    total DECIMAL(9,2) NOT NULL,
    idUsuario BIGINT NOT NULL,
    idCliente BIGINT
);  

CREATE TABLE productos_ventas(
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cantidad INT NOT NULL,
    precio DECIMAL(8,2) NOT NULL,
    idProducto BIGINT NOT NULL,
    idVenta BIGINT NOT NULL
);

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `marca`, `talla`, `compra`, `venta`, `existencia`) VALUES
(1, 001, 'Camisa polo azul', 'Lacoste', 'M', 150.00, 300.00, 20),
(2, 002, 'Blusa de seda blanca', 'LindaBella', 'S', 200.00, 400.00, 10),
(5, 003, 'Pantalón lona azul roto', 'Levis', '30x32', 100.00, 150.00, 35),
(6, 004, 'Pantalón lona negro roto', 'Levis', '32x32', 100.00, 200.00, 35),
(7, 005, 'Pantalón tela azul', 'pepe', '32x32', 200.00, 300.00, 20),
(8, 006, 'Falda de tela azul', 'Kalu', 'M', 50.00, 100.00, 10),
(9, 007, 'Falda de tela beige', 'Kalu', 'M', 50.00, 100.00, 5),
(10, 008, 'Calsetines blancos', 'Pepe', 'Unica', 5.00, 10.00, 10),
(11, 009, 'Cinturón de cuero marrón', 'Ck', 'M', 75.00, 150.00, 15),
(12, 010, 'Cinturón de cuero negro', 'Ck', 'M', 75.00, 150.00, 15),
(13, 011, 'Cinturón de cuero azul', 'Ck', 'L', 75.00, 150.00, 10),
(14, 012, 'Cinturón de cuero azul', 'Ck', 'S', 75.00, 150.00, 10),
(15, 013, 'Sombrero de fieltro negro', 'Marfor', 'S', 120.00, 190.00, 5),
(16, 014, 'Sombrero de fieltro azul', 'Marfor', 'S', 120.00, 190.00, 5),
(17, 015, 'Sombrero de fieltro azul', 'Marfor', 'S', 120.00, 190.00, 5);

INSERT INTO clientes(nombre, telefono, direccion)
VALUES
('Juan Pérez', '47851236', 'El tesoro, Camotan'),
('María García', '41526398', 'Barrio el calvario, Camotan'),
('Carlos Rodríguez', '58589632', 'Barrio el centro, Camotan'),
('Ana Martínez', '54523651', 'Barrio el cementerio, Jocotan'),
('Luis López', '49632514', 'Barrio el cementerio, Jocotan'),
('Isabel Sánchez', '4123636', 'Barrio el calvario, Jocotan');


INSERT INTO ventas(fecha, total, idUsuario, idCliente)
VALUES
('2023-06-01 10:00:00', 500.00, 1, 1),
('2023-06-01 11:30:00', 400.00, 1, 2),
('2023-06-01 14:00:00', 600.00, 1, 3),
('2023-06-02 10:30:00', 800.00, 1, 4),
('2023-06-02 16:00:00', 1000.00, 1, 5),
('2023-06-03 11:00:00', 450.00, 1, 6),
('2023-06-03 15:30:00', 700.00, 1, 7),
('2023-06-04 10:00:00', 750.00, 1, 8),
('2023-06-04 16:00:00', 550.00, 1, 9),
('2023-06-05 11:00:00', 650.00, 1, 10);


INSERT INTO productos_ventas(cantidad, precio, idProducto, idVenta)
VALUES
(2, 300.00, 001, 1),
(1, 400.00, 002, 2),
(3, 600.00, 003, 3),
(1, 1000.00, 003, 4),
(2, 2400.00, 005, 5),
(1, 500.00, 006, 6),
(2, 800.00, 003, 7),
(1, 100.00, 008, 8),
(2, 150.00, 001, 9),
(1, 600.00, 002, 10);
