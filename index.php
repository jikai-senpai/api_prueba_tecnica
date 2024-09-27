<?php
require_once __DIR__ . '/src/Controllers/ContactController.php';
require_once __DIR__ . '/config/config.php';

//Manejo basico de las rutas basado en el metodo de la peticion
$controller = new ContactController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $controller->listContacts();
        break;
    case 'POST':
        $controller->addContact();
        break;
    case 'DELETE':
        $controller->deleteContact();
        break;
    default:
        http_response_code(405);
        echo json_encode(['message' => 'Método no permitido']);
        break;
}

