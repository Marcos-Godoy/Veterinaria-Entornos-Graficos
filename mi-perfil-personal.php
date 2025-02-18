<?php
  session_start();
  if (!isset($_SESSION['usuario_id'])) {
      header("Location: login.html");
      exit();
  }
  include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mi Perfil - Personal</title>
    <?php include 'headers.php'; ?>
</head>
<body>
<?php
include 'navbar.php';

$personal_id = $_SESSION['usuario_id'];
$sql = "SELECT fecha_hora FROM turnos WHERE personal_id = $personal_id AND estado = 'ocupado' order by fecha_hora";
$result = $conn->query($sql);
?>

<br><br>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="completar_atencion.php" class="list-group-item list-group-item-action active" title="Registrar una nueva atención de una mascota">Registrar Atención</a>
                <a href="listar_mascotas_estado.php" class="list-group-item list-group-item-action" title="Consultar y modificar atenciones">Gestionar Atenciones</a>
                <a href="cambiar_clave.php" class="list-group-item list-group-item-action" title="Cambiar contraseña de usuario">Cambiar Contraseña</a>
            </div>
        </div>
        <div class="col-md-9">
            <h1>Mi Perfil: <?php echo $_SESSION["nombre"]?></h1>
            <hr>
            <h4>Perfil de Personal</h4>
            <p>Desde acá podés consultar fichas clínicas, registrar y modificar atenciones de las mascotas de la veterinaria.</p>
        </div>
    </div>
    <br><br>
    <h4>Turnos del Personal</h4>
    <hr>
    <?php
    if ($result === false) {
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

<br><br><br>
<?php
  include 'footer.php';
?>
</body>
</html>