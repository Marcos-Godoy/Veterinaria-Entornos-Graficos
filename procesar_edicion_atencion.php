<?php
// Realiza la conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_entornos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene los datos del formulario de edición
$id_atencion = $_POST['id_atencion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
// Añade otros campos según tus necesidades

// Consulta para actualizar la atención en la base de datos
$actualizar_atencion = "UPDATE atenciones SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = '$id_atencion'";
if ($conn->query($actualizar_atencion) === TRUE) {
    // Redirige a la página generar_carnet.php después de la edición
    header("Location: consultar_carnet.html");
    exit();
} else {
    echo "Error al actualizar la atención: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>

