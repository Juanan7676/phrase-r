<?php
require 'SQL.php';

$conn = new SQLConnection();

function generateRandomString($length = 32) 
{
   	 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   	 $charactersLength = strlen($characters);
   	 $randomString = '';
   	 for ($i = 0; $i < $length; $i++) 
	 {
   	     $randomString .= $characters[rand(0, $charactersLength - 1)];
  	 }
  	 return $randomString;
}

// Comprobar si el cliente ya estaba conectado
if (isset($_COOKIE["SESSION"]))
{
	header("Location: http://".$_SERVER["HTTP_HOST"]."/user_index.php",true,303);
	die();
}

// Comprobar si el formulario fue rellenado
if (!isset($_POST["email"],$_POST["password"]))
{
	header("Location: http://".$_SERVER["HTTP_HOST"]."/login_page.php?Err=2",true,303);
	die();
}

$resultado = $conn->pquery("SELECT * FROM users WHERE email=?",$_POST["email"])->get_result();

// Comprobar si existe ese nombre de usuario
if ($resultado->num_rows!=1)
{
	header("Location: http://".$_SERVER["HTTP_HOST"]."/login_page.php?Err=1",true,303);
	die();
}

$row = $resultado->fetch_assoc();
if (!password_verify($_POST["password"],$row["password"]))
{
	header("Location: http://".$_SERVER["HTTP_HOST"]."/login_page.php?Err=1",true,303);
	die();
}
// Login exitoso, crear cookie
$sesionID = generateRandomString();
$conn->pquery("INSERT INTO tokens VALUES (?,?,?,?)",$sesionID,$_POST["email"],password_hash($_POST["password"],PASSWORD_DEFAULT),time());
setcookie("SESSION",$sesionID,time() + 18000,'/');
header("Location: http://".$_SERVER["HTTP_HOST"]."/user_index.php",true,303);
$conn->close();
die();
?>