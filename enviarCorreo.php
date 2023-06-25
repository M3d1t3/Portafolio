<?php
// Verifica que se haya enviado una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    // Dirección de correo electrónico de destino
    $destinatario = 'sanchezpomares1306@gmail.com';

    // Asunto del correo
    $asunto = 'Nuevo mensaje desde el formulario de contacto';

    // Cuerpo del correo
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo: $correo\n";
    $cuerpo .= "Mensaje: $mensaje\n";

    // Envía el correo electrónico
    $resultado = mail($destinatario, $asunto, $cuerpo);

    // Verifica si el correo se envió correctamente
    if ($resultado) {
        // Envío exitoso
        echo '1';
    } else {
        // Error en el envío
        echo '0';
    }
} else {
    // Si no se recibió una solicitud POST, devuelve un error
    http_response_code(400);
    echo 'Error: No se ha enviado una solicitud POST';
}
