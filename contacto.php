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
      <?php if (isset($_SESSION['usuario_id'])): ?>
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Iniciar sesión</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
<br>    

<div class="container">
  <h2>Formulario de Contacto</h2>
  <form action="enviar_email.php" method="post">
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico">
    </div>
    <div class="form-group">
      <label for="mensaje">Mensaje:</label>
      <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Ingrese su mensaje"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
<br><br>

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
