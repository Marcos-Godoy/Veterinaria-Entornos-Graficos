<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Formulario de Contacto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg  bg-dark ">
  <a class="navbar-brand" href="pagina.php">
    <img src="imagenes/logovet.png" alt="Logo" width="50" height="50">
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
<br>    

<div class="container">
  <h2>Registrar Personal</h2>
  <form action="registrar_personal.php" method="post">
    <div class="form-group">
      <label for="nombre">Nombre:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese nombre" required>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese apellido" required>
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico:<span class="text-danger">*</span></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese correo electrónico" required>
    </div>
    <div class="form-group">
      <label for="clave">Clave:<span class="text-danger">*</span></label>
      <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese clave" required>
    </div>
    <div class="form-group">
      <label for="rol_id">Rol:<span class="text-danger">*</span></label>
      <select class="form-control" id="rol_id" name="rol_id" required>
        <option value="" disabled selected>Seleccione un rol</option>
        <option value="1">Administrador</option>
        <option value="2">Peluquero</option>
        <option value="3">Veterinario</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Personal</button>
    <a href="listar_personales.php" class="btn btn-secondary">Volver</a>
  </form>
</div>
<br>

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
