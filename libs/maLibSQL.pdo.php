<?php

include_once 'config.php';

function SQLGetChamp($sql)
{
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

	try {
		$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
	} catch (PDOException $e) {
		die("<font color=\"red\">SQLGetChamp: Erreur de connexion : " . $e->getMessage() . "</font>");
	}

	$dbh->exec("SET CHARACTER SET utf8");
	$res = $dbh->query($sql);
	if ($res === false) {
		$e = $dbh->errorInfo(); 
		die("<font color=\"red\">SQLGetChamp: Erreur de requete : " . $e[2] . "</font>");
	}

	$num = $res->rowCount();
	$dbh = null;

	if ($num==0) return false;
	
	$res->setFetchMode(PDO::FETCH_NUM);

	$ligne = $res->fetch();
	if ($ligne == false) return false;
	else return $ligne[0];

}


function SQLInsert($sql)
{
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;
	
	try {
		$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
	} catch (PDOException $e) {
		die("<font color=\"red\">SQLInsert: Erreur de connexion : " . $e->getMessage() . "</font>");
	}

	$dbh->exec("SET CHARACTER SET utf8");
	$res = $dbh->query($sql);
	if ($res === false) {
		$e = $dbh->errorInfo(); 
		die("<font color=\"red\">SQLInsert: Erreur de requete : " . $e[2] . "</font>");
	}                                                                                   
	$lastInsertId = $dbh->lastInsertId();
	$dbh = null; 
	return $lastInsertId;
}
function SQLGetAll($sql)
{
	global $BDD_host, $BDD_base, $BDD_user, $BDD_password;
    
    try {
        $dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("SET CHARACTER SET utf8");

        $stmt = $dbh->query($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("<font color=\"red\">Erreur de connexion : " . $e->getMessage() . "</font>");
    }
}

function emailExists($email) {
	global $BDD_host;
	global $BDD_base;
	global $BDD_user;
	global $BDD_password;

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête SQL
        $SQL = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($SQL);

        // Liaison des paramètres
        $stmt->bindParam(':email', $email);

        // Exécution de la requête
        $stmt->execute();

        // Récupération du résultat
        $count = $stmt->fetchColumn();

        // Vérification si l'email existe
        return $count > 0;
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}