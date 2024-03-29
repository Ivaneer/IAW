<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,700,0,0" />
    <title>Almacen</title>
</head>

<body>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div class="banner">
        <div class="titulo">
            <a href="../index.html"><img src="../images/icono.png" width="135px"></a>
            <a href="../index.html" class="home">
                <h1>INICIO</h1>
            </a>
        </div>
        <nav class="navegacion">
            <ul>
                <li><a href="#" class="material-symbols-rounded">warehouseALMACEN</a></li>
                <li><a href="clientes.php" class="material-symbols-rounded">account_circleCLIENTES</a></li>
                <li><a href="compras.php" class="material-symbols-rounded">storeCOM<a href="compras.php" class="material-symbols-rounded">PRAS</a></a></li>
            </ul>
    </div>
    </div>
    <div class="formulario">
        <form action="" method="POST">
            <input type="number" name="IdFlor" placeholder="IdFlor:" max="99999999999"><br>
            <input type="number" name="precioFlor" placeholder=" Precio: " max="99999999999"><br>
            <input type="number" name="cantFlor" placeholder="Cantidad: " max="99999999999"><br>
            <input type="submit" name="alta" value="Alta">
            <input type="submit" name="baja" value="Baja">
            <input type="submit" name="consultar" value="Consultar">
        </form>
    </div>
    <video autoplay muted plays-inline class="video">
        <source src="../images/Flores.mp4" type="video/mp4">
    </video>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "floristeria")
        or die("Problema en la conexión");
    if (isset($_REQUEST['alta']) &&  $_REQUEST['IdFlor'] != '' &&  $_REQUEST['precioFlor'] != '' &&  $_REQUEST['cantFlor'] != '') {
        $IDFLOR = $_REQUEST['IdFlor'];
        $select = "select count(*) as cuenta from almacen where idflor='$IDFLOR'";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 1) {
            echo "<div class=\"popM\">Su flor ya existe en nuestro sistema</div>";
        } else {
            $insert = "insert into almacen(idflor,precioflor,cantflor) VALUES('$IDFLOR','$_REQUEST[precioFlor]','$_REQUEST[cantFlor]')";
            mysqli_query($conexion, $insert) or die("Error insert de: " . mysqli_error($conexion));
            echo "<div class=\"pop\">Ha dado de alta una flor con ID $IDFLOR</div>";
        }
    } elseif (isset($_REQUEST['alta'])) {
        echo "<div class=\"popM\">Faltan campos por rellenar</div>";
    }
    if (isset($_REQUEST['baja']) &&  $_REQUEST['IdFlor'] != '') {
        $IDFLOR = $_REQUEST['IdFlor'];
        $select = "select count(*) as cuenta from almacen where idflor='$IDFLOR'";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 1) {
            $delete = "delete from almacen where idflor='$IDFLOR'";
            mysqli_query($conexion, $delete) or die("Error delete de: " . mysqli_error($conexion));
            echo "<div class=\"pop\">Su flor con ID $IDFLOR ha sido dada de baja de nuestro sistema</div>";
        } else {
            echo "<div class=\"popM\">No existe una flor con ID $IDFLOR</div>";
        }
    } elseif (isset($_REQUEST['baja'])) {
        echo "<div class=\"popM\">Faltan campos por rellenar</div>";
    }
    if (isset($_REQUEST['consultar'])) {
        $select = "select count(*) as cuenta from almacen";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 0) {
            echo "<div class=\"popM\">No existen flores en la base de datos</div>";
        } else {
            echo "<table class=\"tablita\">";
            echo "<tr><td>IdFlor</td><td>Precio</td><td>Cantidad</td></tr>";
            $consulta = "select idflor,precioflor,cantflor from almacen";
            $verCon = mysqli_query($conexion, $consulta) or die("Error select de: " . mysqli_error($conexion));
            $fila = mysqli_fetch_array($verCon);
            while ($fila != false) {
                echo "<tr><td>" . $fila['idflor'] . "</td><td>" . $fila['precioflor'] . "</td><td>" . $fila['cantflor'] . "</td></tr>";
                $fila = mysqli_fetch_array($verCon);
            }
            echo "</table>";
        }
    }
    mysqli_close($conexion);
    ?>
</body>

</html>