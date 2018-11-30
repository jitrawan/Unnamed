<?php
session_start();
 require_once('Connections/config.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "login.php";
  $MM_redirectLoginFailed = "login.php?act=f";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_config, $config);
  
  $LoginRS__query=sprintf("SELECT user, pass FROM admin WHERE user='%s' AND pass='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?
if($_GET[act]=="f"){
?>
<script>alert("การเข้าสู่ระบบมีข้อผิดพลาดกรุณาลองใหม่");
window.location="login.php";</script>
<? 
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
.style1 {color: #FFFFFF}
-->
</style></head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/logo.png" width="1024" height="300" border="0" usemap="#Map" /></td>
  </tr>
  <tr>
    <td height="300" valign="top">&nbsp;
      <p>
      <!-- Save for Web Slices (Untitled-1) -->
</p>
<? if(!$_SESSION['MM_Username']){?>
      <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
        <p align="center" class="style1">User :
          <label>
          <input type="text" name="textfield" />
          </label>
        </p>
        <p align="center" class="style1">Pass :         
          <label>
          <input type="password" name="textfield2" />
          </label>
        </p>
        <p align="center" class="style1">
          <label>
          <input type="submit" name="Submit" value="Submit" />
          </label>
          <label>
          <input type="reset" name="Submit2" value="Reset" />
          </label>
        </p>
      </form>
	  <? }else{?>
	  <script>window.location="admin_detail.php";</script>
	  <? }?>
    <!-- End Save for Web Slices --></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<map name="Map" id="Map"><area shape="rect" coords="822,135,927,176" href="login.php" />
</map></body>
</html>