# API de Gestión de Contactos

Este proyecto es una API REST (sin framework) para la gestión de contactos y sus teléfonos asociados.

## Tecnologías Utilizadas

- PHP
- SQL
- Docker
- XAMPP
- Postman

## Estructura del Proyecto

- `ContactController.php`: Controladores para manejar las peticiones HTTP.
- `ContactValidator.php`: Validaciones de entrada.
- `Contact.model.php`: Modelo del contacto que representa una de las entidades del sistema.
- `Telephone.model.php`: Modelo del telefono que representa una de las entidades del sistema.
- `ContactService.php`: Servicio que maneja la lógica de negocio para los contactos.
- `ContactRepository.php`: Gestión de acceso a datos de contactos (base de datos).
- `TelephoneRepository.php`: Gestión de acceso a datos de telefonos (base de datos).
- `setup.sql`: Script SQL para la configuración de la base de datos.
- `Database.php`: Conexión y configuración de la base de datos.
- `contact.php`: Punto de entrada para las peticiones a la API.
- `test/contact.http`: Archivo para probar los endpoints de la API.

## Instalación

1. Clonar el repositorio.
2. Crear una base de datos en MySQL.
3. Modificar el archivo env a .env en la raíz del proyecto con las siguientes variables de entorno:
    - `MYSQL_ROOT_PASSWORD`
    - `MYSQL_DATABASE`
    - `MYSQL_USER`
    - `MYSQL_PASSWORD`
    - `MYSQL_HOST`
5. Iniciar el servidor de Apache (Xampp) y MySQL (Docker).
6. Acceder a la API a través de la URL `http://localhost:9090/api-rest/contact.php`.
7. Probar los endpoints de la API utilizando Postman.
8. Disfrutar de la API.

Licencia MIT © 2024 Jeyson Pérez.
