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

    // Metodo para obtener todos los contactos
    public function getAllContacts() {
        $contacts = $this->contactoRepository->getAllContacts();

        // Para mostrar los teléfonos de cada contacto asociados
        foreach ($contacts as &$contact) {
            $contact['telefonos'] = $this->telefonoRepository->getAllTelephonesByContact($contact['id']);
        }

        return $contacts;
    }

    // Metodo para crear un contacto
    public function createContact($data) {
        $data['estado'] = true; // Por defecto, el contacto se crea activo
        $contactId = $this->contactoRepository->createContact($data);

        // Crear los telefonos asociados al contacto
        if (!empty($data['telefonos'])){
            foreach ($data['telefonos'] as $telefono) {
                $this->telefonoRepository->createTelephone($telefono, $contactId);
            }
        }
    }

    // Metodo para eliminar un contacto
    public function deleteContact($id) {
        // Verificar si el contacto existe y está activo
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
}