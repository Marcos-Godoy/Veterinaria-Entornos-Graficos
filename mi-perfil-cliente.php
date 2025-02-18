<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Generar Turno</title>
    <?php include 'headers.php'; ?>
</head>
<body>
<?php
  include 'navbar.php';
?>
<br><br>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="listar_mascotas_estado.php" class="list-group-item list-group-item-action active" title="Ver historia clínica de mis mascotas">Consultar Historias Clínicas</a>
              <a href="tomar_turno.php" class="list-group-item list-group-item-action" title="Tomar un turno">Solicitar Turno</a>
              <a href="cambiar_clave.php" class="list-group-item list-group-item-action" title="Cambiar contraseña de usuario">Cambiar Contraseña</a>
            </div>
        </div>
        <div class="col-md-9">
            <h1>Mi Perfil: <?php echo $_SESSION["nombre"]?></h1>
            <hr>
            <h4>Perfil de Cliente</h4>
            <p>Desde acá podés tomar turnos para tus mascotas y consultar los próximos turnos que tenés.</p>
        </div>
      </div>
      <br><br>
            <h4>Turnos del Cliente</h4>
            <hr>
            <?php

            // Verificar si el usuario está autenticado
            if (!isset($_SESSION['usuario_id'])) {
                header("Location: login.html");
                exit();
            }

            include 'conexion.php';

            // Consultar los turnos ocupados del cliente desde la base de datos
            $cliente_id = $_SESSION['usuario_id'];
            $sql = "SELECT fecha_hora FROM turnos WHERE cliente_id = $cliente_id AND estado = 'ocupado'";
            $result = $conn->query($sql);

            if ($result === false) {
                // Mostrar mensaje de error si la consulta falla
                echo "Error en la consulta: " . $conn->error;
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $fechaHora = date("Y-m-d H:i", strtotime($row['fecha_hora']));
                    $timestampFechaHora = strtotime($fechaHora);

                    if ($timestampFechaHora > time()) {
                        echo "<div class='alert alert-info'>
                      Fecha y Hora: <strong>{$fechaHora}</strong> - Turno Pendiente
                    </div>";
                    } else {
                        echo "<div class='alert alert-danger'>
                      Fecha y Hora: <strong>{$fechaHora}</strong> - Turno Terminado
                    </div>";
                    }

                }
            } else {
                echo "<div class='alert alert-danger'>
                      No tienes turnos ...
                    </div>";
            }
            $conn->close();
            ?>      
</div>

<br><br>
<?php
  include 'footer.php'; 
?>
</body>
</html>



