<html>
<head></head>
<body>
<?php
$nombre=$_REQUEST['name'];
$altura=$_REQUEST['altura'];
$peso=$_REQUEST['peso'];
$imc=$_REQUEST['check'];

if ($imc=="imc") {
	echo "$nombre tu IMC es ".($peso/($altura*$altura));
}
else{
	echo "$nombre tu IMC invertido es ".(($altura*$altura)/$peso);
}

?>
</body>
</html>