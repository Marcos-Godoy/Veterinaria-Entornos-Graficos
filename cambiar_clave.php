<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Turno</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="imagenes/logovet.png" type="image/png">
</head>
<body>
<nav class="navbar navbar-expand-lg  bg-dark ">
<a class="navbar-brand" href="pagina.php">
      <img src="imagenes/logovet.png" alt="Logo" title="Logo" width="50" height="50">
        Veterinaria San Anton
    </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto" >
      <li class="nav-item">
        <a class="nav-link" href="quienes-somos.php">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.php">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>
<br><br><br>

<div class="container">
  <h2>Cambiar Contraseña</h2>
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
    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
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
<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="pagina.php">Inicio</a></li>
          <li><a href="quienes-somos.php">Quienes somos?</a></li>
          <li><a href="servicios.php">Servicios</a></li>
          <li><a href="contacto.php">Contacto</a></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
      </div>
      <div class="col-md-6">
        <br>
        <h5>Contacto</h5>
        <address>
          Veterinaria San Anton<br>
          123 Calle Principal<br>
          Rosario, Argentina<br>
          Teléfono: 123-456-7890<br>
          Correo electrónico: info@example.com
        </address>
      </div>
    </div>
  </div>
</footer>
</body>
</html>