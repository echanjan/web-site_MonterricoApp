<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "usuario_db", "contrasena_db", "formulario_db");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$empresa = $_POST['empresa'];

// Insertar datos en la base de datos
$sql = "INSERT INTO datos_formulario (nombre, apellido, email, numero, empresa) VALUES ('$nombre', '$apellido', '$email', '$numero', '$empresa')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos enviados correctamente";
} else {
    echo "Error al enviar datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
