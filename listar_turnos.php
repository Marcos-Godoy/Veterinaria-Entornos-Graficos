<!DOCTYPE html>
<html>
<head>
    <title>Listar Turnos Disponibles</title>
    <?php include 'headers.php'; ?>
</head>
<?php
session_start();

include 'conexion.php';

// Consulta SQL para obtener los turnos disponibles con información del servicio
$consulta_turnos = "SELECT t.id, t.fecha_hora, t.servicio_id, t.estado, s.nombre as nombre_servicio, s.tipo
                    FROM turnos t
                    INNER JOIN servicios s ON t.servicio_id = s.id
                    WHERE t.estado = 'disponible' and t.fecha_hora > NOW()
                    ORDER BY t.servicio_id, t.fecha_hora";

$resultado_turnos = $conn->query($consulta_turnos);
?>
<body>
<?php
  include 'navbar.php';
?>
<br>
<div class="container">
    <h1 class="mt-4">Lista de Turnos Disponibles</h1>

    <table class="table table-bordered mt-3 container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha y Hora</th>
                <th>Nombre del Servicio</th>
                <th>Tipo del Servicio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Mostrar la lista de turnos
            if ($resultado_turnos->num_rows > 0) {
                while ($turno = $resultado_turnos->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$turno['id']}</td>";
                    echo "<td>{$turno['fecha_hora']}</td>";
                    echo "<td>{$turno['nombre_servicio']}</td>";
                    echo "<td>{$turno['tipo']}</td>";

                    // Botón para tomar el turno
                    echo "<td><a href='tomar_turno.php?id={$turno['id']}' class='btn btn-primary' title='Elegir este turno'>Tomar Turno</a></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay turnos disponibles.</td></tr>";
            }
            ?>

        </tbody>
    </table>
    <a href="gestionar-mi-perfil.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
</div>
<br><br>
<?php
  include 'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
  $conn->close();
?>


