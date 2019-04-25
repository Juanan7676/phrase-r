<?php
require 'core/SQL.php';

$conn = new SQLConnection();

$res = $conn->pquery("SELECT * FROM texts")->get_result();
$texts = $res->num_rows;
if ($texts < 10)
{
	die(); // TODO: Throw error to user
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jscommons.js"></script>
<script>
function newWindow(name,w1,h1,s1) {
	remote = window.open("","remotewin","width="+w1+",height="+h1+",scrollbars="+s1);
	remote.location.href = name;
	if (remote.opener == null)
			remote.opener = window;
	remote.opener.name = "opener";
}
</script>
</head>

<body class="default" onload="javascript:changeRoute('Home > Training Module > Academic Writing Activities')" style="background:linear-gradient(to bottom, #ffffff 41%, #66ffff 126%);">
<table height="480" width="100%" cellpadding="0" cellspacing="0">
<tr height="40">
<td colspan="3">
<div align="center"><b>Academic Writing Activities</b></div>
</td>
</tr>
<tr height="110">
<td width="50%"><div align="center"><a href="javascript:newWindow('ex1.php',1000,500,'auto')" target="_self"><img src="img/act1.png" /></a></div></td>
<td width="50%"><div align="center"><a href="exercises.php" target="_self"><img src="img/act2.png" /></a></div></td>
</tr>
<tr height="30">
<td width="50%"><div align="center"><b>Match sentences</b></div></td>
<td width="50%"><div align="center"><b>Fill in the gaps</b></div></td>
</tr>
<tr height="50">
<td width="50%"><div align="center" style="font-size:11px"><i>Match the shown sentences extracted from PHRASE-R corpus with the corresponding abstract section.</i></div></td>
<td width="50%"><div align="center" style="font-size:11px"><i>Fill in the gaps with the proper terms/discourse markers/phrases.</i></div></td>
</tr>
<tr height="150"></tr>
<tr height="50">
	<td colspan="3"><div align="center"><a href="training.php" target="_self"><img src="img/back.png" title="Back to Training Module" alt="Back to Training Module" /></a></div></td>
</tr>
<tr height="50"></tr>
</table>
</body>
</html>
