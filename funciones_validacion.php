<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Funciones de validacion para gato
        function validacionNombre($nombre) {
            if (preg_match('/\d/', $nombre)) {
                echo "Los nombres de los gatos no deben tener números";
                return false;
            } elseif ($nombre == "") {
                echo "No se puede dejar vacío el nombre";
                return false;
            } return true;
        }

        function validacionColor($color) {
            if ($color == "Blanco") {
                echo "No se aceptan gatos blancos";
                return false;
            } return true;
        }

        function validacionInmunodeficiente($inmunodeficiente) {
            if ($inmunodeficiente == "No") {
                echo "No se aceptan gatos que no sean inmunodeficientes";
                return false;
            } return true;
        }

        function validacionCastrado($castrado) {
            if ($castrado == "No") {
                echo "No se aceptan gatos que no estén castrados";
                return false;
            } return true;
        }

        // Funciones de validacion para index

        function validarNombre($nombre){
            if (ctype_alpha($nombre)){
                return true;
            } else {
                return false;
            }
        }
    ?>
</body>
</html>
