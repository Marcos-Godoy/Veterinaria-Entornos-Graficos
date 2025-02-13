<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Quienes Somos?</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="icon" href="imagenes/logovet.png" type="image/png">

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

<nav class="navbar navbar-expand-lg  bg-dark ">
  <a class="navbar-brand" href="pagina.php">
    <img src="imagenes/logovet.png" alt="Logo" title="Logo" width="50" height="50">
      Veterinaria San Anton
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto" >
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
<br>


<div class="container">
  <h2 style="text-align: justify;">Quienes somos?</h2>
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
  <br>

<br>

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

<br>
<br>

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