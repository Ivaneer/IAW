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
                <li><a href="almacen.php" class="material-symbols-rounded">warehouseALMACEN</a></li>
                <li><a href="clientes.php" class="material-symbols-rounded">account_circleCLIENTES</a></li>
                <li><a href="#" class="material-symbols-rounded">storeCOM<a href="#" class="material-symbols-rounded">PRAS</a></a></li>
            </ul>
        </nav>
    </div>
    <div class="formulario">
        <form action="" method="POST">
            <input type="text" name="nif" placeholder="NIF:" maxlength="9"><br>
            <?php
            $conexion = mysqli_connect("localhost", "root", "", "floristeria")
                or die("Problema en la conexión");
            $select = "select idflor from almacen";
            $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
            if ($ver) {
                $filas = mysqli_fetch_array($ver);
                echo "<select>";
                while ($filas != false) {
                    echo "<option name=" . $filas['idflor'] . ">" . $filas['idflor'] . "</option>";
                    $filas = mysqli_fetch_array($ver);
                }
                echo "</select>";
            } else {
                echo "<div class=\"popM\">No existen productos en el almacen</div>";
            }
            mysqli_close($conexion);
            ?>
            <input type="number" name="cant" placeholder="Cantidad:"><br>
            <input type="submit" name="buy" value="Comprar">
            <input type="submit" name="extracto" value="Extracto de compra">
        </form>
    </div>
    <video autoplay muted plays-inline class="video">
        <source src="../images/Flores.mp4" type="video/mp4">
    </video>
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "floristeria")
        or die("Problema en la conexión");
    if (isset($_REQUEST['buy']) &&  $_REQUEST['nif'] != '' &&  $_REQUEST['cant'] != '') {
        $NIF = $_REQUEST['nif'];
        $IDFLOR = $_REQUEST['idflor'];
        $selectN = "select count(*) as cuentaN from cliente where nif='$NIF'";
        $selectC = "select count(cantidad) as cuentaC from almacen where idflor='$IDFLOR'";
        $verN = mysqli_query($conexion, $selectN) or die("Error select de: " . mysqli_error($conexion));
        $verC = mysqli_query($conexion, $selectC) or die("Error select de: " . mysqli_error($conexion));
        $filasN = mysqli_fetch_array($verN);
        $filasC = mysqli_fetch_array($verC);

        if ($filasN['cuentaN'] == 1) {
            if ($filasC['cuentaC'] == 1) {
                $insert = "insert into compras(nif,fecha,idfecha) VALUES('$NIF','$_REQUEST[nombre]','$_REQUEST[cuentab]')";
                $update = "update almacen set cantidad=cantidad-'$_REQUEST[cant]' WHERE idflor='$IDFLOR'";
                mysqli_query($conexion, $insert) or die("Error insert de: " . mysqli_error($conexion));
                mysqli_query($conexion, $update) or die("Error insert de: " . mysqli_error($conexion));
                echo "<div class=\"pop\">Ha dado de alta un cliente con NIF $NIF</div>";
            }
        } else {
            echo "<div class=\"popM\">Su NIF no existe en nuestro sistema</div>";
        }
    } elseif (isset($_REQUEST['buy'])) {
        echo "<div class=\"popM\">Faltan campos por rellenar</div>";
    }
    if (isset($_REQUEST['extracto'])) {
        $select = "select count(*) as cuenta from compras";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 0) {
            echo "<div class=\"popM\">No existen compras en la base de datos</div>";
        } else {
            echo "<table class=\"tablita\">";
            echo "<tr><td>NIF</td><td>IDFLOR</td><td>CANTIDAD</td><td>FECHA</td><td>PRECIO-TOTAL</td></tr>";
            $consulta = "select nif,idflor,cantidad,fecha,total from compras";
            $verCon = mysqli_query($conexion, $consulta) or die("Error select de: " . mysqli_error($conexion));
            $fila = mysqli_fetch_array($verCon);
            while ($fila != false) {
                echo "<tr><td>" . $fila['nif'] . "</td><td>" . $fila['idflor'] . "</td><td>" . "</td><td>" . $fila['idflor'] . "</td><td>" .
                    "</td><td>" . $fila['idflor'] . "</td><td>" . $fila['cantidad'] . "</td></tr>";
                $fila = mysqli_fetch_array($verCon);
            }
            echo "</table>";
        }
    }
    mysqli_close($conexion);
    ?>
</body>

</html>