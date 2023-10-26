<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];


    echo "Nombre: " . $nombre . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Mensaje: " . $mensaje . "<br>";
} else {
    // Redirige en caso de un acceso incorrecto al script
    header("Location: contacto.html");
}
?>