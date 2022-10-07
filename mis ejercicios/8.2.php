
<html>
<head></head>
<body>
<?php
#$_REQUEST['']
#si inicio es mayor q fin : error
#si es igual o menor escribir 3-7 34657
$inicio=$_REQUEST['inicio'];
$fin=$_REQUEST['fin'];
if ($inicio > $fin ) {
	echo "Error 404";
}
else{
	for ($i=$inicio; $i<=$fin ; $i++) { 
		echo "$i<br>";
	}
}

?>
</body>
</html>