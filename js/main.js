$(document).ready(function() {
    // Lógica para manejar el envío del formulario con AJAX
    $("form").on("submit", function(event) {
        event.preventDefault(); // Prevenir el envío tradicional del formulario

        $.ajax({
            url: "sendDatos.php", // El archivo PHP que procesará los datos
            method: "POST", // El método de la solicitud
            data: $(this).serialize(), // Serializa los datos del formulario
            success: function(response) { // Si la solicitud es exitosa
                console.log(response); // Muestra la respuesta del servidor
                alert(response); // Muestra un mensaje con la respuesta
                $("form")[0].reset(); // Limpia el formulario después de enviar
            },
            error: function(xhr, status, error) { // Si ocurre un error
                console.error("Error:", error); // Muestra el error en la consola
                alert("Hubo un problema al enviar los datos. Intente nuevamente.");
            }
        });
    });
});