<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <form action="">
        <form action="23.php" method="post">
            Matricula: <input type="text" name="matricula"><br>
            Marca: <input type="text" name="marca"><br>
            <input type="submit" name="add" value="Añadir">
            <input type="submit" name="del" value="Borrar">
        </form>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "prueba")
            or die("Problema en la conexión");
        $matricula = $_REQUEST['matricula'];
        if (isset($_REQUEST['add'])) {
            $select = "select count(*) as cuenta from coches where matricula='$matricula'";
            $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
            $filas = mysqli_fetch_array($ver);

            if ($filas['cuenta'] == 1) {
                echo "Su vehiculo ya existe en nuestro sistema";
                mysqli_close($conexion);
            } else {
                $marca = $_REQUEST['marca'];
                $insert = "insert into coches(matricula,marca) VALUES('$matricula','$marca')";
                mysqli_query($conexion, $insert) or die("Error insert de: " . mysqli_error($conexion));
                echo "Su vehiculo ha sido dado de alta en nuestro sistema";
                mysqli_close($conexion);
            }
        }
        if (isset($_REQUEST['del'])) {
            $select = "select count(*) as cuenta from coches where matricula='$matricula'";
            $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
            $filas = mysqli_fetch_array($ver);

            if ($filas['cuenta'] == 1) {
                $delete = "delete from coches where matricula='$matricula'";
                mysqli_query($conexion, $delete) or die("Error delete de: " . mysqli_error($conexion));
                echo "Su vehiculo ha sido borrado de nuestro sistema";
                mysqli_close($conexion);
            } else {
                echo "No existe ese coche con esa matricula";
            }
        }
        ?>
</body>

</html>