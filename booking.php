<?
session_start();
if($_GET[act]==1){
include"include_booking.php";
}
?>
<?php require_once('Connections/config.php'); ?>
<?php require_once('Connections/config.php'); ?>
<?php
$maxRows_Recordset1 = 100;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT * FROM chair";
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

$colname_movie = "-1";
if (isset($_SESSION['m_id'])) {
  $colname_movie = (get_magic_quotes_gpc()) ? $_SESSION['m_id'] : addslashes($_SESSION['m_id']);
}
mysql_select_db($database_config, $config);
$query_movie = sprintf("SELECT * FROM movie WHERE m_id = %s", $colname_movie);
$movie = mysql_query($query_movie, $config) or die(mysql_error());
$row_movie = mysql_fetch_assoc($movie);
$totalRows_movie = mysql_num_rows($movie);
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
.style1 {color: #FFFFFF}
.style3 {color: #996600}
.style4 {color: #FFFFFF; font-weight: bold; }
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
        <p class="style4">รายการ : <?php echo $row_movie['title']; ?></p>
        <table border="0" cellpadding="0" cellspacing="0">
		  <?  $i=1;?>
  <?php do { ?>
                  <? if($i%10==1){?>
            <tr>
			  <? } ?>
              <td>
			  <? if($row_Recordset1['c_start']==0){?>
			  <a href="insert.php?c_id=<?php echo $row_Recordset1['c_id']; ?>"><img src="images/chair.png" onmouseover="this.src='images/select.png'" onmouseout="this.src='images/chair.png'" width="72" height="72" border="0" /></a>
			  <? }elseif($row_Recordset1['c_start']==1){?>
			  <a href="delete.php?c_id=<?php echo $row_Recordset1['c_id']; ?>"onclick="return confirm('คุณจะยกเลิกการสั่งจองที่ตรงนี้ใช่หรือไม่?');"><img src="images/select.png"  onmouseover="this.src='images/del.png'" onmouseout="this.src='images/select.png'"width="72" height="72" border="0" /></a>	
			  <? }elseif($row_Recordset1['c_start']==2){?>
			  <img src="images/select_time.png" width="72" height="72" />	  		 
			  <? }elseif($row_Recordset1['c_start']==3){?>
			  <img src="images/com.png" width="72" height="72" />		  
			  <? }?>
			        </td>
			  	<? if($i%10==0){?>
            </tr>
			  	<? } ?>
	<?
$i++;
?>
            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </table>
      </div>
      <hr />
      <p align="center">
      <!-- Save for Web Slices (Untitled-1) --> 
      <span class="style3"><a href="payment.php" class="style1"onclick="return confirm('คุณจะยืนยันการสั่งจองใช่หรือไม่?');">ชำระเงิน</a></span></p>
      <p align="center" class="style1"><a href="reset.php" class="style1"onclick="return confirm('คุณจะยกเลิกการสั่งจองใช่หรือไม่?');">ยกเลิกทั้งหมด</a></p>
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

mysql_free_result($movie);
?>