<?php require_once('Connections/config.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_config, $config);
$query_Recordset1 = "SELECT * FROM movie";
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
-->
</style></head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/logo.png" width="1024" height="300" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="300" valign="top">&nbsp;
      <table border="0" align="center" cellpadding="0" cellspacing="0">
 <?  $i=1;?>
  <?php do { ?>
                  <? if($i%3==1){?>
          <tr>
		  	     <? } ?>
            <td><table width="300" height="300" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
              <tr>
                <td colspan="3"><img src="images/body_01.png" width="300" height="22" alt="" /></td>
              </tr>
              <tr>
                <td width="13" height="258" background="images/body_02.png">&nbsp;</td>
                <td width="275" height="254" background="images/body_03.png" valign="top"><table width="275" height="279" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="39"><div align="center"><strong><a href="select.php?m_id=<?php echo $row_Recordset1['m_id']; ?>"><?php echo $row_Recordset1['title']; ?></a></strong></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="select.php?m_id=<?php echo $row_Recordset1['m_id']; ?>"><img src="img/<?php echo $row_Recordset1['pic']; ?>" width="263" height="257" border="0" /></a></div></td>
                  </tr>
                </table></td>
                <td width="12" height="128" background="images/body_04.png">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><img src="images/body_05.png" width="300" height="20" alt="" /></td>
              </tr>
            </table></td>
			<? if($i%3==0){?>
          </tr>
		   	<? } ?>
	<?
$i++;
?>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table>
    <p>
      <!-- Save for Web Slices (Untitled-1) -->
</p>
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
