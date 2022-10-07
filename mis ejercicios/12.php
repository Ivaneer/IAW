<html>
<head></head>
<body>
<?php
#Dada una altura y un select con x a y o. Haz un triangualo
#--3x
#x
#xx
#xxx
$altura=$_REQUEST['altura'];
$caracter=$_REQUEST['caracter'];
$tipo=$_REQUEST['piramide'];

if ($tipo=="normal"){
    for ($i=0; $i<$altura ; $i++) { 
        $contador=$i;
        while ($contador>=0){
            echo "$caracter";
            $contador--;
        }
        echo("<br>");
    }
}
else{
    for ($i=$altura; $i>0 ; $i--) { 
        $contador=$i;
        while ($contador>0){
            echo "$caracter";
            $contador--;
        }
        echo("<br>");
    }
}
?>
</body>
</html>