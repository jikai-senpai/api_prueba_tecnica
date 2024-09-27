<?php

class Telefono
{
    public $id;
    public $numero;
    public $id_contacto;

    public function __construct($numero, $id_contacto)
    {
        $this->numero = $numero;
        $this->id_contacto = $id_contacto;
    }
}