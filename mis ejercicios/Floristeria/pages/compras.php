<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="shortcut icon" href="../images/icono.png"/>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,700,0,0" />
    <title>Compras</title>
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
                <li><a href="#" style="text-decoration: underline #0f0a44" class="material-symbols-rounded">storeCOM<a href="#" style="text-decoration: underline #0f0a44" class="material-symbols-rounded">PRAS</a></a></li>
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
            $selectN = "select count(*) as cuentaN from almacen";
            $verN = mysqli_query($conexion, $selectN) or die("Error select de: " . mysqli_error($conexion));
            $filasN = mysqli_fetch_array($verN);
             if ($filasN['cuentaN'] == 0) {
                echo "<div class=\"popM\">No existen flores en la base de datos</div>";
            
            }else{
                $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
                if ($ver) {
                    $filas = mysqli_fetch_array($ver);
                    echo "<select name=\"idflor\">";
                    while ($filas != false) {
                        echo "<option value=" . $filas['idflor'] . ">" . $filas['idflor'] . "</option>";
                        $filas = mysqli_fetch_array($ver);
                    }
                     echo "</select>";
                } 
            }
            mysqli_close($conexion);
            ?>
            <input type="number" name="cant" placeholder="Cantidad:" max="99999999999"><br>
            <input type="submit" name="buy" value="Comprar">
            <input type="submit" name="extracto" value="Extracto de compra">
        </form>
    </div>
    <video autoplay muted plays-inline class="video">
        <source src="../images/Flores.mp4" type="video/mp4">
    </video>
    <?php
    if (isset($_REQUEST['buy']) &&  $_REQUEST['nif'] != '' &&  $_REQUEST['cant'] != '') {
        $conexion = mysqli_connect("localhost", "root", "", "floristeria")
        or die("Problema en la conexión");
        $NIF = $_REQUEST['nif'];
        $IDFLOR = $_REQUEST['idflor'];
        $CANT=$_REQUEST['cant'];
        $selectN = "select count(*) as cuentaN from cliente where nif='$NIF'";
        $selectC = "select count(*) as cuentaC from almacen where idflor='$IDFLOR'";
        $verN = mysqli_query($conexion, $selectN) or die("Error select de: " . mysqli_error($conexion));
        $verC = mysqli_query($conexion, $selectC) or die("Error select de: " . mysqli_error($conexion));
        $filasN = mysqli_fetch_array($verN);
        $filasC = mysqli_fetch_array($verC);

        if ($filasN['cuentaN'] == 0) {
            echo "<div class=\"popM\">Su NIF no existe en nuestro sistema</div>";
            mysqli_close($conexion);
        } else {
            if ($filasC['cuentaC'] == 0) {
                echo "<div class=\"popM\">No existen flores en la base de datos</div>";
                mysqli_close($conexion);
            }else{
                $selectcant = "select cantflor from almacen where idflor='$IDFLOR'";
                $verCant = mysqli_query($conexion, $selectcant) or die("Error select de: " . mysqli_error($conexion));
                $filasCant = mysqli_fetch_array($verCant);
                if ($filasCant['cantflor']-$CANT <0) {
                    echo "<div class=\"popM\">No existen stock suficiente de ese producto</div>";
                    mysqli_close($conexion);
                }else{
                    $selectprecio = "select precioflor from almacen where idflor='$IDFLOR'";
                    $verprecio = mysqli_query($conexion, $selectprecio) or die("Error select de: " . mysqli_error($conexion));
                    $filasprecio = mysqli_fetch_array($verprecio);
                    $precio=$filasprecio['precioflor'] * $CANT;
                    $insert = "insert into compras VALUES('$NIF',$IDFLOR,now(),$CANT,$precio,CONCAT(now(),$IDFLOR))";
                    $update = "update almacen set cantflor=cantflor-$CANT WHERE idflor='$IDFLOR'";
                    mysqli_query($conexion, $insert) or die("Error insert de: " . mysqli_error($conexion));
                    mysqli_query($conexion, $update) or die("Error insert de: " . mysqli_error($conexion));
                    echo "<div class=\"pop\">! Gracias por comprar !</div>";
                    mysqli_close($conexion);
                }
            }
        }
    } elseif (isset($_REQUEST['buy'])) {
        echo "<div class=\"popM\">Faltan campos por rellenar</div>";
    }
    if (isset($_REQUEST['extracto'])) {
        $conexion = mysqli_connect("localhost", "root", "", "floristeria")
        or die("Problema en la conexión");
        $select = "select count(*) as cuenta from compras";
        $ver = mysqli_query($conexion, $select) or die("Error select de: " . mysqli_error($conexion));
        $filas = mysqli_fetch_array($ver);

        if ($filas['cuenta'] == 0) {
            echo "<div class=\"popM\">No existen compras en la base de datos</div>";
            mysqli_close($conexion);
        } else {
            echo "<table class=\"tablita\">";
            echo "<tr><td>NIF</td><td>IDFLOR</td><td>FECHA</td><td>CANTIDAD</td><td>PRECIO-TOTAL</td></tr>";
            $consulta = "select nif,id,cantidad,fecha,precio from compras";
            $verCon = mysqli_query($conexion, $consulta) or die("Error select de: " . mysqli_error($conexion));
            $fila = mysqli_fetch_array($verCon);
            while ($fila != false) {
                echo "<tr><td>" . $fila['nif'] . "</td><td>" . $fila['id'] . "</td><td>" . $fila['fecha'] . "</td><td>" .
                    $fila['cantidad'] . "</td><td>" . $fila['precio'] . "</td></tr>";
                $fila = mysqli_fetch_array($verCon);
            }
            echo "</table>";
            mysqli_close($conexion);
        }
    }
    
    ?>
</body>

</html>