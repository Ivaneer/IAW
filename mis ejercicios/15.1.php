<html>
<head></head>
<body>
<?php
#numero de veces que se repite un numero

$array=array(rand(6,7),rand(8,9),rand(0,100),rand(1,2),rand(1,2),rand(1,2));
$num=$_REQUEST['num'];
$contador=0;
$numeros=0;

for ($i=0; $i <count($array) ; $i++) { 
    $numeros=$array[$i];
    echo " $numeros ";
    if($array[$i]==$num){
        $contador++;
    }
}
if($contador==0){
    echo "<br>El numero $num no existe";
}
else{
    echo "<br>El numero $num se repite un total de $contador veces";
}
?>
</body>
</html>