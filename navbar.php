<nav class="navbar navbar-expand-lg bg-dark">
    <a class="navbar-brand" href="pagina.php" title="Página principal">
        <img src="imagenes/logovet.png" alt="Logo" title="Logo" width="50" height="50">
        Veterinaria San Anton
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color: white;">&#9776;</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
        <li class="nav-item">
                <a class="nav-link" href="quienes-somos.php" title="Información de la Veterinaria">Quienes somos?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php" title="Formulario de consultas">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="servicios.php" title="Nuestros servicios">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestionar-mi-perfil.php" title="Acciones de usuario">Mi Perfil</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <li class="nav-item">
                    <p class="nav-link" style="color: #007bff;margin: 0; padding: 0.5rem 1rem; text-decoration: none;"><?php echo $_SESSION['nombre']; ?></p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" title="Cerrar sesión">Cerrar Sesión</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.html" title="Iniciar sesión">Iniciar Sesión</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>