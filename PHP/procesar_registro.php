<?php

$servername = "localhost"; // Cambia a la dirección de tu servidor MySQL
$username = "root@localhost";
$password = "";
$database = "punto_y_papel_loguin"; // Cambia al nombre de tu base de datos

$conexion = mysqli_connect($servername, $username, $password, $database);

// Verifica si la conexión se estableció correctamente
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    
    // Verifica si el correo ya existe en la base de datos "usuarios_login".
    // Si no existe, inserta un nuevo registro en la tabla "usuarios_login".
    // Implementa medidas de seguridad, como el hash de contraseñas.
    // Redirige al usuario después del registro.
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    
    // Verifica si el correo ya existe en la base de datos
    $sql = "SELECT * FROM usuarios_login WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) == 0) {
        // El correo no está en uso, inserta un nuevo registro
        // Asegúrate de aplicar hash y salt a la contraseña antes de guardarla.
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios_login (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$hashed_password')";
        
        if (mysqli_query($conexion, $sql)) {
            // El registro se realizó con éxito
            // Puedes redirigir al usuario a la página de inicio de sesión.
        } else {
            // Hubo un error en la inserción de datos
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
    } else {
        // El correo ya está en uso, muestra un mensaje de error
        echo "El correo ya está registrado";
    }
}

mysqli_close($conexion);
?>