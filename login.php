<?php

session_start();

include 'conexion.php';

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT id, email, nombre, 'cliente' as tipo, NULL as rol_id FROM clientes WHERE email = '$email' AND clave = '$password'
            UNION
            SELECT id, email, nombre, 'personal' as tipo, rol_id FROM personal WHERE email = '$email' AND clave = '$password'";

    $consulta = "SELECT rol_id FROM personal WHERE email = '$email' AND clave = '$password'";

    $result = $conn->query($sql);
    $result2 = $conn->query($consulta);

    if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    $row = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['tipo_usuario'] = $row['tipo'];
    $_SESSION['nombre'] = $row['nombre']; // Guardar el nombre del usuario en la sesión
    //$_SESSION['rol_id'] = isset($row['rol_id']) ? $row['rol_id'] : null; // Verifica si existe 'rol_id' en el resultado
    if ($result2->num_rows > 0) {
        $_SESSION['rol_id'] = $row['rol_id'];
    } else {
        unset($_SESSION['rol_id']); 
    }
    echo "<script> window.location.href = 'gestionar-mi-perfil.php';</script>";
} else {
    // Credenciales incorrectas
    echo "<script>alert('Error al iniciar sesión, usuario o contraseña incorrectos'); window.location.href = 'login.html';</script>";
}
}

$conn->close();
?>

