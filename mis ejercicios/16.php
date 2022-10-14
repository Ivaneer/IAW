<html>
<head></head>
<body>
<?php
#foreach($v as $nom => $num){}
#Bucar en un array de dni y nombre buscarlos
$array[$_REQUEST['nombre1']]=$_REQUEST['dni1'];
$array[$_REQUEST['nombre2']]=$_REQUEST['dni2'];
$array[$_REQUEST['nombre3']]=$_REQUEST['dni3'];
$busca=$_REQUEST['busca'];
$contador=0;
foreach($array as $nom => $dni){
    if ($dni == $busca) {
        echo "Si existe el DNI $dni y su nombre es $nom";
    }
    else{
        $contador++;
    }
}
if ($contador==count($array)){
    echo "No existe el DNI $busca";
}
?>
</body>
</html>