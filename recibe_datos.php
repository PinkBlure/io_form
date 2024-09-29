<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $color = isset($_POST['color']) ? $_POST['color'] : '';
            $inmunodeficiente = isset($_POST['inmunodeficiente']) ? "Sí" : "No";
            $castrado = isset($_POST['castrado']) ? "Sí" : "No";

            $gato = [$nombre, $color, $inmunodeficiente, $castrado];

            if ($gato[0] == "") {
                echo "ERROR: El gato debe tener nombre.<br>";
                echo "<a href='gato.html'>Volver al formulario</a>";
            } else {
                echo "DATOS CORRECTOS:<br>";
                echo "Nombre del gato: " . htmlspecialchars($nombre) . "<br>";
                echo "Color del gato: " . htmlspecialchars($color) . "<br>";
                echo "¿Es inmunodeficiente?: " . $inmunodeficiente . "<br>";
                echo "¿Está castrado?: " . $castrado . "<br>";
            }
        }
    ?>
</body>
</html>
