<!DOCTYPE html>
<html lang="es">
<head>
  <title>Página</title>
  <?php
    include 'headers.php';
  ?>
  <style type="text/css">
    .carousel-inner img {
      width: 100%;
      height: 500px;
    }
    .card-custom {
      background-color: #f8f9fa;
      transition: transform 0.2s, background-color 0.2s;
    }
    .card-custom:hover {
      transform: scale(1.05);
      background-color: #e9ecef;
    }
  </style>
</head>
<body>

<?php 
  session_start(); 
  include "navbar.php";
?>

<header class="bg-primary text-white text-center py-3">
  <h1>Bienvenidos a Veterinaria San Anton</h1>
  <p>Tu mejor opción para el cuidado de tus mascotas</p>
</header>

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

<div class="container my-5">
    <h2 class="text-center">Opiniones de nuestros clientes</h2><hr>
    <div class="row">
      <div class="col-md-4">
        <div class="card h-100 card-custom">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Juan Pérez</h5>
            <p class="card-text flex-grow-1">"Excelente servicio y atención. Mis mascotas siempre reciben el mejor cuidado."</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 card-custom">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">María García</h5>
            <p class="card-text flex-grow-1">"El personal es muy amable y profesional. Recomiendo esta veterinaria a todos."</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 card-custom">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Lionel Messi</h5>
            <p class="card-text flex-grow-1">"Siempre confío en Veterinaria San Anton para el cuidado de mis mascotas. Son los mejores."</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  include "footer.php";
?>

<script>
  // Inicializa el carrusel
  $(document).ready(function(){
    $('#carouselExample').carousel();
  });
</script>

</body>
</html>
