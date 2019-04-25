<?php
function getErrMsg($msg)
{
	return '<table border="1px solid" bordercolor="#FF0000" bgcolor="#FF5E5E" style="font-size:16px"><tr><td>'.$msg.'</td></tr></table>';
}
function redirect($location)
{
	header("Location: http://".$_SERVER["HTTP_HOST"].$location,true,303);
	die();
}
?>