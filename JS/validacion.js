function validarFormulario() {
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    var mensaje = document.getElementById("mensaje").value;

    // Validación de campos
    if (nombre === "" || email === "" || mensaje === "") {
        alert("Por favor, complete todos los campos.");
        return false; // Impide que se envíe el formulario si faltan campos.
    }

    // Validación de correo electrónico usando una expresión regular simple
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!email.match(emailPattern)) {
        alert("Por favor, ingrese una dirección de correo electrónico válida.");
        return false;
    }

    return true; // Permite que el formulario se envíe si la validación pasa.
}
