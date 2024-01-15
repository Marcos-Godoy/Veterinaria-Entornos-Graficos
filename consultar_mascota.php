<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Realiza la conexión a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_entornos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtiene el ID del cliente del formulario
    $idCliente = $_POST["idCliente"];

    // Realiza la consulta para obtener las mascotas asociadas al cliente por ID
    $consultaMascotas = "SELECT * FROM mascotas WHERE cliente_id = $idCliente";
    $result = $conn->query($consultaMascotas);

    // Muestra las mascotas en una tabla si hay resultados
    if ($result->num_rows > 0) {
        echo '<html lang="es">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Consulta de Mascotas</title>';
        // Agrega los estilos de Bootstrap y el CSS personalizado
        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">';
        echo '<style>';
        echo '.container { margin-top: 50px; }';
        echo '</style>';
        echo '</head>';
        echo '<body>';

        echo '<nav class="navbar navbar-expand-lg  bg-dark ">
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
<br><br>';

        echo '<div class="container">';
        echo '<h3>Mascotas asociadas al cliente con ID ' . $idCliente . ':</h3>';
        echo '<table class="table">';
        echo '<thead><tr><th>ID</th><th>Nombre</th><th>Raza</th><th>Color</th><th>Fecha de Nacimiento</th><th>Fecha de Muerte</th></tr></thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nombre'] . '</td>';
            echo '<td>' . $row['raza'] . '</td>';
            echo '<td>' . $row['color'] . '</td>';
            echo '<td>' . $row['fecha_de_nac'] . '</td>';
            echo '<td>' . $row['fecha_muerte'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div> <br> <br>';

        echo '<footer class="footer bg-dark text-light">
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
';
        // Agrega los scripts de Bootstrap y jQuery
        echo '<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>';
        echo '</body>';
        echo '</html>';
    } else {
        echo '<p class="container">No hay mascotas asociadas al cliente con ID ' . $idCliente . '.</p>';
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
