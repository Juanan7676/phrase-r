<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
var shown = false;

var subdomains = [
	["All"],
	["All"],
	["All","------","Nautical Science and Techniques","Aerospace engineering","Energy sources","Environmental protection technology","Marine engineering (machinery and thermal engines)","Port infrastructure","Shipbuilding","Radioelectronics engineering","Ocean engineering","Chemical engineering and processes","Food technology","Architecture","Robotics","Transport Infrastructure"],
	["All","------","Electronics","Systems Engineering and Automation","Signal Theory and Automation","Signal Theory and Communications"],
	["All", "------","Seamanship","Nautical Science","Maritime transport","Maritime safety","Maritime security","Maritime communications","Seaports"],
	["All", "------","Oceanography"],
	["All", "------","Marine sciences","Meteorology and atmospheric sciences","Environmetal Sciences"],
	["All", "------","Astronomy and Astrophysics","Applied Physics","Electronics","Fluid Mechanics","Electronic Technology"]
	]

function toggleAdvanced()
{
	for (k=1; k<=2; k++)
		document.getElementById("advanced"+k).hidden = shown;
	shown = !shown;
	document.getElementById("domain").selectedIndex = 0;
}
function changeSubdomain()
{
	var selector = document.getElementById("subdomain");
	
	while (selector.length>0)
		selector.remove(selector.length-1);
	
	var arr = subdomains[document.getElementById("domain").selectedIndex];
	
	for (k=0; k<arr.length; k++)
	{
		var option = document.createElement("option");
		option.text = arr[k];
		selector.add(option);
	}
}
</script>
</head>

<body>
<table cellspacing="0" cellpadding="0" width="100%">
<div align="left" style="font-size:20px;font-family:Verdana, Geneva, sans-serif"><b>Search</b><br /><br /></div>
			<div align="left" style="font-size:12px;font-family:Verdana, Geneva, sans-serif">
			<form method="post" action="search_results.php" target="_self">
			<table width="40%">
				<tr>
					<td colspan="2" style="font-size:18px">Phrase or word:</td>
				</tr>
				<tr>
					<td colspan="2"><input type="text" name="phrase" id="phrase" size=100 /></td>
				</tr>
				<tr>
					<td colspan="2"><div align="center"><a href="javascript:toggleAdvanced()">Advanced search</a></div></td>
				</tr>
				<tr id="advanced1" hidden="true">
					<td>Filter by Domain: </td>
					<td><select name="domain" id="domain" onchange="changeSubdomain()">
						<option selected="selected">All</option>
						<option>------</option>
						<option>[STAR-ABENG] Engineering, manufacturing and construction technologies</option>
						<option>[STAR-ABMN] Information and Communication Technologies</option>
						<option>[STAR-ABAS] Applied Sciences</option>
						<!-- <option>Applied Sciences</option>
						<option>Natural Sciences</option>
						<option>Physics</option> -->
						</select></td>
				</tr>

				<tr id="advanced2" hidden="true">
					<td>Filter by Subdomain: </td>
					<td><select name="subdomain" id="subdomain">
                    	<option selected="selected">All</option>
					</select></td>
				</tr>
				<!-- <tr id="advanced3" hidden="true">
				<td>Subdomain: </td>
				<td><select name="test2">
				<option selected="selected">All</option>
				<option></option>
				<option>Engineering, manufacturing and construction technologies</option>
				<option></option>
				<option></option>
				<option></option>
				</select></td>
				</tr>
				<tr> -->
				<tr>
					<td colspan="2"><div align="center"><input type="submit" value="Search on Corpus" /></form></div></td>
				</tr>
			</table>
			</div>
</table>
</body>
</html>
