-- Tabla contactos
CREATE TABLE contactos (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           nombre VARCHAR(100) NOT NULL,
                           apellido VARCHAR(100) NOT NULL,
                           email VARCHAR(150) NOT NULL,
                           estado BOOLEAN DEFAULT TRUE,
                           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla telefonos
CREATE TABLE telefonos (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           numero VARCHAR(20) NOT NULL,
                           id_contacto INT,
                           estado BOOLEAN DEFAULT TRUE,
                           FOREIGN KEY (id_contacto) REFERENCES contactos(id) ON DELETE CASCADE
);
