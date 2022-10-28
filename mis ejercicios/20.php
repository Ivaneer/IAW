<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    //Formulario tres numeros
    //radio button -mayor -menor
    //Calcular, funcion que devuelva el maximo o el minimo
    function maxmin($num1,$num2,$num3,$calculo){
        if ($calculo=="max"){
            $max=$num1;
            if ($max<$num2) {
                $max=$num2;
            }
            if ($max<$num3){
                $max=$num3;
            }
            return $max;
        }
        else{
            $min=$num1;
            if ($min>$num2) {
                $min=$num2;
            }
            if ($min>$num3){
                $min=$num3;
            }
            return $min;
        }
    }
    $calc=$_REQUEST['calc'];
    echo "El $calc es: ".(maxmin($_REQUEST['num1'],$_REQUEST['num2'],$_REQUEST['num3'],$calc));
    ?>
</body>
</html>