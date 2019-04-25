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

function getLastPhrase(text)
{
	var lastPoint = 0;
	for (var k = 0; k<text.length; k++)
	{
		if (text[k]=='.' || text[k]==',') lastPoint = k+1;
	}
	var ret = text.substring(lastPoint,text.length);
	if (ret[0]==' ') return ret.substring(1,ret.length);
	return ret;
}

function hints(str)
{
	var lastPhrase = getLastPhrase(str);
	if (lastPhrase=="") return;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200)
		{
			document.getElementById("suggestions").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","query_hint.php?q=" + lastPhrase,true);
	xmlhttp.send();
}
</script>
</head>

<body class="default" onload="javascript:changeRoute('Index > Training Module > Academic Abstract Composition')" style="background:linear-gradient(to bottom, #ffffff 41%, #66ffff 126%);">
<table height="480" width="100%">
<form action="generate_pdf.php" method="post" id="pdfform" target="_blank">
<tr height="20">
<td colspan="2" align="right" width="20%">Title:</td>
<td align="left"><input type="text" name="title" /></td>
</tr>
<tr height="20">
<td colspan="2" align="right">Author:</td>
<td align="left"><input type="text" name="author" /></td>
</tr>
<tr height="100">
<td width="10%"></td>
<td width="80%" colspan="3"><textarea cols="100" rows="6" style="resize:none" onkeyup="javascript:hints(this.value)" name="msg"></textarea>
<td width="10%">
</td>
</tr>
<tr height="15">
<td colspan="5" width="100%"><div align="center"><b>Suggested examples</b></div></td>
</tr>
<tr height="100">
<td width="10%"></td>
<td width="80%" colspan="3"><div id="suggestions"></div></td>
<td width="10%"></td>
</tr>
<tr height="50">
<td width="10%"></td>
<td width="26%" align="center"><a href="javascript:void(0)" target="_self"><img src="img/txt.png" title="Export as plain text" alt="Export as plain text" /></a></td>
<td width="28%" align="center"><a href="javascript:document.getElementById('pdfform').submit()" target="_self"><img src="img/pdf.png" title="Export as PDF document" alt="Export as PDF document" /></a></td>
<td width="26%" align="center"><a href="training.php" target="_self"><img src="img/back.png" title="Back to Training Module" alt="Back to Training Module" /></a></td>
<td width="10%"></td>
</tr>
</form>
</table>
</body>
</html>