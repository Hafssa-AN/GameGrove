<link rel="stylesheet" href="css/index.css">
<?php
session_start();

    include_once "libs/maLibUtils.php";
	include_once "libs/modele.php";
	

    $view = valider("view");

    if (!$view) $view = "accueil";

	if(isset($_SESSION["connect"]))
    	include("templates/header_sess.php");
	else
		include("templates/header.php");

    switch($view)
	{		

		case "accueil" : 
			include("templates/accueil.php");
		break;


		default :
			if (file_exists("templates/$view.php"))
				include("templates/$view.php");

	}

    include("templates/footer.php");

?>