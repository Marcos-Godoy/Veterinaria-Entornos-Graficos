<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Mi Perfil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand" href="pagina.php">
      <img src="imagenes/logovet.png" alt="Logo" width="50" height="50">
        Veterinaria San Anton
    </a>
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
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
  <h2>Completar Atención</h2>
  <hr>
  <form action="procesar_atencion.php" method="post">
    <div class="form-group">
      <label for="nombre_mascota">Mascota:<span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nombre_mascota" name="nombre_mascota" placeholder="Nombre de la mascota" required>
    </div>
    <div class="form-group">
      <label for="servicio_id">Servicio:<span class="text-danger">*</span></label>
      <select class="form-control" id="servicio_id" name="servicio_id" required>
        <option value="" disabled selected>Seleccione un servicio</option>
        <option value="1">Consulta General</option>
        <option value="2">Vacunación</option>
        <option value="3">Desparasitación</option>
        <option value="4">Tratamientos</option>
        <option value="5">Curaciones</option>
        <option value="6">Baño</option>
        <option value="7">Corte de Uñas</option>
        <option value="8">Cirugía</option>
        <option value="9">Otros</option>
      </select>
    </div>
    <div class="form-group">
      <label for="fecha_hora">Fecha y Hora:<span class="text-danger">*</span></label>
      <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" required>
    </div>
    <div class="form-group">
      <label for="titulo">Título:</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título">
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción:</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Ingrese la descripción"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Completar Atención</button>
    <a href="gestionar-mi-perfil.php" class="btn btn-secondary">Volver</a>
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
          <li><a href="login.html">Iniciar Sesión</a></li>
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