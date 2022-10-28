<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    $conexion=mysqli_connect("localhost","root","","prueba") or die ("Error en la autenticacion");
    $consulta="insert into coches(matricula,marca) VALUES('$_REQUEST[matricula]','$_REQUEST[marca]')";
    mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));
    mysqli_close($conexion);
    echo "Su vehiculo ha sido dado de alta en nuestro sistema";
    ?>
</body>
</html>