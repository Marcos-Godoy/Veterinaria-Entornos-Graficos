<!-- ... Tu código HTML anterior ... -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="tomar_turno.php" class="list-group-item list-group-item-action active">Solicitar Turno</a>
            </div>
        </div>
        <div class="col-md-9">
            <h2>Mi Perfil</h2>
            <hr>
            <h4>Perfil de Cliente</h4>
            <p>Desde aquí puedes consultar fichas clínicas, registrar a un cliente y/o un servicio.</p>

            <!-- Sección para mostrar los turnos ocupados -->
            <h4>Turnos Ocupados</h4>
            <?php
            session_start();

            // Verificar si el usuario está autenticado
            if (!isset($_SESSION['usuario_id'])) {
                // Redirigir al inicio de sesión si no está autenticado
                header("Location: login.html");
                exit();
            }

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

            // Consultar los turnos ocupados del cliente desde la base de datos
            $cliente_id = $_SESSION['usuario_id'];
            $sql = "SELECT * FROM turnos WHERE cliente_id = $cliente_id AND estado = 'ocupado'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fechaHora = date("d/m/Y H:i", strtotime($row['fecha_hora']));
                    echo "<p>Fecha y Hora: $fechaHora</p>";
                    // Mostrar alerta de JavaScript para cada turno
                    echo "<script>
                            alert('Tienes un turno ocupado el $fechaHora. Revisa la sección de turnos para obtener más detalles.');
                        </script>";
                }
            } else {
                echo "<p>No tienes turnos ocupados.</p>";
            }
            $conn->close();
            ?>
            <!-- Fin de la sección de turnos ocupados -->
        </div>
    </div>
</div>


