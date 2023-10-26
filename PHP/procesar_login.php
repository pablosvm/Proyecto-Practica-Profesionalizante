<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    
    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios_login WHERE correo = '$correo' AND contrasena = '$contrasena'";
    
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) == 1) {
        // Las credenciales son válidas, permite el acceso
        // Puedes redirigir al usuario a la página de inicio.
    } else {
        // Las credenciales son incorrectas, muestra un mensaje de error
        echo "Ingreso invalido";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    
    // Realiza la autenticación en la base de datos "usuarios_login"
    // Verifica si las credenciales son válidas y permite el acceso.
    // Implementa medidas de seguridad, como el hash de contraseñas.
    // Redirige al usuario después de la autenticación.
}

mysqli_close($conexion);
?>