<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "punto_y_papel";

$mysqli = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>
