<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Modificar Personal</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg  bg-dark ">
  <a class="navbar-brand" href="pagina.html"><img src="imagenes\logovet.png" alt="Logo" width="50" height="50"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto" >
      <li class="nav-item">
        <a class="nav-link" href="quienes-somos.html">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.html">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.html">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.html">Iniciar Sesión</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <h2>Modificar Personal</h2>

  <?php
  include 'conexion.php';

  // Obtén el ID del personal a modificar
  $id_personal = $_GET['id'];

  // Consulta para obtener los datos actuales del personal
  $consulta_personal = "SELECT * FROM personal WHERE id = '$id_personal'";
  $resultado_personal = $conn->query($consulta_personal);

  // Muestra el formulario para modificar
  if ($resultado_personal->num_rows > 0) {
      $personal = $resultado_personal->fetch_assoc();
  ?>
      <form action="procesar_modificacion_personal.php" method="post">
        <input type="hidden" name="id_personal" value="<?php echo $id_personal; ?>">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $personal['nombre']; ?>" required>
        </div>
        <div class="form-group">
          <label for="apellido">Apellido:</label>
          <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $personal['apellido']; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico:</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $personal['email']; ?>" required>
        </div>
        <div class="form-group">
          <label for="rol_id">Rol ID:</label>
          <input type="text" class="form-control" id="rol_id" name="rol_id" value="<?php echo $personal['rol_id']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </form>
  <?php
  } else {
      echo "<p>Personal no encontrado.</p>";
  }

  // Cierra la conexión a la base de datos
  $conn->close();
  ?>

</div>

<!-- Footer -->

</body>
</html>
