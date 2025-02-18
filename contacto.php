<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Formulario de Contacto</title>
  <?php include 'headers.php'; ?>
</head>
<body>

<?php
  include "navbar.php";
?>

<br><br>
<div class="container">
  <h1 class="text-center">Formulario de Contacto</h1>
  <hr>
  <form action="enviar_email.php" method="post">
    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
    </div>
    <div class="form-group">
      <label for="email">Correo electrónico:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico">
    </div>
    <div class="form-group">
      <label for="mensaje">Mensaje:</label>
      <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Ingrese su mensaje"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" title="Enviar mail a Veterinaria San Anton">Enviar</button>
  </form>
</div>
<br><br><br>
<?php
  include "footer.php";
?>
</body>
</html>
