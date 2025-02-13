<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Servicios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="icon" href="imagenes/logovet.png" type="image/png">

  <style>
    .carousel-inner img {
      width: 100%;
      height: 500px;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }
    nav {
      margin-bottom: auto;
    }
    .centered-box {
      width: 85%;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      text-align: center;
      margin: auto;
      background-color: #f2f2f2;

    }
    footer {
      margin-top: auto;
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark">
  <a class="navbar-brand" href="pagina.php">
    <img src="imagenes/logovet.png" alt="Logo" title="Logo" width="50" height="50">
      Veterinaria San Anton
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="quienes-somos.php">Quienes somos?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="servicios.php">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gestionar-mi-perfil.php">Mi Perfil</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php if (isset($_SESSION['usuario_id'])): ?>
        <li class="nav-item">
            <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Iniciar sesión</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<div id="carouselExample" class="carousel slide" data-ride="carousel" > 
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="imagenes/foto1.jpg" alt="First slide" title="Foto 1">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/foto2.jpg" alt="Second slide" title="Foto 2">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/foto3.jpg" alt="Thrid slide" title="Foto 3">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/foto4.jpg" alt="Fourth slide" title="Foto 4">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/foto5.jpg" alt="Fifth slide" title="Foto 5">
    </div>
  </div>
</div>


<br>
<div class="centered-box">
  <h2>Cuidados Animales</h2>
  <hr>
  <p>Ofrecemos cuidados animales completos para asegurar la salud y el bienestar de tus mascotas. Nuestro equipo de veterinarios está capacitado para diagnosticar y tratar diversas condiciones médicas. Proporcionamos servicios como vacunaciones, chequeos regulares, tratamientos para enfermedades crónicas, cirugías y atención de emergencias.</p>
</div>
<br>
<div class="centered-box">
  <h2>Cuidados Medicinales</h2>
  <hr>
  <p>En nuestra veterinaria, nos especializamos en ofrecer cuidados medicinales integrales para tus mascotas. Nuestro equipo de veterinarios está altamente capacitado para diagnosticar y tratar una amplia variedad de condiciones médicas. Ofrecemos servicios que incluyen vacunaciones, chequeos regulares, tratamientos para enfermedades crónicas, cirugías, y atención de emergencias. Utilizamos equipos de última generación y técnicas avanzadas para asegurar que tu mascota reciba el mejor cuidado posible. Además, proporcionamos asesoramiento personalizado para el manejo de la salud y el bienestar de tus animales, asegurando que vivan una vida larga y saludable.</p>
</div>
<br>
<div class="centered-box">
  <h2>Estética</h2>
  <hr>
  <p>En nuestra veterinaria, ofrecemos servicios de estética para mantener a tus mascotas limpias y bien cuidadas. Nuestro equipo de profesionales se encarga de baños, cortes de pelo, limpieza de oídos y corte de uñas, utilizando productos de alta calidad y técnicas seguras para garantizar el bienestar de tu mascota.</p>
</div>
<br>
<div class="centered-box">
  <h2>Arrendamientos de jaulas</h2>
  <hr>
  <p>Nos aseguramos que tus mascotas tengan un lugar seguro y cómodo durante su estancia. Nuestras jaulas están diseñadas para proporcionar el máximo confort y seguridad, y son adecuadas para animales de diferentes tamaños. Además, nuestro personal se encarga de mantener las jaulas limpias y desinfectadas.</p>
</div>
<br><div class="centered-box">
  <h2>Hospitalización</h2>
  <hr>
  <p>Nuestro equipo de veterinarios y técnicos está disponible las 24 horas del día para proporcionar cuidados intensivos y tratamientos especializados. Contamos con instalaciones equipadas con tecnología avanzada para asegurar que tu mascota reciba el mejor cuidado posible durante su estancia. Nos comprometemos a mantener un ambiente seguro y confortable para facilitar la recuperación de tu mascota.</p>
</div>
<br><div class="centered-box">
  <h2>Hotelería animal</h2>
  <hr>
  <p>Ofrecemos servicios de hotelería animal para que tus mascotas tengan un lugar seguro y cómodo durante su ausencia. Nuestras instalaciones están diseñadas para proporcionar el máximo confort y seguridad, con áreas adecuadas para animales de diferentes tamaños. </p>
</div>
<br><div class="centered-box">
  <h2>Venta de productos para mascotas</h2>
  <hr>
  <p>En nuestra veterinaria, ofrecemos una amplia variedad de productos para mascotas para satisfacer todas sus necesidades. Contamos con alimentos de alta calidad, juguetes, accesorios, productos de higiene y cuidado, entre otros. Nuestro personal está disponible para asesorarte y ayudarte a elegir los productos más adecuados para tu mascota, asegurando su bienestar y felicidad.</p>
</div>
<br>

<footer class="footer bg-dark text-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <br>
        <h5>Mapa de Sitio</h5>
        <ul class="list-unstyled">
          <li><a href="pagina.php">Inicio</a></li>
          <li><a href="quienes-somos.php">Quienes somos?</a></li>
          <li><a href="servicios.php">Servicios</a></li>
          <li><a href="contacto.php">Contacto</a></li>
          <?php if (isset($_SESSION['usuario_id'])): ?>
            <li><a href="logout.php">Cerrar Sesión</a></li>
          <?php else: ?>
            <li><a href="login.html">Iniciar Sesión</a></li>
          <?php endif; ?>
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
