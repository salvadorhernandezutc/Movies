<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        $descriptionPOST = $input['description'] ?? '';

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
        $data = array("ClasificacionDesc" => $descriptionPOST);
        $jsonData = json_encode($data);

        $token = isset($_COOKIE['token']) ? $_COOKIE['token'] : null;

        if (!$token) {
            die(json_encode([
                "success" => false,
                "status" => 401,
                "message" => "No se proporcionó token de autenticación"
            ]));
            exit;
        }

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

        if (curl_errno($ch)) {
            http_response_code(500);
            echo json_encode(["success" => false, "error" => curl_error($ch)]);
            curl_close($ch);
            exit;
        }

        curl_close($ch);

        // decodificar la respuesta JSON
        $json = json_decode($response, true);
        http_response_code($httpcode);

        // Enviar al frontend
        header('Content-Type: application/json');
        echo json_encode([
            "success" => true,
            "status" => $httpcode,
            "json" => $json
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "status" => $httpcode,
            "message" => $json['message'] ?? "Error desconocido",
        ]);
    }
?>