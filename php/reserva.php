<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST["rut"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdcentromedicogalenos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $check_rut_query = "SELECT * FROM paciente WHERE id_pac = '$rut'";
    $result = $conn->query($check_rut_query);

    if ($result->num_rows > 0) {
        $_SESSION['id_pac'] = $rut;
        header("Location: ../html/pedir_hora.html");
        exit();
    } else {
        header("Location: ../html/registro.html");
        exit();
    }

    $conn->close();
} else {
    header("Location: formulario_reserva.html");
    exit();
}
?>
