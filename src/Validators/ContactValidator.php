<?php

class ContactValidator
{
    public function validateCreate($data)
    {
        // Array para almacenar errores de validacion
        $errors = [];

        // Validar que el nombre no este vacio
        if (empty($data['nombre'])) {
            $errors[] = 'El nombre es requerido';
        }

        // Validar que el apellido no este vacio
        if (empty($data['apellido'])) {
            $errors[] = 'El apellido es requerido';
        }

        // Validar que el email no este vacio
        if (empty($data['email'])) {
            $errors[] = 'El email es requerido';
        }

        return $errors;
    }

    public function validateDelete($data)
    {
        $errors = [];

        if (empty($data['id'])) {
            $errors[] = 'El Id es requerido';
        }

        return $errors;
    }
}