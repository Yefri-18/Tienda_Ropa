CREATE DATABASE tienda_virtual;

USE tienda_virtual;

-- Tabla de productos
CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    precio DECIMAL(10, 2),
    descripcion TEXT,
    stock INT,
    imagen VARCHAR(255)
);

-- Tabla de compras
CREATE TABLE compras (
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT,
    cantidad INT,
    fecha_compra DATETIME,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

-- Inserción de datos iniciales en la tabla de productos
INSERT INTO productos (nombre, precio, descripcion, stock, imagen) VALUES
('Camiseta', 19.99, 'Camiseta de algodón 100%', 50, 'camiseta.jpg'),
('Pantalón', 39.99, 'Pantalón vaquero', 30, 'pantalon.jpg'),
('Chaqueta', 59.99, 'Chaqueta de invierno', 20, 'chaqueta.jpg');

ALTER TABLE productos ADD COLUMN categoria VARCHAR(50);

INSERT INTO productos (nombre, precio, descripcion, stock, imagen, categoria) VALUES
('Camiseta Básica', 19.99, 'Camiseta de algodón 100%', 50, 'camiseta1.jpg', 'camisas'),
('Camiseta Estampada', 22.99, 'Camiseta con estampado', 30, 'camiseta2.jpg', 'camisas'),
('Pantalón Vaquero', 39.99, 'Pantalón de mezclilla', 20, 'pantalon1.jpg', 'pantalones'),
('Pantalón Corto', 25.99, 'Pantalón corto de verano', 15, 'pantalon2.jpg', 'pantalones'),
('Chaqueta de Invierno', 59.99, 'Chaqueta cálida', 10, 'chaqueta1.jpg', 'chaquetas'),
('Chaqueta Ligera', 49.99, 'Chaqueta ligera para primavera', 5, 'chaqueta2.jpg', 'chaquetas');
