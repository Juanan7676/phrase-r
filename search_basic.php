<style>
html {
	height:100%;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script>
function changeRoute(msg)
{
	parent.document.getElementById("Route").innerHTML = '<b><font color=\"#d11414\">' + msg + "</font></b>";
}
</script>
</head>

<body class="default" onLoad="javascript:changeRoute('Index')" style="background: linear-gradient(to bottom, #ffffff 65%, #000000 140%); height:100%;" >
<form action="search_results.php" method="post" target="results">
<table height="100%" width="100%" cellpadding="0" cellspacing="0">
<tr height="10%">
<td colspan="2" width="30%">
<div align="center"><b>Basic search</b></div>
</td>
<td rowspan="7" width="70%" style="border-left:3px solid #000"><iframe width="100%" height="100%" frameborder="0" id="results" name="results" scrolling="auto"></iframe></td>
</tr>
<tr height="10%">
<td style="font-size:12px;"><div align="center">Type a lemma or a phrase</div></td>
</tr>
<tr height="10%">
<td><div align="center"><input name="phrase" type="text" maxlength="60" size="30" style="font-size:16px; text-align:center;" /></div></td>
</tr>
<tr height="10%">
<td><div align="center" style="font-size:11px"><input type="submit" value="Search" /></div></td>
</tr>
<tr height="50">
<td><div align="center"><a href="javascript:window.close()"><img src="img/exit.png" /></a></td>
</tr>
<tr height="40%">
<td>&nbsp;</td>
</tr>
</table>
</form>
</body>
</html>
