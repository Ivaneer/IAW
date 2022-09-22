<html>
<head></head>
<body>
<?php
  echo "<b style=\"color:red\">Hola</b><br>";
$mes=date("m");
$fecha=date("d");
$hora=date("H:i:s");
echo "<br><b>Hoy es $fecha del mes $mes y son las $hora</b><br>";
 
if ($fecha > 20)
  echo "<h2 style=\"color:green\">Te queda poco para cobrar</h2>";
else
  echo "<h2 style=\"color:red\">Ahorra</h2>";


?>
</body>
</html>