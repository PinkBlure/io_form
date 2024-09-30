<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gato form</title>
</head>
<body style="max-width: 95%;">
    <?php
        // Abrir el fichero
        $gatoFile = fopen("aileen_fichero.txt", "r") or die("No se pudo abrir el fichero");

        // Array indexado para los datos
        $gato = [$nombre, $color, $inmunodeficiente, $castrado];

        $line = 0;
        while(!feof($gatoFile)) {
            $gato[$line] = fgets($gatoFile);
            $line += 1;
        }

        // Cerrar el fichero
        fclose($gatoFile);
    ?>
    
    <form action="recibe_datos.php" style="display: flex; flex-direction: column;" method="post" enctype="multipart/form-data">
        <legend>Formulario para tu gato</legend>

        <br>

        <label for="nombre">Nombre del gato:</label>
        <input type="text" name="nombre" placeholder="Escribe el nombre de tu gato" value="<?= $gato[0] ?>">

        <br>

        <label for="color">Seleciona el color del gato:</label>
        <select name="color">
            <option value="<?= $gato[1] ?>" selected>Negro</option>
            <option value="blanco">Blanco</option>
            <option value="naranja">Naranja</option>
            <option value="gris">Gris</option>
            <option value="Con manchas">Con manchas</option>
        </select>

        <br>

        <label for="salud">Marque los datos:</label>
        <div>
            ¿Es inmunodeficiente?:
            <input id="salud" type="checkbox" name="inmunodeficiente" value="<?= $gato[2] ?>" checked>
        </div>
        <div>
           ¿Está castrado?
            <input id="salud" type="checkbox" name="castrado" value="<?= $gato[3] ?>" checked>
        </div>

        <br>

        <label for="primer_fichero">Primer fichero:</label>
        <input type="file" id="primer_fichero" name="primer_fichero">

        <label for="segundo_fichero">segundo fichero:</label>
        <input type="file" id="segundo_fichero" name="segundo_fichero">

        <br>

        <input type="hidden" name="formulario" value="gato">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
