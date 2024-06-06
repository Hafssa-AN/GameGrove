<?php

include_once "maLibUtils.php";	// Car on utilise la fonction valider()
include_once "modele.php";
function verifUser($login,$password)
{
	
	$id = verifUserBdd($login,$password);

	if (!$id) return false; 

	//connecterUtilisateur($id); 
	// Cas succès : on enregistre pseudo, idUser dans les variables de session 
	// il faut appeler session_start ! 
	// Le controleur le fait déjà !!
	$_SESSION["email"] = $login;
	$_SESSION["id"] = $id;
	$_SESSION["connect"] = true;
	return true;	
}
