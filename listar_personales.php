<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Listado de Personales</title>
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
<br>
<div class="container mt-4">
  <h2>Listado de Personales</h2>
  <br>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol ID</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'conexion.php';

      // Consulta para obtener la lista de personales
      $consulta_personales = "SELECT * FROM personal";
      $resultado_personales = $conn->query($consulta_personales);

      // Muestra la lista de personales
      if ($resultado_personales->num_rows > 0) {
          while ($personal = $resultado_personales->fetch_assoc()) {
              echo "<tr>";
              echo "<td>{$personal['id']}</td>";
              echo "<td>{$personal['nombre']}</td>";
              echo "<td>{$personal['apellido']}</td>";
              echo "<td>{$personal['email']}</td>";
              echo "<td>{$personal['rol_id']}</td>";
              echo "<td>";
              echo "<a href='modificar_personal.php?id={$personal['id']}' class='btn btn-info'>Modificar</a>";
              echo "<a href='dar_baja_personal.php?id={$personal['id']}' class='btn btn-danger'>Dar de Baja</a>";
              echo "</td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='6'>No hay personales registrados.</td></tr>";
      }

      // Cierra la conexión a la base de datos
      $conn->close();
      ?>
    </tbody>
  </table>
</div>

<br>

<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Quienes somos?</a></li>
          <li><a href="#">Servicios</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </div>
      <div class="col-md-6">
        <br>
        <h5>Contacto</h5>
        <address>
          123 Calle Principal<br>
          Ciudad, País<br>
          Teléfono: 123-456-7890<br>
          Correo electrónico: info@example.com
        </address>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
