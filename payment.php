<?
session_start();
?>
<?php require_once('Connections/config.php'); ?>
<?php require_once('Connections/config.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT * FROM orders where o_start='1'";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $config) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

mysql_select_db($database_config, $config);
if($_GET[act]=="c"){
$query_c = "delete FROM orders where o_start='1'";
$c = mysql_query($query_c, $config) or die(mysql_error());
echo"<script>
alert('ทำการลบเสร็จสิ้น');
window.location='index.php'</script>";
}

mysql_select_db($database_config, $config);
if($_GET[act]=="y"){
do{
$id=$row_Recordset1['o_id'];
$query_y = "update orders set o_start='2' where o_id='$id'";
$y = mysql_query($query_y, $config) or die(mysql_error());
 } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
 echo"<script>
 alert('ทำการยืนยันเสร็จสิ้น');
 window.location='index.php';</script>";
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #000000;
}
.style4 {color: #FFFFFF; font-weight: bold; }
.style5 {color: #000000}
.style6 {color: #FFFFFF}
-->
</style></head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/logo.png" width="1024" height="300" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="300" valign="top">&nbsp;
      <div align="center">
        <p class="style4">รายการสินค้า</p>
      
        <table border="1">
          <tr>
            <td width="129" bgcolor="#FFFFFF"><div align="center">รหัสทีนั่ง</div></td>
            <td width="140" bgcolor="#FFFFFF"><div align="center">รหัสนั่ง</div></td>
            <td width="140" bgcolor="#FFFFFF"><div align="center">ลบ</div></td>
          </tr>
          <?php do { ?>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"><?php echo $row_Recordset1['c_id']; ?></div></td>
              <td bgcolor="#FFFFFF"><div align="center"><?php echo $row_Recordset1['m_id']; ?></div></td>
              <td bgcolor="#FFFFFF"><div align="center"><a href="delete_order.php?o_id=<?php echo $row_Recordset1['o_id']; ?>"onclick="return confirm('คุณจะลบใบรายการนี้ใช่หรือไม่?');">ลบ</a></div></td>
            </tr>
            
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
        <p class="style5"><a href="payment.php?act=y" class="style6">ตกลง</a></p>
        <p class="style5"><a href="payment.php?act=c" class="style6">ยกเลิก</a></p>
      </div>
      <!-- End Save for Web Slices --></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="822,135,927,176" href="login.php" />
</map></body>
</html>
<?php
mysql_free_result($Recordset1);
?>