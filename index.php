<?php
require_once "basedatos.php";

function convertirMayuscula($texto)
{
    return strtoupper($texto);
}

try {
    $sql = "SELECT * FROM vehiculos ORDER BY id ASC;";
    $stmt = $conn->query($sql); // PDOStatement
    $vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC); // ARRAY real
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/estilos.css" type="text/css">
        <title>Uso básico de PHP</title>
    </head>
    <body>
        <h3>Listado de Vehículos</h3>
        <table>
            <tr>
                <td>Propietario</td>
                <td>Placa</td>
                <td>Marca</td>
                <td>Año Fabricación</td>
                <td>Tipo</td>
            </tr>

            <?php
            $formato = "
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%d</td>
                <td>%s</td>
            </tr>";

            foreach ($vehiculos as $registro) {
                echo sprintf(
                    $formato,
                    convertirMayuscula($registro["propietario"]),
                    convertirMayuscula($registro["placa"]),
                    convertirMayuscula($registro["marca"]),
                    $registro["anio_fabricacion"],
                    convertirMayuscula($registro["tipo"]),
                );
            }
            ?>
        </table>

        <a href="nuevo.php">Nuevo vehículo</a>
    </body>
</html>
