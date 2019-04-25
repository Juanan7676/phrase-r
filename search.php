<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jscommons.js"></script>

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

<body class="default"onload="javascript:changeRoute('Home > Training Module > Corpus Search')" style="background:linear-gradient(to bottom, #ffffff 41%, #66ffff 126%);">
<table height="480" width="100%" cellpadding="0" cellspacing="0">
<tr height="40">
<td colspan="2">
<div align="center"><b>Select a query type</b></div>
</td>
</tr>
<tr height="110">
<td width="50%"><div align="center"><a href="javascript:newWindow('./search_basic.php',1000,600,'yes')" target="_self"><img src="img/lupa_basico.png" /></a></div></td>
<td width="50%"><div align="center"><a href="search_advanced.php" target="_self"><img src="img/lupa_avanzado.png" /></a></div></td>
</tr>
<tr height="30">
<td width="50%"><div align="center"><b>Basic search</b></div></td>
<td width="50%"><div align="center"><b>Advanced Search</b></div></td>
</tr>
<tr height="50">
<td width="50%"><div align="center" style="font-size:11px"><i>Search words/phrases.</i></div></td>
<td width="50%"><div align="center" style="font-size:11px"><i>Add filters to your searc by selecting domain, subdomain and abstract section.</i></div></td>
</tr>
<tr height="150"></tr>
<tr height="50">
	<td colspan="2"><div align="center"><a href="training.php" target="_self"><img src="img/back.png" title="Back to Training Module" alt="Back to Training Module" /></a></div></td>
</tr>
<tr height="50"></tr>
</table>
</body>
</html>
