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
<?php
if (isset($_REQUEST['alta'])) {
    $mensaje = $_REQUEST['IdFlor'];
}
?>

<body>
    <div class="banner">
        <img href="#" src="../images/icono.png">
        <div class="navegacion">
            <h1><a href="..\index.html" class="home">INICIO</a></h1>
            <ul>
                <li><a href="#" class="material-symbols-rounded">warehouseALMACEN</a></li>
                <li><a href="clientes.html" class="material-symbols-rounded">account_circleCLIENTES</a></li>
                <li><a href="compras.html" class="material-symbols-rounded">storeCOM<a href="pages/almacen.html" class="material-symbols-rounded">PRAS</a></a></li>
            </ul>
        </div>
    </div>
    <div class="formulario">
        <form action="" method="POST">
            IdFlor: <input type="text" name="IdFlor"><br>
            Precio: <input type="text" name="precioFlor"><br>
            Cantidad: <input type="number" name="cantFlor"><br>
            <input type="submit" name="alta" value="Alta">
            <input type="submit" name="baja" value="Baja">
            <input type="submit" name="consultar" value="Consultar">
        </form>
    </div>
    <div class="pop">
        <?php
        if (isset($mensaje) && $mensaje != '') {
            echo "Ha introducido una flor con id $mensaje";
        }
        ?>
    </div>
</body>

</html>