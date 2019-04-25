<?php
	require_once 'SQL.php';
	if (!isset($_COOKIE["SESSION"]))
	{
		setcookie("SESSION","",time() - 12000);
		header("Location: http://" . $_SERVER["HTTP_HOST"] . "/login_page.php?ErrCode=3",false,303);
		die();
	}
	$sesion = $_COOKIE["SESSION"];
	$conn = new SQLConnection();
	$resultado = $conn->pquery("SELECT * FROM tokens WHERE sessionID=?",$sesion)->get_result();
	if ($resultado->num_rows != 1) //Session is incorrect!
	{
		$conn->pquery("DELETE FROM tokens WHERE sessionID=?",$_COOKIE["SESSION"]);
		setcookie("SESSION","",time() - 12000); //Unset cookie
		header("Location: http://" . $_SERVER["HTTP_HOST"] . "/login_page.php?ErrCode=3",false,303);
		die();
	}
	
	$resultado = $conn->pquery("SELECT * FROM tokens WHERE sessionID=?",$_COOKIE["SESSION"])->get_result();
	$row = $resultado->fetch_assoc();
	$usuario = $row["email"];
	$resultado = $conn->pquery("SELECT * FROM tokens WHERE email=?",$usuario)->get_result();
	if ($resultado->num_rows != 1)
	{
		$stmt = $conn->pquery("DELETE FROM tokens WHERE email=? AND sessionID != ?",$usuario,$_COOKIE["SESSION"]);
	}
	//Session is correct! Reset time
	$stmt = $conn->pquery("UPDATE tokens SET time=0 WHERE sessionID=?",$sesion);
	setcookie("SESSION",$sesion,time() + 1800);
	
	$resultado = $conn->pquery("SELECT userID FROM users WHERE email=?",$usuario)->get_result();
	$row = $resultado->fetch_assoc();
	$userid = $row["userID"];
?>