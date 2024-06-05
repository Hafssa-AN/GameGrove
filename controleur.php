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
            $addArgs = $feedback ? "?view=connecter" : "?view=profile";
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
                                    $feedback = "PrÃ©nom absent";
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
            $jeux = getAllJeux();
            $_SESSION['jeux'] = $jeux;
            $addArgs = "?view=jeux";
            break;

        case 'trouver_ami':
            $users = getAllUsers();
            $_SESSION['users'] = $users;
            $addArgs = "?view=trouver_ami";
            break;

        case 'logout' :
            session_destroy();
            $addArgs = "?view=index";
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