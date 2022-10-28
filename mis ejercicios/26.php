<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
</head>
</head>
<?php
if (isset($_REQUEST['mostrar'])) {
  $mensaje = $_REQUEST['edad'];
}
if (isset($_REQUEST['tiempo'])) {
  $mensaje1 = $_REQUEST['edad'];
  $mensaje1 = 60 - $mensaje1;
}
?>

<body>
  <form action="" method="POST">
    Edad: <input type="number" name="edad"><br>
    <input type="submit" name="mostrar" value="Mostrar"><br>
    <input type="submit" name="tiempo" value="Tiempo para jubilarte">

    <div class="noti">
      <?php
      if (isset($mensaje) && $mensaje != '') {
        echo "Tienes $mensaje";
      }
      if (isset($mensaje1) && $mensaje1 != '' && $mensaje1 < 60) {
        echo "Te quedan $mensaje1 años";
      }

      ?>
    </div>
  </form>
</body>

</html>