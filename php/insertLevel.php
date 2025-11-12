<?php
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Leer y decodificar el cuerpo JSON enviado desde el frontend
    $input = json_decode(file_get_contents('php://input'), true);
    $descriptionPOST = $input['description'] ?? '';

    // Validar que se haya proporcionado la descripción
    if (empty($descriptionPOST)) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "status" => 400,
            "message" => "La descripción es requerida"
        ]);
        exit;
    }

    $url = "http://localhost:8220/insert_level";
    $data = ["ClasificacionDesc" => $descriptionPOST];
    $jsonData = json_encode($data);

    // Verificar token en cookie
    $token = $_COOKIE['token'] ?? null;
    if (!$token) {
        http_response_code(401);
        echo json_encode([
            "success" => false,
            "status" => 401,
            "message" => "No se proporcionó token de autenticación"
        ]);
        exit;
    }

    // Configurar cURL
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            "Authorization: Bearer $token"
        ],
        CURLOPT_POSTFIELDS => $jsonData
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Manejo de errores cURL
    if (curl_errno($ch)) {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "error" => curl_error($ch)
        ]);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    // Decodificar respuesta del backend Python
    $json = json_decode($response, true);
    if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(502);
        echo json_encode([
            "success" => false,
            "status" => 502,
            "message" => "Respuesta inválida del servidor remoto"
        ]);
        exit;
    }

    // Enviar resultado al frontend
    http_response_code($httpcode);
    echo json_encode([
        "success" => true,
        "status" => $httpcode,
        "json" => $json
    ]);

} else {
    // Método no permitido
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "status" => 405,
        "message" => "Método no permitido. Usa POST."
    ]);
}
?>