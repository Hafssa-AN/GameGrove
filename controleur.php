<?php
session_start();

include_once "libs/maLibUtils.php";    
include_once "libs/modele.php"; 
include_once "libs/maLibSecurisation.php";

$addArgs = "";
$dataQS = array();
$feedback = false;

if ($action = valider("action")) {
    
    ob_start();
    switch ($action) {
        case 'connecter':
            if ($email = valider("email")) {
                if ($passe = valider("password")) {
                    if (verifUser($email, $passe)) {
                        if (valider("remember")) {
                            setcookie("email", $email, time()+60*60*24*30);
                            setcookie("passe", $passe, time()+60*60*24*30);
                            setcookie("remember", true, time()+60*60*24*30);
                        } else {
                            setcookie("email", "", time()-3600);
                            setcookie("passe", "", time()-3600);
                            setcookie("remember", false, time()-3600);
                        }
                    } else {
                        $feedback = "Identifiants incorrects"; 
                    }
                } else {
                    $feedback = "Mot de passe absent";
                }
            } else{
                $feedback = "Email absent";
            }
            $addArgs = $feedback ? "?view=connecter" : "?view=accueil";
            break;

        case 'inscrire':    
            if ($email = valider("email")) {
                if(!emailExists($email))
                {
                if ($passe = valider("password")) { 
                    if ($confirm_passe = valider("confirm-password")) {
                        if ($passe === $confirm_passe) {
                            if ($nom = valider("nom")) {
                                if ($pren = valider("prenom")) {
                                    if ($pays = valider("pays")) {
                                        mkUser($nom, $pren, $pays, $email, $passe);
                                        $addArgs = "?view=connecter";
                                    } else {
                                        $feedback = "Pays absent";
                                    }
                                } else {
                                    $feedback = "Prenom absent";
                                }
                            } else {
                                $feedback = "Nom absent";
                            }
                        } else {
                            $feedback = "Les mots de passe ne correspondent pas";
                        }
                    } else {
                        $feedback = "Confirmation du mot de passe absente";
                    }
                }
                else
                    $feedback ="Mot de passe absent";
             } else {
                    $feedback ="email deja exist";
                }
            } else {
                $feedback = "Email absent";
            }
			if ($feedback) {
				$addArgs = "?view=inscrire";
			}
            break;

        case 'jeux':  
            $jeux = getAll("jeux");
            $_SESSION['jeux'] = $jeux;
            $addArgs = "?view=jeux";
            break;

        case 'trouver_ami':
            if(!isset($_SESSION["email"]))
            {
                $addArgs = "?view=connecter";
                break;
            }
            $users = getAll("utilisateurs");
            $_SESSION['users'] = $users;
            $addArgs = "?view=trouver_ami";
            break;
        case 'profile':
            $jeux = GETUserJeux($_REQUEST["u_prof"]);
            $_SESSION['new_user'] = GETuser($_REQUEST["u_prof"]);
            $_SESSION['u_jeux'] = $jeux;
            $addArgs = "?view=profile";
        break;
        case 'ajouter':
            AddJeu($_GET['id_jeu']);
            $addArgs = "?view=jeux";
        break;
        case 'supprimer':
            Dropjeu($_GET['id_jeu']);
            $addArgs = "?view=jeux";
        break;
        case 'details_jeu':
            $_SESSION['jeu'] = GETJeu($_GET['id_jeu']);
            $addArgs = "?view=jeux-detail";
        break;
        case 'search_jeux' :
            $_SESSION['rech_jeux'] = Search($_GET['search_jeux']);
            $addArgs = "?view=jeu_rech";
        break;
        case 'logout' :
            session_destroy();
            $addArgs = "?view=accueil";
            break;
    }
    if ($feedback) {
        $_SESSION['feedback'] = $feedback;
    }
}
$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
header("Location:" . $urlBase . $addArgs);
ob_end_flush();
?>