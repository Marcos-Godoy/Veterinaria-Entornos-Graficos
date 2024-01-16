<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al inicio de sesión si no está autenticado
    header("Location: login.html");
    exit();
}

// Contenido específico según el tipo de usuario
$tipoUsuario = $_SESSION['tipo_usuario']; // Puede ser personal o cliente

if ($tipoUsuario === 'cliente') {
    // Contenido para clientes
    header("Location: mi-perfil-cliente.html");
} else{ 
    if($tipoUsuario === 'personal' && $_SESSION['rol_id'] === 0) {
        // Contenido para personal (administrador)
        header("Location: mi-perfil.html");
    } else {
        if ($tipoUsuario === 'personal' && $_SESSION['rol_id'] != 0) {
            // Para peluqueros y veterinarios
            header("Location: mi-perfil-personal.html");
        } else {
            // Tipo de usuario no reconocido, redirigir a la página de inicio
            header("Location: pagina.html");
            exit();
        }
    }
} 