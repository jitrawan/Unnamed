<?php 
session_start();
require_once('Connections/config.php'); ?>
<?php
$id=$_GET[c_id];
mysql_select_db($database_config, $config);
$query_Recordset1 = "update chair set c_start='0' where c_id='$id'";
$Recordset1 = mysql_query($query_Recordset1, $config) or die(mysql_error());

mysql_select_db($database_config, $config);
$query_Recordset2 = "delete FROM orders where c_id='$id' and m_id='$_SESSION[m_id]'";
$Recordset2 = mysql_query($query_Recordset2, $config) or die(mysql_error());
?>
<script>window.location="booking.php";</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>

