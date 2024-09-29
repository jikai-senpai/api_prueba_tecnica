<?php

class Contacto
{
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $estado;

    public function __construct($nombre, $apellido, $email, $estado)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->estado = $estado;
    }
}