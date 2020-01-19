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
	changeRoute('Home');
	parent.document.getElementById("session").innerHTML = "";
}
</script>
<body bgcolor="#FFFFFF" onLoad="myF()">
Phrase-r 1.0 is the outcome of a language project supported by the Andalusian Government under the programme for Research and Innovation in Higher Education 2017-2018 (grant sol-201700083912-tra) and led by Dr. María Araceli Losey León (Universidad de Cádiz, Spain). The project title is  "Design of a learner-oriented supporting online tool for the automatic generation of the prototypical academic phraseology found in the macro-genre of academic dissertation/projects in English within the Science and Technical fields”. Phrase-r 1.0 is a software conceived as a writing training tool for the composition of academic abstracts in English in the Science and Technical fields.
</body>
</html>