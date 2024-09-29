<?php
require_once __DIR__ . '/src/Controllers/ContactController.php';
require_once __DIR__ . '/config/config.php';

//Manejo basico de las rutas basado en el metodo de la peticion
$controller = new ContactController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Obtener todos los contactos
        $controller->getAllContacts();
        break;

    case 'POST':
        // Verifica si se ha pasado el parámetro 'action' para determinar si es una eliminación
        if (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $controller->deleteContact();
        } else {
            // Si no hay 'action', entonces es creación de un contacto
            $controller->createContact();
        }
        break;

    default:
        http_response_code(405); // Metodo no permitido
        echo json_encode(['message' => 'Método no permitido']);
        break;
}

// Metodo delete
// http://localhost:9090/index.php?action=delete