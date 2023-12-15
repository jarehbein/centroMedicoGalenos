<?php
session_start();

if (!isset($_SESSION['id_pac'])) {
    header("Location: ../php/home.php");
    exit();
}

$id_pac = $_SESSION['id_pac'];
$especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$hora = isset($_POST['hora']) ? $_POST['hora'] : '';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdcentromedicogalenos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "INSERT INTO atencion (fecha, id_especialidad, hora, id_pac) VALUES ('$fecha', '$id_especialidad', '$hora', '$id_pac')";

if ($conn->query($sql) === TRUE) {
    echo "Reserva realizada con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
