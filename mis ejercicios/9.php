<html>
<head></head>
<body>
<?php
$Numtablas=1;
while ($Numtablas<=5){
        $Tablamulti=0;

    while($Tablamulti<11){
        $final=$Numtablas*$Tablamulti;
        echo "$Numtablas * $Tablamulti = $final<br>";
        $Tablamulti++;
    }
    $Numtablas++;
    echo"<h>------------------------<br></h>";
}

?>
</body>
</html>