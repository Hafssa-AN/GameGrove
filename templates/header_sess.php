<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
?>

<header class="">
        <nav class="nav flex justify-content-between">
            <div class="logo">GameGrove</div>
            <ul class="nav-tabs">
                <li>
                    <a href="index.php">accueil</a>
                </li>
                <li>
                    <a href="controleur.php?action=jeux">Jeux</a>
                </li>
                <li>
                    <a href="./templates/ajouter.html">Trouver des  Amis</a>
                </li>
                <li>
                    <a href="./templates/profile.html">Mon profile</a>
                </li>
                <li>
                    <a href="controleur.php?action=logout">deconnecter</a>
                </li>
            </ul>
        </nav>
</header>
    <hr>