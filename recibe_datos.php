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

                    //Almacenamiento de ficheros
                    if (isset($_FILES['fichero1']) && $_FILES['fichero1']['error'] == UPLOAD_ERR_OK) {
                        $directorio = "ficheros/";

                        $fichero1 = basename($_FILES['fichero1']['name']);
                        $fichero1_dir = $directorio.$fichero1;
                
                        $numero = 1;
                        $fichero1_path = pathinfo($fichero1);
                        while (file_exists($fichero1_dir)) {
                            $fichero1 = $fichero1_path['filename']
                                ."_"
                                .$numero
                                ."."
                                .$fichero1_path['extension'];
                            $fichero1_dir = $directorio.$fichero1;
                            $numero++;
                        }
                
                        move_uploaded_file($_FILES['fichero1']['tmp_name'], $fichero1_dir);
                        
                    }
                    
                    if (isset($_FILES['fichero2']) && $_FILES['fichero2']['error'] == UPLOAD_ERR_OK) {
                        $directorio = "ficheros/";

                        $fichero2 = basename($_FILES['fichero2']['name']);
                        $fichero2_dir = $directorio.$fichero2;
                
                        $numero = 1;
                        $fichero2_path = pathinfo($fichero2);
                        while (file_exists($fichero2_dir)) {
                            $fichero2 = $fichero2_path['filename']
                                ."_"
                                .$numero
                                ."."
                                .$fichero2_path['extension'];
                            $fichero2_dir = $directorio.$fichero2;
                            $numero++;
                        }
                
                        move_uploaded_file($_FILES['fichero2']['tmp_name'], $fichero2_dir);
                        
                    }
                    
                    

                    // Recolecta de datos en array
                    $persona = [$nombre1, $apellidos, $coche, $moto, $barco, $comida];

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
                    }/* elseif(validarFichero($_FILES['fichero1'][PATHINFO_EXTENSION]) || validarFichero($_FILES['fichero2'][PATHINFO_EXTENSION])){
                        echo "ERROR: Los archivos no pueden ser tipo png.<br>";
                        echo "<a href='index.html'>Volver al formulario</a>";
                    } */else {
                        // Impresion de datos correctos
                        echo "DATOS CORRECTOS:<br>";
                        echo "Nombre: " . $nombre1 . "<br>";
                        echo "Apellidos: " . $apellidos . "<br>";
                        echo "¿Tiene coche?: " . $coche . "<br>";
                        echo "¿Tiene moto?: " . $moto . "<br>";
                        echo "¿Tiene barco?: " . $barco . "<br>";
                        echo "Comida escogida: " . $comida . "<br>";
                        echo 'Fichero 1: <img src="./ficheros/' . $fichero1 . '" width="50%"><br>';
                        echo 'Fichero 2: <img src="./ficheros/' . $fichero2 . '"width="50%"><br>';
                    }
                }
            } 
        }
    ?>
</body>
</html>
