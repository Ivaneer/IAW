<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <title>Practica exam</title>
</head>

<body>
    <form action="" method="POST">
        SUMA<input type="radio" name="boton" value="sum" checked>
        MAXIMO<input type="radio" name="boton" value="max"><br>
        <select name="cuanto">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <input type="submit" value="Calcular" name="calc">
    </form>
    <?php
    if (isset($_REQUEST['calc'])) {
        $array = array(rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100), rand(0, 100));
        echo "<table>";
        echo "<tr><td>Numeros: </td><td>$array[0]</td><td>$array[1]</td><td>$array[2]</td><td>$array[3]
            </td><td>$array[4]</td></tr>";
        echo "</table>";

        $boton = $_REQUEST['boton'];
        $cantidad = $_REQUEST['cuanto'];
        if ($boton == "sum") {
            $suma = 0;
            for ($i = 0; $i < $cantidad; $i++) {
                $suma += $array[$i];
            }
            echo " La suma es $suma";
        } else {
            $max = $array[0];
            for ($i = 0; $i < $cantidad; $i++) {
                if ($array[$i] > $max) {
                    $max = $array[$i];
                }
            }
            echo " El maximo es $max";
        }
    }
    ?>
</body>

</html>