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
                // Comprueba que sea el formulario especifico
                } elseif ($formulario == 'index'){
                    // Toma de valores por defecto y almacena en un array.
                    if(file_exists("./moises_valores.txt")){
                        $fichero = file_get_contents("./moises_valores.txt");
                        $valores_por_defecto = explode("-", $fichero);
                    }

                    // Comprueba la existencia y, en su defecto crea la carpeta ficheros
                    if(!file_exists("./ficheros")){
                        mkdir("ficheros", 0755);
                    }


                    // Excepcion de errores en caso de formulario vacio
                    $nombre1 = isset($_POST['nombre1']) && !empty(trim($_POST['nombre1'])) ? $_POST['nombre1'] : $valores_por_defecto[0];
                    $apellidos = isset($_POST['apellidos']) && !empty(trim($_POST['apellidos'])) ? $_POST['apellidos'] : $valores_por_defecto[1];
                    $coche = isset($_POST['coche']) ? 'Si' : $valores_por_defecto[2];
                    $moto = isset($_POST['moto']) ? 'Si' : $valores_por_defecto[3];
                    $barco = isset($_POST['barco']) ? 'Si' : $valores_por_defecto[4];
                    $comida = isset($_POST['comida']) ? $_POST['comida'] : $valores_por_defecto[5];
                    $fichero1 = isset($_POST['fichero1']) ? $_POST['fichero1'] : '';
                    $fichero2 = isset($_POST['fichero2']) ? $_POST['fichero2'] : '';

                    // Recolecta de datos en array
                    $persona = [$nombre1, $apellidos, $coche, $moto, $barco, $comida, $fichero1, $fichero2];

                    // Validacion de datos
                    if (!validarNombre($persona[0])) {
                        echo "ERROR: Debe introducir un nombre valido.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } elseif (!validarApellidos($persona[1])) {
                        echo "ERROR: Debe introducir apellidos validos.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } elseif(!validarVehiculos($persona[2], $persona[3], $persona[4])){
                        echo "ERROR: Debe tener al menos un tipo de vehiculo.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } elseif(validarComida($persona[5])){
                        echo "ERROR: No aceptamos gente que prefiera el pollo frito a las otras opciones.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } elseif(validarFichero($fichero1) || validarFichero($fichero2)){
                        echo "ERROR: Los archivos no pueden ser tipo png.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } else {
                        // Impresion de datos correctos
                        echo "DATOS CORRECTOS:<br>";
                        echo "Nombre: " . $nombre1 . "<br>";
                        echo "Apellidos: " . $apellidos . "<br>";
                        echo "¿Tiene coche?: " . $coche . "<br>";
                        echo "¿Tiene moto?: " . $moto . "<br>";
                        echo "¿Tiene barco?: " . $barco . "<br>";
                        echo "Comida escogida: " . $comida . "<br>";
                        echo '<img src="' . $fichero1 . "/><br>";
                        echo $fichero2 . "<br>";
                    }
                }
            } 
        }
    ?>
</body>
</html>
