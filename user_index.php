<?php 
require './core/check_session.php';
$userdata = $conn->pquery("SELECT * FROM users WHERE userID=?",$userid)->get_result()->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="jscommons.js"></script>
<script>
function myF()
{
	changeRoute('Home');
	parent.document.getElementById("session").innerHTML = '<b>Welcome, <br /><?php echo htmlspecialchars($userdata["firstname"])."."; ?></b></div><br /><div align="center">Your last login was on<br /><font color="#FF0000"><?php echo $userdata["lastlogin"] ?></font>.<br /><br /></div><div align="center">Profile details</div><div align="center"><a href="/core/logout.php" target="jj">Log out</a>';
}
</script>
</head>

<body class="default" onload="javascript:myF()" style="background:linear-gradient(to bottom, #ffffff 41%, #66ffff 126%);">
<table height="480" width="100%" cellpadding="0" cellspacing="0">
<tr height="40">
<td colspan="2">
<div align="center"><b>Select a PHRASE-R module</b></div>
</td>
</tr>
<tr height="110">
<td width="50%"><div align="center"><a href="training.php" target="_self"><img src="img/training_module2.png" /></a></div></td>
<td width="50%"><div align="center"><a href="research.php" target="_self"><img src="img/research_module2.png" /></a></div></td>
</tr>
<tr height="30">
<td width="50%"><div align="center"><b>Training module</b></div></td>
<td width="50%"><div align="center"><b>Research module</b></div></td>
</tr>
<tr height="50">
<td width="50%"><div align="center" style="font-size:11px"><i>Search words/phrases on PHRASE-R corpus, train on the academic writing and compose your own academic abstract/article with PHRASE-R tools.</i></div></td>
<td width="50%"><div align="center" style="font-size:11px"><i>Annotate your own corpus by using PHRASE-R annotator and tagset.</i></div></td>
</tr>
<tr height="250">
</tr>
</table>
</body>
</html>
