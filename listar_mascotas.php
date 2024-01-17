<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Listado de Mascotas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
  <!-- ... (tu barra de navegación) ... -->
</nav>
<br>
<div class="container mt-4">
  <h2>Listado de Mascotas</h2>
  <br>
  <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Raza</th>
            <th>Color</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Muerte</th>
            <th>Acciones</th> <!-- Nueva columna de Acciones -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Reemplaza con tus credenciales y ajustes de conexión
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_entornos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtén el id_cliente del formulario o de alguna otra fuente
        $id_cliente = $_POST['cliente_id']; // Ajusta según cómo obtienes el id_cliente

        // Consulta para obtener la lista de mascotas asociadas al cliente
        $consulta_mascotas = "SELECT * FROM Mascotas WHERE cliente_id = $id_cliente";
        $resultado_mascotas = $conn->query($consulta_mascotas);

        // Muestra la lista de mascotas
        if ($resultado_mascotas->num_rows > 0) {
            while ($mascota = $resultado_mascotas->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$mascota['id']}</td>";
                echo "<td>{$mascota['nombre']}</td>";
                echo "<td>{$mascota['foto']}</td>";
                echo "<td>{$mascota['raza']}</td>";
                echo "<td>{$mascota['color']}</td>";
                echo "<td>{$mascota['fecha_de_nac']}</td>";
                echo "<td>{$mascota['fecha_muerte']}</td>";
                echo "<td>";
                echo "<a href='generar_carnet.php?nombre_mascota={$mascota['nombre']}' class='btn btn-info'>Ver Carnet</a> ";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay mascotas registradas para este cliente.</td></tr>";
        }

        // Cierra la conexión a la base de datos
        $conn->close();
        ?>
    </tbody>
</table>
</div>

<!-- Footer -->

</body>
</html>
