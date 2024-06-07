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
        $c_passe = md5($passe);
        $img = "profile.jpg";
        $SQL = "INSERT INTO utilisateurs(nom,prenom,pays,email,mdp,j_image) VALUES('$nom','$pren','$pays','$email', '$c_passe','$img')";
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

	$SQL="SELECT * FROM jeux WHERE j_id='$id'";

	return SQLGetAll($SQL);
}

function GETUserJeux($id)
{
    $sql = "SELECT DISTINCT j.*
            FROM jeux j
            JOIN u_jeu uj ON j.j_id = uj.j_id
            JOIN utilisateurs u ON uj.u_id = u.u_id
            WHERE u.u_id = '$id';";
    return SQLGetAll($sql);   
}

function Addjeu($j_id)
{
    $u_id = $_SESSION['id'];
    
    $sql = "INSERT INTO u_jeu (u_id, j_id) VALUES ('$u_id', '$j_id');";
    $r = SQLInsert($sql);
}

function Dropjeu($j_id)
{
    $u_id = $_SESSION['id'];
    $sql = "DELETE FROM u_jeu WHERE u_id = $u_id AND j_id = $j_id;";
    $r = SQLInsert($sql);
}

function Search($mot)
{
    global $BDD_host, $BDD_base, $BDD_user, $BDD_password;

    try {
        $dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("SET CHARACTER SET utf8");

        $query = '%'. $mot . '%';
        $sql = "SELECT * FROM jeux WHERE nom LIKE ?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$query]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<font color=\"red\">Erreur de connexion : " . $e->getMessage() . "</font>");
    }
}