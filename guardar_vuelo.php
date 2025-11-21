<?php
// guardar_vuelo.php

header('Content-Type: application/json');

// Obtener los datos del vuelo
$vuelo = json_decode(file_get_contents('php://input'), true);

// Archivo donde se guardarán
$archivo = 'vuelos.json';

// Leer archivo existente
$vuelos = [];
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $vuelos = json_decode($contenido, true) ?? [];
}

// Agregar el nuevo vuelo
$vuelos[] = $vuelo;

// Guardar de nuevo
file_put_contents($archivo, json_encode($vuelos, JSON_PRETTY_PRINT));

// Respuesta
echo json_encode(["status" => "ok", "mensaje" => "Vuelo guardado exitosamente"]);
