<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Listado de Mascotas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .active-row {
      background-color: #c8e6c9; /* Color verde para mascotas activas */
    }

    .dead-row {
      background-color: #ffcdd2; /* Color rojo para mascotas muertas */
    }
  </style>
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
        <a class="nav-link" href="mi-perfil.html">Mi Perfil</a>
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
  <h2>Listado de Mascotas</h2>
  <hr>
  <h3>Mascotas Activas</h3>
  <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Raza</th>
            <th>Color</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Muerte</th>
            <th>Acciones</th> <!-- Nueva columna de Acciones -->
        </tr>
    </thead>
    <tbody>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_entornos";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $consulta_mascotas_activas = "SELECT * FROM Mascotas WHERE fecha_muerte = '0000-00-00'";
        $resultado_mascotas_activas = $conn->query($consulta_mascotas_activas);
        
        if ($resultado_mascotas_activas->num_rows > 0) {
            while ($mascota_activa = $resultado_mascotas_activas->fetch_assoc()) {
                echo "<tr class='active-row'>";
                echo "<td>{$mascota_activa['id']}</td>";
                echo "<td>{$mascota_activa['nombre']}</td>";
                echo "<td>{$mascota_activa['foto']}</td>";
                echo "<td>{$mascota_activa['raza']}</td>";
                echo "<td>{$mascota_activa['color']}</td>";
                echo "<td>{$mascota_activa['fecha_de_nac']}</td>";
                echo "<td>{$mascota_activa['fecha_muerte']}</td>";
                echo "<td>";
                echo "<a href='generar_carnet.php?nombre_mascota={$mascota_activa['nombre']}' class='btn btn-info'>Ver Carnet</a> ";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr class='active-row'><td colspan='8'>No hay mascotas activas registradas.</td></tr>";
        }

        ?>
    </tbody>
  </table>

  <br>

  <h3>Mascotas Muertas</h3>
  <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Raza</th>
            <th>Color</th>
            <th>Fecha de Nacimiento</th>
            <th>Fecha de Muerte</th>
            <!-- No se incluye la columna Acciones para mascotas muertas -->
        </tr>
    </thead>
    <tbody>
        <?php
        $consulta_mascotas_muertas = "SELECT * FROM Mascotas WHERE fecha_muerte != '0000-00-00'";
        $resultado_mascotas_muertas = $conn->query($consulta_mascotas_muertas);

        if ($resultado_mascotas_muertas->num_rows > 0) {
            while ($mascota_muerta = $resultado_mascotas_muertas->fetch_assoc()) {
                echo "<tr class='dead-row'>";
                echo "<td>{$mascota_muerta['id']}</td>";
                echo "<td>{$mascota_muerta['nombre']}</td>";
                echo "<td>{$mascota_muerta['foto']}</td>";
                echo "<td>{$mascota_muerta['raza']}</td>";
                echo "<td>{$mascota_muerta['color']}</td>";
                echo "<td>{$mascota_muerta['fecha_de_nac']}</td>";
                echo "<td>{$mascota_muerta['fecha_muerte']}</td>";
                // No se incluye la columna Acciones para mascotas muertas
                echo "</tr>";
            }
        } else {
            echo "<tr class='dead-row'><td colspan='7'>No hay mascotas muertas registradas.</td></tr>";
        }
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

<!-- Agrega los scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
