<html>
<head></head>
<body>
<?php
#if (isset())
#te pide edad , importe. Radio button con 10% de iva y 21% de iva.
#checkbox con importe especial +10$
#Eres mayor de edad y el importe es x

$edad=$_REQUEST['edad'];
$importe=$_REQUEST['importe'];
$iva=$_REQUEST['check'];

$totaliva=$importe*$iva;
$total=$importe+$totaliva;

if( isset($_REQUEST['impuesto'])){
    $total=$total+$_REQUEST['impuesto'];
}
if ($edad >= 18){
    echo("Eres mayor de edad y el importe es $total");
}
else{
    echo("Eres menor de edad y el importe es $total");
}

?>
</body>
</html>