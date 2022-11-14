<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<?php
    if(isset($_COOKIE['foto'])){

    }
?>

<body>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <form action="" method="post">
        foto1 <input type="radio" name="foto" value="foto1" checked><br>
        foto2 <input type="radio" name="foto" value="foto2"><br>
        <input type="submit" name="create" value="Crear cookie">
    </form>
    <?php
    if(isset($_REQUEST['foto1']))
    setcookie("foto",)
    ?>
</body>

</html>