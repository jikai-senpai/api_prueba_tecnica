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

    public function getAllContacts()
    {
        $contacts = $this->service->getAllContacts();
        echo json_encode($contacts);
    }

    public function createContact()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $errors = $this->validator->validateCreate($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['errors' => $errors]);
            return;
        }

        $this->service->createContact($data);
        echo json_encode(['message' => 'Contacto agregado exitosamente']);
    }

    public function deleteContact()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $errors = $this->validator->validateDelete($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['errors' => $errors]);
            return;
        }

        $id = $data['id'];
        $deleted = $this->service->deleteContact($id);
        if (!$deleted) {
            http_response_code(404);
            echo json_encode(['message' => 'Contacto no encontrado']);
            return;
        }
        echo json_encode(['message' => 'Contacto eliminado exitosamente']);
    }
}