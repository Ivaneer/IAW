<html>
<head></head>
<body>
<?php
$ip=$_REQUEST['ip'];
echo system("nslookup $ip");
?>
</body>
</html>