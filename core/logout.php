<?php
require 'util.php';
require 'SQL.php';

if (!isset($_COOKIE["SESSION"]))
	redirect("/index.php");
	
setcookie("SESSION",$sesionID,time() - 18000,'/');
	
$conn = new SQLConnection();
$res = $conn->pquery("SELECT * FROM tokens WHERE sessionID=?",$_COOKIE["SESSION"])->get_result();

if ($res->num_rows == 0)
	redirect("/index.php");

$row = $res->fetch_assoc();

$email = $row["email"];
$conn->pquery("DELETE FROM tokens WHERE sessionID=?",$_COOKIE["SESSION"]);
$res = $conn->pquery("UPDATE users SET lastlogin=? WHERE email=?",date("j F Y"),$email);
$conn->close();
redirect("/login_page.php");
?>