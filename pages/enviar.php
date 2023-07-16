
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];

    // Configuración del correo electrónico
    $destinatario = "blom31@gmail.com";
    $asunto_email = "Consulta desde el formulario";

    // Cuerpo del correo electrónico
    $cuerpo_email = "Nombre: $nombre\n\n";
    $cuerpo_email .= "Asunto: $asunto\n\n";
    $cuerpo_email .= "Mensaje: $mensaje\n\n";

    // Envío del correo electrónico
    $enviado = mail($destinatario, $asunto_email, $cuerpo_email);

    if ($enviado) {
        echo "El correo electrónico ha sido enviado correctamente.";
    } else {
        echo "Error al enviar el correo electrónico. Por favor, inténtalo nuevamente.";
    }
}
?>
