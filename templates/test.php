<?php
// Inclure les fichiers nécessaires
include_once '../libs/config.php'; // Fichier contenant les informations de connexion à la base de données
include_once '../libs/modele.php'; // Fichier contenant les fonctions de modèle

// Fonction pour récupérer les informations de l'utilisateur depuis la base de données
function getUtilisateurInfo($email) {
    global $BDD_host, $BDD_base, $BDD_user, $BDD_password;

    try {
        $dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("SET CHARACTER SET utf8");

        $stmt = $dbh->prepare("SELECT nom, prenom, pays FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// Vérifier si l'email de l'utilisateur est fourni
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Récupérer les informations de l'utilisateur depuis la base de données
    $utilisateurInfo = getUtilisateurInfo($email);

    // Vérifier si l'utilisateur existe
    if ($utilisateurInfo) {
        // Afficher les informations de l'utilisateur
        echo "Nom : " . $utilisateurInfo['nom'] . "<br>";
        echo "Prénom : " . $utilisateurInfo['prenom'] . "<br>";
        echo "Pays : " . $utilisateurInfo['pays'] . "<br>";
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
} else {
    echo "Veuillez fournir l'email de l'utilisateur dans l'URL (par exemple, test.php?email=utilisateur@exemple.com).";
}
?>