<?php
require_once __DIR__ . '/../Database/Database.php';

class TelephoneRepository {
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    // Crear un telefono junto a un contacto
    public function createTelephone($numero, $id_contacto) {
        $query = "INSERT INTO telefonos (numero, id_contacto) VALUES (:numero, :id_contacto)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'numero' => $numero,
            'id_contacto' => $id_contacto
        ]);
    }

    // Obtener telefonos por contacto
    public function getAllTelephonesByContact($id_contacto) {
        $query = "SELECT * FROM telefonos WHERE id_contacto = :id_contacto";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_contacto', $id_contacto);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
