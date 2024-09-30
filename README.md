# API de Gestión de Contactos

Este proyecto es una API REST (sin framework) para la gestión de contactos y sus teléfonos asociados.

## 📋 Tecnologías 
- PHP
- MySQL
- Docker

## 📦 Repositorio
   - Clonar el repositorio. Puede obtenerlo [aquí](https://github.com/jikai-senpai/api_prueba_tecnica.git) y luego ejecuta el siguiente comando:
     ```bash
     git clone
        ```

## 🚀 Pasos para empezar

1. **Instalar Docker** 🐳
    - Asegúrate de tener Docker instalado en tu sistema. Puedes descargarlo desde [aquí](https://www.docker.com/get-started).

2. **Modificar el archivo `env` a `.env` y configurarlo** 🔧
    - Cambia el nombre del archivo `env` a `.env` y ajusta la configuración según tus necesidades.

3. **El archivo `.env` modificar MYSQL_HOST** 🔧
   - En el archivo `.env` y busca la línea que dice `MYSQL_HOST`. Cambia valor a `mysql` o a una dirección IP local de MySQL.

4. **Ejecutar Docker Compose** 🛠️
    - Abre una terminal en el directorio del proyecto y ejecuta el siguiente comando:
      ```bash
      docker-compose up -d
      ```
    - Esto iniciará los contenedores en segundo plano.

5. **Importar las URL de la API desde `api-url.json` a Postman** 🌍
   - Abre Postman e importa el archivo `api-url.json`

6. **Disfruta de la API** 🎉
    - ¡Listo! Ahora puedes disfrutar de tu entorno de desarrollo.


## 🚀 Pasos para empezar (sin Docker)

1. **Instalar XAMPP** 🌐
   - Asegúrate de tener XAMPP instalado en tu sistema. Puedes descargarlo desde [aquí](https://www.apachefriends.org/index.html).

2. **Poner el documento del proyecto en el directorio `htdocs` de XAMPP** 📁
   - Copia la carpeta del proyecto en la ruta `C:\xampp\htdocs`.

3. **Ejecutar Apache y MySQL en XAMPP** ⚙️
   - Abre el panel de control de XAMPP y enciende los servicios de **Apache** y **MySQL**.

4. **Abrir phpMyAdmin** 🛠️
   - Accede a phpMyAdmin mediante XAMPP pulsando "Admin" junto a MySQL en el panel de control.

5. **Modificar el archivo `env` a `.env` y configurarlo** 🔧
   - Cambia el nombre del archivo `env` a `.env` y ajusta la configuración según tus necesidades.

6. **Crear un nuevo usuario junto a una contraseña en `user.sql`** 🔑
   - Query en `user.sql`

7. **Ejecutar configuracion inicial de la base de datos en `init.sql`** 📄
   - Query en `init.sql`

9. **Importar las URL de la API desde `api-url-sin-docker.json` a Postman** 🌍
   - Abre Postman y utiliza el archivo `api-url-sin-docker.json` para importar las URL de la API.

10. **Disfruta de la API** 🎉
   - ¡Listo! Ahora puedes disfrutar de tu API.

## Ejemplo de Configuración de MySQL en el Archivo `.env`

A continuación, se muestra un ejemplo de cómo podría lucir tu archivo `.env`:

```env
MYSQL_ROOT_PASSWORD=mi_contraseña_root
MYSQL_DATABASE=mi_base_de_datos
MYSQL_USER=mi_usuario
MYSQL_PASSWORD=mi_contraseña_usuario
MYSQL_HOST=localhost

Licencia MIT © 2024 Jeyson Pérez.
