<html>
<head></head>
<body>
<?php
#$temp[4]=20;
#$temp=array(3,5,67,20);
#count($temp);

#media de un array
#maximo del array

$array=array(22,150,4,50,97);
$enviado=$_REQUEST['enviar'];

if($enviado=="media"){
    $total=0;
    for ($i=0; $i <count($array); $i++) { 
        $total+=$array[$i];
    }
    echo "La media es: ".$total/count($array);
}
else{
    $max=$array[0];
    for ($i=0; $i <count($array); $i++) { 
        if ($max<$array[$i]){
            $max=$array[$i];
        }
    }
    echo "El maximo es: $max";
}


?>
</body>
</html>