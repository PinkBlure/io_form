<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Persona</title>
</head>

<body>
    <?php
        // Toma de valores por defecto y almacena en un array.
        if(file_exists("./moises_valores.txt")){
            $fichero = file_get_contents("./moises_valores.txt");
            $valores_por_defecto = explode("-", $fichero);
        }
        echo '  <form method="POST" action="recibe_datos.php" enctype="multipart/form-data">
                    <label for="nombre">Nombre: </label>
                    <input type="text" placeholder="Escriba su nombre aquí" name="nombre1" value='.$valores_por_defecto[0].'> <br>

                    <label for="apellidos">Apellidos: </label>
                    <input type="text" placeholder="Escriba sus apellidos aquí" name="apellidos" value='.$valores_por_defecto[1].'> <br>

                    <label for="vehiculo">Escoja si tiene alguno de estos vehículos: </label><br>
                    Coche <input type="checkbox" name="coche" value="1" '.$valores_por_defecto[2].'> <br>
                    Moto <input type="checkbox" name="moto" value="1" '.$valores_por_defecto[3].'> <br>
                    Barco <input type="checkbox" name="barco" value="1" '.$valores_por_defecto[4].'> <br>

                    <label for="comida">Escoja una comida: </label>
                    <select name="comida">
                        <option value="pizza" selected>Pizza</option>
                        <option value="hamburguesa">Hamburguesa</option>
                        <option value="papas_fritas">Papas Fritas</option>
                        <option value="macarrones">Macarrones</option>
                        <option value="pollo_asado">Pollo Asado</option>
                    </select> <br>

                    <label for="fichero1">Subir archivo 1:</label>
                    <input type="file" name="fichero1" id="fichero1" required><br>

                    <label for="fichero2">Subir archivo 2:</label>
                    <input type="file" name="fichero2" id="fichero2" required><br>

                    <input type="hidden" name="formulario" value="index">
                    <input type="submit" value="Enviar">
                </form>'
    ?>
</body>

</html>