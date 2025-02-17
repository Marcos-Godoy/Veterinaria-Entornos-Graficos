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
<br><br>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="listar_clientes.php" class="list-group-item list-group-item-action active" title="Registrar un nuevo cliente en el sistema">Gestionar Clientes</a>
          <a href="listar_personales.php" class="list-group-item list-group-item-action" title="Registrar, consultar, modificar y eliminar personal">Gestionar Personales</a>
          <a href="listar_mascotas_estado.php" class="list-group-item list-group-item-action" title="Registrar, consultar, modificar y eliminar personal">Gestionar Mascotas</a>
          <a href="listar_turnos_admin.php" class="list-group-item list-group-item-action" title="Crear nuevos turnos">Gestionar Turnos</a>
          <a href="completar_atencion.php" class="list-group-item list-group-item-action" title="Registrar una nueva atención de una mascota">Registrar Atención</a>
          <!--<a href="consultar_carnet.php" class="list-group-item list-group-item-action" title="Consultar y modificar atenciones">Gestionar Atenciones</a>-->
          <a href="cambiar_clave.php" class="list-group-item list-group-item-action" title="Cambiar la contraseña de usuario">Cambiar Contraseña</a>
        </div>
      </div>
      <div class="col-md-9">
        <h1>Mi Perfil: <?php echo $_SESSION["nombre"]?></h1>
        <hr>
        <h4>Perfil de Administrador</h4>
        <p>Desde aqui podes consultar fichas clinicas, registrar a un cliente y/o un servicio, etc. </p>
      </div>
    </div>
</div>
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