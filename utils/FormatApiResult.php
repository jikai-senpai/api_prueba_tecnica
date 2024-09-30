<?php

namespace Utils;

class ApiUtils {
    public static function api_result($status, $data = null, $message = '') {
        return [
            'status' => $status,
            'data' => $data,
            'message' => $message
        ];
    }
}