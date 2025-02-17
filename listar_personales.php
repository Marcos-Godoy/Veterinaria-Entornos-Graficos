<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Listado de Personales</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <a class="nav-link" href="quienes-somos.php" title="Información de la Veterinaria">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php" title="Formulario de consultas">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.php" title="Nuestros servicios">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php" title="Acciones de usuario">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" title="Cerrar sesión">Cerrar sesión</a>
        </li>
    </ul>
  </div>
</nav>
<br>
<div class="container mt-4">
  <h1>Listado de Personales</h1>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      include 'conexion.php';

      // Consulta para obtener la lista de personales
      $consulta_personales = "SELECT p.id, p.nombre, p.apellido, p.email, r.nombre as rol FROM personal p inner join roles r on p.rol_id = r.id";
      $resultado_personales = $conn->query($consulta_personales);

      // Muestra la lista de personales
      if ($resultado_personales->num_rows > 0) {
          while ($personal = $resultado_personales->fetch_assoc()) {
              echo "<tr>";
              echo "<td>{$personal['id']}</td>";
              echo "<td>{$personal['nombre']}</td>";
              echo "<td>{$personal['apellido']}</td>";
              echo "<td>{$personal['email']}</td>";
              echo "<td>{$personal['rol']}</td>";
              echo "<td>";
              echo "<a href='modificar_personal.php?id={$personal['id']}' class='btn btn-info' title='Modificar personal'>Modificar</a>";
              echo "<a href='dar_baja_personal.php?id={$personal['id']}' class='btn btn-danger' title='Eliminar personal'>Dar de Baja</a>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No hay personales registrados.</td></tr>";
      }

      $conn->close();
      ?>
    </tbody>
  </table>
  <a href="ingresar_personal.php" class="btn btn-success" title="Registrar un nuevo personal">Nuevo Personal</a>
  <a href="gestionar-mi-perfil.php" class="btn btn-primary" title="Volver a pestaña anterior">Volver</a>
</div>
<br><br>

<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="pagina.php" title="Página principal">Inicio</a></li>
          <li><a href="quienes-somos.php" title="Información de la Veterinaria">Quienes somos?</a></li>
          <li><a href="servicios.php" title="Nuestros servicios">Servicios</a></li>
          <li><a href="contacto.php" title="Formulario de consultas">Contacto</a></li>
          <li><a href="logout.php" title="Cerrar sesión">Cerrar Sesión</a></li>
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
