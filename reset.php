<?
session_start();
?>
<?php require_once('Connections/config.php'); ?>
<?php
mysql_select_db($database_config, $config);
$query_Recordset2 = "delete FROM orders where m_id='$_SESSION[m_id]'";
$Recordset2 = mysql_query($query_Recordset2, $config) or die(mysql_error());
?>
<?
unset($_SESSION[m_id]);
?>
<script>window.location="index.php";</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
