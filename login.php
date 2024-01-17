<?php
// Iniciar sesión
session_start();

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

$sql = "SELECT id, email, 'cliente' as tipo, NULL as rol_id FROM clientes WHERE email = '$email' AND clave = '$password'
        UNION
        SELECT id, email, 'personal' as tipo, rol_id FROM personal WHERE email = '$email' AND clave = '$password'";

$consulta = "SELECT rol_id FROM personal WHERE email = '$email' AND clave = '$password'";

    $result = $conn->query($sql);
    $result2 = $conn->query($consulta);

    if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    $row = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['tipo_usuario'] = $row['tipo'];
    //$_SESSION['rol_id'] = isset($row['rol_id']) ? $row['rol_id'] : null; // Verifica si existe 'rol_id' en el resultado
    if ($result2->num_rows > 0) {
        $_SESSION['rol_id'] = $row['rol_id'];
    } else {
        unset($_SESSION['rol_id']); 
    }

    echo "<script>alert('Inicio de sesión exitoso. Tipo de usuario: {$_SESSION['tipo_usuario']}, ID de usuario: {$_SESSION['usuario_id']}, Rol de usuario: {$_SESSION['rol_id']}'); window.location.href = 'gestionar-mi-perfil.php';</script>";
} else {
    // Credenciales incorrectas
    echo "<script>alert('Error al iniciar sesión, usuario o contraseña incorrectos'); window.location.href = 'login.html';</script>";
}

}

// Cerrar la conexión a la base de datos
$conn->close();
?>

