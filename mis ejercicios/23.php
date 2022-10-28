<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","prueba") 
	or die("Problema en la conexión");

$select="Select matricula,marca from coches";

$registro=mysqli_query($conexion,$select) 
	or die("Problemas en la select ".mysqli_error($conexion));
if($registro)//si la sentencia no da error
{
	$coche=mysqli_fetch_array($registro);
	while($coche!=false){//si encuentra una fila
		echo $coche['matricula']." ".$coche['marca']."<br>";
		$coche=mysqli_fetch_array($registro);
	}
}
mysqli_close($conexion);
?> 

</body>
</html>