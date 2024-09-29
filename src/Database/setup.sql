USE PRUEBA_TECNICA;

-- Tabla contactos
CREATE TABLE
    `contactos`
(
    `id`                 int          NOT NULL AUTO_INCREMENT,
    `nombre`             varchar(255) NOT NULL,
    `apellido`           varchar(255) NOT NULL,
    `email`              varchar(255) NOT NULL,
    `estado`             boolean DEFAULT TRUE     NOT NULL,
    PRIMARY KEY (`id`)
);

-- Tabla telefonos
CREATE TABLE
    `telefonos`
(
    `id`            int         NOT NULL AUTO_INCREMENT,
    `numero`        varchar(20) NOT NULL,
    `id_contacto`   int         NOT NULL,
    PRIMARY KEY (`id`)
);