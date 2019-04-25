<?php
require_once 'core/parser.php';

if (!isset($_GET["code"])) die("Invalid petition. Please try again later.");

$files = scandir("texts/".$_GET["code"]);
if (!$files) die("Invalid code. Please try again later.");
$count = count($files) - 2;

$text = rand(0,$count-1);

$tokens = tokenize(fopen("texts/".$_GET["code"]."/".$_GET["code"]."_".$text.".txt","r"));

// Extract nouns & verbs from the text
$extracted = array();
$nouns = 0;
$verbs = 0;
$left = 10;
// Count the number of nouns & verbs in the text
foreach ($tokens as $t) 
{
	if ($t->tag == "NN0" || $t->tag == "NN1" || $t->tag == "NN2") $nouns++;
	else if ($t->tag == "VVB" || $t->tag == "VVD" || $t->tag == "VVG" || $t->tag == "VVI" || $t->tag == "VVN" || $t->tag == "VVZ") $verbs++;
}
// Extract words & put them in "extracted" array
$k = 0;
while ($left>0 && ($nouns>0 || $verbs>0))
{
	if ($k >= count($tokens)) $k = 0;
	$t = $tokens[$k];
	if (($t->tag == "NN0" || $t->tag == "NN1" || $t->tag == "NN2") && rand(0,$nouns)==0)
	{
		$left--;
		$nouns--;
		array_push($extracted,$tokens[$k]->word);
		$tokens[$k]->word = "_";
		$tokens[$k]->tag = "REMOVED";
	}
	else if (($t->tag == "VVB" || $t->tag == "VVD" || $t->tag == "VVG" || $t->tag == "VVI" || $t->tag == "VVN" || $t->tag == "VVZ") && rand(0,$verbs)==0)
	{
		$left--;
		$verbs--;
		array_push($extracted,$tokens[$k]->word);
		$tokens[$k]->word = "_";
		$tokens[$k]->tag = "REMOVED";
	}
	$k++;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body bgcolor="#EEEEEE">
<div align="center" style="font-family:Verdana, Geneva, sans-serif; font-size:14px"><b>Extracted words</b></div>
<div align="center" style="font-family:Verdana, Geneva, sans-serif; font-size:12px"><?php
foreach ($extracted as $w) echo $w . "  ";
 ?></div><br />
<form action="check.php" method="post">
 <div align="justify" style="font-family:Verdana, Geneva, sans-serif; font-size:12px"><?php echo getTextString($tokens); ?></div>
<br /><br />
<input type="button" value="Check answers" />
</form>
</body>
</html>