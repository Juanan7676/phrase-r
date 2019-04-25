<?php
require 'core/SQL.php';
require 'core/util.php';
$conn = new SQLConnection();
$errno=0;
if (isset($_GET["ErrCode"]))
	$errno = $_GET["ErrCode"];
?>

<html>
<link href="style.css" rel="stylesheet" type="text/css" />
<body bgcolor="#FFFFFF">
<table cellspacing="0" cellpadding="0" width="100%">
<tr height=30>
<td height=70 colspan="2">
<div align="center" class="Title">
<b>STAR-AB Corpus</b>
</div>
</td>
</tr>
<tr>
<td colspan="2" height="10">&nbsp;</td>
</tr>
<tr>
<td width="15%" rowspan="2"></td>
<td><div align="left" style="font-size:20px;font-family:Verdana, Geneva, sans-serif">
<b>Sign up</b>
<br />
<?php
if ($errno==1)
	echo getErrMsg("Debe rellenar todos los campos obligatorios.");
?>
<br />
</div>
<div align="left" style="font-size:12px;font-family:Verdana, Geneva, sans-serif">
<form method="post" action="core/process_register.php">
<table width="40%">
<tr>
<td style="font-size:14px">
First Name (*):</td><td><input type="text" name="firstname" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Last Name (*):</td><td><input type="text" name="lastname" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Email (*):</td><td><input type="text" name="email" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">Password (*):</td><td><input type="password" name="password" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Institution (*):</td><td><input type="text" name="institution" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Department or reseach center:</td><td><input type="text" name="department" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Address (*):</td><td><textarea name="address"></textarea></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Phone number:</td><td><input type="text" name="tel" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Fax:</td><td><input type="text" name="fax" size=30 /></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Topic of research:</td><td><textarea name="research"></textarea></td>
</tr>
<tr height="10"><td colspan="2"></td></tr>
<tr>
<td style="font-size:14px">
Type of publication:</td><td><input type="text" name="publishType" size=30 /></td>
</tr>

<tr>
<td colspan="2"><div align="center"><input type="submit" value="Sign me up" />
</form></div></td>
</tr>
</table>
</div>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</body>
</html>