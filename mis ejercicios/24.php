<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
</head>
<?php
if(isset($_REQUEST['mostrar'])){
    $mensaje=$_REQUEST['nombre']; 
}
?> 
<body>
<form action="" method="POST">
Nombre: <input type="text" name="nombre"><br>
<input type="submit" name="mostrar" value="Mostrar">

<div class="noti">
<?php
if (isset($mensaje) && $mensaje!=''){
    echo "$mensaje hola";
}
?>
</div>
</form>
</body>
</html>