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
        $query = "SELECT * FROM contactos WHERE estado = 1";
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
    public function createContact($data) {
        $query = "INSERT INTO contactos (nombre, apellido, email) VALUES (:nombre, :apellido, :email)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email']
        ]);

        // Devolver el ID del contacto recién creado
        return $this->db->lastInsertId();
    }

    // Eliminar un contacto
    public function deleteContact($id) {
        $query = "UPDATE contactos SET estado = 0 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}