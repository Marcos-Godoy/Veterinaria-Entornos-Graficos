<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Servicios</title>
  <?php include 'headers.php'; ?>
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

<?php
  include "navbar.php";
?>

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
<div>
  <h1 style='text-align: center'>Conoce Nuestros Servicios</h1>
  <hr style='width: 85%'>
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

<?php
  include "footer.php";
?>

</body>
</html>
