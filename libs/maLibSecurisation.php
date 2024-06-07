<?php

include_once "maLibUtils.php";
include_once "modele.php";
function verifUser($login,$password)
{
	$c_password = md5($password);
	$id = verifUserBdd($login,$c_password);

	if (!$id) return false; 
	$_SESSION["email"] = $login;
	$_SESSION["id"] = $id;
	$_SESSION["connect"] = true;
	return true;	
}
