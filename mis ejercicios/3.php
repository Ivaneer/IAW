<html>
<head></head>
<body>
<?php
# && and
# || or 
# ! not
$primero=rand(0,50);
$segundo=rand(0,50);
$tercero=rand(0,50);

echo "Los numeros son: $primero  $segundo  $tercero</br>";
    if ($primero>= $segundo && $primero>=$tercero) {
        print("primero");
    }
    elseif ($segundo>=$tercero) {
        print("segundo");
    }
    else{
        print("tercero");
    }


?>
</body>
</html>