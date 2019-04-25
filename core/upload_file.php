<?php
$target_dir = "../texts/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$error = 0;
$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

//Existe el fichero?
if (file_exists($target_file)) $error = 1;

// Es demasido grande?
if ($_FILES["file"]["size"] > 500000) $error = 2;

if ($extension != "txt") $error = 3;

if ($error != 0)
{
	header("Location: http://" . $_SERVER["HTTP_HOST"] . "/upload.php?ErrCode=$error",false,303);
	die();
}
else
{
	if (move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)) header("Location: http://" . $_SERVER["HTTP_HOST"] . "/upload.php?ErrCode=0",false,303);
	else header("Location: http://" . $_SERVER["HTTP_HOST"] . "/upload.php?ErrCode=4",false,303);
}
?>