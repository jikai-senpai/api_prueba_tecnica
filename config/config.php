<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception("El archivo .env no existe.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Ignora comentarios
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        // Divide la linea en clave y valor
        list($key, $value) = explode('=', $line, 2);

        // Elimina espacios en blanco y comillas
        $key = trim($key);
        $value = trim($value, " \t\n\r\0\x0B\"");

        // Configura la variable de entorno
        putenv("$key=$value");
    }
}

// Cargar las variables desde el archivo .env
loadEnv(__DIR__ . '/../.env');

// Acceder a las variables de entorno
