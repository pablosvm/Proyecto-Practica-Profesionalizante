document.addEventListener("DOMContentLoaded", function () {
  const productos = document.querySelectorAll(".producto");
  const carrito = document.getElementById("productos-seleccionados");
  const botonCarrito = document.getElementById("boton-carrito");
  const totalInput = document.getElementById("total");

  // Objeto para almacenar productos seleccionados
  const productosSeleccionados = {};

  // Función para actualizar el carrito y el total
  function actualizarCarritoYTotal() {
    carrito.innerHTML = "";
    let totalPedido = 0;

    for (const key in productosSeleccionados) {
      const productoSeleccionado = productosSeleccionados[key];
      const nuevoProducto = document.createElement("li");
      nuevoProducto.textContent = `${productoSeleccionado.nombre} - $${productoSeleccionado.costo.toFixed(2)}`;
      carrito.appendChild(nuevoProducto);
      totalPedido += productoSeleccionado.costo;
    }

    totalInput.value = `$${totalPedido.toFixed(2)}`;
  }

  // Agregar o eliminar productos seleccionados
  productos.forEach((producto, index) => {
    const botonSeleccionar = producto.querySelector(".seleccionar");
    const nombreProducto = producto.querySelector(".nombre").textContent;
    const costoProducto = parseFloat(producto.querySelector(".costo").textContent.replace("$", ""));

    botonSeleccionar.addEventListener("click", () => {
      if (!productosSeleccionados[index]) {
        // Agregar producto al carrito
        productosSeleccionados[index] = {
          nombre: nombreProducto,
          costo: costoProducto,
        };
        const nuevoProducto = document.createElement("li");
        nuevoProducto.textContent = `${nombreProducto} - $${costoProducto.toFixed(2)}`;
        document.getElementById("productos-seleccionados").appendChild(nuevoProducto);
        // Mostrar el icono de la tilde
        producto.querySelector(".checkmark").style.display = "block";
      } else {
        // Eliminar producto del carrito
        delete productosSeleccionados[index];
        carrito.innerHTML = "";
        for (const key in productosSeleccionados) {
          const productoSeleccionado = document.createElement("li");
          productoSeleccionado.textContent = `${productosSeleccionados[key].nombre} - $${productosSeleccionados[key].costo.toFixed(2)}`;
          document.getElementById("productos-seleccionados").appendChild(productoSeleccionado);
        }
        // Ocultar el icono de la tilde
        producto.querySelector(".checkmark").style.display = "none";
      }
    });
  });

  // Redirigir al formulario de pedido al hacer clic en el botón "Carrito"
  botonCarrito.addEventListener("click", () => {
    const productosParaPedido = Object.values(productosSeleccionados);
    const totalPedido = productosParaPedido.reduce((total, producto) => total + producto.costo, 0);
    // Guardar productos en localStorage para usarlos en el formulario de pedido
    localStorage.setItem("productosParaPedido", JSON.stringify(productosParaPedido));
    localStorage.setItem("totalPedido", totalPedido);
    // Redireccionar al formulario de pedido
    window.location.href = "pedido.html";
  });
});