<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitización de los datos
    $nombre = filter_var($_POST['fullname'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);

    // Validación de los datos
    if (!empty($nombre) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($mensaje)) {
        $to = "pagliaccicesar@gmail.com";
        $subject = "Nuevo mensaje de contacto";
        $body = "Nombre: $nombre\nCorreo: $email\nMensaje:\n$mensaje";
        $headers = "From: no-reply@tuweb.com\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Intentar enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "invalid";
    }
} else {
    echo "error";
}
?>
