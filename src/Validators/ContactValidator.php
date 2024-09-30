<?php
require_once __DIR__ . '/../../utils/FormatApiResult.php';
require_once __DIR__ . '/../../utils/GlobalVars.php';

use Utils\ApiUtils;
use Utils\GlobalVars;

class ContactValidator
{
    public function validateCreate($data)
    {
        // Array para almacenar errores de validacion
        $errors = [];

        // Validar que el nombre no este vacio
        if (empty($data['nombre'])) {
            $errors[] = ApiUtils::api_result(GlobalVars::STATUS_ERROR, null, 'El nombre es requerido');
        }

        // Validar que el apellido no este vacio
        if (empty($data['apellido'])) {
            $errors[] = ApiUtils::api_result(GlobalVars::STATUS_ERROR, null, 'El apellido es requerido');
        }

        // Validar que el email no este vacio
        if (empty($data['email'])) {
            $errors[] = ApiUtils::api_result(GlobalVars::STATUS_ERROR, null, 'El email es requerido');
        }

        // Validar que el o los telefonos no esten vacios
        if (empty($data['telefonos']) || !is_array($data['telefonos'])) {
            $errors[] = ApiUtils::api_result(GlobalVars::STATUS_ERROR, null, 'Los telefonos son requeridos');
        } else {
            foreach ($data['telefonos'] as $telephone) {
                if (!is_numeric($telephone)) {
                    $errors[] = ApiUtils::api_result(GlobalVars::STATUS_ERROR, null, 'Los telefonos deben ser numericos');
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
            $errors[] = ApiUtils::api_result(GlobalVars::STATUS_ERROR, null, 'El id es requerido');
        }

        return $errors;
    }
}