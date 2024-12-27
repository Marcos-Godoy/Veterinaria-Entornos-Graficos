<?php
include 'conexion.php';

$registros_por_pagina = 5;

// Obtener el número de la página actual desde la URL, por defecto es 1
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta SQL para obtener el número total de registros de mascotas activas
$total_registros_query = "SELECT COUNT(*) as total FROM mascotas WHERE fecha_muerte = '0000-00-00'";
$total_registros_result = $conn->query($total_registros_query);
$total_registros = $total_registros_result->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Consulta SQL para obtener los registros de la página actual de mascotas activas
$consulta_mascotas_activas = "SELECT * FROM mascotas WHERE fecha_muerte = '0000-00-00' LIMIT $registros_por_pagina OFFSET $offset";
$resultado_mascotas_activas = $conn->query($consulta_mascotas_activas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listar Mascotas por Estado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg  bg-dark ">
    <a class="navbar-brand" href="pagina.html">
      <img src="imagenes/logovet.png" alt="Logo" width="50" height="50">
        Veterinaria San Anton
    </a>

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
    <h3>Mascotas Activas</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Raza</th>
                <th>Color</th>
                <th>Fecha de Nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado_mascotas_activas->num_rows > 0) {
                while ($mascota_activa = $resultado_mascotas_activas->fetch_assoc()) {
                    echo "<tr style='background-color: #c8e6c9;'>";
                    echo "<td>{$mascota_activa['id']}</td>";
                    echo "<td>{$mascota_activa['nombre']}</td>";
                    echo "<td><img src='{$mascota_activa['foto']}' alt='Foto de {$mascota_activa['nombre']}' style='width: 50px; height: 40px;'></td>";
                    echo "<td>{$mascota_activa['raza']}</td>";
                    echo "<td>{$mascota_activa['color']}</td>";
                    echo "<td>{$mascota_activa['fecha_de_nac']}</td>";
                    echo "<td>";
                    echo "<div class='btn-group' role='group'>";
                    echo "<a href='generar_carnet.php?nombre_mascota={$mascota_activa['nombre']}' class='btn btn-info'>Ver Carnet</a>";
                    echo "<a href='modificar_mascota.php?id={$mascota_activa['id']}' class='btn btn-warning'>Modificar</a>";
                    echo "<button class='btn btn-danger' data-toggle='modal' data-target='#eliminarModal' data-id='{$mascota_activa['id']}'>Eliminar</button>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr style='background-color: #c8e6c9><td colspan='7'>No hay mascotas activas registradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Paginación -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($pagina_actual > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <li class="page-item <?php if ($i == $pagina_actual) echo 'active'; ?>">
                    <a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($pagina_actual < $total_paginas): ?>
                <li class="page-item">
                    <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>" aria-label="Siguiente">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <h3>Mascotas Muertas</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Raza</th>
                <th>Color</th>
                <th>Fecha de Nacimiento</th>
                <th>Fecha de Muerte</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta_mascotas_muertas = "SELECT * FROM mascotas WHERE fecha_muerte != '0000-00-00'";
            $resultado_mascotas_muertas = $conn->query($consulta_mascotas_muertas);

            if ($resultado_mascotas_muertas->num_rows > 0) {
                while ($mascota_muerta = $resultado_mascotas_muertas->fetch_assoc()) {
                    echo "<tr style='background-color: #ffcdd2;'>";
                    echo "<td>{$mascota_muerta['id']}</td>";
                    echo "<td>{$mascota_muerta['nombre']}</td>";
                    echo "<td><img src='{$mascota_muerta['foto']}' alt='Foto de {$mascota_muerta['nombre']}' style='width: 50px; height: 40px;'></td>";
                    echo "<td>{$mascota_muerta['raza']}</td>";
                    echo "<td>{$mascota_muerta['color']}</td>";
                    echo "<td>{$mascota_muerta['fecha_de_nac']}</td>";
                    echo "<td>{$mascota_muerta['fecha_muerte']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr style='background-color: #ffcdd2'><td colspan='8'>No hay mascotas muertas registradas.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <br>
    <a href="registrar_mascota.html" class="btn btn-success">Nueva Mascota</a>
    <a href="gestionar-mi-perfil.php" class="btn btn-primary">Volver</a>
</div>
<br>
<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="pagina.html">Inicio</a></li>
          <li><a href="quienes-somos.html">Quienes somos?</a></li>
          <li><a href="servicios.html">Servicios</a></li>
          <li><a href="contacto.html">Contacto</a></li>
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

<!-- Modal para eliminar mascota -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar Mascota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="baja_mascota.php" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="mascotaId">
          <div class="form-group">
            <label for="fecha_muerte">Fecha de Muerte:</label>
            <input type="date" class="form-control" id="fecha_muerte" name="fecha_muerte" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
  $('#eliminarModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    modal.find('#mascotaId').val(id);
  });
</script>
</body>
</html>