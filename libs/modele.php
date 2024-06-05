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

function getAllJeux() {
    global $BDD_host, $BDD_base, $BDD_user, $BDD_password;
    
    try {
        $dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("SET CHARACTER SET utf8");

        $stmt = $dbh->prepare("SELECT * FROM jeux");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<font color=\"red\">Erreur de connexion : " . $e->getMessage() . "</font>");
    }
}

function getAllUsers()
{
	global $BDD_host, $BDD_base, $BDD_user, $BDD_password;
    
    try {
        $dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("SET CHARACTER SET utf8");

        $stmt = $dbh->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<font color=\"red\">Erreur de connexion : " . $e->getMessage() . "</font>");
    }
}

