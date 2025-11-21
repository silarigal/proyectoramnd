<?php
session_start();

$error = '';
$info_msg = '';

// Mensaje si viene de redirección
if (isset($_GET['msg']) && $_GET['msg'] === 'login_required') {
    $info_msg = "⚠️ Debe iniciar sesión para acceder al panel";
}

// Leer archivo JSON de usuarios
$json_file = 'usuarioAdmin.json';
$usuarios = [];

if (file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    $usuarios = json_decode($json_data, true);
} else {
    $error = "Archivo de usuarios no encontrado";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $found = false;
    foreach ($usuarios as $u) {
        if ($u['usuario'] === $usuario && $u['password'] === $password) {
            $found = true;
            // Guardamos usuario y rol en sesión
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $u['rol'] ?? 'user'; // Por defecto 'user' si no viene el rol
            header("Location: admin.php");
            exit();
        }
    }

    if (!$found) {
        $error = "Usuario o contraseña incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin</title>
<link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>

        <?php if($info_msg): ?>
            <div class="info"><?php echo $info_msg; ?></div>
        <?php endif; ?>

        <?php if($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
