-- Archivo de instalación de la base de datos para la aplicación Tienda MVC

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);

-- Crear tabla de productos
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    stock INT NOT NULL DEFAULT 0
);

-- Insertar productos de ejemplo. Ajusta las imágenes según las
-- disponibles en la carpeta public/images.
INSERT INTO products (nombre, descripcion, precio, imagen, stock) VALUES
('Gorra clásica negra', 'Gorra de algodón color negro con diseño urbano, ajustable a cualquier tamaño.', 45000, '0.jpg', 10),
('Vaper desechable 800 puffs', 'Vaper desechable con sabor a frutas tropicales y autonomía para 800 inhalaciones.', 60000, '1.jpg', 8),
('Gorra estilo beisbol', 'Gorra tipo beisbol color azul marino con logo bordado, ideal para uso diario.', 50000, '2.jpg', 15),
('Vaper recargable', 'Dispositivo de vapeo recargable con cartuchos intercambiables, incluye cable USB.', 120000, '3.jpg', 5),
('Gorra vintage', 'Gorra con diseño vintage en tonos grisáceos, confeccionada en materiales de alta calidad.', 55000, '4.jpg', 12),
('Vaper mini pocket', 'Vaper compacto de bolsillo con batería de larga duración y sabor menta fresca.', 70000, '5.jpg', 9);