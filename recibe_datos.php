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

            if (isset($_POST['formulario'])) {
                $formulario = $_POST['formulario'];

                if ($formulario == 'gato') {
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
                } elseif ($formulario == 'index'){
                    $nombre1 = isset($_POST['nombre1']) ? $_POST['nombre1'] : '';
                    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
                    $coche = isset($_POST['coche']) ? 'Si' : 'No';
                    $moto = isset($_POST['moto']) ? 'Si' : 'No';
                    $barco = isset($_POST['barco']) ? 'Si' : 'No';
                    $comida = isset($_POST['comida']) ? $_POST['comida'] : '';

                    $persona = [$nombre1, $apellidos, $coche, $moto, $barco, $comida];

                    if ($persona[0] == '') {
                        echo "ERROR: Debe introducir un nombre.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } elseif ($persona[1] == '') {
                        echo "ERROR: Debe introducir apellidos.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } else {
                        echo "DATOS CORRECTOS:<br>";
                        echo "Nombre: " . htmlspecialchars($nombre1) . "<br>";
                        echo "Apellidos: " . htmlspecialchars($apellidos) . "<br>";
                        echo "¿Tiene coche?: " . $coche . "<br>";
                        echo "¿Tiene moto?: " . $moto . "<br>";
                        echo "¿Tiene barco?: " . $barco . "<br>";
                        echo "Comida escogida: " . $comida;
                    }
                }
            } 
        }
    ?>
</body>
</html>
