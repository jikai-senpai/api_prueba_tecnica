<?php

require_once __DIR__ . '/../Services/ContactService.php';
require_once __DIR__ . '/../Validators/ContactValidator.php';

class ContactController
{
    private $service;
    private $validator;

    public function __construct()
    {
        $this->service = new ContactService();
        $this->validator = new ContactValidator();
    }

    // Obtener la lista de contactos desde el servicio y devolverla en formato JSON
    public function listContacts()
    {
        $contacts = $this->service->getContacts();
        echo json_encode($contacts);
    }

    // Agregar un contacto al servicio
    public function addContact()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        // Validar los datos del contacto
        $errors = $this->validator->validate($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['errors' => $errors]);
            return;
        }

        // Crear el contacto
        $this->service->createContact($data);
        echo json_encode(['message' => 'Contacto agregado exitosamente']);
    }

    public function deleteContact()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            echo json_encode(['message' => 'ID del contacto es requerido']);
            return;
        }

        $this->service->deleteContact($id);
        echo json_encode(['message' => 'Contacto eliminado exitosamente']);
    }
}