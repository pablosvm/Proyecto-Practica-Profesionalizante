<?php
session_start();
require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $codigoPostal = $_POST["codigo-postal"];
    $localidad = $_POST["localidad"];
    $provincia = $_POST["provincia"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Verifica si el correo electrónico ya está registrado
    $consulta = "SELECT id FROM usuarios WHERE email = ?";
    $stmt = $mysqli->prepare($consulta);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        // El correo electrónico no está registrado, procede a registrar al usuario
        $stmt->close();

        // Realiza la inserción en la base de datos
        $insertar = "INSERT INTO usuarios (nombre, apellido, dni, direccion, codigo_postal, localidad, provincia, telefono, celular, email, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($insertar);
        $stmt->bind_param("", $nombre, $apellido, $dni, $direccion, $codigoPostal, $localidad, $provincia, $telefono, $celular, $email, $contrasena);
        $stmt->execute();

        $_SESSION["id"] = $stmt->insert_id;
        $_SESSION["nombre"] = $nombre;
        header("location: inicio.php"); // Redirige a la página de inicio
    } else {
        // El correo electrónico ya está registrado, redirige a la página de registro
        header("location: registro.html");
    }

    $stmt->close();
    $mysqli->close();
}
?>

