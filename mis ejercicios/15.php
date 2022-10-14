<html>
<head></head>
<body>
<?php
#numero de veces que se repite un numero

$array=array(3,7,1,7,44,2,5,5,5,5);
$num=$_REQUEST['num'];
$contador=0;
for ($i=0; $i <count($array) ; $i++) { 
    if($array[$i]==$num){
        $contador++;
    }
}
if($contador==0){
    echo "No exixte";
}
else{
    echo "Existe un total de $contador veces";
}
?>
</body>
</html>