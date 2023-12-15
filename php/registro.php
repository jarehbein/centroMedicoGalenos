<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pac = $_SESSION['id_pac'];
    $nombres = $_POST["nombres"];
    $ap_paterno = $_POST["ap_paterno"];
    $ap_materno = $_POST["ap_materno"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $fecha_nac = $_POST["fecha_nac"];
    $id_genero = $_POST["id_genero"];
    $id_prevision = $_POST["id_prevision"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdcentromedicogalenos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexión a la base de datos falló: " . $conn->connect_error);
    }

    $sql = "INSERT INTO paciente (id_pac, nombres, ap_paterno, ap_materno, correo, telefono, fecha_nac, id_genero, id_prevision) 
            VALUES ('$id_pac','$nombres', '$ap_paterno', '$ap_materno', '$correo', '$telefono', '$fecha_nac', '$id_genero', '$id_prevision')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../html/pedir_hora.html");
        exit();
    } else {
        echo "Error al registrar al paciente: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: registro.html");
    exit();
}
?>
