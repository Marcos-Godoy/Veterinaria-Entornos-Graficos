<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Mi Perfil - Administrador</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include "navbar.php";
?>
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
<?php
  include "footer.php";
?>
</body>
</html>