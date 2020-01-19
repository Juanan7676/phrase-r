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
-Project director: Dr. María Araceli Losey León (Department of English and French Philology, Universidad de Cádiz, Spain).<br>

-Corpus designer and compiler: María Araceli Losey León<br>

-Pedagogic design and tests' developer: María Araceli Losey León<br>

-Programming by Juan Antonio Guitarte Fernández (4th-year student of the Degree in Mathematics. Universidad de Cádiz, Spain).<br>

-Programming supervisor: María Araceli Losey León  <br>
</body>
</html>