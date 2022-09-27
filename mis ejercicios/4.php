<html>
<head></head>
<body>
<?php
# && and
# || or 
# ! not
$lado1=rand(0,100);
$lado2=rand(0,100);
$lado3=rand(0,100);

echo "Las longitudes son: $lado1  $lado2  $lado3</br>";
    if ($lado1+$lado2<$lado3 xor $lado1+$lado3<$lado2 xor $lado2+$lado3<$lado1) {
         echo "No";
    }
    else{
        echo "Si";
    }


   


?>
</body>
</html>