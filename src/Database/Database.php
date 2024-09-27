<?php
require_once __DIR__ . '/../../config/config.php';

class Database {
    private $pdo;

    // Establecer la conexión con la base de datos
    public function __construct()
    {
        $PASS_ROOT = getenv('MYSQL_ROOT_PASSWORD');
        $DB = getenv('MYSQL_DATABASE');
        $USER = getenv('MYSQL_USER');
        $HOST = getenv('MYSQL_HOST');

        try {
            $dsn = "mysql:host=$HOST;dbname=$DB";
            $this->pdo = new PDO($dsn, $USER, $PASS_ROOT);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error al conectar con la base de datos: ' . $e->getMessage());
        }
    }

    // Para devolver la instancia de la conexión
    public function getConnection()
    {
        return $this->pdo;
    }
}