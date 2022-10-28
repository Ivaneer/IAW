<html>
<head></head>
<body>
<?php
#Cargas los numeros en un array 
#1 - 1
#2 - 1y2
#3 - 1,2y3
# sum o mult
##"n" .$i

$valor=$_REQUEST['valor'];
$math=$_REQUEST['math'];

for ($i=1; $i<4 ; $i++) { 
	$array[$i-1]=$_REQUEST['num'.$i];
}
//var_dump($array); 
if ($math=="sumar") {
	$suma=0;
	for ($i=0; $i <$valor ; $i++) { 
		$suma+=$array[$i];
	}
	echo "La suma es $suma";
}
else{
	$mult=1;
	for ($i=0; $i <$valor ; $i++) {
		$mult*=$array[$i];
	}
	echo "La multiplicacion es $mult";
}
?>
</body>
</html>