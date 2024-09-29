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
