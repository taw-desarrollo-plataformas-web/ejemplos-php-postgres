<?php
require_once "basedatos.php";

// Recibir datos del formulario
$propietario = $_POST["propietario"];
$marca = $_POST["marca"];
$placa = $_POST["placa"];
$anio_fabricacion = $_POST["anio_fabricacion"];
$tipo = $_POST["tipo"];

try {
    // Preparar INSERT con parámetros (seguro y profesional)
    $sql = "INSERT INTO vehiculos (propietario, marca, placa, anio_fabricacion, tipo)
            VALUES (:propietario, :marca, :placa, :anio, :tipo)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ":propietario" => $propietario,
        ":marca" => $marca,
        ":placa" => $placa,
        ":anio" => $anio_fabricacion,
        ":tipo" => $tipo,
    ]);

    // Redirigir de vuelta a la tabla
    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    die("Error al insertar el vehículo: " . $e->getMessage());
}
?>
