<?php
require_once __DIR__ . '/../Database/Database.php';

class ContactRepository {
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    // Obtener todos los contactos
    public function getAllContacts() {
        $query = "SELECT * FROM contactos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un contacto por su id
    public function getContactById($id) {
        $query = "SELECT * FROM contactos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un contacto
    public function createContact($contact) {
        $query = "INSERT INTO contactos (nombre, apellido, email, estado) VALUES (:nombre, :apellido, :email, :estado)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $contact['nombre']);
        $stmt->bindParam(':apellido', $contact['apellido']);
        $stmt->bindParam(':email', $contact['email']);
        $stmt->bindParam(':estado', $contact['estado']);
        return $stmt->execute();
    }

    // Eliminar un contacto
    public function deleteContact($id) {
        $query = "UPDATE contactos SET estado = 0 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}