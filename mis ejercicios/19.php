<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    function CalcularIMC($peso,$altura){
        $imc=$peso/($altura*$altura);
        return $imc;
    }
    echo "El IMC es ".CalcularIMC($_REQUEST['peso'],$_REQUEST['alt']);
    ?>
</body>
</html>