<?php
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Leer datos JSON enviados por el frontend
    $input = json_decode(file_get_contents('php://input'), true);
    $userPOST = $input['userlog'] ?? '';
    $passPOST = $input['passlog'] ?? '';

    // Validar campos requeridos
    if (empty($userPOST) || empty($passPOST)) {
        http_response_code(400);
        echo json_encode([
            "success" => false,
            "status" => 400,
            "message" => "Usuario y contraseña son requeridos"
        ]);
        exit;
    }

    $url = "http://localhost:8220/login";
    $data = ["username" => $userPOST, "password" => $passPOST];
    $jsonData = json_encode($data);

    // Configurar cURL
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => $jsonData
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Manejar error de conexión
    if (curl_errno($ch)) {
        http_response_code(500);
        echo json_encode(["success" => false, "error" => curl_error($ch)]);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    // Intentar decodificar respuesta del backend
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

    // Procesar login exitoso
    if ($httpcode === 200 && isset($json['access_token'])) {
        $token = $json['access_token'];
        $tokenParts = explode('.', $token);

        // Decodificar payload de JWT
        $payload = [];
        if (count($tokenParts) === 3) {
            $payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $tokenParts[1])), true);
        }

        // Calcular expiración (usa un máximo de 2 horas si no está definido)
        $expTime = isset($payload['exp']) ? ($payload['exp'] - time()) : 7200;
        if ($expTime <= 0) $expTime = 7200;

        // Guardar token en cookie segura
        setcookie("token", $token, time() + $expTime, "/", "", false, true);

        // Guardar sesión
        $_SESSION['username'] = strtolower($payload['sub'] ?? 'sin_usuario');
        $_SESSION['fullname'] = $payload['fullname'] ?? 'sin_nombre';
        $_SESSION['role'] = strtolower($payload['role'] ?? 'sin_rol');

        http_response_code(200);
        echo json_encode([
            "success" => true,
            "status" => 200,
            "fullname" => $payload['fullname'] ?? null,
            "json" => $json
        ]);
        exit;
    }

    // Si llega aquí, hubo error (usuario o contraseña)
    http_response_code($httpcode);
    echo json_encode([
        "success" => false,
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