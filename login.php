<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

// No hay una tabla en la base de datos que maneje usuarios y contraseñas
// prueba cambio de rama
// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        echo "Inicio de sesión exitoso";
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
