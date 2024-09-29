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
        $contacts = $this->contactoRepository->getAllContacts();

        // Para mostrar los teléfonos de cada contacto asociados
        foreach ($contacts as &$contact) {
            $contact['telefonos'] = $this->telefonoRepository->getAllTelephonesByContact($contact['id']);
        }

        return $contacts;
    }

    public function createContact($data) {
        $data['estado'] = true;
        $contactId = $this->contactoRepository->createContact($data);

        if (!empty($data['telefonos'])){
            foreach ($data['telefonos'] as $telefono) {
                $this->telefonoRepository->createTelephone($telefono, $contactId);
            }
        }
    }

    public function deleteContact($id) {
        $contact = $this->contactoRepository->getContactById($id);
        if (!$contact) {
            return false;
        }
        elseif ($contact['estado'] == 0) {
            return false;
        }
        $this->contactoRepository->deleteContact($id);
        return true;
    }

    public function addTelefonos($id_contacto, $telefonos) {
        foreach ($telefonos as $numero) {
            $telefono = new Telefono(null, $numero, $id_contacto);
            $this->telefonoRepository->createTelephone($telefono);
        }
    }
}