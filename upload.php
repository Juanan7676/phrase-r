<?php
require 'core/util.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir fichero</title>
</head>

<body>
<?php
if (isset($_GET["ErrCode"]))
{
	switch ($_GET["ErrCode"])
	{
		case "1":
			echo getErrMsg("El archivo ya estaba en el servidor.");
			break;
		case "2":
			echo getErrMsg("No se permiten archivos más grandes que 500 KB.");
			break;
		case "3":
			echo getErrMsg("Sólo se permiten archivos de texto (.txt).");
			break;
		case "4":
			echo getErrMsg("Hubo un error durante la subida del archivo.");
			break;
	}
}
?>
<form method="post" action="core/upload_file.php" enctype="multipart/form-data">
<input type="file" name="file" id="file" /><br />
<input type="submit" value="Enviar" />
</form>

</body>
</html>
