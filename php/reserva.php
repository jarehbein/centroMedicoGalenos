<?php
// Verificar si se recibió un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el RUT del formulario
    $rut = $_POST["rut"];

    // Conectar a la base de datos (ajusta los valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdcentromedicogalenos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    // Verificar si el RUT ya está registrado
    $check_rut_query = "SELECT * FROM paciente WHERE id_pac = '$rut'";
    $result = $conn->query($check_rut_query);

    if ($result->num_rows > 0) {
        // Si el RUT ya está registrado, redirigir a la página de reserva de horas médicas
        header("Location: ../html/pedir_hora.html");
        exit();
    } else {
        // Si el RUT no está registrado, continuar con la inserción de datos adicionales
        // Redirigir a la página de registro adicional
        header("Location: ../html/registro.html");
        exit();
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no es una solicitud POST, redirigir al formulario de reserva
    header("Location: formulario_reserva.html");
    exit();
}
?>
