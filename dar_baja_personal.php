<?php
include 'conexion.php';

// Obtén el ID del personal a dar de baja desde la URL
$id_personal = $_GET['id'];

// Verifica si se ha enviado la confirmación desde JavaScript
if (isset($_GET['confirmacion']) && $_GET['confirmacion'] == 'true') {
    // Consulta para eliminar físicamente el registro
    $consulta_eliminar = "DELETE FROM personal WHERE id = $id_personal";

    if ($conn->query($consulta_eliminar) === TRUE) {
        // Eliminación exitosa
        header("Location: listar_personales.php?mensaje=Eliminación exitosa");
        exit();
    } else {
        // Error al eliminar
        header("Location: listar_personales.php?mensaje=Error al eliminar");
        exit();
    }
} else {
    // Mostrar confirmación en JavaScript
    echo "<script>
          if (confirm('¿Estás seguro de que quieres dar de baja a este personal?')) {
              window.location.href = 'dar_baja_personal.php?id=$id_personal&confirmacion=true';
          } else {
              window.location.href = 'listar_personales.php';
          }
        </script>";
}
// Cierra la conexión a la base de datos
$conn->close();
?>

