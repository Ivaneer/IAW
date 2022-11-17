<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="shortcut icon" href="../images/icono.png" />
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,700,0,0" />
    <title>Clientes</title>
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
                <li><a href="#" style="text-decoration: underline #0f0a44" class="material-symbols-rounded">account_circleCLIENTES</a></li>
                <li><a href="compras.php" class="material-symbols-rounded">storeCOM<a href="compras.php" class="material-symbols-rounded">PRAS</a></a></li>
            </ul>
        </nav>
    </div>
    <div class="formulario">
        <form action="" method="POST">
            <input type="text" name="nif" placeholder="NIF:" maxlength="9"><br>
            <input type="text" name="nombre" placeholder="Nombre:" maxlength="15"><br>
            <input type="text" placeholder=" Cuenta Bancaria:" name="cuentab" maxlength="30"><br>
            <input type="submit" name="alta" value="Alta">
            <input type="submit" name="baja" value="Baja">
            <input type="submit" name="consultar" value="Consultar">
        </form>
    </div>
    <video autoplay muted plays-inline class="video">
        <source src="../images/Flores.mp4" type="video/mp4">
    </video>
    <?php
    if (isset($_REQUEST['alta']) &&  $_REQUEST['nif'] != '' &&  $_REQUEST['nombre'] != '' &&  $_REQUEST['cuentab'] != '') {
        $conexion = mysqli_connect("localhost", "root", "", "floristeria")
            or die("Problema en la conexión");
        $NIF = $_REQUEST['nif'];
        $select = "select count(*) as cuenta from cliente where nif='$NIF'";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 1) {
            echo "<div class=\"popM\">Su NIF ya existe en nuestro sistema</div>";
            mysqli_close($conexion);
        } else {
            $insert = "insert into cliente(nif,nombre,cuenta_bancaria) VALUES('$NIF','$_REQUEST[nombre]','$_REQUEST[cuentab]')";
            mysqli_query($conexion, $insert) or die("Error insert de: " . mysqli_error($conexion));
            echo "<div class=\"pop\">Ha dado de alta un cliente con NIF $NIF</div>";
            mysqli_close($conexion);
        }
    } elseif (isset($_REQUEST['alta'])) {
        echo "<div class=\"popM\">Faltan campos por rellenar</div>";
    }
    if (isset($_REQUEST['baja']) &&  $_REQUEST['nif'] != '') {
        $conexion = mysqli_connect("localhost", "root", "", "floristeria")
            or die("Problema en la conexión");
        $NIF = $_REQUEST['nif'];
        $select = "select count(*) as cuenta from cliente where nif='$NIF'";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 1) {
            $selectpr = "select count(*) as cuenta from compras where nif='$NIF'";
            $verpr = mysqli_query($conexion, $selectpr) or die("Error select de: " . mysqli_error($conexion));
            $filaspr = mysqli_fetch_array($verpr);
            if ($filaspr['cuenta'] == 0) {
                $delete = "delete from cliente where nif='$NIF'";
                mysqli_query($conexion, $delete) or die("Error delete de: " . mysqli_error($conexion));
                echo "<div class=\"pop\">Su cliente con ID $NIF ha sido dada de baja de nuestro sistema</div>";
                mysqli_close($conexion);
            } else {
                echo "<div class=\"popM\">No es posible borrar un nif que ha comprado anteriormente</div>";
                mysqli_close($conexion);
            }
        } else {
            echo "<div class=\"popM\">No existe una cliente con NIF $NIF</div>";
            mysqli_close($conexion);
        }
    } elseif (isset($_REQUEST['baja'])) {
        echo "<div class=\"popM\">Faltan campos por rellenar</div>";
    }
    if (isset($_REQUEST['consultar'])) {
        $conexion = mysqli_connect("localhost", "root", "", "floristeria")
            or die("Problema en la conexión");
        $select = "select count(*) as cuenta from cliente";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 0) {
            echo "<div class=\"popM\">No existen clientes en la base de datos</div>";
            mysqli_close($conexion);
        } else {
            echo "<table class=\"tablita\">";
            echo "<tr><td>NIF</td><td>Nombre</td><td>Cuanta Bancaria</td></tr>";
            $consulta = "select nif,nombre,cuenta_bancaria from cliente";
            $verCon = mysqli_query($conexion, $consulta) or die("Error select de: " . mysqli_error($conexion));
            $fila = mysqli_fetch_array($verCon);
            while ($fila != false) {
                echo "<tr><td>" . $fila['nif'] . "</td><td>" . $fila['nombre'] . "</td><td>" . $fila['cuenta_bancaria'] . "</td></tr>";
                $fila = mysqli_fetch_array($verCon);
            }
            echo "</table>";
            mysqli_close($conexion);
        }
    }
    ?>
</body>

</html>