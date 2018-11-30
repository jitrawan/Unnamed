<?
session_start();
?>
<?php require_once('Connections/config.php'); ?>
<?php
$maxRows_show_data = 10;
$pageNum_show_data = 0;
if (isset($_GET['pageNum_show_data'])) {
  $pageNum_show_data = $_GET['pageNum_show_data'];
}
$startRow_show_data = $pageNum_show_data * $maxRows_show_data;

mysql_select_db($database_config, $config);
$query_show_data = "SELECT * FROM chair";
$query_limit_show_data = sprintf("%s LIMIT %d, %d", $query_show_data, $startRow_show_data, $maxRows_show_data);
$show_data = mysql_query($query_limit_show_data, $config) or die(mysql_error());
$row_show_data = mysql_fetch_assoc($show_data);

if (isset($_GET['totalRows_show_data'])) {
  $totalRows_show_data = $_GET['totalRows_show_data'];
} else {
  $all_show_data = mysql_query($query_show_data);
  $totalRows_show_data = mysql_num_rows($all_show_data);
}
$totalPages_show_data = ceil($totalRows_show_data/$maxRows_show_data)-1;

mysql_select_db($database_config, $config);
$query_show_order = "SELECT * FROM orders WHERE m_id='$_SESSION[m_id]'";
$show_order = mysql_query($query_show_order, $config) or die(mysql_error());
$row_show_order = mysql_fetch_assoc($show_order);
$totalRows_show_order = mysql_num_rows($show_order);

mysql_select_db($database_config, $config);
do{
$query_upchair = "update chair set c_start='0'";
$upchair = mysql_query($query_upchair, $config) or die(mysql_error());
} while ($row_show_data = mysql_fetch_assoc($show_data));


mysql_select_db($database_config, $config);
do{
$start=$row_show_order['o_start'];
$id=$row_show_order['c_id'];
$query_upoder = "update chair set c_start='$start' where c_id='$id'";
$upoder = mysql_query($query_upoder, $config) or die(mysql_error());
} while ($row_show_order = mysql_fetch_assoc($show_order));
?>
<?php
mysql_free_result($show_data);

mysql_free_result($show_order);
?>
