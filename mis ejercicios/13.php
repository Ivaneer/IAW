<html>
<head></head>
<body>
<?php
#Dada una alto y un ancho
#pinta :
#xxx
#xxx

$altura=$_REQUEST['altura'];
$ancho=$_REQUEST['ancho'];
$letra=$_REQUEST['letra'];


for ($i=0; $i<$altura ; $i++) { 
     for ($j=0; $j<$ancho ; $j++) { 
        echo("$letra");
     }
     echo("<br>");
}

?>
</body>
</html>