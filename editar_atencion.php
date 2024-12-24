<?php
include 'conexion.php';

// Obtiene el ID de la atención desde la URL
$id_atencion = $_GET['id'];

// Consulta para obtener la información de la atención
$consulta_atencion = "SELECT * FROM atenciones WHERE id = '$id_atencion'";
$resultado_atencion = $conn->query($consulta_atencion);

// Verifica si la atención existe
if ($resultado_atencion->num_rows > 0) {
    $atencion = $resultado_atencion->fetch_assoc();

    // TODO: Añade aquí el formulario de edición con los campos necesarios
    echo "<html>";
    echo "<head>";
    echo '<meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>";
    echo "<style>";
    echo "body { font-family: 'Arial', sans-serif; background-color: #f0f0f0; }";
    echo ".form-container { width: 500px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 15px; }";
    echo "label { display: block; margin-bottom: 10px; }";
    echo "input, textarea { width: 100%; padding: 10px; margin-bottom: 15px; }";
    echo "input[disabled], textarea[disabled] { background-color: #eee; }";
    echo "input[type='submit'] { background-color: #4caf50; color: #fff; cursor: pointer; }";
    echo "</style>";
    echo "</head>";
    echo "<body><nav class='navbar navbar-expand-lg  bg-dark '>
  <a class='navbar-brand' href='pagina.html'><img src='imagenes\\logovet.png' alt='Logo' width='50' height='50'></a>

  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
  </button>

  <div class='collapse navbar-collapse' id='navbarNav'>
    <ul class='navbar-nav mx-auto' >
      <li class='nav-item'>
        <a class='nav-link' href='quienes-somos.html'>Quienes somos?</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='contacto.html'>Contacto</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='servicios.html'>Servicios</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='mi-perfil.html'>Mi Perfil</a>
      </li>
    </ul>
    <ul class='navbar-nav ml-auto'>
      <li class='nav-item'>
        <a class='nav-link' href='login.html'>Iniciar Sesión</a>
      </li>
    </ul>
  </div>
</nav>
<br><br>";
    echo "<div class='form-container'>";
    echo "<h2>Editar Atención</h2>";
    echo "<form action='procesar_edicion_atencion.php' method='post'>";

    echo "<label for='id_atencion'>ID de Atención:</label>";
    echo "<input type='text' name='id_atencion' value='" . $atencion['id'] . "' disabled><br>";

    echo "<label for='servicio'>Servicio:</label>";
    echo "<input type='text' name='servicio' value='" . obtenerNombreServicio($atencion['servicio_id'], $conn) . "' disabled><br>";

    echo "<label for='personal'>Personal:</label>";
    echo "<input type='text' name='personal' value='" . obtenerNombrePersonal($atencion['personal_id'], $conn) . "' disabled><br>";

    echo "<label for='titulo'>Título:</label>";
    echo "<input type='text' name='titulo' value='" . $atencion['titulo'] . "'><br>";

    echo "<label for='descripcion'>Descripción:</label>";
    echo "<textarea name='descripcion'>" . $atencion['descripcion'] . "</textarea><br>";

    echo "<input type='hidden' name='id_atencion' value='" . $atencion['id'] . "'>";
    echo "<input type='submit' value='Guardar cambios'>";
    echo "</form>";
    echo "</div> <br> <footer class='footer bg-dark text-light'>
  <div class='container'>
    <div class='row'>
      <div class='col-md-6'>
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class='list-unstyled'>
          <li><a href=''>Inicio</a></li>
          <li><a href=''>Quienes somos?</a></li>
          <li><a href=''>Servicios</a></li>
          <li><a href=''>Contacto</a></li>
        </ul>
      </div>
      <div class='col-md-6'>
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
</footer>";

    echo "<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
    echo "</body>";
    echo "</html>";
} else {
    echo "<p>Atención no encontrada.</p>";
}

// Cierra la conexión a la base de datos
$conn->close();

// Funciones auxiliares para obtener nombres de servicio y personal
function obtenerNombreServicio($servicio_id, $conn) {
    $consulta = "SELECT nombre FROM servicios WHERE id = '$servicio_id'";
    $resultado = $conn->query($consulta);
    if ($resultado->num_rows > 0) {
        $servicio = $resultado->fetch_assoc();
        return $servicio['nombre'];
    } else {
        return "Desconocido";
    }
}

function obtenerNombrePersonal($personal_id, $conn) {
    $consulta = "SELECT email FROM personal WHERE id = '$personal_id'";
    $resultado = $conn->query($consulta);
    if ($resultado->num_rows > 0) {
        $personal = $resultado->fetch_assoc();
        return $personal['email'];
    } else {
        return "Desconocido";
    }
}
?>
