<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body bgcolor="#EEEEEE">
<div align="center" style="font-size:14px; font-family:Verdana, Geneva, sans-serif"><b>Select files to upload</b><br /><br />
<form action="core/upload_file.php" method="post" enctype="multipart/form-data">
  Upload these file(s):<br />
  <input type="file" name="file[]" multiple="multiple" /><br />
  <input type="submit" value="Submit" />
</form><br /><br /><br />
</div>
<div align="center" style="font-size:12px; font-family:Verdana, Geneva, sans-serif">
File(s) must be in .txt format. Files can't be larger than 1MB. Maximum file count is 20.
</div>
</body>
</html>