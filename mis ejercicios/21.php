<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    #function cuadcub($valor,&$cuad,&$cub)   
    #cuadcub(2,$cuad,$cub)
    //array 5 num
    //function max y la posicion en el array de ese numero.
   
   function maxArray(&$pos,$miarray){
        $max=$miarray[0];
        $pos=1;
        for ($i=0; $i <count($miarray) ; $i++) {
            if ($max<$miarray[$i]){
                $max=$miarray[$i];
                $pos=$i+1;
            }
        }
        return $max;
    }

    $array=array(rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100));
    for ($i=0; $i <count($array) ; $i++) {
        echo "$array[$i] ";
    }
    $max=maxArray($pos,$array);
    echo "<br>El mayor es $max y su posicion es $pos";

    ?>
</body>
</html>