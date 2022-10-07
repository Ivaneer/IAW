<html>
<head></head>
<body>
<?php
# for($f=1; $f<=100; $f++){}

for ($i=0; $i<=18; $i=$i+2) { 
       echo "$i ";
   }
echo "<br>";
$contador=20;
$j=0;
while ($contador>0) {
    if ($j%2 == 0) {
    
        $contador=$contador-2;
        echo " $j ";
    }
    $j=$j+1;
   }   
?>
</body>
</html>