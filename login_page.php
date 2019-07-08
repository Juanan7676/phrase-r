<?php
require 'core/SQL.php';
require 'config/phraser.php';
$conn = new SQLConnection();
$errno=0;
if (isset($_GET["Err"]))
	$errno = $_GET["Err"];
?>

<html>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jscommons.js"></script>
<script>
function myF()
{
	changeRoute('Login');
	parent.document.getElementById("session").innerHTML = "";
}
</script>
<body bgcolor="#FFFFFF" onLoad="myF()">
<table cellspacing="0" cellpadding="0" width="100%">
<tr height=30>
<td height=70 colspan="2">
<div align="center" class="Title">
<b>Phrase-R Login page</b>
</div>
</td>
</tr>
<?php if (!__PAGE_CLOSED) { ?>
<tr>
<td colspan="2" height="10">&nbsp;</td>
</tr>
<tr>
<td width="15%" rowspan="2"></td>
<td><div align="left" style="font-size:20px;font-family:Verdana, Geneva, sans-serif">
<b>Login</b>
<br />
<?php
if ($errno==2 || $errno==1) {
?>
<br />
<table border="1px solid" bordercolor="#FF0000" bgcolor="#FF5E5E" style="font-size:12px"><tr>
  <td>User name or password is not correct.</td></tr></table>
<?php } ?>
<br />
</div>
<div align="left" style="font-size:12px;font-family:Verdana, Geneva, sans-serif">
<form method="post" action="core/login.php">
<table width="40%">
<tr>
<td style="font-size:14px">
Email:</td><td><input type="text" name="email" size=30 /></td>
</tr>
<tr>
<td style="font-size:14px">Password:</td><td><input type="password" name="password" size=30 /></td>
</tr>
<tr>
<td colspan="2"><div align="center"><input type="submit" value="Login" />
</form>
<form action="register.php">
<input type="submit" value="Sign up" disabled>
</form></div></td>
</tr>
</table>
</div>
</td>
</tr>
<?php } else { ?>
<tr>
<td width="100%" align="center" style="font-size:20px"><b>Page closed</b></td>
</tr>
<tr>
<td width="70%" align="center" style="font-size:13px">Phrase-R is currently closed for maintenance. Check again later!</td>
</tr>
<?php } ?>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</body>
</html>