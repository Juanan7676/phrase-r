<?php
require_once 'core/parser.php';
require_once 'core/SQL.php';

$query = $_GET["q"];

$dom = (isset($_GET["d"])) ? $_GET["d"] : NULL;
$sub = (isset($_GET["s"])) ? $_GET["s"] : NULL;

$sql = new SQLConnection();

if ($dom == NULL && $sub == NULL) $res = $sql->pquery("SELECT * FROM texts")->get_result();
else if ($sub == NULL) $res = $sql->pquery("SELECT * FROM texts WHERE Domain=?",$dom)->get_result();
else if ($dom == NULL) $res = $sql->pquery("SELECT * FROM texts WHERE Subdomain=?",$sub)->get_result();
else $res = $sql->pquery("SELECT * FROM texts WHERE Domain=? AND Subdomain=?",$dom,$sub)->get_result();

$ex = 0;
while ($row = $res->fetch_assoc())
{
	$oc = searchWords($row["Route1"],$query);
	if ($oc === FALSE) die("Unexpected error at query_hint.php:13");
	for ($k=0; $k < $oc[0]; $k++)
	{
		$f = fopen("texts/".$row["Route1"],"r");
		fseek($f,$oc[1][$k],SEEK_SET);
		echo '<font color="#0000FF"><b>'.htmlspecialchars(fgets($f,strlen($query)+20)).'</b>...</font><br>';
		$ex++;
		if ($ex >= 5) die();
	}
}
?>