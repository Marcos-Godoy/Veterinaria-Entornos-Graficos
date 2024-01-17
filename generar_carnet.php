<?php
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

// Obtiene el nombre de la mascota desde el formulario (POST) o por la URL (GET)
$nombre_mascota = isset($_POST['nombre_mascota']) ? $_POST['nombre_mascota'] : (isset($_GET['nombre_mascota']) ? $_GET['nombre_mascota'] : null);

// Consulta para obtener la información de la mascota
$consulta_mascota = "SELECT * FROM mascotas WHERE nombre = '$nombre_mascota'";
$resultado_mascota = $conn->query($consulta_mascota);

// Verifica si la mascota existe
if ($resultado_mascota->num_rows > 0) {
    $mascota = $resultado_mascota->fetch_assoc();

    // Consulta para obtener las atenciones de la mascota
    $id_mascota = $mascota['id'];
    $consulta_atenciones = "SELECT * FROM atenciones WHERE mascota_id = '$id_mascota'";
    $resultado_atenciones = $conn->query($consulta_atenciones);

    // Muestra el carnet de la mascota con estilos CSS
    echo "<html>";
    echo "<head>";
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>";
    echo "<style>";
    echo "body { font-family: 'Arial', sans-serif; background-color: #f0f0f0; }";
    echo ".carnet { width: 500px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 15px; }";
    echo ".carnet h2 { text-align: center; color: #333; }";
    echo ".carnet table { width: 100%; }";
    echo ".carnet th, .carnet td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }";
    echo ".atenciones { margin-top: 20px; }";
    echo ".atenciones h2 { text-align: center; color: #333; }";
    echo ".atenciones table { width: 100%; }";
    echo ".atenciones th, .atenciones td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
    .container {
      margin-top: 50px;
    }";
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
    echo "<div class='carnet'>";
    echo "<h2>Carnet de {$mascota['nombre']}</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><td>" . $mascota['id'] . "</td></tr>";
    echo "<tr><th>Nombre</th><td>" . $mascota['nombre'] . "</td></tr>";
    echo "<tr><th>Raza</th><td>" . $mascota['raza'] . "</td></tr>";
    echo "<tr><th>Color</th><td>" . $mascota['color'] . "</td></tr>";
    echo "<tr><th>Fecha de Nacimiento</th><td>" . $mascota['fecha_de_nac'] . "</td></tr>";
    echo "<tr><th>Fecha de Muerte</th><td>" . $mascota['fecha_muerte'] . "</td></tr>";
    echo "</table>";
    echo "</div> <br>";

    
    echo "<div class='atenciones'>";
    echo "<h2>Atenciones de {$mascota['nombre']}</h2><hr>";
if ($resultado_atenciones->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Servicio</th><th>Personal</th><th>Fecha y Hora</th><th>Título</th><th>Descripción</th><th>Acciones</th></tr>";
    while ($atencion = $resultado_atenciones->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $atencion['id'] . "</td>";
        echo "<td>" . obtenerNombreServicio($atencion['servicio_id'], $conn) . "</td>";
        echo "<td>" . obtenerNombrePersonal($atencion['personal_id'], $conn) . "</td>";
        echo "<td>" . $atencion['fecha_hora'] . "</td>";
        echo "<td>" . $atencion['titulo'] . "</td>";
        echo "<td>" . $atencion['descripcion'] . "</td>";
        // Agregar un enlace para editar
        echo "<td><a href='editar_atencion.php?id=" . $atencion['id'] . "'>Editar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay atenciones registradas para esta mascota.</p>";
}
    echo "</div> <footer class='footer bg-dark text-light'>
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
} else {
    echo "<p>Mascota no encontrada.</p>";
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

