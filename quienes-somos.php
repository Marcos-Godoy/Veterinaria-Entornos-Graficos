<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Quienes Somos?</title>
  <?php include 'headers.php'; ?>
  <style type="text/css">
    .centered-box {
      width: 100%;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
      text-align: center;
      margin: auto;
      background-color: #f2f2f2;

    }
    .card-img-top:hover {
      transform: scale(1.1);
      transition: transform 0.3s ease;
    }
  </style>
</head>
<body>
<?php
  include "navbar.php";
?>
<br><br>
<div class="container">
  <h1 class="text-center">¿Quienes Somos?</h1><hr>
  <br>
  <div class="centered-box">
  <h2>Historia de la veterinaria</h2>
  <hr>
  <p> La veterinaria San Antón es una clínica veterinaria que se dedica al cuidado de
animales, cuidados medicinales (rayos X, cirugías, vacunas, alimentación, farmacia,
etc.), estéticos (baños, peluquería, etc.) y otros servicios (arriendo de jaulas,
hospitalización, hotel, venta de productos).
Fue creada por un grupo de médicos veterinarios que quería ofrecer la mejor
medicina posible para perros, gatos y mascotas exóticas.
Actualmente la clínica reside en la ciudad de Rosario provincia de Santa Fe, donde
además cuenta con tres veterinarios titulados de prestigiosas universidades, los
cuales prestan servicios a la clínica y están disponibles para consultas a domicilio.
</p>
</div>
<br><br>

  <div class="centered-box">
  <h2>Staff</h2>
  <hr>
<div class="container mt-4">
  <div class="row">
    <!-- Tarjetas para la primera fila -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 100%;">
        <img src="imagenes/vet1.jpg" class="card-img-top" alt="Veterinario" title="Veterinario">
        <div class="card-body">
          <h5 class="card-title">Nombre Apellido</h5>
          <p class="card-text">Veterinario</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card" style="width: 100%;">
        <img src="imagenes/vet1.jpg" class="card-img-top" alt="Veterinario" title="Veterinario">
        <div class="card-body">
          <h5 class="card-title">Nombre Apellido</h5>
          <p class="card-text">Veterinario</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card" style="width: 100%;">
        <img src="imagenes/vet1.jpg" class="card-img-top" alt="Veterinario" title="Veterinario">
        <div class="card-body">
          <h5 class="card-title">Nombre Apellido</h5>
          <p class="card-text">Veterinario</p>
        </div>
      </div>
    </div>

    <!-- Tarjetas para la segunda fila -->
    <div class="col-md-4 mb-4">
      <div class="card" style="width: 100%;">
        <img src="imagenes/pel.jpg" class="card-img-top" alt="Peluquero" title="Peluquero">
        <div class="card-body">
          <h5 class="card-title">Nombre Apellido</h5>
          <p class="card-text">Peluquero</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card" style="width: 100%;">
        <img src="imagenes/pel.jpg" class="card-img-top" alt="Peluquero" title="Peluquero">
        <div class="card-body">
          <h5 class="card-title">Nombre Apellido</h5>
          <p class="card-text">Peluquero</p>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card" style="width: 100%;">
        <img src="imagenes/sec.jpg" class="card-img-top" alt="Secretaria" title="Secretaria">
        <div class="card-body">
          <h5 class="card-title">Nombre Apellido</h5>
          <p class="card-text">Secretaria</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<br><br>

<div class="centered-box">
  <h2>Preguntas frecuentes</h2>
  <hr>
  <h4>¿Por qué debemos chequear a nuestra mascota todos los años?</h4>
  <p> Los exámenes físicos y las pruebas que realizamos pueden detectar una enfermedad en sus etapas iniciales antes de que su perro o su gato muestre síntomas evidentes. Siempre que sea posible, queremos tratar los problemas de forma precoz, cuando su mascota aún se siente bien.</p>
  <br>
  <h4>¿ Por qué esterilizar a mi mascota antes de los dos años ?</h4>
  <p> Si tenemos decidido no criar con ellas, los beneficios a largo plazo son muchos si decidimos esterilizarlas entre los siete meses y los dos años.
Cuando hablamos de las hembras prevenimos los tumores de mama, las infecciones de matriz, los quistes ovaricos y los embarazos psicológicos.
Cuando hablamos de los machos prevenimos problemas de comportamiento ( marcaje urinario, escapismo, agresividad ), prostatitis y tumores testiculares.
En Zarpa para la esterilización utilizamos técnicas de cirugía sin sangrado junto con protocolos para evitar el dolor y así asegurar una pronta recuperación.</p>
  <br>
  <h4>¿ Como combatir las pulgas, garrapatas, mosquitos...todos los bichos que se acercan a mi mascota ?</h4>
  <p> Nuestros consejos son:
Usar productos de última generación, son los únicos realmente efectivos.
Siempre es mejor usar tratamientos preventivos, pero si ya tenemos el problema, sobre todo en el caso de las pulgas, habrá que tratar tanto al animal como el ambiente.</p>
  <br>
  <h4>¿Por qué son tan peligrosos los parásitos?</h4>
  <p> Los parásitos, ya sean internos o externos, debilitan a tu mascota y le causan todo tipo de problemas. Sus picaduras son molestas y pueden causar afecciones dermatológicas, pero lo más peligroso son las diversas enfermedades que transmiten, algunas de ellas potencialmente mortales.</p>
  <br>
  <h4>¿Cuándo tengo que desparasitar a mi mascota?</h4>
  <p> Junto con las vacunas y una alimentación adecuada, las desparasitaciones periódicas son indispensables para que tu mascota se mantenga sana. Es importante establecer un calendario anual de desparasitaciones, tanto internas como externas, para protegerlo de forma efectiva, utilizando siempre productos de calidad y eficacia probada y asesorados por nuestros veterinarios.</p>
  <br>
</div>
</div>
<br>
<?php
  include "footer.php";
?>
</body>
</html>