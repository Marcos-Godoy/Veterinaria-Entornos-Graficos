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

<div class="container">
  <h1>Cambiar Contraseña</h1>
  <hr>
  <form action="cambiar_clave.php" method="post">
    <div class="form-group">
      <label for="actual">Contraseña Actual:</label>
      <input type="password" class="form-control" id="actual" name="actual" required>
    </div>
    <div class="form-group">
      <label for="nueva">Nueva Contraseña:</label>
      <input type="password" class="form-control" id="nueva" name="nueva" required>
    </div>
    <div class="form-group">
      <label for="confirmacion">Confirmar Nueva Contraseña:</label>
      <input type="password" class="form-control" id="confirmacion" name="confirmacion" required>
    </div>
    <button type="submit" class="btn btn-primary" title="Confirmar cambio de contraseña">Cambiar Contraseña</button>
    <a href="gestionar-mi-perfil.php" class="btn btn-secondary" title="Volver a pestaña anterior">Volver</a>
  </form>
</div>

<?php
    include 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $actual = $_POST['actual'];
        $nueva = $_POST['nueva'];
        $confirmacion = $_POST['confirmacion'];

        if ($nueva !== $confirmacion) {
            echo "<script>alert('Las nuevas contraseñas no coinciden.');</script>";
        } else {
            $id = $_SESSION['usuario_id'];
            if($_SESSION['tipo_usuario'] == 'cliente'){
                $sql = "select clave from clientes where id = '$id'";
            } else {
                $sql = "select clave from personal where id = '$id'";
            }            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $contraseña_bd = $row['clave'];
                if($actual == $contraseña_bd){
                    if ($_SESSION['tipo_usuario'] == 'cliente') {
                        $sql = "update clientes set clave='$nueva' where id='$id' and email = '$_SESSION[email]'";
                    } else {
                        $sql = "update personal set clave='$nueva' where id='$id' and email = '$_SESSION[email]'";
                    }
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Contraseña cambiada exitosamente.');window.location.href = 'gestionar-mi-perfil.php'</script>";
                    } else {
                        echo "<script>alert('Error al cambiar la contraseña.');</script>";
                    }
                }
                else {
                    echo "<script>alert('La contraseña actual es incorrecta.');</script>";
                }
            }
            else {
                echo "<script>alert('Usuario no encontrado.');</script>";
            }
            $conn->close();
        }
    }
?>
<br><br><br>
<?php
  include 'footer.php';
?>
</body>
</html>