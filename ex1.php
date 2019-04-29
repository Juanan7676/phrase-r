<?php
require_once 'core/check_session.php';
require_once 'core/SQL.php';
require_once 'core/parser.php';

$conn = new SQLConnection();

$res = $conn->pquery("SELECT * FROM texts WHERE Route1_ANN IS NOT NULL")->get_result();
$random = rand(1,$res->num_rows);
$row = NULL;
for ($k = 0; $k<$random; $k++) $row = $res->fetch_assoc();
if (fopen("texts/".$row["Route1_ANN"],"r")==NULL) die("Error! ".$random);
$frases = returnPhrases($row["Route1_ANN"]);
?>
<style>
html {
	height:100%;
}
body {
	height:100%;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Match sentences</title>
</head>

<body class="default" style="background: linear-gradient(to bottom, #ffffff 65%, #000000 140%); height:100%;">
<script>
var sentences = [
	<?php
	echo '"'.$frases[0][1].'"';
	for ($k=1; $k<sizeof($frases); $k++)
		echo ',"'.$frases[$k][1].'"';
	?>
	];

var mappings = {"Introduction":"intr","Aim":"aim","Background":"state","Aim+Ref":"aim2","Aim+Methodology":"aim3","Methodology":"meth","Methodology+Conclusion":"meth2","Analysis":"analysis","Conclusion":"concl"};	

function check()
{
	var punt = 0;
	for (var k=1; k<=sentences.length; k++)
	{
		if (mappings[document.getElementById("r"+k).value]==sentences[k-1]) punt++;
	}
	alert("Your score is "+punt/sentences.length*10+"\/10");
}
</script>
<table width="100%">
	<tr height="16">
		<td colspan="2" style="font-size:16px" align="center"><b>Match sentences</b></td>
	</tr>
    <?php
	for ($k=1; $k<=sizeof($frases); $k++)
	echo '<tr height="16">
    	<td width="70%" id="p'.$k.'" style="border-bottom:1px solid #000">'.$frases[$k-1][0].'</td>
        <td width="30%"><select id="r'.$k.'">
		<option>Introduction</option>
		<option>Background</option>
		<option>Aim</option>
		<option>Aim+Ref</option>
		<option>Aim+Methodology</option>
		<option>Methodology</option>
		<option>Methodology+Conclusion</option>
		<option>Analysis</option>
		<option>Conclusion</option>
		</select></td>
    </tr>
	';
	?>
<tr height="10">
</tr>
<tr>
	<td colspan="2" align="center">
    	<input type="button" onclick="javascript:check()" value="Check your answers" />
	</td>
</tr>
<tr height="10">
</tr>
<tr>
	<td colspan="2" align="center">
    	<a href="javascript:window.close()"><img src="img/exit.png" /></a>
    </td>
</tr>
</table>
</body>
</html>
