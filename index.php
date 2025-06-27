<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

require 'vendor/autoload.php';

use Peru\Sunat\RucFactory;

// Función para enviar respuesta JSON
function sendResponse($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Obtener el RUC desde diferentes métodos
$ruc = null;

// Método GET: /api.php?ruc=20100070970
if (isset($_GET['ruc'])) {
    $ruc = $_GET['ruc'];
}

// Método POST (JSON)
if (!$ruc) {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['ruc'])) {
        $ruc = $input['ruc'];
    }
}

// Método POST (form-data)
if (!$ruc && isset($_POST['ruc'])) {
    $ruc = $_POST['ruc'];
}

// Validar si se proporcionó RUC
if (!$ruc) {
    sendResponse([
        'success' => false,
        'error' => 'MISSING_PARAMETER',
        'message' => 'Parámetro RUC requerido',
        'usage' => [
            'GET' => '/api.php?ruc=20100070970',
            'POST' => 'Content-Type: application/json, Body: {"ruc": "20100070970"}'
        ]
    ], 400);
}

// Limpiar y validar RUC
$ruc = trim($ruc);

if (strlen($ruc) !== 11) {
    sendResponse([
        'success' => false,
        'error' => 'INVALID_LENGTH',
        'message' => 'RUC debe tener exactamente 11 dígitos',
        'received' => $ruc
    ], 400);
}

if (!ctype_digit($ruc)) {
    sendResponse([
        'success' => false,
        'error' => 'INVALID_FORMAT',
        'message' => 'RUC debe contener solo números',
        'received' => $ruc
    ], 400);
}

// Consultar RUC
try {
    $factory = new RucFactory();
    $cs = $factory->create();
    $company = $cs->get($ruc);
    
    if (!$company) {
        sendResponse([
            'success' => false,
            'error' => 'NOT_FOUND',
            'message' => 'No se encontraron datos para el RUC proporcionado',
            'ruc' => $ruc
        ], 404);
    }
    
    // Respuesta exitosa
    sendResponse([
        'success' => true,
        'message' => 'Consulta exitosa',
        'timestamp' => date('Y-m-d H:i:s'),
        'ruc' => $ruc,
        'data' => $company
    ]);
    
} catch (Exception $e) {
    sendResponse([
        'success' => false,
        'error' => 'SERVER_ERROR',
        'message' => 'Error interno del servidor',
        'details' => $e->getMessage()
    ], 500);
}
?>
