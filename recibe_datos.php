<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Se necesita usar las funciones de validación
        require __DIR__ . "/funciones_validacion.php";

        // Si el formulario ha sido enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['formulario'])) {
                $formulario = $_POST['formulario'];

                // Se rellenó el formulario de gato
                if ($formulario == 'gato') {

                    // Recoger datos
                    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                    $color = isset($_POST['color']) ? $_POST['color'] : '';
                    $inmunodeficiente = isset($_POST['inmunodeficiente']) ? "Sí" : "No";
                    $castrado = isset($_POST['castrado']) ? "Sí" : "No";

                    // Array indexado para los datos
                    $gato = [$nombre, $color, $inmunodeficiente, $castrado];

                    // Hacer la validación con las funciones
                    if (validacionNombre($gato[0]) &&
                        validacionColor($gato[1]) &&
                        validacionInmunodeficiente($gato[2]) &&
                        validacionCastrado($gato[3])) {
                        echo "DATOS CORRECTOS:<br>";
                        echo "Nombre del gato: " . htmlspecialchars($gato[0]) . "<br>";
                        echo "Color del gato: " . htmlspecialchars($gato[1]) . "<br>";
                        echo "¿Es inmunodeficiente?: " . $gato[2] . "<br>";
                         echo "¿Está castrado?: " . $gato[3] . "<br>";
                    } else {
                        echo "<a href='gato.html'>Volver al formulario</a>";
                    }
                
                // Se rellenó el formulario de index
                } elseif ($formulario == 'index'){
                    $nombre1 = isset($_POST['nombre1']) ? $_POST['nombre1'] : '';
                    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
                    $coche = isset($_POST['coche']) ? 'Si' : 'No';
                    $moto = isset($_POST['moto']) ? 'Si' : 'No';
                    $barco = isset($_POST['barco']) ? 'Si' : 'No';
                    $comida = isset($_POST['comida']) ? $_POST['comida'] : '';

                    $persona = [$nombre1, $apellidos, $coche, $moto, $barco, $comida];

                    if ($persona[0] == '' && !validarNombre($persona[0])) {
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
