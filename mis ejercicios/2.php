<html>
<head></head>
<body>
<?php
  echo "<h1 style=\"color:blue\">LOTERIA</h1><br>";

$random=rand(1,100);
    echo "<h2> El numero sorteado es el $random</h2><br>";

    if ($random <= 25){
        echo "<h2 style=\"color:#999900\">Has ganado 1000€!!!!</h2><br>";
        }
      elseif ($random <= 75){
         echo "<h2 style=\"color:orange\">Has ganado 2000€!!!!</h2><br>";
        }
        else{
         echo "<h2 style=\"color:red ;font-size:100px\" >¡¡¡¡¡Has ganado 3000€!!!!</h2><br>";
        }



?>
</body>
</html>