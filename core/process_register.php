<?php
require_once 'SQL.php';
// Verificar que los campos obligatorios están rellenos
if (!isset($_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["institution"],$_POST["address"],$_POST["password"]))
{
	header("Location: http://" . $_SERVER["HTTP_HOST"] . "/register.php?ErrCode=1",false,303);
	die();
}
if ($_POST["firstname"]=="" || $_POST["lastname"]=="" || $_POST["email"]=="" || $_POST["institution"]=="" || $_POST["address"]=="")
{
	header("Location: http://" . $_SERVER["HTTP_HOST"] . "/register.php?ErrCode=1",false,303);
	die();
}


$conn = new SQLConnection();
$resultado = $conn->pquery("SELECT * FROM users WHERE email=?",$_POST["email"])->get_result();
if ($resultado->num_rows != 0)
{
	header("Location: http://" . $_SERVER["HTTP_HOST"] . "/register.php?ErrCode=2",false,303);
	die();
}
$conn->pquery("INSERT INTO users (firstname,lastname,email,institution,department,address,phone,fax,research,publishType,password,rank,lastlogin) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",$_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["institution"],$_POST["department"],$_POST["address"],$_POST["tel"],$_POST["fax"],$_POST["research"],intval($_POST["publishType"]),password_hash($_POST["password"],PASSWORD_DEFAULT),0,date("j F Y"));

$conn->close();

header("Location: http://" . $_SERVER["HTTP_HOST"] . "/login_page.php",false,303);
?>