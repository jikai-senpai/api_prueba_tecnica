<?php
require_once __DIR__ . '/../Database/Database.php';

class ContactRepository
{
    private $db;

    // Establecer la conexion con la base de datos
    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    // Realizar una consulta para obtener todos los contactos
    public function getAll()
    {
        $stmt = $this->db->query('SELECT * FROM contactos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Realizar una consulta para insertar un nuevo contacto.
    public function save($contacot)
    {
        $stmt = $this->db->prepare('INSERT INTO contacto (nombre, apellido, email) VALUES (:nombre, :apellido, :email, :estado)');
        $stmt->execute([
            ':nombre' => $contacot['nombre'],
            ':apellido' => $contacot['apellido'],
            ':email' => $contacot['email'],
            ':estado' => $contacot['estado'],
        ]);
        // Guardar números de teléfono asociados si existen.
    }

    // Realizar una consulta para deshabilitar un contacto por su id.
    public function delete($id)
    {
        $stmt = $this->db->prepare('UPDATE contactos SET estado = "INACTIVO" WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}