<?php

$n = 0;
$last = fopen("last.txt","r");
fscanf($last,"%d",$n);
fclose($last);
$last = fopen("last.txt","w");
fprintf($last,"%d",$n+1);
fclose($last);

$target_dir = "../texts/".$n."/";

$count = count($_FILES["file"]["name"]);

for ($k=0; $k < $count; $k++)
{
	$target_file = $target_dir . basename($_FILES["file"]["name"][$k]);
	$error = 0;
	$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	//Existe el fichero?
	if (file_exists($target_file)) $error = 1;

	// Es demasido grande?
	if ($_FILES["file"]["size"][$k] > 500000) $error = 2;

	if ($extension != "txt") $error = 3;

	if ($error != 0)
	{
		header("Location: http://" . $_SERVER["HTTP_HOST"] . "/comfort/sel1u.php?ErrCode=$error",false,303);
		die();
	}
	else
	{
		mkdir($target_dir);
		if (!move_uploaded_file($_FILES["file"]["tmp_name"][$k],$target_dir.$n."_".$k.".".$extension)) header("Location: http://" . $_SERVER["HTTP_HOST"] . "/comfort/sel1u.php?ErrCode=4",false,303);

	}
}
header("Location: http://" . $_SERVER["HTTP_HOST"] . "/comfort/client.php?code=$n",false,303);
?>