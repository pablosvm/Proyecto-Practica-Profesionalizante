<?php
session_start();
if (!isset($_SESSION["id"]) || !isset($_SESSION["nombre"])) {
    // Si no hay una sesión activa, redirige a la página de inicio de sesión
    header("location: usuario.html");
}
?>


