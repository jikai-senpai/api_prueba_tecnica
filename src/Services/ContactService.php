<?php
require_once __DIR__ . '/../Repositories/ContactRepository.php';
require_once __DIR__ . '/../Repositories/TelefonoRepositry.php';

class ContactService {
    private $contactoRepository;
    private $telefonoRepository;

    public function __construct() {
        $this->contactoRepository = new ContactRepository();
        $this->telefonoRepository = new TelephoneRepository();
    }

    public function getAllContacts() {
        return $this->contactoRepository->getAllContacts();
    }

    public function createContact($data)
    {
        $data['estado'] = true;
        $this->contactoRepository->createContact($data);
    }

    public function deleteContact($id) {
        $this->contactoRepository->deleteContact($id);
    }

    public function addTelefonos($id_contacto, $telefonos) {
        foreach ($telefonos as $numero) {
            $telefono = new Telefono(null, $numero, $id_contacto);
            $this->telefonoRepository->createTelephone($telefono);
        }
    }
}