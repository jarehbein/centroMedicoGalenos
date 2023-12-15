<?php
// Inicia la sesión
session_start();

// Verifica si la sesión id_pac está presente
if (!isset($_SESSION['id_pac'])) {
    // Si no hay una sesión id_pac, redirige a la página de inicio o alguna página de error
    header("Location: ../php/home.php");
    exit();
}

// Obtén la información de la reserva desde el formulario procesado
$id_pac = $_SESSION['id_pac'];
$especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$hora = isset($_POST['hora']) ? $_POST['hora'] : '';
?>