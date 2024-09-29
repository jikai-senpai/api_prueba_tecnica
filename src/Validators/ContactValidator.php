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

        // Validar que el o los telefonos no esten vacios
        if (empty($data['telefonos']) || !is_array($data['telefonos'])) {
            $errors[] = 'Los telefonos deben ser un arreglo de numeros';
        } else {
            foreach ($data['telefonos'] as $telephone) {
                if (!is_numeric($telephone)) {
                    $errors[] = 'Cada telefono debe ser en numero';
                    break;
                }
            }
        }

        return $errors;
    }

    public function validateDelete($data) {
        $errors = [];

        // Validar que el id no este vacio
        if (empty($data['id'])) {
            $errors[] = 'El Id es requerido';
        }

        return $errors;
    }
}