<?php

/*
Dans ce fichier, on définit diverses fonctions permettant de récupérer des données utiles pour notre TP d'identification. Deux parties sont à compléter, en suivant les indications données dans le support de TP
*/


/********* PARTIE 1 : prise en main de la base de données *********/


// inclure ici la librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");
include_once 'config.php';

function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT u_id FROM utilisateurs WHERE email='$login' AND mdp='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function mkUser($nom,$pren,$pays,$email, $passe)
{
	// Cette fonction crée un nouvel utilisateur 
	// et renvoie l'identifiant de l'utilisateur créé
    
    if (emailExists($email) == 0) 
    {
        $c_passe = password_hash($passe, PASSWORD_DEFAULT);
        $SQL = "INSERT INTO utilisateurs(nom,prenom,pays,email,mdp) VALUES('$nom','$pren','$pays','$email', '$c_passe')";
        return SQLInsert($SQL);
    }
    return(false);
}

function getAll($tab, $condition = '') {

    $sql = "SELECT * FROM " . $tab;
    if (!empty($condition)) {
        $sql .= " " . $condition;
    }
    return SQLGetAll($sql);
}

function GETJeu($id)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT * FROM jeux WHERE j_id='$id'";

	return SQLGetAll($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function GETUserJeux($id)
{
    $sql = "SELECT j.*
            FROM jeux j
            JOIN u_jeu uj ON j.j_id = uj.j_id
            JOIN utilisateurs u ON uj.u_id = u.u_id
            WHERE u.u_id = '$id';";
    return SQLGetAll($sql);   
}