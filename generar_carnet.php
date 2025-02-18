<?php
session_start();
include 'conexion.php';

//$nombre_mascota = isset($_POST['nombre_mascota']) ? $_POST['nombre_mascota'] : (isset($_GET['nombre_mascota']) ? $_GET['nombre_mascota'] : null);

if(isset($_POST['nombre_mascota'])) {
    $nombre_mascota = $_POST['nombre_mascota'];
} else {
    $nombre_mascota = $_GET['nombre_mascota'];
} 
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

    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<title>Carnet de Mascota</title>";
    include 'headers.php';
    echo "<style>
      body { background-color: #f0f0f0; }
      .carnet { width: 500px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 15px; }
      .carnet h1 { text-align: center; color: #333; }
      .carnet .info { display: flex; align-items: center; }
      .carnet img { max-width: 150px; height: auto; border-radius: 10px; margin-right: 20px; }
      .carnet table { width: 100%; }
      .carnet th, .carnet td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
      .atenciones { margin-top: 20px; }
      .atenciones h2 { text-align: center; color: #333; }
      .atenciones table { width: 100%; }
      .atenciones th, .atenciones td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
      .container { margin-top: 50px;}
    </style>";
    echo "</head>";
    echo "<body>";
    include 'navbar.php';
    echo "<br><br>";
    // Mostrar mensaje si la mascota está fallecida
    if (!empty($mascota['fecha_muerte']) && $mascota['fecha_muerte'] != '0000-00-00') {
      echo "<div class='alert alert-danger text-center'>Esta mascota falleció el " . $mascota['fecha_muerte'] . ".</div>";
    } 

    echo "<div class='carnet'>";
    echo "<h1>Carnet de {$mascota['nombre']}</h1><hr>";
    echo "<div class='info'>";
    echo "<img src='{$mascota['foto']}' alt='Foto de {$mascota['nombre']}' title='Foto de {$mascota['nombre']}'>";
    echo "<table>";
    echo "<tr><th>ID</th><td>" . $mascota['id'] . "</td></tr>";
    echo "<tr><th>Nombre</th><td>" . $mascota['nombre'] . "</td></tr>";
    echo "<tr><th>Raza</th><td>" . $mascota['raza'] . "</td></tr>";
    echo "<tr><th>Color</th><td>" . $mascota['color'] . "</td></tr>";
    echo "<tr><th>Fecha de Nacimiento</th><td>" . $mascota['fecha_de_nac'] . "</td></tr>";
    //echo "<tr><th>Fecha de Muerte</th><td>" . $mascota['fecha_muerte'] . "</td></tr>";
    echo "</table>";
    echo "</div>";
    echo "</div> <br>";

    
    echo "<div class=' container atenciones'>";
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
        if (!empty($mascota['fecha_muerte']) && $mascota['fecha_muerte'] != '0000-00-00') {
          echo "<td><a href='editar_atencion.php?id=" . $atencion['id'] . "' class = 'btn btn-primary disabled' title='No puede editar una mascota fallecida'>Editar</a></td>";
        } else {
          if(isset($_SESSION['rol_id'])){
            echo "<td><a href='editar_atencion.php?id=" . $atencion['id'] . "&nombre=" . $mascota['nombre'] . "' class='btn btn-primary' title='Editar mascota'>Editar</a></td>";
          } else {
            echo "<td>Sin Acciones</td>";
          }
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay atenciones registradas para esta mascota.</p>";
}
echo "<br><a href='listar_mascotas_estado.php' class='btn btn-primary' title='Volver a pestaña anterior'>Volver</a><br></div>";
include 'footer.php';

    echo "<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>";
    echo "</body>";
    echo "</html>";
} else {
    echo "<script>alert('No se encontró la mascota con el nombre proporcionado.'); window.location.href = 'consultar_carnet.php';</script>";
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

