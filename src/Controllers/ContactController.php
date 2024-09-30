<?php
require_once __DIR__ . '/../Services/ContactService.php';
require_once __DIR__ . '/../Validators/ContactValidator.php';
require_once __DIR__ . '/../../utils/FormatApiResult.php';
require_once __DIR__ . '/../../utils/GlobalVars.php';

use Utils\ApiUtils;
use Utils\GlobalVars;


class ContactController
{
    private $service;
    private $validator;

    public function __construct()
    {
        $this->service = new ContactService();
        $this->validator = new ContactValidator();
    }

    // Metodo para obtener todos los contactos
    public function getAllContacts()
    {
        $contacts = $this->service->getAllContacts();
        echo json_encode(ApiUtils::api_result(GlobalVars::STATUS_OK, $contacts, 'Consulta exitosa'));
    }

    // Metodo para crear un contacto
    public function createContact()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        // Validar los datos recibidos
        $errors = $this->validator->validateCreate($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode([$errors]);
            return;
        }

        $this->service->createContact($data);
        echo json_encode(ApiUtils::api_result(GlobalVars::STATUS_OK, $data, 'Consulta exitosa'));
    }

    // Metodo para eliminar un contacto
    public function deleteContact()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        // Validar los datos recibidos
        $errors = $this->validator->validateDelete($data);
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode([$errors]);
            return;
        }

        $id = $data['id'];
        $deleted = $this->service->deleteContact($id);
        if (!$deleted) {
            http_response_code(404);
            echo json_encode([ApiUtils::api_result(GlobalVars::STATUS_ERROR, $data, 'Contacto no encontrado')]);
            return;
        }
        echo json_encode(ApiUtils::api_result(GlobalVars::STATUS_OK, $data, 'Consulta exitosa'));
    }
}